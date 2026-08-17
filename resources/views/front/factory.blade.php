@extends('layouts.master')

@section('body-class', 'page-factory page-inner')

@section('title', 'Factory')

@section('content')

<main>
    <!-- START - PAGE INTRO -->
    <section class="section-block factory-intro" aria-labelledby="factory-page-heading">
        <div class="container-aashi">

            <header class="factory-intro__header">
                <p class="aashi-label">Premium Production Facility</p>

                <h1 class="aashi-title aashi-title--page" id="factory-page-heading">
                    Factory Infrastructure
                </h1>
            </header>

            <div class="factory-capability">

                <div class="factory-capability__media">
                    <img
                        class="factory-capability__image"
                        src="{{ asset('frontend/assets/images/factory-hero.webp') }}"
                        alt="Aashi Venture factory building in Sagwara, Rajasthan">
                </div>

                <div class="factory-capability__content">

                    <p class="aashi-label aashi-label--lg">
                        Manufacturing Capability
                    </p>

                    <div class="factory-capability__copy">

                        <h2 class="aashi-title aashi-title--section">
                            Protection Starts on the Factory Floor.
                        </h2>

                        <div class="factory-capability__text aashi-text aashi-text--section">

                            <p>
                                Aashi Venture operates from Sagwara, Rajasthan,
                                as part of Aashi Group's multi-location manufacturing network.
                            </p>

                            <p>
                                Across Aashi's production setup, rainwear moves through dedicated
                                stages including cutting, stitching, heat sealing, seam sealing,
                                printing, checking and packing. The infrastructure includes
                                600 stitching machines, 100 heat seal machines,
                                16 seam sealing machines, 15 printing machines,
                                10 heat transfer machines and
                                12 snap buttoning machines.
                            </p>

                            <p>
                                This integrated setup brings together skilled workmanship,
                                specialised machinery and structured quality processes
                                to support dependable manufacturing across product
                                requirements.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- END - PAGE INTRO -->

    <!-- START - WORKSPACE GALLERY -->
    <section class="section-block factory-workspace" aria-labelledby="factory-workspace-heading">
        <div class="container-aashi">

            <header class="section-header section-header--center section-header--spaced">
                <p class="aashi-label">Our Workspace</p>
                <h2 class="aashi-title aashi-title--section" id="factory-workspace-heading">
                    Inside Our Production Facility
                </h2>
            </header>

            <div class="factory-tabs" role="tablist" aria-label="Factory workspace areas">

                <button class="factory-tab aashi-btn aashi-btn--outline-muted" type="button"
                    role="tab"
                    id="factory-tab-stores"
                    aria-selected="false"
                    aria-controls="factory-panel-stores"
                    data-factory-tab="stores">
                    Stores
                </button>

                <button class="factory-tab aashi-btn aashi-btn--primary is-active" type="button"
                    role="tab"
                    id="factory-tab-machinery"
                    aria-selected="true"
                    aria-controls="factory-panel-machinery"
                    data-factory-tab="machinery">
                    Machinery
                </button>

                <button class="factory-tab aashi-btn aashi-btn--outline-muted" type="button"
                    role="tab"
                    id="factory-tab-stitching"
                    aria-selected="false"
                    aria-controls="factory-panel-stitching"
                    data-factory-tab="stitching">
                    Stitching Section
                </button>

                <button class="factory-tab aashi-btn aashi-btn--outline-muted" type="button"
                    role="tab"
                    id="factory-tab-welding"
                    aria-selected="false"
                    aria-controls="factory-panel-welding"
                    data-factory-tab="welding">
                    Welding / Sealing Section
                </button>

                <button class="factory-tab aashi-btn aashi-btn--outline-muted" type="button"
                    role="tab"
                    id="factory-tab-packing"
                    aria-selected="false"
                    aria-controls="factory-panel-packing"
                    data-factory-tab="packing">
                    Checking Packing
                </button>

                <button class="factory-tab aashi-btn aashi-btn--outline-muted" type="button"
                    role="tab"
                    id="factory-tab-vip"
                    aria-selected="false"
                    aria-controls="factory-panel-vip"
                    data-factory-tab="vip">
                    VIP
                </button>

                <button class="factory-tab aashi-btn aashi-btn--outline-muted" type="button"
                    role="tab"
                    id="factory-tab-staff"
                    aria-selected="false"
                    aria-controls="factory-panel-staff"
                    data-factory-tab="staff">
                    Staff
                </button>

            </div>

            <div class="factory-panels">

                <!-- Machinery -->
                <div class="factory-panel is-active"
                    id="factory-panel-machinery"
                    role="tabpanel"
                    aria-labelledby="factory-tab-machinery"
                    data-factory-panel="machinery">

                    <div class="factory-gallery">

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-1.webp') }}" alt="Factory machinery production line">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-2.webp') }}" alt="Industrial sewing machines in the factory">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-3.webp') }}" alt="Heat sealing equipment">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-4.webp') }}" alt="Quality checking area">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-5.webp') }}" alt="Printing machines">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-1.webp') }}" alt="Additional factory machinery">
                        </figure>

                    </div>

                </div>

                <!-- Stores -->
                <div class="factory-panel"
                    id="factory-panel-stores"
                    role="tabpanel"
                    aria-labelledby="factory-tab-stores"
                    data-factory-panel="stores"
                    hidden>

                    <div class="factory-gallery">

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-4.webp') }}" alt="Factory stores area">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-5.webp') }}" alt="Material storage">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-2.webp') }}" alt="Inventory workspace">
                        </figure>

                    </div>

                </div>

                <!-- Stitching -->
                <div class="factory-panel"
                    id="factory-panel-stitching"
                    role="tabpanel"
                    aria-labelledby="factory-tab-stitching"
                    data-factory-panel="stitching"
                    hidden>

                    <div class="factory-gallery">

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-2.webp') }}" alt="Stitching section">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-3.webp') }}" alt="Sewing operators at work">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-1.webp') }}" alt="Stitching machines row">
                        </figure>

                    </div>

                </div>

                <!-- Welding -->
                <div class="factory-panel"
                    id="factory-panel-welding"
                    role="tabpanel"
                    aria-labelledby="factory-tab-welding"
                    data-factory-panel="welding"
                    hidden>

                    <div class="factory-gallery">

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-3.webp') }}" alt="Welding and sealing section">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-1.webp') }}" alt="Seam sealing machines">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-5.webp') }}" alt="Heat seal workstations">
                        </figure>

                    </div>

                </div>

                <!-- Packing -->
                <div class="factory-panel"
                    id="factory-panel-packing"
                    role="tabpanel"
                    aria-labelledby="factory-tab-packing"
                    data-factory-panel="packing"
                    hidden>

                    <div class="factory-gallery">

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-4.webp') }}" alt="Checking and packing area">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-2.webp') }}" alt="Quality inspection">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-3.webp') }}" alt="Finished goods packing">
                        </figure>

                    </div>

                </div>

                <!-- VIP -->
                <div class="factory-panel"
                    id="factory-panel-vip"
                    role="tabpanel"
                    aria-labelledby="factory-tab-vip"
                    data-factory-panel="vip"
                    hidden>

                    <div class="factory-gallery">

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-5.webp') }}" alt="VIP showroom area">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-1.webp') }}" alt="Product display space">
                        </figure>

                    </div>

                </div>

                <!-- Staff -->
                <div class="factory-panel"
                    id="factory-panel-staff"
                    role="tabpanel"
                    aria-labelledby="factory-tab-staff"
                    data-factory-panel="staff"
                    hidden>

                    <div class="factory-gallery">

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-2.webp') }}" alt="Factory staff at work">
                        </figure>

                        <figure class="factory-gallery__item">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-4.webp') }}" alt="Team on the production floor">
                        </figure>

                        <figure class="factory-gallery__item factory-gallery__item--shadow">
                            <img src="{{ asset('frontend/assets/images/factory-gallery-3.webp') }}" alt="Skilled operators">
                        </figure>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- END - WORKSPACE GALLERY -->

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