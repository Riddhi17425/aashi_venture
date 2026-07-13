@extends('admin.layouts.master')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6"><h3 class="fw-bold">Edit Branch</h3></div>
            <div class="col-md-6 text-end"><a href="{{ route('branches') }}" class="btn btn-secondary">Back</a></div>
        </div>

        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

        <div class="card"><div class="card-body">
            <form id="branchForm" action="{{ route('branches.update', $branch->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.branches._form')
            </form>
        </div></div>
    </div>
</div>
@endsection
