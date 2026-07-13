@php
    $isEdit = isset($workspace);
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Workspace Category (Tab) <span class="text-danger">*</span>
            <button type="button" class="btn btn-link btn-sm p-0 ms-2 align-baseline" id="toggleManageCategories">Manage categories</button>
        </label>
        <select name="workspace_category_id" id="workspace_category_id"
                class="form-select @error('workspace_category_id') is-invalid @enderror" required>
            <option value="">Select a category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ (int) old('workspace_category_id', $workspace->workspace_category_id ?? 0) === $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
            <option value="__add_new__" class="fw-bold text-primary">+ Add New Category</option>
        </select>
        @error('workspace_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        <small class="text-muted">These are the tabs shown above the workspace gallery on the frontend (e.g. Machinery, Staff).</small>

        {{-- Inline "Add New Category" panel — WordPress-style. Hidden by default,
             opens when "+ Add New Category" is picked from the dropdown above.
             Posts via AJAX to workspace_categories.store and inserts the new
             option into the select without leaving this form. --}}
        <div id="addCategoryPanel" class="border rounded p-3 mt-2 bg-light" style="display:none;">
            <label class="form-label mb-1 fw-bold">New Category Name</label>
            <div class="input-group">
                <input type="text" id="newCategoryName" class="form-control" placeholder="e.g. Packing Section">
                <button type="button" class="btn btn-primary" id="saveNewCategory">Add</button>
                <button type="button" class="btn btn-outline-secondary" id="cancelAddCategory">Cancel</button>
            </div>
            <div id="newCategoryError" class="text-danger small mt-1"></div>
        </div>

        {{-- Manage categories panel — hard-delete a tab that isn't in use.
             Toggled via the "Manage categories" link in the label above. --}}
        <div id="manageCategoriesPanel" class="border rounded mt-2" style="display:none; max-height:220px; overflow-y:auto;">
            <ul class="list-group list-group-flush" id="categoryManageList">
                @foreach($categories as $cat)
                    <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2" data-id="{{ $cat->id }}">
                        <span class="category-name">{{ $cat->name }}</span>
                        <button type="button" class="btn btn-sm btn-outline-danger js-delete-category" title="Delete category">
                            <i class="fa fa-trash"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
            <div id="categoryManageEmpty" class="text-muted small p-2 text-center" style="{{ $categories->count() ? 'display:none;' : '' }}">
                No categories yet.
            </div>
        </div>
        <div id="categoryManageMessage" class="small mt-1"></div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                   style="width: 3em; height: 1.5em;"
                   {{ old('is_active', $workspace->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive images are hidden from the frontend gallery.</small>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
               accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">JPG/PNG/WEBP, max 5MB.</small>
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $workspace->image)
            <div class="mt-2">
                <img src="{{ $workspace->image_url }}" style="width:140px;height:100px;object-fit:cover;border-radius:4px;" alt="Current image">
            </div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Alt Text</label>
        <input type="text" name="image_alt" value="{{ old('image_alt', $workspace->image_alt ?? '') }}"
               class="form-control @error('image_alt') is-invalid @enderror" placeholder="Describe the image for SEO/accessibility">
        @error('image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $workspace->sort_order ?? 0) }}"
               class="form-control @error('sort_order') is-invalid @enderror">
        <small class="text-muted">Lower numbers appear first within the same tab.</small>
        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Workspace Image' : 'Save Workspace Image' }}</button>

@push('scripts')
<script>
    $(function() {
        $.validator.addMethod('notEquals', function(value, element, param) {
            return value !== param;
        }, 'Please select a real category.');

        const $select = $('#workspace_category_id');
        let lastRealValue = $select.val() === '__add_new__' ? '' : $select.val();

        // Opening the panel: triggered by picking "+ Add New Category" from the dropdown
        function openAddCategoryPanel() {
            $('#addCategoryPanel').slideDown();
            $('#newCategoryName').val('').focus();
            $('#newCategoryError').text('');
        }

        function closeAddCategoryPanel(revert) {
            $('#addCategoryPanel').slideUp();
            $('#newCategoryError').text('');
            if (revert) {
                $select.val(lastRealValue);
            }
        }

        $select.on('change', function() {
            if ($select.val() === '__add_new__') {
                openAddCategoryPanel();
            } else {
                lastRealValue = $select.val();
            }
        });

        $('#cancelAddCategory').on('click', function() {
            closeAddCategoryPanel(true);
        });

        // Save the new category via AJAX, then insert it into the <select>
        // right above the "+ Add New Category" row, and select it.
        function saveNewCategory() {
            const name = $('#newCategoryName').val().trim();
            $('#newCategoryError').text('');

            if (!name) {
                $('#newCategoryError').text('Please enter a category name.');
                return;
            }

            $('#saveNewCategory').prop('disabled', true).text('Adding...');

            $.ajax({
                url: '{{ route('workspace_categories.store') }}',
                method: 'POST',
                data: { name: name, _token: '{{ csrf_token() }}' },
                success: function(res) {
                    if (res.success) {
                        const opt = new Option(res.category.name, res.category.id, false, false);
                        $select.find('option[value="__add_new__"]').before(opt);
                        $select.val(res.category.id);
                        lastRealValue = String(res.category.id);
                        closeAddCategoryPanel(false);
                        addCategoryToManageList(res.category.id, res.category.name);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422 && xhr.responseJSON.errors && xhr.responseJSON.errors.name) {
                        $('#newCategoryError').text(xhr.responseJSON.errors.name[0]);
                    } else {
                        $('#newCategoryError').text('Something went wrong. Please try again.');
                    }
                },
                complete: function() {
                    $('#saveNewCategory').prop('disabled', false).text('Add');
                }
            });
        }

        $('#saveNewCategory').on('click', saveNewCategory);
        $('#newCategoryName').on('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                saveNewCategory();
            }
            if (e.key === 'Escape') {
                closeAddCategoryPanel(true);
            }
        });

        // --- Manage categories panel (hard delete) ---

        $('#toggleManageCategories').on('click', function() {
            $('#manageCategoriesPanel').slideToggle();
            $('#categoryManageMessage').text('');
        });

        function addCategoryToManageList(id, name) {
            const $empty = $('#categoryManageEmpty');
            $empty.hide();
            const li = $('<li>', { class: 'list-group-item d-flex justify-content-between align-items-center py-1 px-2', 'data-id': id })
                .append($('<span>', { class: 'category-name', text: name }))
                .append(
                    $('<button>', { type: 'button', class: 'btn btn-sm btn-outline-danger js-delete-category', title: 'Delete category' })
                        .append($('<i>', { class: 'fa fa-trash' }))
                );
            $('#categoryManageList').append(li);
        }

        $(document).on('click', '.js-delete-category', function() {
            const $li = $(this).closest('li');
            const id = $li.data('id');
            const name = $li.find('.category-name').text();
            const $msg = $('#categoryManageMessage');

            if (!confirm('Delete the "' + name + '" category? This cannot be undone.')) {
                return;
            }

            $msg.removeClass('text-danger text-success').text('');

            $.ajax({
                url: '{{ route('workspace_categories.destroy', ':id') }}'.replace(':id', id),
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function(res) {
                    if (res.success) {
                        $li.remove();
                        $select.find('option[value="' + id + '"]').remove();
                        if ($select.val() == id || $select.val() === null) {
                            $select.val('');
                            lastRealValue = '';
                        }
                        if ($('#categoryManageList li').length === 0) {
                            $('#categoryManageEmpty').show();
                        }
                        $msg.addClass('text-success').text('Category deleted.');
                    }
                },
                error: function(xhr) {
                    const message = (xhr.responseJSON && xhr.responseJSON.message)
                        ? xhr.responseJSON.message
                        : 'Failed to delete category. Please try again.';
                    $msg.addClass('text-danger').text(message);
                }
            });
        });

        // If this is the edit form and it loaded with "+ Add New Category"
        // pre-selected (shouldn't normally happen), don't leave it stuck.
        if ($select.val() === '__add_new__') {
            $select.val('');
        }

        // Standard form validation
        $('#workspaceForm').validate({
            ignore: [],
            rules: {
                workspace_category_id: { required: true, notEquals: '__add_new__' },
                image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
            },
            messages: {
                workspace_category_id: { required: 'Please select a category.' },
                image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endpush
