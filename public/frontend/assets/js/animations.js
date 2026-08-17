/**
 * Scroll reveal + stat counters (dholera_iconic pattern).
 */
(function () {
  var REVEAL_SELECTOR =
    ".fade-in, .slide-up, .slide-left, .slide-right, .zoom-in";

  var AUTO_REVEAL = [
    { selector: ".hero__copy", classes: ["slide-up", "animated"] },
    { selector: ".factory-intro__header", classes: ["slide-up", "animated"] },
    { selector: ".section-header", classes: ["slide-up"] },
    { selector: ".about__content", classes: ["slide-up", "delay-1"] },
    { selector: ".about__stats", classes: ["slide-up", "delay-2"] },
    { selector: ".about-banner", classes: ["slide-up"] },
    { selector: ".products__grid > [class*='col-']", classes: ["slide-up"], stagger: true },
    { selector: ".product-card", classes: ["card-hover"] },
    { selector: ".excellence__item", classes: ["slide-up"], stagger: true },
    { selector: ".collection-card", classes: ["slide-up", "card-hover"], stagger: true },
    { selector: ".partners__inner", classes: ["slide-up"] },
    { selector: ".newsletter__inner", classes: ["slide-up"] },
    { selector: ".product-page__header", classes: ["slide-up", "animated"] },
    { selector: ".product-detail__media", classes: ["slide-up", "delay-1"] },
    { selector: ".product-detail__content", classes: ["slide-up", "delay-2"] },
    { selector: ".product-detail__stats", classes: ["slide-up", "delay-3"] },
    {
      selector: ".product-page__categories > .product-category-card",
      classes: ["slide-up", "card-hover"],
      stagger: true
    },
    { selector: ".contact-main__left", classes: ["slide-up", "delay-1"] },
    { selector: ".contact-main__right", classes: ["slide-up", "delay-2"] },
    { selector: ".about-mv__card", classes: ["slide-up", "card-hover"], stagger: true },
    { selector: ".about-timeline__header", classes: ["slide-up"] },
    { selector: ".about-timeline__detail", classes: ["slide-up", "delay-1"] },
    { selector: ".about-ecosystem__body", classes: ["slide-up"] },
    { selector: ".about-leadership__header", classes: ["slide-up"] },
    { selector: ".about-leadership__slide", classes: ["slide-up"] },
    { selector: ".about-company__stats", classes: ["slide-up", "delay-2"] },
    { selector: ".factory-capability__media", classes: ["slide-up", "delay-1"] },
    { selector: ".factory-capability__content", classes: ["slide-up", "delay-2"] },
    {
      selector: ".factory-gallery__item",
      classes: ["slide-up", "image-zoom-hover"],
      stagger: true
    }
  ];

  function applyAutoReveal() {
    AUTO_REVEAL.forEach(function (rule) {
      var nodes = document.querySelectorAll(rule.selector);

      nodes.forEach(function (node, index) {
        rule.classes.forEach(function (className) {
          if (!node.classList.contains(className)) {
            node.classList.add(className);
          }
        });

        if (rule.stagger) {
          node.classList.add("delay-" + Math.min(index + 1, 6));
        }
      });
    });
  }

  function initScrollAnimations() {
    applyAutoReveal();

    var animatedElements = document.querySelectorAll(REVEAL_SELECTOR);
    if (!animatedElements.length) {
      return;
    }

    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      animatedElements.forEach(function (el) {
        el.classList.add("animated");
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries, obs) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("animated");
            obs.unobserve(entry.target);
          }
        });
      },
      {
        root: null,
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
      }
    );

    animatedElements.forEach(function (el) {
      observer.observe(el);
    });
  }

  function initStatsCounter() {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      document.querySelectorAll("[data-stats-counter] [data-target]").forEach(function (counter) {
        counter.textContent = counter.getAttribute("data-target") || counter.textContent;
      });
      return;
    }

    document.querySelectorAll("[data-stats-counter]").forEach(function (section) {
      var counters = section.querySelectorAll("[data-target]");
      if (!counters.length) {
        return;
      }

      var observer = new IntersectionObserver(
        function (entries, obs) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
              return;
            }

            counters.forEach(animateCounter);
            obs.unobserve(section);
          });
        },
        { root: null, threshold: 0.3 }
      );

      observer.observe(section);
    });
  }

  function animateCounter(counter) {
    var targetText = counter.getAttribute("data-target") || "";
    var match = targetText.match(/^([^0-9]*)([0-9]+(?:\.[0-9]+)?)(.*)$/);

    if (!match) {
      counter.textContent = targetText;
      return;
    }

    var prefix = match[1];
    var numericPart = match[2];
    var suffix = match[3];
    var isDecimal = numericPart.indexOf(".") !== -1;
    var padLength = isDecimal ? 0 : numericPart.length;
    var targetValue = parseFloat(numericPart);

    if (Number.isNaN(targetValue)) {
      counter.textContent = targetText;
      return;
    }

    function formatValue(value) {
      var raw = isDecimal
        ? value.toFixed(1)
        : String(Math.floor(value));

      if (padLength > 1 && !isDecimal) {
        raw = raw.padStart(padLength, "0");
      }

      return prefix + raw + suffix;
    }

    var duration = 2000;
    var startTime = performance.now();

    function updateCounter(currentTime) {
      var progress = Math.min((currentTime - startTime) / duration, 1);
      var currentValue = progress * (2 - progress) * targetValue;

      counter.textContent = formatValue(currentValue);

      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      } else {
        counter.textContent = targetText;
      }
    }

    requestAnimationFrame(updateCounter);
  }

  function boot() {
    initScrollAnimations();
    initStatsCounter();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
