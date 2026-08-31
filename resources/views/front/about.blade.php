@extends('layouts.master')

@section('body-class', 'page-about page-inner')

@section('title', 'About')

@section('content')

<main>
    <!-- START - PAGE INTRO, HERO, LEGACY & COMPANY -->
    <section class="section-block about-intro" aria-labelledby="about-page-heading">
        <div class="container-aashi">

            <header class="factory-intro__header">
                <p class="aashi-label">AASHI GROUP LEGACY, SINCE 1998</p>
                <h1 class="aashi-title aashi-title--page" id="about-page-heading">About Us</h1>
            </header>

            <div class="about-banner">
                <figure class="about-hero">
                    <img class="about-hero__image"
                        src="{{ asset('frontend/assets/images/about-hero.webp') }}"
                        alt="Aashi Venture manufacturing facility exterior">
                </figure>

                <div class="about-legacy">
                    <p class="aashi-label">About Aashi Venture</p>

                    <div class="about-legacy__body">
                        <h2 class="aashi-title aashi-title--section">
                            Built on Legacy. Driven by Manufacturing Excellence.
                        </h2>

                        <div class="aashi-text aashi-text--section about-legacy__text">
                            <p>Aashi Venture represents the next chapter in a manufacturing journey that began over two decades ago. Established on the strong foundation of the Aashi Group, the company carries forward a legacy of quality, reliability and customer-focused manufacturing across rainwear, windcheaters, winterwear, bags and packaging solutions.</p>
                            <p>Rooted in a group that has built expertise across protective apparel, travel and luggage bags, PVC packaging bags and customised product solutions, Aashi Venture is positioned to serve both everyday and business requirements with purpose.</p>
                            <p>Our approach combines practical product development, disciplined manufacturing processes and an understanding of evolving customer needs. From standard collections to customised corporate requirements, every solution is developed with a focus on functionality, consistency and long-term value.</p>
                            <p>With a commitment to innovation, operational excellence and customer satisfaction, Aashi Venture continues to strengthen the group’s manufacturing capabilities while supporting customers across India and international markets with products they can depend on.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-company about-company__layout" aria-labelledby="about-company-heading">
                <div class="about-company__copy">
                    <div class="about__content">
                        <p class="aashi-label">Company Introduction</p>
                        <div class="about__intro">
                            <h2 class="aashi-title aashi-title--section" id="about-company-heading">
                                Manufacturing Protection. Delivering Trust.
                            </h2>

                            <div class="about__text aashi-text aashi-text--section">
                                <p>
                                    At Aashi Venture, manufacturing is at the heart of everything we do. We
                                    specialise in producing high-quality rainwear, windcheaters, winterwear, bags,
                                    and packaging solutions designed to meet the evolving needs of consumers,
                                    businesses, distributors, and industrial buyers.
                                </p>
                                <p>
                                    Built on decades of industry expertise, our operations combine skilled
                                    craftsmanship, advanced manufacturing processes, and stringent quality standards
                                    to ensure consistency across every product we create.
                                </p>
                                <p>
                                    Supported by our manufacturing facility in Sagwara and backed by the collective
                                    strength of the Aashi Group, we maintain complete control across the production
                                    cycle from sourcing and product development to quality assurance and final
                                    delivery. 
                                </p>
                                <p>Our focus remains simple: create products that perform, build
                                    partnerships that last, and deliver value that customers can trust.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-company__stats" aria-label="Company highlights">
                    <div class="stat-card stat-card--about">
                        <p class="aashi-stat-value stat-card__value">Since 1998</p>
                        <p class="aashi-stat-label stat-card__label mb-0">Aashi Group Legacy</p>
                    </div>

                    <div class="stat-card stat-card--about">
                        <p class="aashi-stat-value stat-card__value">Sagwara, Rajasthan</p>
                        <p class="aashi-stat-label stat-card__label mb-0">Manufacturing Facility</p>
                    </div>

                    <div class="stat-card stat-card--about">
                        <p class="aashi-stat-value stat-card__value">190K+ Sq. Ft.</p>
                        <p class="aashi-stat-label stat-card__label mb-0">Group Manufacturing Area</p>
                    </div>

                    <div class="stat-card stat-card--about">
                        <p class="aashi-stat-value stat-card__value">4 Export Markets</p>
                        <p class="aashi-stat-label stat-card__label mb-0">Presence</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END - PAGE INTRO, HERO, LEGACY & COMPANY -->

    <!-- START - OUR JOURNEY -->
    <section class="section-block" aria-labelledby="about-journey-heading">
        <div class="container-aashi">
            <div class="factory-capability factory-capability--text-first">
                <div class="factory-capability__content">
                    <p class="aashi-label aashi-label--lg">Our Journey</p>
                    <div class="factory-capability__copy">
                        <h2 class="aashi-title aashi-title--section" id="about-journey-heading">
                            A Legacy of Growth and Manufacturing Excellence
                        </h2>
                        <div class="factory-capability__text aashi-text aashi-text--section">
                            <p>
                                What began as a vision to build dependable manufacturing solutions has evolved into a
                                diversified manufacturing ecosystem serving multiple industries and markets.
                            </p>
                            <p>
                                Over the years, the Aashi Group has expanded strategically, strengthening its
                                expertise in weather-protection apparel, packaging solutions, PVC film
                                manufacturing, and customised product development. Each milestone has been guided by
                                the same principles that define us today: quality, consistency, innovation, and
                                customer commitment.
                            </p>
                            <p>
                                With manufacturing units across Gujarat and Rajasthan, the group has steadily built a
                                stronger production network to support evolving market requirements. From rainwear
                                and winterwear to bags, packaging and customised solutions, each addition has
                                expanded both capability and reach. Skilled teams, structured processes and
                                specialised production facilities continue to shape the way Aashi serves retail,
                                corporate and export markets.
                            </p>
                            <p>
                                Today, Aashi Venture carries this legacy forward, combining decades of experience
                                with modern manufacturing capabilities to support the next phase of growth and
                                excellence.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="factory-capability__media">
                    <img
                        class="factory-capability__image about-journey__image"
                        src="{{ asset('frontend/assets/images/about-journey.webp') }}"
                        alt="Team at the Aashi Plastic factory entrance">
                </div>
            </div>
        </div>
    </section>
    <!-- END - OUR JOURNEY -->

    <!-- START - TIMELINE -->
    <section class="aashi-band about-timeline section-block" aria-labelledby="about-timeline-heading">
        <div class="container-aashi about-timeline__inner">

            <header class="section-header section-header--center section-header--spaced about-timeline__header">
                <p class="aashi-label">Our Story</p>
                <h2 class="aashi-title aashi-title--section" id="about-timeline-heading">
                    28+ Years of Building &amp; Growing Together
                </h2>
            </header>

            <div class="about-timeline__body">
                <div class="about-timeline__track" role="tablist" aria-label="Company milestones">
                    <div class="about-timeline__line" aria-hidden="true"></div>
                    <button class="about-timeline__year is-active"
                        id="about-timeline-tab-0"
                        type="button"
                        role="tab"
                        aria-selected="true"
                        aria-controls="about-timeline-panel-0"
                        data-timeline-index="0">
                        <span class="about-timeline__dot" aria-hidden="true"></span>
                        <span class="about-timeline__year-label">1998</span>
                    </button>

                    <button class="about-timeline__year"
                        id="about-timeline-tab-1"
                        type="button"
                        role="tab"
                        aria-selected="false"
                        aria-controls="about-timeline-panel-1"
                        data-timeline-index="1">
                        <span class="about-timeline__dot" aria-hidden="true"></span>
                        <span class="about-timeline__year-label">2010</span>
                    </button>

                    <button class="about-timeline__year"
                        id="about-timeline-tab-2"
                        type="button"
                        role="tab"
                        aria-selected="false"
                        aria-controls="about-timeline-panel-2"
                        data-timeline-index="2">
                        <span class="about-timeline__dot" aria-hidden="true"></span>
                        <span class="about-timeline__year-label">2012</span>
                    </button>

                    <button class="about-timeline__year"
                        id="about-timeline-tab-3"
                        type="button"
                        role="tab"
                        aria-selected="false"
                        aria-controls="about-timeline-panel-3"
                        data-timeline-index="3">
                        <span class="about-timeline__dot" aria-hidden="true"></span>
                        <span class="about-timeline__year-label">2016</span>
                    </button>

                    <button class="about-timeline__year"
                        id="about-timeline-tab-4"
                        type="button"
                        role="tab"
                        aria-selected="false"
                        aria-controls="about-timeline-panel-4"
                        data-timeline-index="4">
                        <span class="about-timeline__dot" aria-hidden="true"></span>
                        <span class="about-timeline__year-label">2022</span>
                    </button>

                    <button class="about-timeline__year"
                        id="about-timeline-tab-5"
                        type="button"
                        role="tab"
                        aria-selected="false"
                        aria-controls="about-timeline-panel-5"
                        data-timeline-index="5">
                        <span class="about-timeline__dot" aria-hidden="true"></span>
                        <span class="about-timeline__year-label">2025</span>
                    </button>
                </div>

                <div class="about-timeline__detail">
                    <div class="about-timeline__panels">
                        <article class="about-timeline__panel is-active"
                            id="about-timeline-panel-0"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-0"
                            data-timeline-index="0"
                            data-timeline-year="1998"
                            aria-hidden="false">

                            <p class="aashi-label">ORIGIN — FOUNDATION YEAR</p>
                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Aashi Plastic Industries
                                </h3>
                                <p class="aashi-text aashi-text--light mb-0">
                                    The Aashi journey began with Aashi Plastic Industries, laying the foundation for a manufacturing group built on quality, consistency and long-term partnerships.
                                </p>
                            </div>
                        </article>

                        <article class="about-timeline__panel"
                            id="about-timeline-panel-1"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-1"
                            data-timeline-index="1"
                            data-timeline-year="2010"
                            aria-hidden="true">

                            <p class="aashi-label">CORPORATE MILESTONE</p>
                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Aashi Plastic Pvt. Ltd.
                                </h3>
                                <p class="aashi-text aashi-text--light mb-0">
                                    Aashi Plastic Pvt. Ltd. marked the next stage of growth, strengthening the group’s presence in PVC and packaging-focused manufacturing.
                                </p>
                            </div>
                        </article>

                        <article class="about-timeline__panel"
                            id="about-timeline-panel-2"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-2"
                            data-timeline-index="2"
                            data-timeline-year="2012"
                            aria-hidden="true">

                            <p class="aashi-label">EXPANSION</p>
                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Om Polyplast
                                </h3>
                                <p class="aashi-text aashi-text--light mb-0">
                                    With Om Polyplast, the group expanded its polymer manufacturing capabilities and added greater depth to its growing product ecosystem.
                                </p>
                            </div>
                        </article>

                        <article class="about-timeline__panel"
                            id="about-timeline-panel-3"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-2"
                            data-timeline-index="3"
                            data-timeline-year="2016"
                            aria-hidden="true">

                            <p class="aashi-label">ECOSYSTEM GROWTH</p>
                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Aarna Polyplast
                                </h3>
                                <p class="aashi-text aashi-text--light mb-0">
                                    Aarna Polyplast became another step in building a broader manufacturing network, focused on capability, scale and dependable production.
                                </p>
                            </div>
                        </article>

                        <article class="about-timeline__panel"
                            id="about-timeline-panel-4"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-3"
                            data-timeline-index="4"
                            data-timeline-year="2022"
                            aria-hidden="true">

                            <p class="aashi-label">A NEW CHAPTER</p>
                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    New Aashi Rainwear
                                </h3>
                                <p class="aashi-text aashi-text--light mb-0">
                                    New Aashi Rainwear brought a dedicated focus to protective apparel, expanding the group’s presence across rainwear, windcheaters and winterwear.
                                </p>
                            </div>
                        </article>

                        <article class="about-timeline__panel"
                            id="about-timeline-panel-5"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-4"
                            data-timeline-index="5"
                            data-timeline-year="2025"
                            aria-hidden="true">

                            <p class="aashi-label">LOOKING FORWARD</p>
                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Aashi Venture Pvt. Ltd.
                                </h3>

                                <p class="aashi-text aashi-text--light mb-0">
                                    Aashi Venture Pvt. Ltd. opened a new chapter in Sagwara, Rajasthan, extending the group’s manufacturing footprint and carrying the Aashi legacy forward.
                                </p>
                            </div>
                        </article>
                    </div>

                    <p class="about-timeline__year-display"
                        aria-hidden="true"
                        data-timeline-year>
                        1998
                    </p>

                    <div class="about-timeline__nav">
                        <button class="about-timeline__nav-btn about-timeline__nav-btn--prev"
                            type="button"
                            data-timeline-prev
                            aria-label="Previous milestone">

                            <svg class="about-timeline__nav-icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">

                                <path
                                    d="M16.1717 10.6578L10.8076 5.14083L12.2218 3.68629L20 11.6863L12.2218 19.6863L10.8076 18.2318L16.1717 12.7148L4 12.7148L4 10.6578H16.1717Z"
                                    fill="currentColor" />
                            </svg>
                        </button>

                        <button class="about-timeline__nav-btn about-timeline__nav-btn--next"
                            type="button"
                            data-timeline-next
                            aria-label="Next milestone">

                            <svg class="about-timeline__nav-icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">

                                <path
                                    d="M16.1717 10.6578L10.8076 5.14083L12.2218 3.68629L20 11.6863L12.2218 19.6863L10.8076 18.2318L16.1717 12.7148L4 12.7148L4 10.6578H16.1717Z"
                                    fill="currentColor" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END - TIMELINE -->

    <!-- START - MISSION & VISION -->
    <section class="section-block" aria-labelledby="about-mission-heading">
        <div class="container-aashi">
            <div class="factory-capability about-mv">
                <div class="factory-capability__media">
                    <img class="factory-capability__image about-mv__image"
                        src="{{ asset('frontend/assets/images/about-mission.webp') }}"
                        alt="Workers on the Aashi factory production floor">
                </div>
                <div class="about-mv__cards">
                    <article class="about-mv__card">
                        <div class="excellence__icon-wrap excellence__icon-wrap--outline">
                            <img src="{{ asset('frontend/assets/icons/mission.svg') }}" alt="">
                        </div>
                        <div class="about-mv__card-copy">
                            <h2 class="aashi-title aashi-title--card" id="about-mission-heading">
                                VISION
                            </h2>
                            <p class="aashi-text aashi-text--section mb-0">
                                <b>Building a Stronger Future</b> 
                            </p>
                            <p class="aashi-text aashi-text--section mb-0">
                                 To be recognised among the most trusted and respected manufacturers of weather-protection apparel, bags, and packaging solutions, delivering products that set benchmarks for quality, reliability, innovation, and customer satisfaction across India and global markets.
                            </p>
                        </div>
                    </article>

                    <article class="about-mv__card">
                        <div class="excellence__icon-wrap excellence__icon-wrap--outline">
                            <img src="{{ asset('frontend/assets/icons/vision.svg') }}" alt="">
                        </div>
                        <div class="about-mv__card-copy">
                            <h2 class="aashi-title aashi-title--card">
                                MISSION
                            </h2>
                            <p class="aashi-text aashi-text--section mb-0">
                                <b>Creating Value Through Manufacturing Excellence</b>
                            </p>
                            <p class="aashi-text aashi-text--section mb-0">
                                To manufacture products that combine performance, durability, and value while fostering long-term customer relationships through consistency, integrity, and innovation. We are committed to continuously strengthening our capabilities, empowering our workforce, and contributing positively to the industries and communities we serve.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- END - MISSION & VISION -->

    <!-- START - CORE VALUES -->
    <section class="section-block excellence" aria-labelledby="about-values-heading">
        <div class="container-aashi">

            <header class="section-header section-header--center section-header--spaced">
                <p class="aashi-label">Core Values</p>
                <h2 class="aashi-title aashi-title--section" id="about-values-heading">
                    The Principles That Guide Us
                </h2>
            </header>

            <div class="excellence__grid excellence__grid--3col">
                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/about-value-quality.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Quality First</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            We believe quality is not an outcome; it is a commitment embedded into every stage of our operations.
                        </p>
                    </div>
                </article>

                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/about-value-customer.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Customer Commitment</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            Building long-term relationships through reliability, responsiveness, and trust remains central to our success.
                        </p>
                    </div>
                </article>

                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/about-value-integrity.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Integrity</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            We conduct our business with transparency, accountability, and respect for every stakeholder.
                        </p>
                    </div>
                </article>

                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/about-value-innovation.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Innovation</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            We continuously improve our products, processes, and capabilities to meet evolving market demands.
                        </p>
                    </div>
                </article>

                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/about-value-manufacturing.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">Manufacturing Excellence</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            We combine skilled craftsmanship with modern technology to deliver products that consistently exceed expectations.
                        </p>
                    </div>
                </article>

                <article class="excellence__item">
                    <div class="excellence__icon-wrap">
                        <img src="{{ asset('frontend/assets/icons/about-value-people.svg') }}" alt="">
                    </div>
                    <div class="excellence__item-copy">
                        <h3 class="aashi-title aashi-title--card">People &amp; Partnership</h3>
                        <p class="aashi-text aashi-text--section mb-0">
                            We value the people behind every process and build lasting partnerships through mutual respect, collaboration and shared growth.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- END - CORE VALUES -->

    <!-- START - MANUFACTURING PHILOSOPHY -->
    <section class="aashi-band about-philosophy section-block" aria-labelledby="about-philosophy-heading">
        <div class="container-aashi">
            <div class="about-philosophy__layout">
                <div class="about-philosophy__copy">
                    <p class="aashi-label">Manufacturing Philosophy</p>
                    <div class="about-philosophy__body">
                        <h2 class="aashi-title aashi-title--section" id="about-philosophy-heading">
                            Excellence Built Into Every Product
                        </h2>
                        <div class="aashi-text aashi-text--light">
                            <p>Manufacturing is not simply what we do; it is who we are.</p>
                            <p>
                                Our philosophy is built on precision, consistency, and continuous improvement.
                                From selecting the right materials to implementing rigorous quality controls,
                                every stage of production is designed to deliver products that perform reliably
                                in real-world conditions.
                            </p>
                            <p>
                                We believe that long-term success comes from maintaining uncompromising standards,
                                investing in skilled people, embracing innovation, and delivering products that
                                customers can depend on with confidence.
                            </p>
                            <p>
                                That commitment shapes every production stage from material selection and pattern
                                development to stitching, finishing and final inspection. Skilled workmanship,
                                specialised machinery and structured processes help maintain consistent quality
                                across standard and customised requirements.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-philosophy__media">
                    <img src="{{ asset('frontend/assets/images/about-philosophy.webp') }}"
                        alt="Factory workers handling materials in the warehouse">
                </div>
            </div>
        </div>
    </section>
    <!-- END - MANUFACTURING PHILOSOPHY -->

    <!-- START - GROUP LEGACY -->
    <section class="section-block about-ecosystem" aria-labelledby="about-ecosystem-heading">
        <div class="container-aashi">
            <header class="section-header section-header--center section-header--spaced">
                <p class="aashi-label">OUR GROUP COMPANIES</p>
                <h2 class="aashi-title aashi-title--section" id="about-ecosystem-heading">
                    The Strength of an Integrated Manufacturing Ecosystem
                </h2>
                <div class="aashi-text aashi-text--section">
                    <p>Aashi Venture is proud to be part of the Aashi Group, a diversified manufacturing network built under the leadership of Mr. Pradip Trivedi.</p>
                </div>
            </header>

            @php
                $companies = [
                [
                        'logo' => 'frontend/assets/images/about-eco-aarna.png',
                        'logo_alt' => 'Aashi Plastic Pvt. Ltd.',
                        'title' => 'Aashi Plastic Pvt. Ltd.',
                        'active' => true,
                        'content' => [
                            "Established in 1998, Aashi Plastic Pvt. Ltd. is one of the group's flagship companies and a trusted manufacturer of customised PVC, PEVA, EVA, and PE packaging solutions serving the home-furnishing, textile, and garment industries.",
                            "Beyond material selection, the focus is on developing packaging formats that support how products are stored, displayed and delivered. This allows the company to create solutions aligned with the practical needs of home-furnishing, textile and garment businesses.",
                            "Within the Aashi Group, Aashi Plastic Pvt. Ltd. adds specialised packaging capability to the wider manufacturing network, strengthening the group’s ability to serve varied product and market requirements."
                        ]
                    ],

                    [
                        'logo' => 'frontend/assets/images/about-eco-sm.png',
                        'logo_alt' => 'New Aashi Rainwear',
                        'title' => 'New Aashi Rainwear',
                        'active' => false,
                        'content' => [
                            "New Aashi Rainwear is Aashi Group’s dedicated weather-protection apparel company, manufacturing raincoats, rain suits, reversible rainwear, windcheaters, winterwear and reflective safety wear.",
                            "Focused on practical protection and dependable finishing, the company develops products suited to changing weather, daily use and workwear requirements. Its range brings together comfort, functionality and durability across seasonal apparel needs.",
                            "Within the Aashi Group, New Aashi Rainwear adds specialised expertise in protective apparel, strengthening the group’s ability to serve retail, corporate and business requirements with reliable products."
                        ]
                    ],

                    [
                        'logo' => 'frontend/assets/images/about-eco-plastic.png',
                        'logo_alt' => 'Aarna Polyplast',
                        'title' => 'Aarna Polyplast',
                        'active' => false,
                        'content' => [
                            "Aarna Polyplast is part of the Aashi Group’s wider manufacturing network, contributing to the group’s growing capabilities across packaging and polymer-based product solutions.",
                            "Based in Mehsana, the company supports the group’s focus on consistent manufacturing, product development and evolving market requirements. Its presence adds further depth to Aashi’s multi-location production network.",
                            "Within the Aashi Group, Aarna Polyplast strengthens the group’s ability to serve varied product categories through coordinated manufacturing capabilities and a shared commitment to quality."
                        ]
                    ],
                    
                    [
                        'logo' => 'frontend/assets/images/about-eco-6m.png',
                        'logo_alt' => 'Om Polyplast',
                        'title' => 'Om Polyplast',
                        'active' => false,
                        'content' => [
                            "Om Polyplast is a packaging-focused manufacturing unit within the Aashi Group, supporting customised packaging solutions for diverse product and business requirements.",
                            "The company’s portfolio includes comforter bags, wire bags, round PVC bags and other tailored packaging formats designed around product protection, storage and presentation. Backed by skilled professionals and specialised machinery, Om Polyplast supports consistent production and practical packaging development.",
                            "Within the Aashi Group, Om Polyplast adds focused packaging capability to the wider manufacturing network, strengthening the group’s ability to serve varied customer needs with reliable and customised solutions."
                        ]
                    ],
                    
                ];
            @endphp

            <div class="about-ecosystem__body">
                <div class="about-ecosystem__tabs">
                    <div class="about-ecosystem__logos" role="tablist" aria-label="Group companies">
                        @foreach($companies as $index => $company)
                            <button
                                class="about-ecosystem__logo-card {{ $company['active'] ? 'is-active' : '' }}"
                                id="about-eco-tab-{{ $index }}"
                                type="button"
                                role="tab"
                                aria-selected="{{ $company['active'] ? 'true' : 'false' }}"
                                aria-controls="about-eco-panel-{{ $index }}"
                                data-eco-index="{{ $index }}">

                                <img src="{{ asset($company['logo']) }}" alt="{{ $company['logo_alt'] }}">
                            </button>
                        @endforeach
                    </div>

                    <div class="about-ecosystem__nav">
                        <button class="about-ecosystem__nav-btn" type="button" data-eco-prev aria-label="Previous company">
                            <svg class="about-ecosystem__nav-icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M16.1717 10.6578L10.8076 5.14083L12.2218 3.68629L20 11.6863L12.2218 19.6863L10.8076 18.2318L16.1717 12.7148L4 12.7148L4 10.6578H16.1717Z"
                                    fill="currentColor"/>
                            </svg>
                        </button>

                        <button class="about-ecosystem__nav-btn" type="button" data-eco-next aria-label="Next company">
                            <svg class="about-ecosystem__nav-icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M16.1717 10.6578L10.8076 5.14083L12.2218 3.68629L20 11.6863L12.2218 19.6863L10.8076 18.2318L16.1717 12.7148L4 12.7148L4 10.6578H16.1717Z"
                                    fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="about-ecosystem__panels">
                    @foreach($companies as $index => $company)
                        <article
                            class="about-ecosystem__panel {{ $company['active'] ? 'is-active' : '' }}"
                            id="about-eco-panel-{{ $index }}"
                            role="tabpanel"
                            aria-labelledby="about-eco-tab-{{ $index }}"
                            data-eco-index="{{ $index }}"
                            aria-hidden="{{ $company['active'] ? 'false' : 'true' }}">

                            <h3 class="aashi-title aashi-title--section about-ecosystem__title">
                                {{ $company['title'] }}
                            </h3>

                            <div class="aashi-text aashi-text--section">
                                @foreach($company['content'] as $paragraph)
                                    <p>{{ $paragraph }}</p>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- END - GROUP LEGACY -->

    <!-- START - LEADERSHIP -->
    <section class="section-block about-leadership" aria-labelledby="about-leadership-heading">
        <div class="container-aashi">
            <header class="about-leadership__header">
                <div>
                    <p class="aashi-label">Leadership Message</p>
                    <h2 class="aashi-title aashi-title--section" id="about-leadership-heading" data-leadership-title>
                        {{ $leaders->first()->leader_title ?? '' }}
                    </h2>
                </div>
                <div class="about-leadership__nav">
                    <button class="about-leadership__nav-btn" type="button" data-leadership-prev
                        aria-label="Previous message">
                        <svg class="about-leadership__nav-icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M16.1717 10.6578L10.8076 5.14083L12.2218 3.68629L20 11.6863L12.2218 19.6863L10.8076 18.2318L16.1717 12.7148L4 12.7148L4 10.6578H16.1717Z"
                                fill="currentColor"/>
                        </svg>
                    </button>
                    <button class="about-leadership__nav-btn" type="button" data-leadership-next
                        aria-label="Next message">
                        <svg class="about-leadership__nav-icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M16.1717 10.6578L10.8076 5.14083L12.2218 3.68629L20 11.6863L12.2218 19.6863L10.8076 18.2318L16.1717 12.7148L4 12.7148L4 10.6578H16.1717Z"
                                fill="currentColor"/>
                        </svg>
                    </button>
                </div>
            </header>

            <div class="about-leadership__body">
                @foreach($leaders as $index => $leader)
                    <article class="about-leadership__slide {{ $index === 0 ? 'is-active' : '' }}"
                        data-leadership-index="{{ $index }}"
                        data-leadership-title="{{ $leader->leader_title }}"
                        aria-hidden="{{ $index === 0 ? 'false' : 'true' }}">
                        <div class="about-leadership__media">
                            <img class="about-leadership__photo"
                                src="{{ $leader->leader_image_url }}"
                                alt="{{ $leader->leader_name }}">
                        </div>
                        <blockquote class="about-leadership__quote">
                            <div class="about-leadership__quote-row">
                                <img class="about-leadership__quote-icon"
                                    src="{{ asset('frontend/assets/icons/quote.svg') }}"
                                    alt=""
                                    aria-hidden="true">

                                <div class="about-leadership__quote-copy">
                                    {!! $leader->leader_description !!}
                                </div>
                            </div>
                            <footer class="about-leadership__attribution">
                                <p class="about-leadership__name">{{ $leader->leader_name }}</p>
                                <p class="about-leadership__role mb-0">{{ $leader->leader_designation }}</p>
                            </footer>
                        </blockquote>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END - LEADERSHIP -->

    <!-- START - PARTNERS -->
    <section class="section-block partners" aria-labelledby="partners-heading">
        <div class="container-aashi partners__inner">
            <header class="section-header section-header--center section-header--spaced">
                <p class="aashi-label">OUR CLIENTELE</p>
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
    <!-- END - PARTNERS -->

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->
</main>
@endsection