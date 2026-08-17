<div class="top-bar d-none d-md-block">
    <div class="container-aashi d-flex flex-wrap justify-content-between align-items-center gap-2">

        <p class="mb-0">
            Trusted Rainwear Supplier Across India
        </p>

        <div class="d-flex flex-wrap top-bar__contacts">

            <a href="tel:+919909032106">
                <img
                    class="top-bar__icon"
                    src="{{ asset('frontend/assets/icons/phone.svg') }}"
                    alt=""
                >

                <span>
                    +91 99090 32106
                </span>
            </a>

            <a href="mailto:info@aashirainwear.com">

                <img
                    class="top-bar__icon"
                    src="{{ asset('frontend/assets/icons/email.svg') }}"
                    alt=""
                >

                <span>
                    info@aashirainwear.com
                </span>

            </a>

        </div>

    </div>
</div>


<header class="site-header" id="site-header">

    <div class="container-aashi">

        <nav class="navbar navbar-expand-lg">

            {{-- Logo --}}
            <a
                href="{{ route('home') }}"
                class="site-header__logo navbar-brand me-auto"
                aria-label="Aashi Venture home"
            >

                <img
                    src="{{ asset('frontend/assets/images/logo.png') }}"
                    alt="Aashi Venture Pvt. Ltd."
                >

            </a>


            {{-- Mobile Toggle --}}
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileNav"
                aria-controls="mobileNav"
                aria-label="Toggle navigation"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            {{-- Desktop Navigation --}}
            <div
                class="collapse navbar-collapse"
                id="mainNav"
            >

                <ul class="navbar-nav mx-lg-auto mb-3 mb-lg-0 gap-lg-2">


                    {{-- Home --}}
                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('home') }}"
                            data-nav="home"
                        >
                            Home
                        </a>

                    </li>


                    {{-- About --}}
                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('about') }}"
                            data-nav="about"
                        >
                            About Us
                        </a>

                    </li>


                    {{-- Products --}}
                    <li class="nav-item nav-item--dropdown">

                        <div class="nav-item__trigger">

                            <button
                                class="nav-link nav-link--toggle"
                                type="button"
                                data-nav="products"
                                aria-haspopup="true"
                                aria-expanded="false"
                                aria-controls="nav-products-dropdown"
                            >
                                Products
                            </button>

                            <img
                                class="nav-chevron"
                                src="{{ asset('frontend/assets/icons/chevron-down.svg') }}"
                                alt=""
                                aria-hidden="true"
                            >


                            <ul
                                class="nav-dropdown"
                                id="nav-products-dropdown"
                                aria-label="Product categories"
                            >

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

                    </li>


                    {{-- Factory --}}
                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('factory') }}"
                            data-nav="factory"
                        >
                            Factory
                        </a>

                    </li>


                    {{-- Contact --}}
                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('contact') }}"
                            data-nav="contact"
                        >
                            Contact Us
                        </a>

                    </li>

                </ul>


                {{-- Get In Touch --}}
                <a
                    href="{{ route('contact') }}"
                    class="aashi-btn aashi-btn--outline ms-lg-3"
                >

                    Get in Touch

                    <img
                        class="aashi-btn__icon"
                        src="{{ asset('frontend/assets/icons/arrow-right-dark.svg') }}"
                        alt=""
                    >

                </a>

            </div>

        </nav>

    </div>

</header>


{{-- Mobile Navigation --}}
<div
    class="offcanvas offcanvas-end site-nav-mobile"
    id="mobileNav"
    tabindex="-1"
    aria-labelledby="mobileNavLabel"
>

    <div class="offcanvas-header site-nav-mobile__header">

        <a
            href="{{ route('home') }}"
            class="site-nav-mobile__logo"
            aria-label="Aashi Venture home"
        >

            <img
                src="{{ asset('frontend/assets/images/logo.png') }}"
                alt="Aashi Venture Pvt. Ltd."
            >

        </a>


        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Close menu"
        ></button>

    </div>


    <div class="offcanvas-body site-nav-mobile__body">

        <ul class="navbar-nav site-nav-mobile__links">


            {{-- Home --}}
            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('home') }}"
                    data-nav="home"
                >
                    Home
                </a>

            </li>


            {{-- About --}}
            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('about') }}"
                    data-nav="about"
                >
                    About Us
                </a>

            </li>


            {{-- Products --}}
            <li class="nav-item nav-item--dropdown nav-item--expandable">

                <div class="nav-item__row">

                    <button
                        class="nav-link nav-link--toggle"
                        type="button"
                        data-nav="products"
                        aria-expanded="false"
                        aria-controls="nav-products-submenu"
                    >
                        Products
                    </button>


                    <button
                        class="nav-expand-toggle"
                        type="button"
                        aria-expanded="false"
                        aria-controls="nav-products-submenu"
                        aria-label="Show product categories"
                    >

                        <img
                            class="nav-chevron"
                            src="{{ asset('frontend/assets/icons/chevron-down.svg') }}"
                            alt=""
                        >

                    </button>

                </div>


                <ul
                    class="nav-submenu"
                    id="nav-products-submenu"
                >

                    <li>

                        <a
                            class="nav-sublink"
                            href="{{ route('products.rainwear') }}"
                        >
                            Rain Wear Collection
                        </a>

                    </li>

                    <li>

                        <a
                            class="nav-sublink"
                            href="{{ route('products.winter') }}"
                        >
                            Winter Wear Collection
                        </a>

                    </li>

                    <li>

                        <a
                            class="nav-sublink"
                            href="{{ route('products.windcheaters') }}"
                        >
                            Windcheaters Collection
                        </a>

                    </li>

                    <li>

                        <a
                            class="nav-sublink"
                            href="{{ route('products.bags') }}"
                        >
                            Bags Collection
                        </a>

                    </li>

                </ul>

            </li>


            {{-- Factory --}}
            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('factory') }}"
                    data-nav="factory"
                >
                    Factory
                </a>

            </li>


            {{-- Contact --}}
            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('contact') }}"
                    data-nav="contact"
                >
                    Contact Us
                </a>

            </li>

        </ul>


        {{-- Mobile CTA --}}
        <a
            href="{{ route('contact') }}"
            class="aashi-btn aashi-btn--outline site-nav-mobile__cta"
        >

            Get in Touch

            <img
                class="aashi-btn__icon"
                src="{{ asset('frontend/assets/icons/arrow-right-dark.svg') }}"
                alt=""
            >

        </a>

    </div>

</div>