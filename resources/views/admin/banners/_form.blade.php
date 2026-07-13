@php
    $isEdit = isset($banner);
@endphp

<h5 class="fw-bold mb-3 pb-2 border-bottom text-primary">General Information</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Category <span class="text-danger">*</span></label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="">Select a category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ (int) old('category_id', $banner->category_id ?? 0) === $cat->id ? 'selected' : '' }}>
                    {{ $cat->title }}
                </option>
            @endforeach
        </select>
        <small class="text-muted">The banner's button links to this category's page automatically.</small>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" value="{{ old('title', $banner->title ?? '') }}"
               class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Short Note</label>
        <textarea name="short_note" class="form-control @error('short_note') is-invalid @enderror" rows="2"
                  maxlength="500" placeholder="Short supporting line shown under the title">{{ old('short_note', $banner->short_note ?? '') }}</textarea>
        <small class="text-muted">Max 500 characters.</small>
        @error('short_note')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control summernote @error('description') is-invalid @enderror"
                  rows="6">{{ old('description', $banner->description ?? '') }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $banner->sort_order ?? 0) }}"
               class="form-control @error('sort_order') is-invalid @enderror">
        <small class="text-muted">Lower numbers appear first in the slider.</small>
        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                   style="width: 3em; height: 1.5em;"
                   {{ old('is_active', $banner->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive banners are hidden from the frontend.</small>
    </div>
</div>

<h5 class="fw-bold my-4 pb-2 border-bottom text-primary">Media</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Desktop Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="desktop_image" class="form-control @error('desktop_image') is-invalid @enderror"
               accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">Shown on desktop / wide screens. JPG/PNG/WEBP, max 5MB.</small>
        @error('desktop_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $banner->desktop_image)
            <div class="mt-2"><img src="{{ $banner->desktop_image_url }}" style="max-width:200px;" alt="Current desktop image"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Desktop Image Alt Text</label>
        <input type="text" name="desktop_image_alt" value="{{ old('desktop_image_alt', $banner->desktop_image_alt ?? '') }}"
               class="form-control @error('desktop_image_alt') is-invalid @enderror" placeholder="Describe the desktop image for SEO/accessibility">
        @error('desktop_image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Mobile Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="mobile_image" class="form-control @error('mobile_image') is-invalid @enderror"
               accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">Shown on mobile / narrow screens. JPG/PNG/WEBP, max 5MB.</small>
        @error('mobile_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $banner->mobile_image)
            <div class="mt-2"><img src="{{ $banner->mobile_image_url }}" style="max-width:140px;" alt="Current mobile image"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Mobile Image Alt Text</label>
        <input type="text" name="mobile_image_alt" value="{{ old('mobile_image_alt', $banner->mobile_image_alt ?? '') }}"
               class="form-control @error('mobile_image_alt') is-invalid @enderror" placeholder="Describe the mobile image for SEO/accessibility">
        @error('mobile_image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Banner' : 'Save Banner' }}</button>

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

        $('#bannerForm').validate({
            ignore: [],
            rules: {
                category_id: { required: true },
                title: { required: true, maxlength: 255 },
                short_note: { maxlength: 500 },
                mobile_image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
                desktop_image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
            },
            messages: {
                category_id: { required: 'Please select a category.' },
                title: { required: 'Title is required.' },
                mobile_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
                desktop_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
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
</script>
@endpush
