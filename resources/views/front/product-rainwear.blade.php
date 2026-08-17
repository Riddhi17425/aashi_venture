@extends('layouts.master')

@section('body-class', 'page-inner page-product page-product--rainwear')

@section('title', 'Product rainwear')

@section('content')

<main>
    <!-- START - PRODUCT PAGE -->
    <section class="section-block product-page" aria-labelledby="product-page-heading">
        <div class="container-aashi">

            <header class="product-page__header">
                <p class="aashi-label">Rainwear for Every Journey</p>

                <h1 class="aashi-title aashi-title--page" id="product-page-heading">
                    Rainwear Collection
                </h1>
            </header>

            <div class="product-page__categories product-page__categories--3">

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
                                src="{{ asset('frontend/assets/images/products/rainwear-mens.webp') }}"
                                alt="Men's rain wear jacket">
                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Men's Rain Wear
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
                                src="{{ asset('frontend/assets/images/products/rainwear-womens.webp') }}"
                                alt="Women's rainwear coat">
                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Women's Rainwear
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
                                src="{{ asset('frontend/assets/images/products/rainwear-kids.webp') }}"
                                alt="Kids rainwear collection">
                        </div>

                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                Kid's Rainwear
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
                        src="{{ asset('frontend/assets/images/products/product-detail-factory.webp') }}"
                        alt="Aashi manufacturing facility with rainwear production">
                </div>

                <div class="product-detail__content">

                    <p class="aashi-label">Advanced Manufacturing Facility</p>

                    <div class="product-detail__copy">

                        <h2 class="aashi-title aashi-title--section" id="product-detail-heading">
                            Built to Perform. Made to Protect.
                        </h2>

                        <div class="product-detail__text">

                            <p>
                                Across Aashi Group's manufacturing network, every product moves through defined stages of cutting, stitching, heat sealing, seam sealing, printing, checking and packing. Our setup includes 600 stitching machines, 100 heat seal machines, 16 seam sealing machines, 15 printing machines, 10 heat transfer machines and 12 snap buttoning machines.
                            </p>

                            <p>
                                With 1,90,000+ sq. ft. of manufacturing space and a workforce of 1,000+ employees, including 200+ women employees, Aashi combines skilled workmanship with structured processes to manufacture rainwear, winterwear, safety wear, bags and packaging solutions at scale.
                            </p>

                        </div>

                    </div>

                    <hr class="product-detail__divider" aria-hidden="true">

                    <div class="product-detail__stats" data-stats-counter aria-label="Manufacturing highlights">

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="600">0</p>
                            <p class="product-detail__stat-label">Stitching Machines</p>
                        </div>

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="100">0</p>
                            <p class="product-detail__stat-label">Heat Seal Machines</p>
                        </div>

                        <div class="product-detail__stat">
                            <p class="product-detail__stat-value" data-target="200+">0</p>
                            <p class="product-detail__stat-label">Women Employees</p>
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