@extends('admin.layouts.master')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6"><h3 class="fw-bold">Add Sub-Category</h3></div>
            <div class="col-md-6 text-end"><a href="{{ route('sub_categories') }}" class="btn btn-secondary">Back</a></div>
        </div>

        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

        <div class="card"><div class="card-body">
            <form id="subCategoryForm" action="{{ route('sub_categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.sub_categories._form')
            </form>
        </div></div>
    </div>
</div>
@endsection
