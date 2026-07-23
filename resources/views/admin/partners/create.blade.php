@extends('admin.layouts.master')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center mb-4">
            <div class="col-md-6"><h3 class="fw-bold">Add Partner Logo</h3></div>
            <div class="col-md-6 text-end"><a href="{{ route('partners') }}" class="btn btn-secondary">Back</a></div>
        </div>

        <div class="card"><div class="card-body">
            <form id="partnerForm" action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.partners._form')
            </form>
        </div></div>
    </div>
</div>
@endsection
