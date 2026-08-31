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
                <form class="newsletter__form w-100" id="newsletterForm" action="{{ route('newsletter.subscribe') }}" method="post">
                    @csrf
                    <input
                        class="newsletter__input"
                        type="email"
                        name="email"
                        id="newsletter-email"
                        placeholder="Enter your email address"
                        required
                        aria-label="Email address">

                    <button class="newsletter__submit" type="submit">
                        Subscribe
                        <img src="{{ asset('frontend/assets/icons/arrow-right-blue.svg') }}" alt="">
                    </button>
                </form>
                <div id="newsletterMessage" class="small mt-2" style="display:none;"></div>
            </div>

        </div>
    </div>
</section>
<!-- END - NEWSLETTER -->

@push('scripts')
<script>
$(function() {
    $('#newsletterForm').on('submit', function(e) {
        e.preventDefault();

        const $form = $(this);
        const $btn = $form.find('button[type="submit"]');
        const $msg = $('#newsletterMessage');
        const $input = $('#newsletter-email');

        $msg.hide().removeClass('text-success text-danger').text('');
        $input.removeClass('is-invalid');
        $btn.prop('disabled', true).css('opacity', 0.7);

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: $form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $msg.addClass('text-success').text(response.message).show();
                    $form[0].reset();
                }
            },
            error: function(xhr) {
                const message = xhr.responseJSON?.errors?.email?.[0]
                    || xhr.responseJSON?.message
                    || 'Something went wrong. Please try again.';
                $input.addClass('is-invalid');
                $msg.addClass('text-danger').text(message).show();
            },
            complete: function() {
                $btn.prop('disabled', false).css('opacity', 1);
            }
        });
    });
});
</script>
@endpush