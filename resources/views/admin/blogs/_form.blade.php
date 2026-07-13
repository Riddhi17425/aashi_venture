@php
    $isEdit = isset($blog);
@endphp

<h5 class="fw-bold mb-3 pb-2 border-bottom text-primary">General Information</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Category <span class="text-danger">*</span></label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Date <span class="text-danger">*</span></label>
        <input type="date" name="date"
               value="{{ old('date', isset($blog) ? \Illuminate\Support\Carbon::parse($blog->date)->format('Y-m-d') : now()->format('Y-m-d')) }}"
               class="form-control @error('date') is-invalid @enderror" required>
        @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" value="{{ old('title', $blog->title ?? '') }}"
               class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Blog URL <span class="text-danger">*</span></label>
        <input type="text" name="url" id="url" value="{{ old('url', $blog->url ?? '') }}"
               class="form-control @error('url') is-invalid @enderror" placeholder="blog-post-url" required>
        <small class="text-muted">Used in the frontend URL. Auto-generated from the title, editable.</small>
        @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="draft" {{ old('status', $blog->status ?? 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $blog->status ?? 'draft') === 'published' ? 'selected' : '' }}>Published</option>
        </select>
        <small class="text-muted">Only Published posts are shown on the frontend blog listing.</small>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<h5 class="fw-bold my-4 pb-2 border-bottom text-primary">Content</h5>
