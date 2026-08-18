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
                <h1 class="aashi-title aashi-title--page" id="contact-page-heading">Contact Us</h1>
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
                                        <a href="mailto:info@aashirainwear.com">
                                            Info@aashirainwear.com
                                        </a>
                                    </div>

                                    <div class="footer-col__contact">
                                        <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                                        <a href="mailto:pradip@aashiplastic.com">
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

                <div class="col-lg-6 d-flex flex-column">

                    <div class="contact-main__right d-flex flex-column flex-grow-1">

                        <h2 class="aashi-title aashi-title--card contact-block-title">
                            Talk to the Aashi Venture Team
                        </h2>

                        <form class="contact-form d-flex flex-column flex-grow-1" action="#" method="post">

                            <div class="contact-form__fields">

                                <div class="contact-form__field">
                                    <label class="contact-form__label" for="contact-name">
                                        Your Name *
                                    </label>

                                    <input
                                        class="contact-form__input"
                                        type="text"
                                        id="contact-name"
                                        name="name"
                                        required
                                        autocomplete="name">
                                </div>

                                <div class="contact-form__field">
                                    <label class="contact-form__label" for="contact-email">
                                        Email Address *
                                    </label>

                                    <input
                                        class="contact-form__input"
                                        type="email"
                                        id="contact-email"
                                        name="email"
                                        required
                                        autocomplete="email">
                                </div>

                                <div class="contact-form__field">
                                    <label class="contact-form__label" for="contact-subject">
                                        Subject *
                                    </label>

                                    <input
                                        class="contact-form__input"
                                        type="text"
                                        id="contact-subject"
                                        name="subject"
                                        required>
                                </div>

                                <div class="contact-form__field contact-form__field--message">

                                    <label class="contact-form__label" for="contact-message">
                                        Message *
                                    </label>

                                    <textarea
                                        class="contact-form__textarea"
                                        id="contact-message"
                                        name="message"
                                        rows="1"
                                        required></textarea>

                                </div>

                            </div>

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

                <!-- Factory I -->
                <div class="col-md-6 col-lg-4">
                    <article class="contact-office-card">
                        <div class="contact-office-card__title">
                            <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                            <span>Factory-I</span>
                        </div>

                        <p class="contact-office-card__address">
                            843/2, Nidhi Industrial Estate, Village Rakanpur,
                            Santej. Gandhinagar - 382721
                        </p>

                        <div class="contact-office-card__divider" aria-hidden="true"></div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                            <a href="tel:+919879562106">+91 98795 62106</a>
                        </div>

                        <div class="footer-col__contact mb-0">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:sales@aashirainwear.com">
                                sales@aashirainwear.com
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Factory II -->
                <div class="col-md-6 col-lg-4">
                    <article class="contact-office-card">
                        <div class="contact-office-card__title">
                            <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                            <span>Factory-II</span>
                        </div>

                        <p class="contact-office-card__address">
                            Aashi Estate, Survey No. 906, Borisana-Karsanpur Road,
                            Borisana, Kadi, Mehsana - 384441
                        </p>

                        <div class="contact-office-card__divider" aria-hidden="true"></div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                            <a href="tel:+917227012801">+91 72270 12801</a>
                        </div>

                        <div class="footer-col__contact mb-0">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:sales@aashirainwear.com">
                                sales@aashirainwear.com
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Factory III -->
                <div class="col-md-6 col-lg-4">
                    <article class="contact-office-card">
                        <div class="contact-office-card__title">
                            <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                            <span>Factory-III</span>
                        </div>

                        <p class="contact-office-card__address">
                            Plot No. 160/8, Opp. Tata Motors, Near Creative Mill,
                            2nd Phase, GIDC, Vapi - 396195
                        </p>

                        <div class="contact-office-card__divider" aria-hidden="true"></div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                            <a href="tel:+919879583106">+91 98795 83106</a>
                        </div>

                        <div class="footer-col__contact mb-0">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:sales@aashirainwear.com">
                                sales@aashirainwear.com
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Factory IV -->
                <div class="col-md-6 col-lg-4">
                    <article class="contact-office-card">
                        <div class="contact-office-card__title">
                            <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                            <span>Factory-IV</span>
                        </div>

                        <p class="contact-office-card__address">
                            E/49/B, RIICO Industrial Estate,
                            Sagwara, Rajasthan - 314025
                        </p>

                        <div class="contact-office-card__divider" aria-hidden="true"></div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                            <a href="tel:+919909032106">+91 99090 32106</a>
                        </div>

                        <div class="footer-col__contact mb-0">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:sales@aashirainwear.com">
                                sales@aashirainwear.com
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Ahmedabad Office 1 -->
                <div class="col-md-6 col-lg-4">
                    <article class="contact-office-card">
                        <div class="contact-office-card__title">
                            <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                            <span>Ahmedabad Office - 1</span>
                        </div>

                        <p class="contact-office-card__address">
                            674, Jagrut Pole, Swaminarayan Mandir Road,
                            Near Kalupur 8 No. School,
                            Kalupur-Gheekanta, Ahmedabad - 380001
                        </p>

                        <div class="contact-office-card__divider" aria-hidden="true"></div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                            <a href="tel:+919879791806">+91 98797 91806</a>
                        </div>

                        <div class="footer-col__contact mb-0">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:sales@aashirainwear.com">
                                sales@aashirainwear.com
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Ahmedabad Office 2 -->
                <div class="col-md-6 col-lg-4">
                    <article class="contact-office-card">
                        <div class="contact-office-card__title">
                            <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                            <span>Ahmedabad Office - 2</span>
                        </div>

                        <p class="contact-office-card__address">
                            F-8, Samet Business Park,
                            Near Parishkar Society,
                            Khokhra Circle, Ahmedabad - 380008
                        </p>

                        <div class="contact-office-card__divider" aria-hidden="true"></div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                            <a href="tel:+919879583906">+91 98795 83906</a>
                        </div>

                        <div class="footer-col__contact mb-0">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:sales@aashirainwear.com">
                                sales@aashirainwear.com
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Delhi Sales Office -->
                <div class="col-md-6 col-lg-4">
                    <article class="contact-office-card">
                        <div class="contact-office-card__title">
                            <img src="{{ asset('frontend/assets/icons/location-primary.svg') }}" alt="">
                            <span>Delhi Sales Office</span>
                        </div>

                        <p class="contact-office-card__address">
                            Plot No-31, Gr. Floor, Hathi Khana,
                            Bahadur Garh Road, Near BSES Office,
                            DELHI - 110006.
                        </p>

                        <div class="contact-office-card__divider" aria-hidden="true"></div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/phone-primary.svg') }}" alt="">
                            <a href="tel:+919717028030">+91 9717028030</a>
                        </div>

                        <div class="footer-col__contact">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:sales@aashirainwear.com">
                                sales@aashirainwear.com
                            </a>
                        </div>

                        <div class="footer-col__contact mb-0">
                            <img src="{{ asset('frontend/assets/icons/email-primary.svg') }}" alt="">
                            <a href="mailto:pradip@aashiplastic.com">
                                pradip@aashiplastic.com
                            </a>
                        </div>
                    </article>
                </div>

            </div>

        </div>
    </section>
    <!-- END - BRANCH OFFICES -->

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