@php
    $isEdit = isset($subCategory);
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Category <span class="text-danger">*</span></label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ (old('category_id', $subCategory->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                    {{ $cat->title }}
                </option>
            @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                   style="width: 3em; height: 1.5em;"
                   {{ old('is_active', $subCategory->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive sub-categories are hidden from the frontend.</small>
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" value="{{ old('title', $subCategory->title ?? '') }}"
               class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
        <small class="text-muted">JPG/PNG/WEBP, max 2MB.</small>
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $subCategory->image)
            <div class="mt-2"><img src="{{ $subCategory->image_url }}" style="max-width:140px;" alt="Current image"></div>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Image Alt Text</label>
        <input type="text" name="image_alt" value="{{ old('image_alt', $subCategory->image_alt ?? '') }}"
               class="form-control @error('image_alt') is-invalid @enderror" placeholder="Describe the image for SEO/accessibility">
        @error('image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Sub-Category' : 'Save Sub-Category' }}</button>

@push('scripts')
<script>
    $(function() {
        $('#subCategoryForm').validate({
            rules: {
                category_id: { required: true },
                title: { required: true, maxlength: 255 },
                image: { extension: 'jpg|jpeg|png|webp' }
            },
            messages: {
                category_id: { required: 'Please select a category.' },
                title: { required: 'Title is required.' },
                image: { extension: 'Only JPG, PNG or WEBP files are allowed.' }
            },
            highlight: function(element) { $(element).addClass('is-invalid'); },
            unhighlight: function(element) { $(element).removeClass('is-invalid'); }
        });
    });
</script>
@endpush