<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Short Description <span class="text-danger">*</span></label>
        <textarea id="short_description" name="short_description" class="form-control summernote-sm @error('short_description') is-invalid @enderror"
                  rows="3" required>{{ old('short_description', $blog->short_description ?? '') }}</textarea>
        <small class="text-muted">Shown on the blog listing card as a preview.</small>
        @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Long Description <span class="text-danger">*</span></label>
        <textarea id="long_description" name="long_description" class="form-control summernote-lg @error('long_description') is-invalid @enderror"
                  rows="8" required>{{ old('long_description', $blog->long_description ?? '') }}</textarea>
        <small class="text-muted">Main body content of the blog post.</small>
        @error('long_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Conclusion</label>
        <textarea id="conclusion" name="conclusion" class="form-control summernote-sm @error('conclusion') is-invalid @enderror"
                  rows="3">{{ old('conclusion', $blog->conclusion ?? '') }}</textarea>
        @error('conclusion')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<h5 class="fw-bold my-4 pb-2 border-bottom text-primary">Images</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Front Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="front_image" class="form-control @error('front_image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">Shown on the blog listing page. JPG/PNG/WEBP, max 2MB.</small>
        @error('front_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $blog->front_image)
            <div class="mt-2"><img src="{{ $blog->front_image_url }}" style="max-width:140px;" alt="Current front image"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Front Image Alt Text</label>
        <input type="text" name="front_image_alt" value="{{ old('front_image_alt', $blog->front_image_alt ?? '') }}"
               class="form-control @error('front_image_alt') is-invalid @enderror" placeholder="Describe the front image for SEO/accessibility">
        @error('front_image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Detail Image {!! $isEdit ? '' : '<span class="text-danger">*</span>' !!}</label>
        <input type="file" name="detail_image" class="form-control @error('detail_image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" {{ $isEdit ? '' : 'required' }}>
        <small class="text-muted">Shown on the blog detail page. JPG/PNG/WEBP, max 2MB.</small>
        @error('detail_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $blog->detail_image)
            <div class="mt-2"><img src="{{ $blog->detail_image_url }}" style="max-width:140px;" alt="Current detail image"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Detail Image Alt Text</label>
        <input type="text" name="detail_image_alt" value="{{ old('detail_image_alt', $blog->detail_image_alt ?? '') }}"
               class="form-control @error('detail_image_alt') is-invalid @enderror" placeholder="Describe the detail image for SEO/accessibility">
        @error('detail_image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">CTA Image</label>
        <input type="file" name="cta_image" class="form-control @error('cta_image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
        <small class="text-muted">Optional image for the call-to-action block. JPG/PNG/WEBP, max 2MB.</small>
        @error('cta_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($isEdit && $blog->cta_image)
            <div class="mt-2"><img src="{{ $blog->cta_image_url }}" style="max-width:140px;" alt="Current CTA image"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">CTA Image Alt Text</label>
        <input type="text" name="cta_image_alt" value="{{ old('cta_image_alt', $blog->cta_image_alt ?? '') }}"
               class="form-control @error('cta_image_alt') is-invalid @enderror" placeholder="Describe the CTA image for SEO/accessibility">
        @error('cta_image_alt')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">CTA Link URL</label>
        <input type="text" name="cta_link_url" value="{{ old('cta_link_url', $blog->cta_link_url ?? '') }}"
               class="form-control @error('cta_link_url') is-invalid @enderror" placeholder="https://example.com/contact">
        <small class="text-muted">Where the CTA button/image links to.</small>
        @error('cta_link_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="d-flex justify-content-between align-items-center my-4 pb-2 border-bottom">
    <h5 class="fw-bold mb-0 text-primary">FAQs</h5>
</div>
<p class="text-muted">Optional question/answer pairs shown on the blog detail page.</p>
<div id="faqs-container" class="mb-2"></div>
<div class="mb-4 text-end">
    <button type="button" class="btn btn-sm btn-primary" id="add-faq"><i class="fa fa-plus"></i> Add FAQ</button>
</div>

<h5 class="fw-bold my-4 pb-2 border-bottom text-primary">Schema & Meta</h5>
<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Schema JSON (JSON-LD)</label>
        <textarea name="schema_json" class="form-control @error('schema_json') is-invalid @enderror" rows="6"
                  style="font-family: monospace; font-size: 0.85rem;"
                  placeholder='{"@@context": "https://schema.org", "@type": "BlogPosting", ...}'>{{ old('schema_json', $blog->schema_json ?? '') }}</textarea>
        <small class="text-muted">Raw JSON-LD structured data, pasted directly into the page's script tag. Leave empty to skip.</small>
        @error('schema_json')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $blog->meta_title ?? '') }}"
               class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta title for SEO">
        @error('meta_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Meta Description</label>
        <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="1"
                  maxlength="500" placeholder="Meta description for SEO">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
        @error('meta_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Blog Post' : 'Save Blog Post' }}</button>

@push('scripts')
<script>
    $(function() {
        $('.summernote-sm').summernote({
            placeholder: 'Enter text here...',
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']],
            ]
        });

        $('.summernote-lg').summernote({
            placeholder: 'Enter description here...',
            height: 300,
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

        $('.summernote-sm, .summernote-lg').on('summernote.change', function() {
            $(this).valid();
        });

        let urlTouched = $('#url').val().length > 0;
        function slugify(value) {
            return value.toString().toLowerCase().trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
        }
        $('#url').on('input', function() {
            urlTouched = true;
            $(this).val(slugify($(this).val()));
        });
        $('#title').on('input', function() {
            if (!urlTouched) {
                $('#url').val(slugify($(this).val()));
            }
        });

        $('#blogForm').validate({
            ignore: [],
            rules: {
                category_id: { required: true },
                title: { required: true, maxlength: 255 },
                url: { required: true, maxlength: 255 },
                date: { required: true },
                short_description: { required: true },
                long_description: { required: true },
                front_image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
                detail_image: { {{ $isEdit ? '' : 'required: true,' }} extension: 'jpg|jpeg|png|webp' },
                cta_image: { extension: 'jpg|jpeg|png|webp' },
                cta_link_url: { url: true }
            },
            messages: {
                category_id: { required: 'Please select a category.' },
                title: { required: 'Title is required.' },
                url: { required: 'Blog URL is required.' },
                short_description: { required: 'Short description is required.' },
                long_description: { required: 'Long description is required.' },
                front_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
                detail_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' },
                cta_image: { extension: 'Only JPG, PNG or WEBP files are allowed.' }
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('summernote-sm') || element.hasClass('summernote-lg')) {
                    error.insertAfter(element.next('.note-editor'));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
                if ($(element).hasClass('summernote-sm') || $(element).hasClass('summernote-lg')) {
                    $(element).next('.note-editor').find('.note-editable').addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
                if ($(element).hasClass('summernote-sm') || $(element).hasClass('summernote-lg')) {
                    $(element).next('.note-editor').find('.note-editable').removeClass('is-invalid');
                }
            }
        });
    });

    // FAQ repeater (same add/remove pattern as the Stats repeater on Categories)
    let faqIndex = 0;
    function addFaq(question = '', answer = '') {
        const html = `
            <div class="row align-items-end mb-2 faq-row" data-index="${faqIndex}">
                <div class="col-md-5">
                    <label class="form-label">Question</label>
                    <input type="text" name="faqs_question[${faqIndex}]" value="${question}" class="form-control" placeholder="e.g. How long does shipping take?">
                </div>
                <div class="col-md-5">
                    <label class="form-label">Answer</label>
                    <input type="text" name="faqs_answer[${faqIndex}]" value="${answer}" class="form-control" placeholder="Answer text">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger w-100 remove-faq">Remove</button>
                </div>
            </div>
        `;
        $('#faqs-container').append(html);
        faqIndex++;
    }

    $(document).on('click', '#add-faq', function() { addFaq(); });
    $(document).on('click', '.remove-faq', function() { $(this).closest('.faq-row').remove(); });

    $(function() {
        @php
            $oldQuestions = old('faqs_question', collect($blog->faqs ?? [])->pluck('question')->all());
            $oldAnswers   = old('faqs_answer', collect($blog->faqs ?? [])->pluck('answer')->all());
        @endphp
        @if(!empty($oldQuestions))
            @foreach($oldQuestions as $i => $question)
                addFaq({!! json_encode($question) !!}, {!! json_encode($oldAnswers[$i] ?? '') !!});
            @endforeach
        @endif
    });
</script>
@endpush
