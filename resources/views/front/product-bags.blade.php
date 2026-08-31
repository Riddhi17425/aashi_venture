@extends('layouts.master')

@section('body-class', 'page-inner page-product page-product--bags')

@section('title', 'Product bags')

@section('content')

<main>
    <!-- START - PRODUCT PAGE -->
    <section class="section-block product-page" aria-labelledby="product-page-heading">
        <div class="container-aashi">

            <header class="product-page__header">
                <p class="aashi-label">Made to Store, Carry &amp; Protect</p>

                <h1 class="aashi-title aashi-title--page" id="product-page-heading">
                    Bags Collection
                </h1>
            </header>

            <div class="product-page__categories product-page__categories--2">

                <article class="product-category-card">
                    <div class="product-category-card__frame">

                        <img
                            class="product-category-card__bg"
                            src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                            alt=""
                            aria-hidden="true">

                        <div class="product-category-card__image-wrap">
                            <img
                                class="product-category-card__image"
                                src="{{ asset('frontend/assets/images/products/bags-travel.webp') }}"
                                alt="Travel and luggage bags collection">
                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Travel &amp; Luggage Collection
                            </h2>
                        </div>

                    </div>
                </article>

                <article class="product-category-card">
                    <div class="product-category-card__frame">

                        <img
                            class="product-category-card__bg"
                            src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                            alt=""
                            aria-hidden="true">

                        <div class="product-category-card__image-wrap">
                            <img
                                class="product-category-card__image"
                                src="{{ asset('frontend/assets/images/products/bags-storage.webp') }}"
                                alt="Home storage and bedding essentials">
                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Home Storage &amp; Bedding Essentials
                            </h2>
                        </div>

                    </div>
                </article>

            </div>

            <div class="product-page__cta">

                <a href="#" class="aashi-btn aashi-btn--primary">
                    Download Brochure

                    <img
                        class="aashi-btn__icon"
                        src="{{ asset('frontend/assets/icons/arrow-right-white.svg') }}"
                        alt="">
                </a>

            </div>

        </div>
    </section>
    <!-- END - PRODUCT PAGE -->

    <!-- START - PRODUCT DETAIL -->
    <section class="section-block product-detail" aria-labelledby="product-detail-heading">
        <div class="container-aashi">

            <div class="product-detail__grid">

                <div class="product-detail__media">
                    <img
                        class="product-detail__image"
                        src="{{ asset('frontend/assets/images/products/bags-factory.jpg') }}"
                        alt="Bags and packaging production at Aashi factory">
                </div>

                <div class="product-detail__content">

                    <p class="aashi-label">Bags &amp; Packaging Solutions</p>

                    <div class="product-detail__copy">

                        <h2 class="aashi-title aashi-title--section" id="product-detail-heading">
                            Practical Solutions for Carry, Storage and Packaging
                        </h2>

                        <div class="product-detail__text">

                            <p>
                                Aashi offers a versatile range of bags and packaging solutions for retail, travel, home storage and corporate requirements. The portfolio includes duffle bags, backpacks, haversacks, travelling bags and lunch bags, along with PVC, zipper, PEVA/EVA, comforter and underbed storage bags.
                            </p>

                            <p>
                                Designed for functional use and reliable presentation, each category is developed to support everyday carry, organised storage and customised packaging needs across industries.
                            </p>

                        </div>

                    </div>

                    <hr class="product-detail__divider" aria-hidden="true">

                    <div class="product-detail__stats" data-stats-counter aria-label="Company highlights">

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="27+">0</p>
                            <p class="product-detail__stat-label">Years of Industry Experience</p>
                        </div>

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="4">0</p>
                            <p class="product-detail__stat-label">Manufacturing Locations</p>
                        </div>

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="1,000+">0</p>
                            <p class="product-detail__stat-label">Skilled Workforce</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- END - PRODUCT DETAIL -->

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->
</main>
@endsection