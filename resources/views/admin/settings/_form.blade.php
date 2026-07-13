@php
    $isEdit = isset($setting);
    $currentType = old('type', $setting->type ?? 'text');
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Label <span class="text-danger">*</span></label>
        <input type="text" name="label" id="label" value="{{ old('label', $setting->label ?? '') }}"
               class="form-control @error('label') is-invalid @enderror"
               placeholder="e.g. Phone Number, Facebook Link, Site Logo" required>
        <small class="text-muted">Human-readable name shown here in the admin panel.</small>
        @error('label')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Key <span class="text-danger">*</span></label>
        <input type="text" name="key" id="key" value="{{ old('key', $setting->key ?? '') }}"
               class="form-control @error('key') is-invalid @enderror" placeholder="phone_number">
        <small class="text-muted">Used in code to fetch this value, e.g. <code>Setting::get('phone_number')</code>. Auto-generated from Label, editable.</small>
        @error('key')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Type <span class="text-danger">*</span></label>
        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
            <option value="text" {{ $currentType === 'text' ? 'selected' : '' }}>Text</option>
            <option value="url" {{ $currentType === 'url' ? 'selected' : '' }}>URL (link)</option>
            <option value="image" {{ $currentType === 'image' ? 'selected' : '' }}>Image</option>
        </select>
        <small class="text-muted">Text: numbers/address/etc. URL: social links. Image: logo/favicon.</small>
        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                   style="width: 3em; height: 1.5em;"
                   {{ old('is_active', $setting->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive settings are ignored by <code>Setting::get()</code>.</small>
    </div>

    {{-- Text / URL value field --}}
    <div class="col-md-12 mb-3 field-value" data-for="text,url">
        <label class="form-label" id="value-label">Value <span class="text-danger">*</span></label>
        <input type="text" name="value" id="value" value="{{ old('value', $setting->value ?? '') }}"
               class="form-control @error('value') is-invalid @enderror"
               placeholder="e.g. +91 98765 43210 or https://facebook.com/yourpage">
        <small class="text-muted" id="value-hint">Plain text value.</small>
        @error('value')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    {{-- Image value fields --}}
    <div class="col-md-6 mb-3 field-image" data-for="image">
        <label class="form-label">Image {!! ($isEdit || $currentType !== 'image') ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp,.svg">
        <small class="text-muted">JPG/PNG/WEBP/SVG, max 2MB.</small>
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $setting->image)
            <div class="mt-2"><img src="{{ $setting->image_url }}" style="max-width:120px;" alt="{{ $setting->image_alt ?: $setting->label }}"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3 field-image" data-for="image">
        <label class="form-label">Image Alt Text</label>
        <input type="text" name="image_alt" value="{{ old('image_alt', $setting->image_alt ?? '') }}"
               class="form-control @error('image_alt') is-invalid @enderror" placeholder="Describe the image for SEO/accessibility">
        @error('image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Setting' : 'Save Setting' }}</button>

@push('scripts')
<script>
    $(function() {
        let keyTouched = $('#key').val().length > 0;
        function slugifyKey(value) {
            return value.toString().toLowerCase().trim()
                .replace(/[^a-z0-9\s_]/g, '')
                .replace(/\s+/g, '_')
                .replace(/_+/g, '_')
                .replace(/^_|_$/g, '');
        }
        $('#key').on('input', function() {
            keyTouched = true;
            $(this).val(slugifyKey($(this).val()));
        });
        $('#label').on('input', function() {
            if (!keyTouched) {
                $('#key').val(slugifyKey($(this).val()));
            }
        });

        function toggleFieldsByType() {
            const type = $('#type').val();

            $('.field-value, .field-image').hide()
                .find('input, textarea').prop('required', false);

            $('[data-for]').each(function() {
                const applies = $(this).data('for').toString().split(',').includes(type);
                if (applies) {
                    $(this).show();
                }
            });

            if (type === 'text' || type === 'url') {
                $('#value').prop('required', true);
                $('#value-label').html(type === 'url' ? 'URL <span class="text-danger">*</span>' : 'Value <span class="text-danger">*</span>');
                $('#value').attr('placeholder', type === 'url' ? 'https://facebook.com/yourpage' : 'e.g. +91 98765 43210');
                $('#value-hint').text(type === 'url' ? 'Full link including https://' : 'Plain text value.');
            }
        }

        $('#type').on('change', toggleFieldsByType);
        toggleFieldsByType();

        $('#settingForm').validate({
            ignore: [],
            rules: {
                label: { required: true, maxlength: 255 },
                key: { required: true, maxlength: 255 },
                type: { required: true },
                value: {
                    required: function() {
                        return $('#type').val() === 'text' || $('#type').val() === 'url';
                    },
                    url: function() {
                        return $('#type').val() === 'url';
                    }
                },
                image: { extension: 'jpg|jpeg|png|webp|svg' }
            },
            messages: {
                label: { required: 'Label is required.' },
                key: { required: 'Key is required.' },
                value: { required: 'Value is required for this type.', url: 'Enter a valid URL.' }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            highlight: function(element) { $(element).addClass('is-invalid'); },
            unhighlight: function(element) { $(element).removeClass('is-invalid'); }
        });
    });
</script>
@endpush
