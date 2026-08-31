@extends('layouts.master')

@section('body-class', 'page-inner page-product page-product--windcheaters')

@section('title', 'Product windcheaters')

@section('content')

<main>
    <!-- START - PRODUCT HERO -->
    <section class="section-block product-page" aria-labelledby="product-page-heading">
        <div class="container-aashi">

            <header class="product-page__header">
                <p class="aashi-label">MADE FOR CHANGING WEATHER</p>

                <h1 class="aashi-title aashi-title--page" id="product-page-heading">
                    Windcheaters Collection
                </h1>
            </header>

            <div class="product-page__categories product-page__categories--1">

                <article class="product-category-card">

                    <div class="product-category-card__frame product-category-card__frame--wide">

                        <img
                            class="product-category-card__bg"
                            src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                            alt=""
                            aria-hidden="true">

                        <div class="product-category-card__image-wrap">

                            <img
                                class="product-category-card__image"
                                src="{{ asset('frontend/assets/images/products/windcheaters-hero.webp') }}"
                                alt="Windcheaters collection in multiple colours">

                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Windcheaters Collection
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
    <!-- END - PRODUCT HERO -->

    <!-- START - PRODUCT DETAIL -->
    <section class="section-block product-detail" aria-labelledby="product-detail-heading">
        <div class="container-aashi">

            <div class="product-detail__grid">

                <div class="product-detail__media">
                    <img
                        class="product-detail__image"
                        src="{{ asset('frontend/assets/images/products/windcheaters-factory.webp') }}"
                        alt="Windcheater manufacturing at Aashi factory">
                </div>

                <div class="product-detail__content">

                    <p class="aashi-label">Windcheaters Solutions</p>

                    <div class="product-detail__copy">

                        <h2 class="aashi-title aashi-title--section" id="product-detail-heading">
                            Adventure in Every Layer
                        </h2>

                        <div class="product-detail__text">

                            <p>
                                Designed for changing weather conditions, our windcheaters combine lightweight comfort with dependable protection. Manufactured using carefully selected materials, they are created to provide an extra layer of protection against wind while maintaining breathability, flexibility, and all-day comfort. Their lightweight construction makes them suitable for travel, outdoor activities, daily wear, and seasonal transitions.
                            </p>

                            <p>
                                Available in a variety of colours, styles, fits, and design options, our windcheaters are developed to balance functionality with versatility. Every product is designed with attention to movement, comfort, and durability, making it a practical companion for different environments and lifestyles.
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