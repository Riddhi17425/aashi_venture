@extends('layouts.master')

@section('body-class', 'page-factory page-inner')

@section('title', 'Factory')

@section('content')

<main>
    <!-- START - PAGE INTRO -->
    <section class="section-block factory-intro" aria-labelledby="factory-page-heading">
        <div class="container-aashi">

            <header class="factory-intro__header">
                <p class="aashi-label">factory & infrastructure</p>

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
                @foreach($workspaceCategories as $index => $cat)
                    <button class="factory-tab aashi-btn {{ $index === 0 ? 'aashi-btn--primary is-active' : 'aashi-btn--outline-muted' }}" type="button"
                        role="tab"
                        id="factory-tab-{{ $cat->id }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="factory-panel-{{ $cat->id }}"
                        data-factory-tab="{{ $cat->id }}">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>

            <div class="factory-panels">
                @foreach($workspaceCategories as $index => $cat)
                    <div class="factory-panel {{ $index === 0 ? 'is-active' : '' }}"
                        id="factory-panel-{{ $cat->id }}"
                        role="tabpanel"
                        aria-labelledby="factory-tab-{{ $cat->id }}"
                        data-factory-panel="{{ $cat->id }}"
                        {{ $index === 0 ? '' : 'hidden' }}>

                        <div class="factory-gallery">
                            @forelse($cat->workspaces as $img)
                                <figure class="factory-gallery__item {{ $loop->even ? 'factory-gallery__item--shadow' : '' }}">
                                    <img src="{{ $img->image_url }}" {{-- alt="{{ $img->image_alt }}" --}}>
                                </figure>
                            @empty
                                <p class="text-muted">No images added for this section yet.</p>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END - WORKSPACE GALLERY -->

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->
</main>
@endsection