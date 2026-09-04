@extends('admin.layouts.master')

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">

        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h3 class="fw-bold">Settings</h3>
            </div>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <form action="{{ route('settings.store') }}" method="POST">
                    @csrf

                    {{-- PHONE NUMBERS --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">
                                Phone Numbers
                            </label>

                            <button type="button"
                                    class="btn btn-primary btn-sm"
                                    id="add-phone">
                                <i class="fa fa-plus"></i> Add Phone
                            </button>
                        </div>

                        <div id="phone-container">

                            @php
                                $phones = $setting && $setting->phone_numbers
                                    ? explode(',', $setting->phone_numbers)
                                    : [''];
                            @endphp

                            @foreach($phones as $phone)
                                <div class="input-group mb-2 phone-row">

                                    <input type="text"
                                           name="phone_numbers[]"
                                           class="form-control"
                                           placeholder="Enter phone number"
                                           value="{{ trim($phone) }}">

                                    <button type="button"
                                            class="btn btn-danger remove-phone">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </div>
                            @endforeach

                        </div>
                    </div>


                    {{-- EMAILS --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">
                                Email Addresses
                            </label>

                            <button type="button"
                                    class="btn btn-primary btn-sm"
                                    id="add-email">
                                <i class="fa fa-plus"></i> Add Email
                            </button>
                        </div>

                        <div id="email-container">

                            @php
                                $emails = $setting && $setting->emails
                                    ? explode(',', $setting->emails)
                                    : [''];
                            @endphp

                            @foreach($emails as $email)
                                <div class="input-group mb-2 email-row">

                                    <input type="email"
                                           name="emails[]"
                                           class="form-control"
                                           placeholder="Enter email address"
                                           value="{{ trim($email) }}">

                                    <button type="button"
                                            class="btn btn-danger remove-email">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </div>
                            @endforeach

                        </div>
                    </div>


                    {{-- ADDRESS --}}
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Address
                        </label>

                        <textarea name="address"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Enter address">{{ old('address', $setting->address ?? '') }}</textarea>

                    </div>


                    {{-- SAVE --}}
                    <div class="text-end">

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Save Settings
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')

<script>
$(document).ready(function () {

    // ADD PHONE
    $('#add-phone').on('click', function () {

        let html = `
            <div class="input-group mb-2 phone-row">
                <input type="text"
                       name="phone_numbers[]"
                       class="form-control"
                       placeholder="Enter phone number">

                <button type="button"
                        class="btn btn-danger remove-phone">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;

        $('#phone-container').append(html);
    });


    // REMOVE PHONE
    $(document).on('click', '.remove-phone', function () {
        $(this).closest('.phone-row').remove();
    });


    // ADD EMAIL
    $('#add-email').on('click', function () {

        let html = `
            <div class="input-group mb-2 email-row">
                <input type="email"
                       name="emails[]"
                       class="form-control"
                       placeholder="Enter email address">

                <button type="button"
                        class="btn btn-danger remove-email">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;

        $('#email-container').append(html);
    });


    // REMOVE EMAIL
    $(document).on('click', '.remove-email', function () {
        $(this).closest('.email-row').remove();
    });

});
</script>

@endpush