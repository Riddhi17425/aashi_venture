@php
    $isEdit = isset($leader);
@endphp

<h5 class="fw-bold mb-3 pb-2 border-bottom text-primary">General Information</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Leader Title <span class="text-danger">*</span></label>
        <input type="text" name="leader_title" value="{{ old('leader_title', $leader->leader_title ?? '') }}"
               class="form-control @error('leader_title') is-invalid @enderror" placeholder="Enter leader title" required>
        @error('leader_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Leader Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="leader_image" class="form-control @error('leader_image') is-invalid @enderror"
               accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">JPG/PNG/WEBP, max 5MB.</small>
        @error('leader_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $leader->leader_image)
            <div class="mt-2">
                <img src="{{ $leader->leader_image_url }}" style="width:140px;height:100px;object-fit:cover;border-radius:4px;" alt="Current image">
            </div>
        @endif
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Leader Description</label>
        <textarea id="leader_description" name="leader_description" class="form-control summernote @error('leader_description') is-invalid @enderror" rows="6">{{ old('leader_description', $leader->leader_description ?? '') }}</textarea>
        @error('leader_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Leader Name <span class="text-danger">*</span></label>
        <input type="text" name="leader_name" value="{{ old('leader_name', $leader->leader_name ?? '') }}"
               class="form-control @error('leader_name') is-invalid @enderror" placeholder="Enter leader name" required>
        @error('leader_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Leader Designation <span class="text-danger">*</span></label>
        <input type="text" name="leader_designation" value="{{ old('leader_designation', $leader->leader_designation ?? '') }}"
               class="form-control @error('leader_designation') is-invalid @enderror" placeholder="e.g. Founder & CEO" required>
        @error('leader_designation')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $leader->sort_order ?? 0) }}"
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
                   {{ old('is_active', $leader->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label ms-2" for="is_active">Active</label>
        </div>
        <small class="text-muted">Inactive leaders are hidden from the frontend.</small>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Leader' : 'Save Leader' }}</button>

@push('scripts')
<script>
    $(function() {
        $('#leader_description').summernote({
            placeholder: 'Enter leader description here...',
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
        
        $('#leaderForm').validate({
            ignore: [],
            rules: {
                leader_title: { required: true, maxlength: 255 },
                leader_image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
                leader_name: { required: true, maxlength: 255 },
                leader_designation: { required: true, maxlength: 255 },
            },
            messages: {
                leader_title: { required: 'Please enter the leader title.' },
                leader_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
                leader_name: { required: 'Please enter the leader name.' },
                leader_designation: { required: 'Please enter the leader designation.' },
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