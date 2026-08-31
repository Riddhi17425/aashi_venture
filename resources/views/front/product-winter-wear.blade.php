@extends('layouts.master')

@section('body-class', 'page-inner page-product page-product--winter-wear')

@section('title', 'Product winter wear')

@section('content')

<main>
    <!-- START - PRODUCT PAGE -->
    <section class="section-block product-page" aria-labelledby="product-page-heading">
        <div class="container-aashi">

            <header class="product-page__header">
                <p class="aashi-label">Warmth for Everyday Wear</p>
                <h1 class="aashi-title aashi-title--page" id="product-page-heading">
                    Winter Wear Collection
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
                                src="{{ asset('frontend/assets/images/products/winter-mens-jacket.webp') }}"
                                alt="Men's winter jacket">
                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Men's Jacket
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
                                src="{{ asset('frontend/assets/images/products/winter-womens-jacket.webp') }}"
                                alt="Women's winter jacket">
                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Women's Jacket
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

    <!-- Product Detail -->
    <section class="section-block product-detail" aria-labelledby="product-detail-heading">
        <div class="container-aashi">

            <div class="product-detail__grid">

                <div class="product-detail__media">
                    <img
                        class="product-detail__image"
                        src="{{ asset('frontend/assets/images/products/winter-factory.webp') }}"
                        alt="Winter wear production area at Aashi factory">
                </div>

                <div class="product-detail__content">

                    <p class="aashi-label">Winterwear Collection</p>

                    <div class="product-detail__copy">

                        <h2 class="aashi-title aashi-title--section" id="product-detail-heading">
                            Winterwear Designed for Everyday Conditions
                        </h2>

                        <div class="product-detail__text">

                            <p>
                                Aashi winterwear is developed for colder days that still demand comfort, movement and dependable wear. The range brings together practical warmth and everyday usability for daily routines, outdoor work and seasonal requirements.
                            </p>

                            <p>
                                From winter jackets to all-season jackets, the collection is available for men, women and kids, serving both retail and corporate requirements with consistent fit, finish and functionality.
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

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->
</main>
@endsection