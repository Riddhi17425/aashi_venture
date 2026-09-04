@extends('admin.layouts.master')

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h3 class="fw-bold">Edit Our Story</h3>
            </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('our_stories') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('our_stories.update', $ourStory->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.our_stories._form')

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update
                    </button>
                    <a href="{{ route('our_stories') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection