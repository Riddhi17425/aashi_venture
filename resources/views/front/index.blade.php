@extends('layouts.master')

@section('body-class', 'page-home')

@section('title', 'Home')

@section('content')
    <!-- START - HERO SECTION -->
    <section class="hero" aria-label="Hero">
        <div class="hero__bg" aria-hidden="true">
            <img
                class="hero__bg-fallback"
                src="{{ asset('frontend/assets/images/hero-bg.webp') }}"
                alt="">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper" data-hero-bg-wrapper></div>
            </div>
            <div class="hero__overlay"></div>
        </div>
        <div class="hero__body">
            <div class="container-aashi">
                <div class="hero__content">
                    <p class="aashi-label aashi-label--light" data-hero-label>Designed for the Rain</p>
                    <div class="hero__copy">
                        <div class="hero__text hero__text--animated" data-hero-content-animated>
                            <h1 class="aashi-title aashi-title--hero" data-hero-title>
                                Protection Designed for Every Season.
                            </h1>
                            <p class="aashi-text aashi-text--hero" data-hero-description>
                                Built on decades of expertise, Aashi Venture creates dependable products for protection,
                                packaging and everyday use.
                            </p>
                        </div>

                        <a href="#" class="aashi-btn aashi-btn--primary" data-hero-cta>
                            <span data-hero-cta-text>Explore Products</span>
                            <img
                                class="aashi-btn__icon"
                                data-hero-cta-icon
                                src="{{ asset('frontend/assets/icons/arrow-right-white.svg') }}"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__footer-wrap">
            <div class="container-aashi">
                <div class="hero__footer d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">
                    <div class="d-flex flex-column flex-sm-row flex-wrap hero__features" data-hero-features>
                        <div class="hero__feature">
                            <img
                                class="hero__feature-icon"
                                src="{{ asset('frontend/assets/icons/waterproof.svg') }}"
                                alt="">
                            <span>Waterproof Protection</span>
                        </div>
                        <div class="hero__feature">
                            <img
                                class="hero__feature-icon"
                                src="{{ asset('frontend/assets/icons/quality.svg') }}"
                                alt="">
                            <span>Premium Quality</span>
                        </div>
                        <div class="hero__feature">
                            <img
                                class="hero__feature-icon"
                                src="{{ asset('frontend/assets/icons/comfort.svg') }}"
                                alt="">
                            <span>Lightweight &amp; Comfortable</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center hero__slider-controls" aria-label="Hero slider controls">
                        <button
                            class="hero__slider-btn hero__slider-btn--prev"
                            type="button"
                            aria-label="Previous slide">
                            <img
                                src="{{ asset('frontend/assets/icons/slider-prev.svg') }}"
                                alt="">
                        </button>
                        <div class="hero__slider-progress d-flex align-items-center">
                            <span class="hero__slider-current">01</span>
                            <span class="hero__slider-line" aria-hidden="true"></span>
                            <span class="hero__slider-total">03</span>
                        </div>
                        <button class="hero__slider-btn hero__slider-btn--next" type="button" aria-label="Next slide">
                            <img src="{{ asset('frontend/assets/icons/slider-next.svg') }}" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END - HERO SECTION -->

    <!-- START - ABOUT SECTION -->
    <section class="section-block about" aria-labelledby="about-heading">
        <div class="container-aashi">
            <div class="row align-items-start g-2 g-md-3 g-xl-5 about__row">
                <div class="col-xl-6">
                    <div class="about__content">
                        <p class="aashi-label">
                            About Aashi Venture Pvt. Ltd
                        </p>
                        <div class="about__intro">
                            <h2 class="aashi-title aashi-title--section" id="about-heading">
                                Manufacturing Protection Since 1998
                            </h2>
                            <div class="about__text aashi-text aashi-text--section">
                                <p>
                                    Since 1998, Aashi Group has grown into a trusted name in rainwear,
                                    winterwear, safety wear, bags and packaging solutions. What began
                                    with a focus on protection has grown into a wider manufacturing
                                    strength built around quality, comfort and everyday reliability.
                                </p>
                                <p>
                                    Across people, processes and production facilities, every Aashi
                                    product is made with attention to the details that matter. From
                                    changing weather to demanding workdays, we create solutions
                                    designed to perform, season after season.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div
                        class="about__stats"
                        id="stats-section"
                        data-stats-counter
                        aria-label="Company highlights">
                        <div class="stat-card">
                            <p class="aashi-stat-value stat-card__value" data-target="28+">0</p>
                            <p class="aashi-stat-label stat-card__label mb-0">Years of Experience</p>
                        </div>
                        <div class="stat-card">
                            <p class="aashi-stat-value stat-card__value">190K+ Sq. Ft.</p>
                            <p class="aashi-stat-label stat-card__label mb-0">Manufacturing Area</p>
                        </div>
                        <div class="stat-card">
                            <p class="aashi-stat-value stat-card__value" data-target="1000+">0</p>
                            <p class="aashi-stat-label stat-card__label mb-0">Employees</p>
                        </div>
                        <div class="stat-card">
                            <p class="aashi-stat-value stat-card__value" data-target="200+">0</p>
                            <p class="aashi-stat-label stat-card__label mb-0">Women Employees</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END - ABOUT SECTION -->

    <!-- START - PRODUCTS SECTION -->
    <section class="section-block products" aria-labelledby="products-heading">
        <div class="container-aashi">
            <header class="section-header section-header--spaced">
                <p class="aashi-label">Our Product Categories</p>
                <h2 class="aashi-title aashi-title--section" id="products-heading">
                    Products Designed for Everyday Performance
                </h2>
            </header>
            <div class="row products__grid">
                <!-- Rain Wear -->
                <div class="col-6 col-lg-6" id="product-rainwear">
                    <article class="product-card">
                        <a class="product-card__link" href="#">
                            <div class="product-card__frame">
                                <img class="product-card__bg-pattern"
                                    src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                                    alt=""
                                    aria-hidden="true">
                                <div class="product-card__image-wrap">
                                    <img class="product-card__image"
                                        src="{{ asset('frontend/assets/images/product-rainwear.webp') }}"
                                        alt="Rain wear collection">
                                </div>
                                <div class="product-card__footer">
                                    <div class="product-card__body">
                                        <h3 class="aashi-title aashi-title--card">Rain Wear</h3>
                                        <p class="aashi-text aashi-text--sm">
                                            Built for daily commutes, outdoor work, and weather that never waits.
                                        </p>
                                    </div>
                                    <span class="product-card__arrow" aria-hidden="true">
                                        <img src="{{ asset('frontend/assets/icons/card-arrow.svg') }}" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="product-card__badge">
                                <img src="{{ asset('frontend/assets/icons/rainwear-badge.svg') }}" alt="">
                            </div>
                        </a>
                    </article>
                </div>

                <!-- Windcheaters -->
                <div class="col-6 col-lg-6" id="product-windcheaters">
                    <article class="product-card">
                        <a class="product-card__link" href="#">
                            <div class="product-card__frame">
                                <img class="product-card__bg-pattern"
                                    src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                                    alt=""
                                    aria-hidden="true">
                                <div class="product-card__image-wrap">
                                    <img class="product-card__image"
                                        src="{{ asset('frontend/assets/images/product-windcheater.webp') }}"
                                        alt="Windcheaters collection">
                                </div>
                                <div class="product-card__footer">
                                    <div class="product-card__body">
                                        <h3 class="aashi-title aashi-title--card">Windcheaters</h3>
                                        <p class="aashi-text aashi-text--sm">
                                            Designed for lasting warmth, our winterwear delivers comfort during colder days.
                                        </p>
                                    </div>
                                    <span class="product-card__arrow" aria-hidden="true">
                                        <img src="{{ asset('frontend/assets/icons/card-arrow.svg') }}" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="product-card__badge">
                                <img src="{{ asset('frontend/assets/icons/windcheater-badge.svg') }}" alt="">
                            </div>
                        </a>
                    </article>
                </div>

                <!-- Winter Wear -->
                <div class="col-6 col-lg-6" id="product-winterwear">
                    <article class="product-card">
                        <a class="product-card__link" href="#">
                            <div class="product-card__frame">
                                <img class="product-card__bg-pattern"
                                    src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                                    alt=""
                                    aria-hidden="true">
                                <div class="product-card__image-wrap">
                                    <img class="product-card__image"
                                        src="{{ asset('frontend/assets/images/product-winterwear.webp') }}"
                                        alt="Winter wear collection">
                                </div>
                                <div class="product-card__footer">
                                    <div class="product-card__body">
                                        <h3 class="aashi-title aashi-title--card">Winter Wear</h3>
                                        <p class="aashi-text aashi-text--sm">
                                            Thoughtfully made for lasting warmth and everyday comfort during colder days.
                                        </p>
                                    </div>
                                    <span class="product-card__arrow" aria-hidden="true">
                                        <img src="{{ asset('frontend/assets/icons/card-arrow.svg') }}" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="product-card__badge">
                                <img src="{{ asset('frontend/assets/icons/winterwear-badge.svg') }}" alt="">
                            </div>
                        </a>
                    </article>
                </div>

                <!-- Bags -->
                <div class="col-6 col-lg-6" id="product-bags">
                    <article class="product-card">
                        <a class="product-card__link" href="#">
                            <div class="product-card__frame">
                                <img class="product-card__bg-pattern"
                                    src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                                    alt=""
                                    aria-hidden="true">
                                <div class="product-card__image-wrap">
                                    <img class="product-card__image"
                                        src="{{ asset('frontend/assets/images/product-bags.webp') }}"
                                        alt="Bags and packaging solutions">
                                </div>
                                <div class="product-card__footer">
                                    <div class="product-card__body">
                                        <h3 class="aashi-title aashi-title--card">
                                            Bags &amp; Packaging Solutions
                                        </h3>
                                        <p class="aashi-text aashi-text--sm">
                                            From luggage bags to premium packaging, we protect, present, and preserve.
                                        </p>
                                    </div>
                                    <span class="product-card__arrow" aria-hidden="true">
                                        <img src="{{ asset('frontend/assets/icons/card-arrow.svg') }}" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="product-card__badge">
                                <img src="{{ asset('frontend/assets/icons/bags-badge.svg') }}" alt="">
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- END - PRODUCTS SECTION -->

    <!-- START - EXCELLENCE SECTION -->
    <section class="section-block excellence" aria-labelledby="excellence-heading">
        <div class="container-aashi">
            <header class="section-header section-header--center section-header--spaced">
                <p class="aashi-label">Why Choose Aashi Venture</p>
                <h2 class="aashi-title aashi-title--section" id="excellence-heading">
                    Manufacturing Excellence You Can Depend On
                </h2>
            </header>
            <div class="excellence__grid">
                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/production.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">In-House Production</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            From cutting to packing, every stage stays under one roof.
                        </p>
                    </div>
                </article>
                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/quality-check.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Quality Checked</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            Dedicated checking at every stage before final dispatch.
                        </p>
                    </div>
                </article>
                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/scale.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Built for Scale</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            Advanced machinery and a strong multi-location manufacturing setup.
                        </p>
                    </div>
                </article>
                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/since-1998.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Since 1998</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            Part of a manufacturing legacy built on consistency and trust.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- END - EXCELLENCE SECTION -->

    <!-- START - PARTNERS SECTION -->
    <section class="section-block partners" aria-labelledby="partners-heading">
        <div class="container-aashi partners__inner">
            <header class="section-header section-header--center section-header--spaced">
                <p class="aashi-label">Trusted Partnerships</p>
                <h2 class="aashi-title aashi-title--section" id="partners-heading">
                    Trusted By Leading Brands
                </h2>
            </header>
            <div class="swiper partners-swiper" aria-label="Trusted brand logos">
                <div class="swiper-wrapper">
                    <div class="swiper-slide partners-slide partners-slide--swiggy">
                        <div class="partners__logo">
                            <img src="{{ asset('frontend/assets/images/partner-swiggy.png') }}" alt="Swiggy">
                        </div>
                    </div>
                    <div class="swiper-slide partners-slide partners-slide--bigbasket">
                        <div class="partners__logo">
                            <img src="{{ asset('frontend/assets/images/partner-bigbasket.png') }}" alt="BigBasket">
                        </div>
                    </div>
                    <div class="swiper-slide partners-slide partners-slide--blinkit">
                        <div class="partners__logo">
                            <img src="{{ asset('frontend/assets/images/partner-blinkit.png') }}" alt="Blinkit">
                        </div>
                    </div>
                    <div class="swiper-slide partners-slide partners-slide--zepto">
                        <div class="partners__logo">
                            <img src="{{ asset('frontend/assets/images/partner-zepto.png') }}" alt="Zepto">
                        </div>
                    </div>
                    <div class="swiper-slide partners-slide partners-slide--zomato">
                        <div class="partners__logo">
                            <img src="{{ asset('frontend/assets/images/partner-zomato.jpg') }}" alt="Zomato">
                        </div>
                    </div>
                    <div class="swiper-slide partners-slide partners-slide--welspun">
                        <div class="partners__logo">
                            <img src="{{ asset('frontend/assets/images/partner-welspun.png') }}" alt="Welspun">
                        </div>
                    </div>
                    <div class="swiper-slide partners-slide partners-slide--arvind">
                        <div class="partners__logo">
                            <img src="{{ asset('frontend/assets/images/partner-arvind.png') }}" alt="Arvind">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END - PARTNERS SECTION -->

    <!-- START - COLLECTIONS SECTION -->
    <section class="section-block collections" aria-labelledby="collections-heading">
        <div class="container-aashi">
            <div class="collections__layout">
                <div class="collections__content">
                    <p class="aashi-label">Our Collections</p>
                    <div class="collections__intro">
                        <h2 class="aashi-title aashi-title--section" id="collections-heading">
                            Protection for Every Season
                        </h2>
                        <p class="aashi-text aashi-text--section">
                            From rainwear and winterwear to bags and beyond,
                            Aashi brings together everyday protection, comfort
                            and utility in one dependable range.
                        </p>
                        <a href="#" class="aashi-btn aashi-btn--outline-muted collections__cta">
                            Explore Collections
                            <img class="aashi-btn__icon"
                                src="{{ asset('frontend/assets/icons/arrow-right-gray.svg') }}"
                                alt="Arrow">
                        </a>
                    </div>
                </div>
                <div class="collections__cards">
                    <article class="collection-card collection-card--rainwear">
                        <img class="collection-card__pattern"
                            src="{{ asset('frontend/assets/images/card-bg-pattern.webp') }}"
                            alt=""
                            aria-hidden="true">
                        <div class="collection-card__product">
                            <img src="{{ asset('frontend/assets/images/collection-rainwear.webp') }}"
                                alt="Rainwear collection">
                        </div>
                    </article>
                    <article class="collection-card collection-card--winterwear">
                        <img class="collection-card__pattern"
                            src="{{ asset('frontend/assets/images/card-bg-pattern.webp') }}"
                            alt=""
                            aria-hidden="true">
                        <div class="collection-card__product">
                            <img src="{{ asset('frontend/assets/images/collection-winterwear.webp') }}"
                                alt="Winterwear collection">
                        </div>
                    </article>
                    <article class="collection-card collection-card--bags">
                        <img class="collection-card__pattern"
                            src="{{ asset('frontend/assets/images/card-bg-pattern.webp') }}"
                            alt=""
                            aria-hidden="true">
                        <div class="collection-card__product">
                            <img src="{{ asset('frontend/assets/images/collection-bags.webp') }}"
                                alt="Bags collection">
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- END - COLLECTIONS SECTION -->

    <!-- START - NEWSLETTER SECTION -->
    <section class="newsletter" aria-labelledby="newsletter-heading">
        <div class="container-aashi newsletter__inner">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center newsletter__lead">
                        <img class="newsletter__icon"
                            src="{{ asset('frontend/assets/icons/newsletter.svg') }}"
                            alt="Newsletter">
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
                    <form class="newsletter__form w-100" action="#" method="POST">
                        @csrf
                        <input class="newsletter__input"
                            type="email"
                            name="email"
                            placeholder="Enter your email address"
                            required
                            aria-label="Email address">
                        <button class="newsletter__submit" type="submit">
                            Subscribe
                            <img src="{{ asset('frontend/assets/icons/arrow-right-blue.svg') }}"
                                alt="Arrow">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END - NEWSLETTER SECTION -->
@endsection