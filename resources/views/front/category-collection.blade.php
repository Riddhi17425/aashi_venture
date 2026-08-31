<!-- START - COLLECTION PAGE -->
<section class="section-block product-page" aria-labelledby="product-page-heading">
    <div class="container-aashi">

        <header class="product-page__header">
            <p class="aashi-label">{{ $category->title }} for Every Journey</p>

            <h1 class="aashi-title aashi-title--page" id="product-page-heading">
                {{ $category->title }} Collection
            </h1>
        </header>

        <div class="product-page__categories product-page__categories--{{ $category->subCategories->count() }}">
            @foreach($category->subCategories as $sub)
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
                                src="{{ $sub->image_url }}"
                                alt="{{ $sub->image_alt ?: $sub->title }}">
                        </div>
                        <div class="product-category-card__footer">
                            <h2 class="aashi-title aashi-title--card">
                                {{ $sub->title }}
                            </h2>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        @if($category->brochure_pdf)
            <div class="product-page__cta">
                <a href="{{ $category->brochure_url }}" class="aashi-btn aashi-btn--primary" target="_blank" rel="noopener">
                    Download Brochure
                    <img
                        class="aashi-btn__icon"
                        src="{{ asset('frontend/assets/icons/arrow-right-white.svg') }}"
                        alt="">
                </a>
            </div>
        @endif
    </div>
</section>
<!-- END - COLLECTION PAGE -->