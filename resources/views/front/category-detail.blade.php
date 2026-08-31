<!-- START - PRODUCT DETAIL -->
<section class="section-block product-detail" aria-labelledby="product-detail-heading">
    <div class="container-aashi">
        <div class="product-detail__grid">
            <div class="product-detail__media">
                <img
                    class="product-detail__image"
                    src="{{ $category->detail_image_url }}"
                    alt="{{ $category->detail_image_alt ?: $category->title }}">
            </div>
            <div class="product-detail__content">
                <p class="aashi-label">{{ $category->detail_page_title }}</p>
                <div class="product-detail__copy">
                    <h2 class="aashi-title aashi-title--section" id="product-detail-heading">
                        {{ $category->detail_page_shortnote }}
                    </h2>
                    <div class="product-detail__text">
                        {!! $category->description !!}
                    </div>
                </div>

                <hr class="product-detail__divider" aria-hidden="true">

                @if(!empty($category->stats))
                    <div class="product-detail__stats" data-stats-counter aria-label="Manufacturing highlights">
                        @foreach($category->stats as $stat)
                            <div class="product-detail__stat">
                                <p class="product-detail__stat-value" data-target="{{ $stat['number'] }}">0</p>
                                <p class="product-detail__stat-label">{{ $stat['title'] }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- END - PRODUCT DETAIL -->