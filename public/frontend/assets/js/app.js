/**
 * App — page-specific interactions (hero, partners, about, factory).
 * Each init no-ops when its markup is not on the page.
 */
(function () {
    function getHeaderOffset() {
        var header = document.querySelector(".site-header");
        return header ? header.offsetHeight + 16 : 90;
    }

    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener("click", function (event) {
                var href = anchor.getAttribute("href");
                if (!href || href === "#") {
                    return;
                }

                var target = document.querySelector(href);
                if (!target) {
                    return;
                }

                event.preventDefault();
                window.scrollTo({
                    top: target.getBoundingClientRect().top + window.pageYOffset - getHeaderOffset(),
                    behavior: "smooth"
                });
            });
        });
    }

    function initPartnersSwiper() {
        var el = document.querySelector(".partners-swiper");
        if (!el || typeof Swiper === "undefined") {
            return;
        }

        var wrapper = el.querySelector(".swiper-wrapper");
        var originals = Array.from(wrapper.children);

        for (var copy = 0; copy < 2; copy += 1) {
            originals.forEach(function (slide) {
                var clone = slide.cloneNode(true);
                clone.setAttribute("aria-hidden", "true");
                clone.querySelectorAll("img").forEach(function (img) {
                    img.setAttribute("alt", "");
                });
                wrapper.appendChild(clone);
            });
        }

        function getSpaceBetween() {
            var root = document.documentElement;
            var gap = getComputedStyle(root).getPropertyValue("--partners-slide-gap").trim();
            if (gap) {
                var value = parseFloat(gap);
                if (!Number.isNaN(value)) {
                    if (gap.endsWith("rem")) {
                        return Math.round(value * parseFloat(getComputedStyle(root).fontSize));
                    }
                    if (gap.endsWith("px")) {
                        return value;
                    }
                    return Math.round(value);
                }
            }

            var w = window.innerWidth;
            if (w >= 1200) {
                return 30;
            }
            if (w >= 768) {
                return 24;
            }
            if (w >= 576) {
                return 18;
            }
            return 14;
        }

        var partnersSwiper = new Swiper(".partners-swiper", {
            slidesPerView: "auto",
            spaceBetween: getSpaceBetween(),
            loop: true,
            loopAdditionalSlides: originals.length,
            speed: 9000,
            grabCursor: true,
            allowTouchMove: true,
            watchOverflow: false,
            autoplay: { delay: 0, disableOnInteraction: false, pauseOnMouseEnter: true },
            on: {
                init: function (swiper) {
                    swiper.params.spaceBetween = getSpaceBetween();
                    swiper.update();
                    if (swiper.autoplay) {
                        swiper.autoplay.start();
                    }
                },
                breakpoint: function (swiper) {
                    swiper.params.spaceBetween = getSpaceBetween();
                    swiper.update();
                }
            }
        });

        var resizeTimer;
        window.addEventListener("resize", function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                partnersSwiper.params.spaceBetween = getSpaceBetween();
                partnersSwiper.update();
            }, 200);
        });

        window.addEventListener("load", function () {
            partnersSwiper.params.spaceBetween = getSpaceBetween();
            partnersSwiper.update();
            if (partnersSwiper.autoplay && !partnersSwiper.autoplay.running) {
                partnersSwiper.autoplay.start();
            }
        });
    }

    function initAboutTimeline() {
        var section = document.querySelector(".about-timeline");
        if (!section) {
            return;
        }

        var panels = section.querySelectorAll(".about-timeline__panel");
        var yearButtons = section.querySelectorAll(".about-timeline__year[data-timeline-index]");
        var yearDisplay = section.querySelector(".about-timeline__year-display");
        var prevBtn = section.querySelector("[data-timeline-prev]");
        var nextBtn = section.querySelector("[data-timeline-next]");
        var activeIndex = 0;
        var total = panels.length;

        if (!total) {
            return;
        }

        function render(index) {
            if (index < 0 || index >= total) {
                return;
            }

            activeIndex = index;

            panels.forEach(function (panel, i) {
                var isActive = i === index;
                panel.classList.toggle("is-active", isActive);
                panel.setAttribute("aria-hidden", isActive ? "false" : "true");
            });

            yearButtons.forEach(function (button, i) {
                var isActive = i === index;
                button.classList.toggle("is-active", isActive);
                button.setAttribute("aria-selected", isActive ? "true" : "false");
                button.tabIndex = isActive ? 0 : -1;
            });

            var activePanel = panels[index];
            if (yearDisplay && activePanel) {
                yearDisplay.textContent = activePanel.getAttribute("data-timeline-year") || "";
            }
        }

        yearButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                render(parseInt(button.getAttribute("data-timeline-index"), 10));
            });
        });

        if (prevBtn) {
            prevBtn.addEventListener("click", function () {
                render(activeIndex === 0 ? total - 1 : activeIndex - 1);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener("click", function () {
                render(activeIndex === total - 1 ? 0 : activeIndex + 1);
            });
        }

        render(0);
    }

    function initAboutEcosystem() {
        var section = document.querySelector(".about-ecosystem");
        if (!section) {
            return;
        }

        var tabList = section.querySelector(".about-ecosystem__logos");
        var tabs = section.querySelectorAll(".about-ecosystem__logo-card[data-eco-index]");
        var panels = section.querySelectorAll(".about-ecosystem__panel");
        var prevBtn = section.querySelector("[data-eco-prev]");
        var nextBtn = section.querySelector("[data-eco-next]");
        var activeIndex = 2;
        var total = panels.length;

        if (!total) {
            return;
        }

        function scrollTabIntoView(index) {
            // scroll only the tab strip; scrollIntoView would also shift the page/section sideways
            if (tabList && tabs[index] && tabList.scrollWidth > tabList.clientWidth) {
                var tab = tabs[index];
                tabList.scrollTo({
                    left: tab.offsetLeft - (tabList.clientWidth - tab.offsetWidth) / 2,
                    behavior: "smooth"
                });
            }
        }

        function render(index) {
            if (index < 0 || index >= total) {
                return;
            }

            activeIndex = index;

            tabs.forEach(function (tab, i) {
                var isActive = i === index;
                tab.classList.toggle("is-active", isActive);
                tab.setAttribute("aria-selected", isActive ? "true" : "false");
                tab.tabIndex = isActive ? 0 : -1;
            });

            panels.forEach(function (panel, i) {
                var isActive = i === index;
                panel.classList.toggle("is-active", isActive);
                panel.setAttribute("aria-hidden", isActive ? "false" : "true");
            });

            scrollTabIntoView(index);
        }

        tabs.forEach(function (tab) {
            tab.addEventListener("click", function () {
                render(parseInt(tab.getAttribute("data-eco-index"), 10));
            });
        });

        if (prevBtn) {
            prevBtn.addEventListener("click", function () {
                render(activeIndex === 0 ? total - 1 : activeIndex - 1);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener("click", function () {
                render(activeIndex === total - 1 ? 0 : activeIndex + 1);
            });
        }

        render(activeIndex);
    }

    function initAboutLeadership() {
        var section = document.querySelector(".about-leadership");
        if (!section) {
            return;
        }

        var slides = section.querySelectorAll(".about-leadership__slide[data-leadership-index]");
        var body = section.querySelector(".about-leadership__body");
        var prevBtn = section.querySelector("[data-leadership-prev]");
        var nextBtn = section.querySelector("[data-leadership-next]");
        var activeIndex = 0;
        var total = slides.length;
        var touchStartX = 0;
        var touchStartY = 0;
        var minSwipeDistance = 48;

        if (!total) {
            return;
        }

        function render(index) {
            if (index < 0 || index >= total) {
                return;
            }

            activeIndex = index;

            slides.forEach(function (slide, i) {
                var isActive = i === index;
                slide.classList.toggle("is-active", isActive);
                slide.setAttribute("aria-hidden", isActive ? "false" : "true");
            });

            var titleEl = section.querySelector("[data-leadership-title]");
            var activeSlide = slides[index];

            if (titleEl && activeSlide) {
                titleEl.textContent = activeSlide.dataset.leadershipTitle;
            }
        }

        function goToPrev() {
            render(activeIndex === 0 ? total - 1 : activeIndex - 1);
        }

        function goToNext() {
            render(activeIndex === total - 1 ? 0 : activeIndex + 1);
        }

        if (prevBtn) {
            prevBtn.addEventListener("click", goToPrev);
        }

        if (nextBtn) {
            nextBtn.addEventListener("click", goToNext);
        }

        if (body && total > 1) {
            body.addEventListener(
                "touchstart",
                function (event) {
                    var touch = event.changedTouches[0];
                    if (!touch) {
                        return;
                    }

                    touchStartX = touch.screenX;
                    touchStartY = touch.screenY;
                },
                { passive: true }
            );

            body.addEventListener(
                "touchend",
                function (event) {
                    if (!window.matchMedia("(max-width: 991.98px)").matches) {
                        return;
                    }

                    var touch = event.changedTouches[0];
                    if (!touch) {
                        return;
                    }

                    var deltaX = touch.screenX - touchStartX;
                    var deltaY = touch.screenY - touchStartY;

                    if (Math.abs(deltaX) < minSwipeDistance || Math.abs(deltaX) < Math.abs(deltaY)) {
                        return;
                    }

                    if (deltaX < 0) {
                        goToNext();
                    } else {
                        goToPrev();
                    }
                },
                { passive: true }
            );
        }

        render(0);
    }

    function initFactoryTabs() {
        var tablist = document.querySelector(".factory-tabs");
        if (!tablist) {
            return;
        }

        var tabs = Array.prototype.slice.call(tablist.querySelectorAll("[data-factory-tab]"));
        var panels = Array.prototype.slice.call(document.querySelectorAll("[data-factory-panel]"));

        function activateTab(tab) {
            var target = tab.getAttribute("data-factory-tab");

            tabs.forEach(function (item) {
                var isActive = item === tab;
                item.classList.toggle("is-active", isActive);
                item.classList.toggle("aashi-btn--primary", isActive);
                item.classList.toggle("aashi-btn--outline-muted", !isActive);
                item.setAttribute("aria-selected", isActive ? "true" : "false");
            });

            panels.forEach(function (panel) {
                var isActive = panel.getAttribute("data-factory-panel") === target;
                panel.classList.toggle("is-active", isActive);

                if (isActive) {
                    panel.removeAttribute("hidden");
                } else {
                    panel.setAttribute("hidden", "");
                }
            });
        }

        tablist.addEventListener("click", function (event) {
            var tab = event.target.closest("[data-factory-tab]");
            if (tab && tablist.contains(tab)) {
                activateTab(tab);
            }
        });

        tablist.addEventListener("keydown", function (event) {
            var current = document.activeElement;
            if (!current || !current.hasAttribute("data-factory-tab")) {
                return;
            }

            var index = tabs.indexOf(current);
            if (index === -1) {
                return;
            }

            var nextIndex = index;

            if (event.key === "ArrowRight") {
                nextIndex = (index + 1) % tabs.length;
            } else if (event.key === "ArrowLeft") {
                nextIndex = (index - 1 + tabs.length) % tabs.length;
            } else if (event.key === "Home") {
                nextIndex = 0;
            } else if (event.key === "End") {
                nextIndex = tabs.length - 1;
            } else {
                return;
            }

            event.preventDefault();
            tabs[nextIndex].focus();
            activateTab(tabs[nextIndex]);
        });
    }

    function initHeroSwiper() {
        var el = document.querySelector(".hero-swiper");
        if (!el || typeof Swiper === "undefined") {
            return;
        }
        var total = el.querySelectorAll(".swiper-slide").length;
        var current = document.querySelector(".hero__slider-current");
        var update = function (sw) {
            if (current) {
                current.textContent = String(sw.realIndex + 1).padStart(2, "0");
            }
        };
        new Swiper(el, {
            effect: "fade",
            fadeEffect: { crossFade: true },
            loop: total > 1,
            speed: 800,
            allowTouchMove: total > 1,
            autoplay: total > 1 ? { delay: 6000, disableOnInteraction: false } : false,
            navigation: {
                prevEl: ".hero__slider-btn--prev",
                nextEl: ".hero__slider-btn--next"
            },
            on: { init: update, slideChange: update }
        });
    }

    function boot() {
        initHeroSwiper();
        initSmoothScroll();
        initPartnersSwiper();
        initAboutTimeline();
        initAboutEcosystem();
        initAboutLeadership();
        initFactoryTabs();
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", boot);
    } else {
        boot();
    }
})();
