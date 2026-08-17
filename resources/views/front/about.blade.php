@extends('layouts.master')

@section('body-class', 'page-about page-inner')

@section('title', 'About')

@section('content')

<main>
    <!-- START - PAGE INTRO, HERO, LEGACY & COMPANY -->
    <section class="section-block about-intro" aria-labelledby="about-page-heading">
        <div class="container-aashi">

            <header class="factory-intro__header">
                <p class="aashi-label">Manufacturing Excellence Since 1998</p>
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
                            <p>
                                Aashi Venture represents the next chapter in a manufacturing journey that began over
                                two decades ago. Established on the strong foundation of the Aashi Group, the
                                company carries forward a legacy of quality, reliability and customer-focused
                                manufacturing across rainwear, windcheaters, winterwear, bags and packaging
                                solutions.
                            </p>

                            <p>
                                Rooted in a group that has built expertise across protective apparel, travel and
                                luggage bags, PVC packaging bags and customised product solutions, Aashi Venture is
                                positioned to serve both everyday and business requirements with purpose. Our
                                approach combines practical product development, disciplined manufacturing processes
                                and an understanding of evolving customer needs. From standard collections to
                                customised corporate requirements, every solution is developed with a focus on
                                functionality, consistency and long-term value.
                            </p>

                            <p>
                                With a commitment to innovation, operational excellence and customer satisfaction,
                                Aashi Venture continues to strengthen the group's manufacturing capabilities while
                                supporting customers across India and international markets with products they can
                                depend on.
                            </p>
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
                                    delivery. Our focus remains simple: create products that perform, build
                                    partnerships that last, and deliver value that customers can trust.
                                </p>

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
                        <p class="aashi-stat-value stat-card__value">Rajasthan</p>
                        <p class="aashi-stat-label stat-card__label mb-0">Manufacturing Facility</p>
                    </div>

                    <div class="stat-card stat-card--about">
                        <p class="aashi-stat-value stat-card__value">190K+ Sq. Ft.</p>
                        <p class="aashi-stat-label stat-card__label mb-0">Group Manufacturing Area</p>
                    </div>

                    <div class="stat-card stat-card--about">
                        <p class="aashi-stat-value stat-card__value">04</p>
                        <p class="aashi-stat-label stat-card__label mb-0">Export in Global Markets</p>
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
                        <span class="about-timeline__year-label">2022</span>
                    </button>

                    <button class="about-timeline__year"
                        id="about-timeline-tab-4"
                        type="button"
                        role="tab"
                        aria-selected="false"
                        aria-controls="about-timeline-panel-4"
                        data-timeline-index="4">
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

                            <p class="aashi-label">Origin — Foundation Year</p>

                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Aashi Plastic Industries
                                </h3>

                                <p class="aashi-text aashi-text--light mb-0">
                                    The Aashi journey began with Aashi Plastic Industries,
                                    laying the foundation for a manufacturing group built on
                                    quality, consistency and long-term partnerships
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

                            <p class="aashi-label">Expansion — Protective Apparel</p>

                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Rainwear Manufacturing Growth
                                </h3>

                                <p class="aashi-text aashi-text--light mb-0">
                                    The Aashi Group expanded strategically,
                                    strengthening its expertise in weather-protection apparel
                                    and building production capacity to serve retail and
                                    corporate customers across India
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

                            <p class="aashi-label">Network — Multi-Location Production</p>

                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Gujarat &amp; Rajasthan Units
                                </h3>

                                <p class="aashi-text aashi-text--light mb-0">
                                    With manufacturing units across Gujarat and Rajasthan,
                                    the group steadily built a stronger production network
                                    to support evolving market requirements. Skilled teams
                                    and specialised production facilities shaped the way
                                    Aashi serves retail, corporate and export markets.
                                </p>
                            </div>
                        </article>

                        <article class="about-timeline__panel"
                            id="about-timeline-panel-3"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-3"
                            data-timeline-index="3"
                            data-timeline-year="2022"
                            aria-hidden="true">

                            <p class="aashi-label">Diversification — Integrated Solutions</p>

                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Bags, Packaging &amp; Custom Products
                                </h3>

                                <p class="aashi-text aashi-text--light mb-0">
                                    From rainwear and winterwear to bags,
                                    packaging and customised solutions,
                                    each addition expanded both capability
                                    and reach — broadening the group's strength
                                    across industrial, retail and export markets.
                                </p>
                            </div>
                        </article>

                        <article class="about-timeline__panel"
                            id="about-timeline-panel-4"
                            role="tabpanel"
                            aria-labelledby="about-timeline-tab-4"
                            data-timeline-index="4"
                            data-timeline-year="2025"
                            aria-hidden="true">

                            <p class="aashi-label">Future — Aashi Venture</p>

                            <div class="about-timeline__panel-body">
                                <h3 class="aashi-title aashi-title--section">
                                    Next Chapter of Manufacturing Excellence
                                </h3>

                                <p class="aashi-text aashi-text--light mb-0">
                                    Aashi Venture carries this legacy forward,
                                    combining decades of experience with modern
                                    manufacturing capabilities to support the next
                                    phase of growth and excellence.
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
                                Our Mission
                            </h2>

                            <p class="aashi-text aashi-text--section mb-0">
                                To manufacture products that combine performance, durability, and value while fostering
                                long-term customer relationships through consistency, integrity, and innovation. We are
                                committed to continuously strengthening our capabilities, empowering our workforce, and
                                contributing positively to the industries and communities we serve.
                            </p>
                        </div>
                    </article>

                    <article class="about-mv__card">
                        <div class="excellence__icon-wrap excellence__icon-wrap--outline">
                            <img src="{{ asset('frontend/assets/icons/vision.svg') }}" alt="">
                        </div>

                        <div class="about-mv__card-copy">
                            <h2 class="aashi-title aashi-title--card">
                                Our Vision
                            </h2>

                            <p class="aashi-text aashi-text--section mb-0">
                                To be recognised among the most trusted and respected manufacturers of
                                weather-protection apparel, bags, and packaging solutions, delivering products
                                that set benchmarks for quality, reliability, innovation, and customer satisfaction
                                across India and global markets.
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
                            We value the people behind every process and build lasting partnerships through collaboration &amp; shared growth.
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
                <p class="aashi-label">Group Legacy</p>
                <h2 class="aashi-title aashi-title--section" id="about-ecosystem-heading">
                    The Strength of an Integrated Manufacturing Ecosystem
                </h2>
            </header>

            @php
                $companies = [
                    [
                        'logo' => 'frontend/assets/images/about-eco-aashi.png',
                        'logo_alt' => 'Aashi Venture Pvt. Ltd.',
                        'title' => 'Aashi Venture Pvt. Ltd.',
                        'active' => false,
                        'content' => [
                            'Aashi Venture represents the next chapter in a manufacturing journey that began over two decades ago. Established on the strong foundation of the Aashi Group, the company carries forward a legacy of quality, reliability and customer-focused manufacturing across rainwear, windcheaters, winterwear, bags and packaging solutions.',
                            'With a commitment to innovation, operational excellence and customer satisfaction, Aashi Venture continues to strengthen the group’s manufacturing capabilities while supporting customers across India and international markets with products they can depend on.'
                        ]
                    ],
                    [
                        'logo' => 'frontend/assets/images/about-eco-sm.png',
                        'logo_alt' => 'New Aashi Rainwear',
                        'title' => 'New Aashi Rainwear',
                        'active' => false,
                        'content' => [
                            'New Aashi Rainwear specialises in weather-protection apparel designed for everyday movement and dependable performance. From standard collections to customised corporate requirements, products are developed with a focus on functionality, consistency and long-term value.',
                            'As part of the Aashi Group’s integrated manufacturing ecosystem, New Aashi Rainwear supports retail, corporate and export markets with rainwear solutions built on disciplined production processes and evolving customer needs.'
                        ]
                    ],
                    [
                        'logo' => 'frontend/assets/images/about-eco-plastic.png',
                        'logo_alt' => 'Aashi Plastic Pvt. Ltd.',
                        'title' => 'Aashi Plastic Pvt. Ltd.',
                        'active' => true,
                        'content' => [
                            'Aashi Plastic Pvt. Ltd. manufactures all sorts of PVC bags which are used in packaging of Home Furnishing products and Garments viz: Apparels, Bed Sheets, Pillow Covers, Comforters, Table Tops, Curtains and Towels etc. These customized bags are made as per the requirement/specification of the clients in different types of materials like PVC, PEVA, EVA, PE. These bags are broadly of three different types – Stitching, Welding and Wired Bags.',
                            'Together with Aashi Venture and allied group companies, this integrated ecosystem supports diverse manufacturing requirements across protective apparel, packaging and customised product solutions.'
                        ]
                    ],
                    [
                        'logo' => 'frontend/assets/images/about-eco-6m.png',
                        'logo_alt' => '6M Polyplast',
                        'title' => '6M Polyplast',
                        'active' => false,
                        'content' => [
                            '6M Polyplast contributes to the group’s strength in polymer-based manufacturing, producing PVC film and polyplast solutions that support packaging, industrial and customised product applications across diverse sectors.',
                            'With structured processes and quality-focused production, 6M Polyplast works alongside sister companies within the Aashi Group to deliver dependable materials and packaging components for retail, corporate and export requirements.'
                        ]
                    ],
                    [
                        'logo' => 'frontend/assets/images/about-eco-aarna.png',
                        'logo_alt' => 'Aarna Polyplast',
                        'title' => 'Aarna Polyplast',
                        'active' => false,
                        'content' => [
                            'Aarna Polyplast extends the group’s capabilities in polyplast manufacturing, supporting customised packaging and polymer-based product solutions developed to meet specific client requirements and industry standards.',
                            'Operating within the Aashi Group’s multi-location manufacturing network, Aarna Polyplast helps strengthen the ecosystem’s reach across protective apparel, packaging and tailored product development for customers across India and beyond.'
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
                    <h2 class="aashi-title aashi-title--section" id="about-leadership-heading">
                        Leading with Vision. Growing with Trust.
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

            @php
                $leaders = [
                    [
                        'image' => 'frontend/assets/images/about-leadership.jpg',
                        'alt' => 'Mr. Pradip Trivedi, Managing Director',
                        'style' => '--leadership-photo-height: 154.41%; --leadership-photo-top: -5.21%;',
                        'name' => 'Mr. Pradip Trivedi',
                        'designation' => 'Managing Director',
                        'active' => true,
                        'message' => [
                            'Aashi Venture is built on the belief that quality and trust create lasting growth. Through strong manufacturing capabilities, reliable relationships and a commitment to continuous improvement, we continue to deliver products customers can depend on.',
                            'As we move forward, our focus remains on innovation, responsible growth and creating long-term value for our customers, partners and communities. We sincerely thank everyone who has been part of this journey and look forward to building the future together.'
                        ]
                    ],
                    [
                        'image' => 'frontend/assets/images/about-mission.webp',
                        'alt' => 'Dinesh Joshi, Director of Operations',
                        'style' => '--leadership-photo-height:115%; --leadership-photo-top:-7%; --leadership-photo-position:center 20%;',
                        'name' => 'Dinesh Joshi',
                        'designation' => 'Director of Operations',
                        'active' => false,
                        'message' => [
                            'Operational excellence is the backbone of everything we deliver. From production planning and quality control to timely fulfilment, our teams work with discipline and accountability to ensure every product meets the standards our customers expect.',
                            'By investing in skilled people, structured processes and continuous improvement across our manufacturing network, we strengthen the group’s ability to serve retail, corporate and export partners with consistency and reliability.'
                        ]
                    ]
                ];
            @endphp

            <div class="about-leadership__body">

                @foreach($leaders as $index => $leader)

                    <article class="about-leadership__slide {{ $leader['active'] ? 'is-active' : '' }}"
                        data-leadership-index="{{ $index }}"
                        aria-hidden="{{ $leader['active'] ? 'false' : 'true' }}">

                        <div class="about-leadership__media">
                            <img class="about-leadership__photo"
                                src="{{ asset($leader['image']) }}"
                                alt="{{ $leader['alt'] }}"
                                style="{{ $leader['style'] }}">
                        </div>

                        <blockquote class="about-leadership__quote">

                            <div class="about-leadership__quote-row">

                                <img class="about-leadership__quote-icon"
                                    src="{{ asset('frontend/assets/icons/quote.svg') }}"
                                    alt=""
                                    aria-hidden="true">

                                <div class="about-leadership__quote-copy">
                                    @foreach($leader['message'] as $paragraph)
                                        <p>{{ $paragraph }}</p>
                                    @endforeach
                                </div>

                            </div>

                            <footer class="about-leadership__attribution">
                                <p class="about-leadership__name">{{ $leader['name'] }}</p>
                                <p class="about-leadership__role mb-0">{{ $leader['designation'] }}</p>
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
                <p class="aashi-label">Trusted Partnerships</p>
                <h2 class="aashi-title aashi-title--section" id="partners-heading">
                    Trusted By Leading Brands
                </h2>
            </header>

            @php
                $partners = [
                    ['image' => 'frontend/assets/images/partner-swiggy.png', 'alt' => 'Swiggy', 'class' => 'partners-slide--swiggy'],
                    ['image' => 'frontend/assets/images/partner-bigbasket.png', 'alt' => 'BigBasket', 'class' => 'partners-slide--bigbasket'],
                    ['image' => 'frontend/assets/images/partner-blinkit.png', 'alt' => 'Blinkit', 'class' => 'partners-slide--blinkit'],
                    ['image' => 'frontend/assets/images/partner-zepto.png', 'alt' => 'Zepto', 'class' => 'partners-slide--zepto'],
                    ['image' => 'frontend/assets/images/partner-zomato.jpg', 'alt' => 'Zomato', 'class' => 'partners-slide--zomato'],
                    ['image' => 'frontend/assets/images/partner-welspun.png', 'alt' => 'Welspun', 'class' => 'partners-slide--welspun'],
                    ['image' => 'frontend/assets/images/partner-arvind.png', 'alt' => 'Arvind', 'class' => 'partners-slide--arvind'],
                ];
            @endphp

            <div class="swiper partners-swiper" aria-label="Trusted brand logos">
                <div class="swiper-wrapper">

                    @foreach($partners as $partner)
                        <div class="swiper-slide partners-slide {{ $partner['class'] }}">
                            <div class="partners__logo">
                                <img src="{{ asset($partner['image']) }}" alt="{{ $partner['alt'] }}">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>
    <!-- END - PARTNERS -->

    <!-- START - NEWSLETTER -->
    <section class="newsletter" aria-labelledby="newsletter-heading">
        <div class="container-aashi newsletter__inner">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="d-flex align-items-center newsletter__lead">
                        <img class="newsletter__icon"
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
                        @csrf

                        <input
                            class="newsletter__input"
                            type="email"
                            name="email"
                            placeholder="Enter your email address"
                            required
                            aria-label="Email address">

                        <button class="newsletter__submit" type="submit">
                            Subscribe
                            <img src="{{ asset('frontend/assets/icons/arrow-right-blue.svg') }}" alt="">
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- END - NEWSLETTER -->
</main>
@endsection