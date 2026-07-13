@php
    $isEdit = isset($branch);
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Label <span class="text-danger">*</span></label>
        <input type="text" name="label" id="label" value="{{ old('label', $branch->label ?? '') }}"
               class="form-control @error('label') is-invalid @enderror"
               placeholder="e.g. Factory-I / Ahmedabad Office - 1" required>
        <small class="text-muted">Shown as the card heading, e.g. "FACTORY-I".</small>
        @error('label')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $branch->sort_order ?? 0) }}" min="0"
               class="form-control @error('sort_order') is-invalid @enderror" placeholder="0">
        <small class="text-muted">Lower numbers appear first in the list.</small>
        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Address <span class="text-danger">*</span></label>
        <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2"
                  maxlength="1000" placeholder="Full address shown on the card" required>{{ old('address', $branch->address ?? '') }}</textarea>
        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $branch->phone ?? '') }}"
               class="form-control @error('phone') is-invalid @enderror" placeholder="+91 98765 43210">
        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $branch->email ?? '') }}"
               class="form-control @error('email') is-invalid @enderror" placeholder="sales@example.com">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-switch">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1"
                   style="width: 3em; height: 1.5em;"
                   {{ old('is_active', $branch->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive branches are hidden from the frontend listing.</small>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Branch' : 'Save Branch' }}</button>

@push('scripts')
<script>
    $(function() {
        $('#branchForm').validate({
            rules: {
                label: { required: true, maxlength: 255 },
                address: { required: true, maxlength: 1000 },
                email: { email: true },
                sort_order: { min: 0, digits: true }
            },
            messages: {
                label: { required: 'Label is required.' },
                address: { required: 'Address is required.' }
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
