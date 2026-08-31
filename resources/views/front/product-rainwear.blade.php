@extends('layouts.master')

@section('body-class', 'page-inner page-product page-product--rainwear')

@section('title', 'Product rainwear')

@section('content')

<main>
    <!-- START - COLLECTION PAGE -->
    @include('front.category-collection')
    <!-- END - COLLECTION PAGE -->

    <!-- START - CATEGORY DETAIL -->
    @include('front.category-detail')
    <!-- END - CATEGORY DETAIL -->

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->
</main>

@endsection