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
                            <p class="product-detail__stat-value" data-target="28+">0</p>
                            <p class="product-detail__stat-label">Years of Experience</p>
                        </div>

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="1.5 Cr+">0</p>
                            <p class="product-detail__stat-label">Units Produced Annually</p>
                        </div>

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="200+">0</p>
                            <p class="product-detail__stat-label">Distribution Partners</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- END - PRODUCT DETAIL -->

    <!-- START - NEWSLETTER -->
    <section class="newsletter" aria-labelledby="newsletter-heading">
        <div class="container-aashi newsletter__inner">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center newsletter__lead">
                        <img
                            class="newsletter__icon"
                            src="{{ asset('frontend/assets/icons/newsletter.svg') }}"
                            alt="">
                        <div class="newsletter__copy">
                            <h2 class="aashi-title aashi-title--newsletter" id="newsletter-heading">
                                Be the first to know
                            </h2>
                            <p class="aashi-text aashi-text--newsletter">
                                Exclusive offers, new arrivals and latest updates straight to your inbox.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form class="newsletter__form w-100" action="#" method="post">
                        <input
                            class="newsletter__input"
                            type="email"
                            name="email"
                            placeholder="Enter your email address"
                            required
                            aria-label="Email address">
                        <button class="newsletter__submit" type="submit">
                            Subscribe
                            <img
                                src="{{ asset('frontend/assets/icons/arrow-right-blue.svg') }}"
                                alt="">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END - NEWSLETTER -->
</main>
@endsection