@php
    $isEdit = isset($category);
@endphp

<h5 class="fw-bold mb-3 pb-2 border-bottom text-primary">General Information</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" value="{{ old('title', $category->title ?? '') }}"
               class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Category URL <span class="text-danger">*</span></label>
        <input type="text" name="category_url" id="category_url"
               value="{{ old('category_url', $category->category_url ?? '') }}"
               class="form-control @error('category_url') is-invalid @enderror" placeholder="category-url" required>
        <small class="text-muted">Used in the frontend URL. Auto-generated from the title, editable.</small>
        @error('category_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Short Note <span class="text-danger">*</span></label>
        <textarea name="short_note" class="form-control @error('short_note') is-invalid @enderror" rows="2"
                  maxlength="500" placeholder="Short line shown on the category listing card">{{ old('short_note', $category->short_note ?? '') }}</textarea>
        <small class="text-muted">Shown under the title on the category listing page (max 500 characters).</small>
        @error('short_note')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Icon</label>
        <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp,.svg">
        <small class="text-muted">Shown on the listing card. JPG/PNG/WEBP/SVG, max 1MB.</small>
        @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $category->icon)
            <div class="mt-2"><img src="{{ $category->icon_url }}" style="max-width:60px;" alt="Current icon"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                   style="width: 3em; height: 1.5em;"
                   {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive categories are hidden from the frontend listing.</small>
    </div>
</div>

<h5 class="fw-bold my-4 pb-2 border-bottom text-primary">Detail Page Content</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Detail Page Title</label>
        <input type="text" name="detail_page_title" value="{{ old('detail_page_title', $category->detail_page_title ?? '') }}"
               class="form-control @error('detail_page_title') is-invalid @enderror" placeholder="Leave empty to reuse Title">
        @error('detail_page_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Detail Page Short Note</label>
        <input type="text" name="detail_page_shortnote" value="{{ old('detail_page_shortnote', $category->detail_page_shortnote ?? '') }}"
               class="form-control @error('detail_page_shortnote') is-invalid @enderror" maxlength="500"
               placeholder="Short intro line shown at the top of the detail page">
        @error('detail_page_shortnote')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Description <span class="text-danger">*</span></label>
        <textarea id="description" name="description" class="form-control summernote @error('description') is-invalid @enderror"
                  rows="6" required>{{ old('description', $category->description ?? '') }}</textarea>
        <small class="text-muted">Main content shown on the category detail page.</small>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<h5 class="fw-bold my-4 pb-2 border-bottom text-primary">Media & Files</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Listing Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="listing_image" class="form-control @error('listing_image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">Shown on the category listing page. JPG/PNG/WEBP, max 2MB.</small>
        @error('listing_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $category->listing_image)
            <div class="mt-2"><img src="{{ $category->listing_image_url }}" style="max-width:140px;" alt="Current listing image"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Listing Image Alt Text</label>
        <input type="text" name="listing_image_alt" value="{{ old('listing_image_alt', $category->listing_image_alt ?? '') }}"
               class="form-control @error('listing_image_alt') is-invalid @enderror" placeholder="Describe the listing image for SEO/accessibility">
        @error('listing_image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Detail Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="detail_image" class="form-control @error('detail_image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">Shown on the category detail page. JPG/PNG/WEBP, max 2MB.</small>
        @error('detail_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $category->detail_image)
            <div class="mt-2"><img src="{{ $category->detail_image_url }}" style="max-width:140px;" alt="Current detail image"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Detail Image Alt Text</label>
        <input type="text" name="detail_image_alt" value="{{ old('detail_image_alt', $category->detail_image_alt ?? '') }}"
               class="form-control @error('detail_image_alt') is-invalid @enderror" placeholder="Describe the detail image for SEO/accessibility">
        @error('detail_image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Brochure PDF</label>
        <input type="file" name="brochure_pdf" class="form-control @error('brochure_pdf') is-invalid @enderror" accept=".pdf">
        <small class="text-muted">Downloadable via a button on the detail page. Max 5MB.</small>
        @error('brochure_pdf')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $category->brochure_pdf)
            <div class="mt-2"><a href="{{ $category->brochure_url }}" target="_blank">View current brochure</a></div>
        @endif
    </div>
</div>

<div class="d-flex justify-content-between align-items-center my-4 pb-2 border-bottom">
    <h5 class="fw-bold mb-0 text-primary">Stats</h5>
</div>
<p class="text-muted">Optional highlight numbers for the detail page, e.g. "600 Stitching Machines".</p>
<div id="stats-container" class="mb-2"></div>
<div class="mb-4 text-end">
    <button type="button" class="btn btn-sm btn-primary" id="add-stat"><i class="fa fa-plus"></i> Add Stat</button>
</div>

<h5 class="fw-bold my-4 pb-2 border-bottom text-primary">Meta Details</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $category->meta_title ?? '') }}"
               class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta title for SEO">
        @error('meta_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Meta Description</label>
        <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="1"
                  maxlength="500" placeholder="Meta description for SEO">{{ old('meta_description', $category->meta_description ?? '') }}</textarea>
        @error('meta_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Category' : 'Save Category' }}</button>

@push('scripts')
<script>
    $(function() {
        $('#description').summernote({
            placeholder: 'Enter description here...',
            height: 220,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });

        $('#description').on('summernote.change', function() {
            $(this).valid();
        });

        let categoryUrlTouched = $('#category_url').val().length > 0;
        function slugify(value) {
            return value.toString().toLowerCase().trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
        }
        $('#category_url').on('input', function() {
            categoryUrlTouched = true;
            $(this).val(slugify($(this).val()));
        });
        $('#title').on('input', function() {
            if (!categoryUrlTouched) {
                $('#category_url').val(slugify($(this).val()));
            }
        });

        $('#categoryForm').validate({
            ignore: [],
            rules: {
                title: { required: true, maxlength: 255 },
                category_url: { required: true, maxlength: 255 },
                short_note: { required: true, maxlength: 500 },
                description: { required: true },
                icon: { extension: 'jpg|jpeg|png|webp|svg' },
                listing_image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
                detail_image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
                brochure_pdf: { extension: 'pdf' }
            },
            messages: {
                title: { required: 'Title is required.' },
                category_url: { required: 'Category URL is required.' },
                short_note: { required: 'Short note is required.' },
                description: { required: 'Description is required.' },
                listing_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
                detail_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
                brochure_pdf: { extension: 'Only PDF files are allowed.' }
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('summernote')) {
                    error.insertAfter(element.next('.note-editor'));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
                if ($(element).hasClass('summernote')) {
                    $(element).next('.note-editor').find('.note-editable').addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
                if ($(element).hasClass('summernote')) {
                    $(element).next('.note-editor').find('.note-editable').removeClass('is-invalid');
                }
            }
        });
    });

    // Stats handling (add/remove rows, similar pattern to a FAQ repeater)
    let statIndex = 0;
    function addStat(number = '', title = '') {
        const html = `
            <div class="row align-items-end mb-2 stat-row" data-index="${statIndex}">
                <div class="col-md-3">
                    <label class="form-label">Number</label>
                    <input type="text" name="stats_number[${statIndex}]" value="${number}" class="form-control" placeholder="e.g. 600 or 200+">
                </div>
                <div class="col-md-7">
                    <label class="form-label">Title</label>
                    <input type="text" name="stats_title[${statIndex}]" value="${title}" class="form-control" placeholder="e.g. Stitching Machines">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger w-100 remove-stat">Remove</button>
                </div>
            </div>
        `;
        $('#stats-container').append(html);
        statIndex++;
    }

    $(document).on('click', '#add-stat', function() { addStat(); });
    $(document).on('click', '.remove-stat', function() { $(this).closest('.stat-row').remove(); });

    $(function() {
        @php
            $oldNumbers = old('stats_number', collect($category->stats ?? [])->pluck('number')->all());
            $oldTitles = old('stats_title', collect($category->stats ?? [])->pluck('title')->all());
        @endphp
        @if(!empty($oldNumbers))
            @foreach($oldNumbers as $i => $number)
                addStat({!! json_encode($number) !!}, {!! json_encode($oldTitles[$i] ?? '') !!});
            @endforeach
        @endif
    });
</script>
@endpush
