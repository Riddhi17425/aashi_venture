@php
    $isEdit = isset($partner);
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Logo {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"
               accept=".jpg,.jpeg,.png,.webp,.svg" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">JPG/PNG/WEBP/SVG, max 2MB. Transparent PNG/SVG works best.</small>
        @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $partner->logo)
            <div class="mt-2">
                <img src="{{ $partner->logo_url }}" style="width:80px;height:80px;object-fit:cover;border-radius:4px;" alt="Current logo">
            </div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Alt Text</label>
        <input type="text" name="logo_alt" value="{{ old('logo_alt', $partner->logo_alt ?? '') }}"
               class="form-control @error('logo_alt') is-invalid @enderror" placeholder="e.g. Swiggy logo">
        <small class="text-muted">For SEO/accessibility.</small>
        @error('logo_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $partner->sort_order ?? 0) }}"
               class="form-control @error('sort_order') is-invalid @enderror">
        <small class="text-muted">Lower numbers appear first.</small>
        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                   style="width: 3em; height: 1.5em;"
                   {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive logos are hidden from the frontend strip.</small>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Partner Logo' : 'Save Partner Logo' }}</button>

@push('scripts')
<script>
    $(function() {
        $('#partnerForm').validate({
            ignore: [],
            rules: {
                logo: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp|svg' },
            },
            messages: {
                logo: { extension: 'Only JPG, PNG, WEBP or SVG files are allowed.' },
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
