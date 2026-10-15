@extends('layouts.master')

@section('body-class', 'page-inner page-product page-product--' . $category->category_url)

@section('title', $category->meta_title ?: $category->title)

@section('content')
    @include('front.category-collection')
    @include('front.category-detail')
    @include('front.partials.newsletter')
@endsection