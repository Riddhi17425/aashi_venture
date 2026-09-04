<div class="row g-3">
    <!-- YEAR -->
    <div class="col-md-6">
        <label for="year" class="form-label">
            Year <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="year"
            id="year"
            class="form-control @error('year') is-invalid @enderror"
            value="{{ old('year', isset($ourStory) ? $ourStory->year : '') }}"
            placeholder="Enter year (e.g. 1998)" >

        @error('year')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- SHORTNOTE -->
    <div class="col-md-6">
        <label for="shortnote" class="form-label">
            Shortnote <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="shortnote"
            id="shortnote"
            class="form-control @error('shortnote') is-invalid @enderror"
            value="{{ old('shortnote', isset($ourStory) ? $ourStory->shortnote : '') }}"
            placeholder="Enter shortnote" >

        @error('shortnote')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- TITLE -->
    <div class="col-md-12">
        <label for="title" class="form-label">
            Title <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            id="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', isset($ourStory) ? $ourStory->title : '') }}"
            placeholder="Enter title" >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- DESCRIPTION -->
    <div class="col-md-12">
        <label for="description" class="form-label">
            Description
        </label>

        <textarea
            name="description"
            id="description"
            rows="6"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Enter description"
        >{{ old('description', isset($ourStory) ? $ourStory->description : '') }}</textarea>

        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- STATUS -->
    <div class="col-md-12">
        <div class="form-check form-switch">
            <input
                class="form-check-input" type="checkbox" role="switch" 
                id="is_active" name="is_active" value="1"
                {{ old(
                    'is_active',
                    isset($ourStory) ? $ourStory->is_active : 1
                ) ? 'checked' : '' }} >

            <label class="form-check-label" for="is_active">
                Active
            </label>
        </div>
    </div>
</div>