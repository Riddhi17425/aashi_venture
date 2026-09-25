@extends('layouts.master')

@section('body-class', 'page-home')

@section('title', 'Home')

@section('content')
    <!-- START - HERO SECTION -->
    <section class="hero" aria-label="Hero">
        <div class="hero__bg" aria-hidden="true">
            <div class="hero-swiper">
                <div class="swiper-wrapper">
                    @forelse($banners as $banner)
                        <div class="swiper-slide hero-slide"
                            style="--hero-slide-index: {{ $loop->index }}; --hero-slide-count: {{ $banners->count() }};">
                            <picture class="hero__bg-picture">
                                <source media="(max-width: 767px)" srcset="{{ $banner->mobile_image_url }}">
                                <img src="{{ $banner->desktop_image_url }}"
                                    alt="{{ $banner->desktop_image_alt ?? $banner->title }}"
                                    class="hero__bg-image">
                            </picture>

                            <div class="hero__overlay"></div>

                            <div class="hero__body">
                                <div class="container-aashi">
                                    <div class="hero__content">
                                        <p class="aashi-label aashi-label--light">
                                            {{ $banner->short_note }}
                                        </p>

                                        <div class="hero__copy">
                                            <div class="hero__text hero__text--animated">
                                                <h1 class="aashi-title aashi-title--hero">
                                                    {{ $banner->title }}
                                                </h1>
                                                <p class="aashi-text aashi-text--hero">
                                                    {!! Str::limit(strip_tags($banner->description), 160) !!}
                                                </p>
                                            </div>

                                            @if($banner->category)
                                                <a href="{{ url('/products/' . $banner->category->category_url) }}"
                                                class="aashi-btn aashi-btn--primary">
                                                    <span>Explore Products</span>
                                                    <img src="{{ asset('frontend/assets/icons/arrow-right-white.svg') }}" alt="">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- fallback static slide if no banners exist yet --}}
                        <div class="swiper-slide hero-slide"
                            style="--hero-slide-index: 0; --hero-slide-count: 1;">
                            <img src="{{ asset('frontend/assets/images/hero-bg.webp') }}" class="hero__bg-image" alt="">
                            <div class="hero__overlay"></div>
                            <div class="hero__body">
                                <div class="container-aashi">
                                    <div class="hero__content">
                                        <p class="aashi-label aashi-label--light">Designed for the Rain</p>
                                        <div class="hero__copy">
                                            <div class="hero__text hero__text--animated">
                                                <h1 class="aashi-title aashi-title--hero">Protection Designed for Every Season.</h1>
                                                <p class="aashi-text aashi-text--hero">Built on decades of expertise, Aashi Venture creates dependable products for protection, packaging and everyday use.</p>
                                            </div>
                                            <a href="#" class="aashi-btn aashi-btn--primary">
                                                <span>Explore Products</span>
                                                <img class="aashi-btn__icon" src="{{ asset('frontend/assets/icons/arrow-right-white.svg') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
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
                    @if(count($banners) > 1)
                    <div class="d-flex align-items-center hero__slider-controls" aria-label="Hero slider progress">
                        <span class="hero__slider-btn hero__slider-btn--prev" aria-hidden="true">
                            <img src="{{ asset('frontend/assets/icons/slider-prev.svg') }}" alt="">
                        </span>
                        <div class="hero__slider-progress d-flex align-items-center">
                            <span class="hero__slider-current" aria-live="polite">
                                @forelse($banners as $banner)
                                    <span style="--hero-slide-index: {{ $loop->index }}; --hero-slide-count: {{ $banners->count() }};">{{ str_pad((string) ($loop->index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                @empty
                                    <span>01</span>
                                @endforelse
                            </span>
                            <span class="hero__slider-line" aria-hidden="true"></span>
                            <span class="hero__slider-total">{{ str_pad((string) max($banners->count(), 1), 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <span class="hero__slider-btn hero__slider-btn--next" aria-hidden="true">
                            <img src="{{ asset('frontend/assets/icons/slider-next.svg') }}" alt="">
                        </span>
                    </div>
                    @endif
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
                @foreach($categories as $category)
                    @php
                        $productUrls = [
                            'rainwear' => 'rainwear',
                            'winterwear' => 'winter-wear',
                            'windcheaters' => 'windcheaters',
                            'bags-packaging-solutions' => 'bags',
                        ];
                    @endphp
                    <div class="col-6 col-lg-6" id="product-{{ $category->id }}">
                        <article class="product-card">
                            <a class="product-card__link" href="{{ url('/products/' . ($productUrls[$category->category_url] ?? $category->category_url)) }}">
                                <div class="product-card__frame">
                                    <img class="product-card__bg-pattern"
                                        src="{{ asset('frontend/assets/images/card-bg.webp') }}"
                                        alt=""
                                        aria-hidden="true">

                                    <div class="product-card__image-wrap">
                                        <img class="product-card__image"
                                            src="{{ $category->listing_image_url }}"
                                            alt="{{ $category->listing_image_alt ?: $category->title }}">
                                    </div>

                                    <div class="product-card__footer">
                                        <div class="product-card__body">
                                            <h3 class="aashi-title aashi-title--card">
                                                {{ strtoupper($category->title) }}
                                            </h3>
                                            <p class="aashi-text aashi-text--sm">
                                                {!! nl2br(e($category->short_note)) !!}
                                            </p>
                                        </div>
                                        <span class="product-card__arrow" aria-hidden="true">
                                            <img src="{{ asset('frontend/assets/icons/card-arrow.svg') }}" alt="">
                                        </span>
                                    </div>
                                </div>

                                @if($category->icon)
                                    <div class="product-card__badge">
                                        <img src="{{ $category->icon_url }}" alt="{{ $category->title }} icon">
                                    </div>
                                @endif
                            </a>
                        </article>
                    </div>
                @endforeach
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
                    @forelse($partners as $partner)
                        <div class="swiper-slide partners-slide">
                            <div class="partners__logo">
                                <img src="{{ $partner->logo_url }}"
                                    alt="{{ $partner->logo_alt ?: 'Partner logo' }}">
                            </div>
                        </div>
                    @empty
                        {{-- fallback static logos if none added yet --}}
                        <div class="swiper-slide partners-slide partners-slide--swiggy">
                            <div class="partners__logo">
                                <img src="{{ asset('frontend/assets/images/partner-swiggy.png') }}" alt="Swiggy">
                            </div>
                        </div>
                    @endforelse
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
                        <!-- <a href="#" class="aashi-btn aashi-btn--outline-muted collections__cta">
                            Explore Collections
                            <img class="aashi-btn__icon"
                                src="{{ asset('frontend/assets/icons/arrow-right-gray.svg') }}"
                                alt="Arrow">
                        </a> -->
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

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->
@endsection