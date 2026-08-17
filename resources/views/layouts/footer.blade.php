<footer class="site-footer">

    <div class="container-aashi">

        <div class="row site-footer__main align-items-start">

            {{-- Brand Section --}}
            <div class="col-12 col-xl-4 site-footer__brand">

                <a
                    href="{{ route('home') }}"
                    class="site-footer__logo d-inline-block"
                >

                    <img
                        src="{{ asset('frontend/assets/images/logo-white.png') }}"
                        alt="Aashi Venture Pvt. Ltd."
                    >

                </a>


                <div class="site-footer__brand-text">

                    <p class="site-footer__tagline">
                        बारिश का मज़ा, भीगे बिना ।
                    </p>

                    <p class="site-footer__desc mb-0">
                        Rainwear made for everyday movement and dependable protection.
                    </p>

                </div>


                {{-- Social Media --}}
                <div class="site-footer__social">

                    <a
                        href="#"
                        aria-label="Facebook"
                    >
                        <img
                            src="{{ asset('frontend/assets/icons/facebook.svg') }}"
                            alt=""
                        >
                    </a>


                    <a
                        href="#"
                        aria-label="LinkedIn"
                    >
                        <img
                            src="{{ asset('frontend/assets/icons/linkedin.svg') }}"
                            alt=""
                        >
                    </a>


                    <a
                        href="#"
                        aria-label="Instagram"
                    >
                        <img
                            src="{{ asset('frontend/assets/icons/instagram.svg') }}"
                            alt=""
                        >
                    </a>


                    <a
                        href="#"
                        aria-label="YouTube"
                    >
                        <img
                            src="{{ asset('frontend/assets/icons/youtube.svg') }}"
                            alt=""
                        >
                    </a>

                </div>

            </div>


            {{-- Footer Navigation --}}
            <div class="col-12 col-xl-8">

                <div class="row site-footer__nav-row">


                    {{-- Quick Links --}}
                    <div class="col-sm-6 col-lg-4 site-footer__col">

                        <h3 class="aashi-title aashi-title--footer">
                            Quick Links
                        </h3>

                        <ul class="footer-col__list">

                            <li>
                                <a href="{{ route('about') }}">
                                    About Us
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('factory') }}">
                                    Factory
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}">
                                    Contact Us
                                </a>
                            </li>

                        </ul>

                    </div>


                    {{-- Products --}}
                    <div class="col-sm-6 col-lg-4 site-footer__col">

                        <h3 class="aashi-title aashi-title--footer">
                            Products
                        </h3>

                        <ul class="footer-col__list">

                            <li>
                                <a href="{{ route('products.rainwear') }}">
                                    Rain Wear Collection
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('products.winter') }}">
                                    Winter Wear Collection
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('products.windcheaters') }}">
                                    Windcheaters Collection
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('products.bags') }}">
                                    Bags Collection
                                </a>
                            </li>

                        </ul>

                    </div>


                    {{-- Contact Us --}}
                    <div class="col-12 col-lg-4 site-footer__col site-footer__col--contact">

                        <h3 class="aashi-title aashi-title--footer">
                            Contact Us
                        </h3>


                        <div class="site-footer__contacts">


                            {{-- Phone --}}
                            <div class="footer-col__contact">

                                <img
                                    src="{{ asset('frontend/assets/icons/phone.svg') }}"
                                    alt=""
                                >

                                <a href="tel:+919909032106">
                                    +91 99090 32106
                                </a>

                            </div>


                            {{-- Email --}}
                            <div class="footer-col__contact">

                                <img
                                    src="{{ asset('frontend/assets/icons/email-white.svg') }}"
                                    alt=""
                                >

                                <a href="mailto:info@aashirainwear.com">
                                    info@aashirainwear.com
                                </a>

                            </div>


                            {{-- Address --}}
                            <div class="footer-col__contact">

                                <img
                                    src="{{ asset('frontend/assets/icons/location.svg') }}"
                                    alt=""
                                >

                                <span>
                                    E/49/B, RIICO Industrial Area, Sagwara,
                                    Dist Dungarpur, Rajasthan - 314025
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Divider --}}
        <div
            class="site-footer__divider"
            aria-hidden="true"
        ></div>


        {{-- Footer Bottom --}}
        <div class="site-footer__bottom d-flex flex-wrap justify-content-between align-items-center gap-3">

            <p class="mb-0">
                &copy; {{ date('Y') }} Aashi Venture Pvt. Ltd.
                All rights reserved.
            </p>


            <p class="site-footer__legal mb-0">

                <a href="#">
                    Privacy Policy
                </a>

                <span
                    class="site-footer__legal-sep"
                    aria-hidden="true"
                >
                    |
                </span>

                <a href="#">
                    Terms &amp; Conditions
                </a>

            </p>

        </div>

    </div>

</footer>