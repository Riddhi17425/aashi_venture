/**
 * App — page-specific interactions (hero, partners, about, factory).
 * Each init no-ops when its markup is not on the page.
 */
(function () {
  var HERO_DEFAULTS = {
    background: { src: "frontend/assets/images/hero-bg.webp", alt: "" },
    label: "Designed for the Rain",
    title: "Protection Designed for Every Season.",
    description:
      "Built on decades of expertise, Aashi Venture creates dependable products for protection, packaging and everyday use.",
    cta: {
      text: "Explore Products",
      href: "#",
      icon: "frontend/assets/icons/arrow-right-white.svg"
    },
    features: [
      { icon: "frontend/assets/icons/waterproof.svg", text: "Waterproof Protection" },
      { icon: "frontend/assets/icons/quality.svg", text: "Premium Quality" },
      { icon: "frontend/assets/icons/comfort.svg", text: "Lightweight & Comfortable" }
    ]
  };

  var HERO_SLIDES = [{ id: "hero-1" }, { id: "hero-2", label: "Built for Every Season", title: "Rainwear That Moves With You.", description: "From daily commutes to demanding outdoor work, our rainwear is designed for comfort, durability, and all-weather performance." }, { id: "hero-3", label: "Trusted Manufacturing", title: "Quality You Can Depend On", description: "In-house production, strict quality checks, and scalable capacity — delivering protection products India relies on." }];

  function resolveHeroSlide(index) {
    var resolved = JSON.parse(JSON.stringify(HERO_DEFAULTS));
    var patch = HERO_SLIDES[index] || {};

    Object.keys(patch).forEach(function (key) {
      if (patch[key] === undefined) {
        return;
      }

      if (
        patch[key] &&
        typeof patch[key] === "object" &&
        !Array.isArray(patch[key]) &&
        resolved[key] &&
        typeof resolved[key] === "object" &&
        !Array.isArray(resolved[key])
      ) {
        resolved[key] = Object.assign({}, resolved[key], patch[key]);
        return;
      }

      resolved[key] = patch[key];
    });

    return resolved;
  }

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

  function initHeroSwiper() {
    var heroEl = document.querySelector(".hero-swiper");
    if (!heroEl || typeof Swiper === "undefined") {
      return;
    }

    var slideCount = HERO_SLIDES.length;
    var bgWrapper = heroEl.querySelector("[data-hero-bg-wrapper]");
    var labelEl = document.querySelector("[data-hero-label]");
    var titleEl = document.querySelector("[data-hero-title]");
    var descriptionEl = document.querySelector("[data-hero-description]");
    var ctaEl = document.querySelector("[data-hero-cta]");
    var ctaTextEl = document.querySelector("[data-hero-cta-text]");
    var ctaIconEl = document.querySelector("[data-hero-cta-icon]");
    var featuresEl = document.querySelector("[data-hero-features]");
    var contentAnimated = document.querySelector("[data-hero-content-animated]");
    var currentEl = document.querySelector(".hero__slider-current");
    var totalEl = document.querySelector(".hero__slider-total");

    function padSlideNum(n) {
      return String(n).padStart(2, "0");
    }

    function setVisible(el, show) {
      if (el) {
        el.hidden = !show;
      }
    }

    function renderBackgroundSlides() {
      if (!bgWrapper) {
        return;
      }

      bgWrapper.innerHTML = "";

      for (var i = 0; i < slideCount; i += 1) {
        var slide = resolveHeroSlide(i);
        var bg = slide.background || HERO_DEFAULTS.background;
        var slideEl = document.createElement("div");
        slideEl.className = "swiper-slide hero-slide";
        slideEl.setAttribute("data-hero-slide-id", slide.id || "slide-" + (i + 1));

        var img = document.createElement("img");
        img.className = "hero__bg-image";
        img.src = bg.src;
        img.alt = bg.alt || "";
        img.loading = i === 0 ? "eager" : "lazy";
        img.decoding = "async";
        slideEl.appendChild(img);
        bgWrapper.appendChild(slideEl);
      }
    }

    function renderFeatures(features) {
      if (!featuresEl) {
        return;
      }

      if (!features || !features.length) {
        featuresEl.innerHTML = "";
        setVisible(featuresEl, false);
        return;
      }

      featuresEl.innerHTML = features
        .map(function (feature) {
          return (
            '<div class="hero__feature"><img class="hero__feature-icon" src="' +
            feature.icon +
            '" alt=""><span>' +
            feature.text +
            "</span></div>"
          );
        })
        .join("");

      setVisible(featuresEl, true);
    }

    function renderCta(cta) {
      if (!ctaEl) {
        return;
      }

      if (!cta) {
        setVisible(ctaEl, false);
        return;
      }

      ctaEl.href = cta.href || "#";
      if (ctaTextEl) {
        ctaTextEl.textContent = cta.text || "";
      }
      if (ctaIconEl && cta.icon) {
        ctaIconEl.src = cta.icon;
      }
      setVisible(ctaEl, Boolean(cta.text));
    }

    function applySlideContent(index, animate) {
      var slide = resolveHeroSlide(index);

      function updateDom() {
        if (labelEl) {
          if (slide.label) {
            labelEl.textContent = slide.label;
            setVisible(labelEl, true);
          } else {
            setVisible(labelEl, false);
          }
        }

        if (titleEl) {
          if (slide.title) {
            titleEl.textContent = slide.title;
            setVisible(titleEl, true);
          } else {
            setVisible(titleEl, false);
          }
        }

        if (descriptionEl) {
          if (slide.description) {
            descriptionEl.textContent = slide.description;
            setVisible(descriptionEl, true);
          } else {
            setVisible(descriptionEl, false);
          }
        }

        renderCta(slide.cta);
        renderFeatures(slide.features);
      }

      if (!animate || !contentAnimated) {
        updateDom();
        return;
      }

      if (labelEl) {
        labelEl.classList.add("is-changing");
      }
      contentAnimated.classList.add("is-changing");

      window.setTimeout(function () {
        updateDom();
        if (labelEl) {
          labelEl.classList.remove("is-changing");
        }
        contentAnimated.classList.remove("is-changing");
      }, 220);
    }

    function updateCounter(swiper) {
      if (currentEl) {
        currentEl.textContent = padSlideNum(swiper.realIndex + 1);
      }
      if (totalEl) {
        totalEl.textContent = padSlideNum(slideCount);
      }
    }

    renderBackgroundSlides();

    function lockHeroSwiperHeight() {
      var heroSection = document.querySelector(".page-home .hero") || document.querySelector(".hero");
      if (!heroSection || !heroEl) {
        return;
      }

      var heroHeight = heroSection.offsetHeight;
      if (heroHeight > 0) {
        heroEl.style.height = heroHeight + "px";
      }
    }

    var heroSwiper = new Swiper(".hero-swiper", {
      effect: "fade",
      fadeEffect: { crossFade: true },
      loop: slideCount > 1,
      speed: 1500,
      allowTouchMove: true,
      grabCursor: false,
      autoHeight: false,
      autoplay:
        slideCount > 1
          ? { delay: 6000, disableOnInteraction: false, pauseOnMouseEnter: false }
          : false,
      navigation: {
        prevEl: ".hero__slider-btn--prev",
        nextEl: ".hero__slider-btn--next"
      },
      on: {
        init: function (swiper) {
          lockHeroSwiperHeight();
          applySlideContent(swiper.realIndex, false);
          updateCounter(swiper);
          if (swiper.autoplay) {
            swiper.autoplay.start();
          }
        },
        slideChange: function (swiper) {
          applySlideContent(swiper.realIndex, true);
          updateCounter(swiper);
        },
        resize: function () {
          lockHeroSwiperHeight();
        }
      }
    });

    window.addEventListener("load", function () {
      lockHeroSwiperHeight();
      if (heroSwiper.autoplay && !heroSwiper.autoplay.running) {
        heroSwiper.autoplay.start();
      }
    });

    window.addEventListener("resize", lockHeroSwiperHeight);
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
      if (tabList && tabs[index]) {
        tabs[index].scrollIntoView({ behavior: "smooth", block: "nearest", inline: "center" });
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

  function boot() {
    initSmoothScroll();
    initHeroSwiper();
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
