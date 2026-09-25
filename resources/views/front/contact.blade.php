@extends('layouts.master')

@section('body-class', 'page-contact page-inner')

@section('title', 'Contact')

@section('content')

<main>
    <!-- START - PAGE INTRO -->
    <section class="section-block contact-intro" aria-labelledby="contact-page-heading">
        <div class="container-aashi">
            <header class="factory-intro__header">
                <p class="aashi-label">Let&rsquo;s Start a Conversation</p>
                <h1 class="aashi-title aashi-title--page" id="contact-page-heading">GET IN TOUCH</h1>
                 <div class="aashi-text aashi-text--section mt-3">
                <p>For product enquiries, bulk requirements, customisation or business partnerships, connect with the team behind dependable protection solutions. </p>
            </div>
            </header>
           
        </div>
    </section>
    <!-- END - PAGE INTRO -->

    <!-- START - SALES + FORM -->
    <section class="section-block contact-main" aria-labelledby="contact-sales-heading">
        <div class="container-aashi">
            <div class="row g-4 g-lg-5 contact-main__row">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="contact-main__left d-flex flex-column flex-grow-1">
                        <h2 class="aashi-title aashi-title--card contact-block-title"
                            id="contact-sales-heading">
                            Sales &amp; Business Enquiries
                        </h2>

                        <article class="contact-person-card">
                            <div class="contact-person-card__header">
                                <p class="aashi-title aashi-title--card contact-person-card__name">
                                    Dinesh Joshi
                                </p>
                                <p class="aashi-label contact-person-card__role">
                                    Director of Operations
                                </p>
                            </div>

                            <div class="contact-person-card__divider" aria-hidden="true"></div>

                            <div class="contact-person-card__details">
                                <div class="footer-col__contact">
                                    <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                                    <a href="tel:+919909032106">+91 9909032106</a>
                                </div>

                                <div class="contact-person-card__email-row">
                                    <div class="footer-col__contact">
                                        <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                                        <a href="mailto:info@aashirainwear.com" target="_blank">
                                            info@aashirainwear.com
                                        </a>
                                    </div>

                                    <div class="footer-col__contact">
                                        <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                                        <a href="mailto:pradip@aashiplastic.com" target="_blank">
                                            pradip@aashiplastic.com
                                        </a>
                                    </div>
                                </div>

                                <div class="footer-col__contact">
                                    <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                                    <span>
                                        E/49/B, RIICO Industrial Area, Sagwara,
                                        Dist Dungarpur, Rajasthan - 314025
                                    </span>
                                </div>
                            </div>
                        </article>

                        <div class="contact-map flex-grow-1">
                            <iframe
                                class="contact-map__embed"
                                title="Map showing Aashi Venture at E/49/B, RIICO Industrial Area, Sagwara, Dist Dungarpur, Rajasthan - 314025"
                                src="https://maps.google.com/maps?q=E%2F49%2FB%2C+RIICO+Industrial+Area%2C+Sagwara%2C+Dist+Dungarpur%2C+Rajasthan+314025&amp;hl=en&amp;z=14&amp;output=embed"
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- START - CONTACT FORM -->
                <div class="col-lg-6 d-flex flex-column">
                    <div class="contact-main__right d-flex flex-column flex-grow-1">
                        <h2 class="aashi-title aashi-title--card contact-block-title">
                            Talk to the Aashi Venture Team
                        </h2>
                        <form class="contact-form d-flex flex-column flex-grow-1" id="contactForm"
                            action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div class="contact-form__fields">
                                <div class="contact-form__field">
                                    <label class="contact-form__label" for="contact-name">
                                        Your Name *
                                    </label>
                                    <input
                                        class="contact-form__input @error('name') is-invalid @enderror"
                                        type="text"
                                        id="contact-name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        
                                        autocomplete="name">
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="contact-form__field">
                                    <label class="contact-form__label" for="contact-email">
                                        Email Address *
                                    </label>
                                    <input
                                        class="contact-form__input @error('email') is-invalid @enderror"
                                        type="email"
                                        id="contact-email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        
                                        autocomplete="email">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="contact-form__field">
                                    <label class="contact-form__label" for="contact-subject">
                                        Subject *
                                    </label>
                                    <input
                                        class="contact-form__input @error('subject') is-invalid @enderror"
                                        type="text"
                                        id="contact-subject"
                                        name="subject"
                                        value="{{ old('subject') }}"
                                        >
                                    @error('subject')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="contact-form__field contact-form__field--message">
                                    <label class="contact-form__label" for="contact-message">
                                        Message *
                                    </label>
                                    <textarea
                                        class="contact-form__textarea @error('message') is-invalid @enderror"
                                        id="contact-message"
                                        name="message"
                                        rows="1"
                                        >{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div id="contactFormMessage" class="contact-form__message" style="display:none;"></div>

                            <button class="aashi-btn aashi-btn--primary contact-form__submit mt-auto" type="submit">
                                Send Message
                                <img
                                    class="aashi-btn__icon"
                                    src="{{ asset('frontend/assets/icons/arrow-right-white.svg') }}"
                                    alt="">
                            </button>
                        </form>
                    </div>
                </div>
                <!-- END - CONTACT FORM -->
            </div>
        </div>
    </section>
    <!-- END - SALES + FORM -->

    <!-- START - BRANCH OFFICES -->
    <section class="section-block contact-branches" aria-labelledby="contact-branches-heading">
        <div class="container-aashi">

            <header class="section-header section-header--center section-header--spaced">
                <p class="aashi-label aashi-label--lg">Get In Touch</p>
                <h2 class="aashi-title aashi-title--section" id="contact-branches-heading">
                    Contact - Branch Office
                </h2>
            </header>

            <div class="row contact-branches__grid">
                @foreach($branches as $branch)
                    <div class="col-md-6 col-lg-4">
                        <article class="contact-office-card">
                            <div class="contact-office-card__title">
                                <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                                <span>{{ $branch->label }}</span>
                            </div>

                            <p class="contact-office-card__address">
                                {{ $branch->address }}
                            </p>

                            <div class="contact-office-card__divider" aria-hidden="true"></div>

                            @if($branch->phone)
                                <div class="footer-col__contact">
                                    <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $branch->phone) }}">{{ $branch->phone }}</a>
                                </div>
                            @endif

                            @if($branch->email)
                                <div class="footer-col__contact mb-0">
                                    <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                                    <a href="mailto:{{ $branch->email }}" target="_blank">{{ $branch->email }}</a>
                                </div>
                            @endif
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END - BRANCH OFFICES -->

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->
</main>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            const $form = $(this);
            const $btn = $form.find('button[type="submit"]');
            const $msg = $('#contactFormMessage');

            // clear previous errors
            $form.find('.is-invalid').removeClass('is-invalid');
            $form.find('.invalid-feedback').remove();
            $msg.hide().removeClass('contact-form__message--success contact-form__message--error').text('');

            $btn.prop('disabled', true).css('opacity', 0.7);

            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $msg.addClass('contact-form__message--success')
                            .text(response.message)
                            .show();
                        $form[0].reset();
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            const $input = $form.find('[name="' + field + '"]');
                            $input.addClass('is-invalid');
                            const $fb = $('<div class="invalid-feedback d-block"></div>').text(messages[0]);
                            $input.after($fb);
                            // pull the message up against the input line (cancel the flex row-gap)
                            const rowGap = parseFloat(getComputedStyle($input.parent()[0]).rowGap) || 0;
                            $fb.css('margin-top', (-rowGap + 6) + 'px');
                        });
                    } else {
                        $msg.addClass('contact-form__message--error')
                            .text(xhr.responseJSON?.message || 'Something went wrong. Please try again.')
                            .show();
                    }
                },
                complete: function() {
                    $btn.prop('disabled', false).css('opacity', 1);
                }
            });
        });
    });
</script>
@endpush