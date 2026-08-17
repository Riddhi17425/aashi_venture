/**
 * Navbar — component loader, sticky header, mobile nav (dholera_iconic pattern).
 */
(function () {
  if ("scrollRestoration" in history) {
    history.scrollRestoration = "manual";
  }

  function scrollTop() {
    window.scrollTo(0, 0);
  }

  scrollTop();
  window.addEventListener("pageshow", scrollTop);
  window.addEventListener("load", scrollTop);

  function getScriptBase() {
    var script = document.querySelector("script[src*='navbar.js']");
    if (!script) {
      return "";
    }

    var explicit = script.getAttribute("data-base");
    if (explicit != null) {
      return explicit;
    }

    var src = script.getAttribute("src") || "assets/js/navbar.js";
    if (src.charAt(0) === "/" || src.indexOf("/") === -1) {
      return "";
    }

    return src.replace(/assets\/js\/navbar\.js.*$/, "");
  }

  function resolvePath(path) {
    if (/^(https?:|\/)/.test(path)) {
      return path;
    }

    return getScriptBase() + path;
  }

  function loadIntoElement(element, filepath) {
    return fetch(resolvePath(filepath))
      .then(function (response) {
        if (!response.ok) {
          throw new Error("Failed to load " + filepath);
        }
        return response.text();
      })
      .then(function (html) {
        element.outerHTML = html;
      });
  }

  function loadComponent(elementId, filepath) {
    var element = document.getElementById(elementId);
    if (!element) {
      return Promise.resolve();
    }

    return loadIntoElement(element, filepath);
  }

  function loadIncludes() {
    var tasks = [
      loadComponent("header-placeholder", "components/header.html"),
      loadComponent("footer-placeholder", "components/footer.html")
    ];

    Array.prototype.slice
      .call(document.querySelectorAll("[data-include]"))
      .forEach(function (node) {
        var path = node.getAttribute("data-include");

        tasks.push(
          loadIntoElement(node, path).catch(function (error) {
            console.error("[navbar.js]", error);
          })
        );
      });

    return Promise.all(tasks);
  }

  function normalizePath(path) {
    if (!path || path === "/") {
      return "index.html";
    }

    var parts = path.split("/");
    return parts[parts.length - 1] || "index.html";
  }

  function setActiveNavLinks() {
    var current = normalizePath(window.location.pathname);
    var isProductPage = /^product-(rainwear|winter-wear|windcheaters|bags)\.html$/i.test(current);

    document
      .querySelectorAll(
        ".site-header .nav-link[data-nav], .site-nav-mobile .nav-link[data-nav], .site-header button.nav-link[data-nav], .site-nav-mobile button.nav-link[data-nav]"
      )
      .forEach(function (link) {
        var href = link.getAttribute("href") || "";
        var linkPath = href ? normalizePath(href.split("?")[0].split("#")[0]) : "";
        var navKey = link.getAttribute("data-nav");
        var isActive =
          (href && linkPath === current) || (navKey === "products" && isProductPage);

        link.classList.toggle("active", isActive);

        if (isActive) {
          link.setAttribute("aria-current", "page");
        } else {
          link.removeAttribute("aria-current");
        }
      });
  }

  function syncHeaderHeight(header) {
    if (!header) {
      return;
    }

    var height = header.offsetHeight + "px";
    document.documentElement.style.setProperty("--site-header-height", height);
    document.documentElement.style.setProperty("--site-chrome-height", height);
  }

  function initDesktopProductsToggle() {
    var dropdownItems = document.querySelectorAll(".site-header .nav-item--dropdown");

    dropdownItems.forEach(function (item) {
      if (item.dataset.desktopDropdownReady === "true") {
        return;
      }

      item.dataset.desktopDropdownReady = "true";

      var toggle = item.querySelector(".nav-link--toggle");
      if (!toggle) {
        return;
      }

      toggle.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();

        var isOpen = item.classList.toggle("is-open");
        toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      });
    });

    if (document.documentElement.dataset.desktopDropdownBound === "true") {
      return;
    }

    document.documentElement.dataset.desktopDropdownBound = "true";

    document.addEventListener("click", function (event) {
      dropdownItems.forEach(function (item) {
        if (!item.contains(event.target)) {
          item.classList.remove("is-open");

          var toggle = item.querySelector(".nav-link--toggle");
          if (toggle) {
            toggle.setAttribute("aria-expanded", "false");
          }
        }
      });
    });
  }

  function toggleExpandableItem(item, forceOpen) {
    if (!item) {
      return false;
    }

    var isOpen =
      typeof forceOpen === "boolean" ? forceOpen : !item.classList.contains("is-open");

    item.classList.toggle("is-open", isOpen);

    item.querySelectorAll(".nav-expand-toggle, .nav-link--toggle").forEach(function (control) {
      control.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });

    return isOpen;
  }

  function initMobileNav() {
    var nav = document.getElementById("mobileNav");
    if (!nav || nav.dataset.mobileNavReady === "true") {
      return;
    }

    nav.dataset.mobileNavReady = "true";

    nav.addEventListener("show.bs.offcanvas", function () {
      document.body.classList.add("nav-open");
      syncHeaderHeight(document.querySelector(".site-header"));
    });

    nav.addEventListener("hide.bs.offcanvas", function () {
      document.body.classList.remove("nav-open");
    });

    nav.addEventListener("hidden.bs.offcanvas", function () {
      document.body.classList.remove("nav-open");

      nav.querySelectorAll(".nav-item--expandable.is-open").forEach(function (item) {
        toggleExpandableItem(item, false);
      });
    });

    nav.querySelectorAll(".nav-expand-toggle, .nav-link--toggle").forEach(function (button) {
      button.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        toggleExpandableItem(button.closest(".nav-item--expandable"));
      });
    });

    nav.querySelectorAll(".nav-sublink, .site-nav-mobile__cta").forEach(function (link) {
      link.addEventListener("click", function () {
        if (typeof bootstrap === "undefined") {
          return;
        }

        var instance = bootstrap.Offcanvas.getInstance(nav);
        if (instance) {
          instance.hide();
        }
      });
    });

    nav.querySelectorAll(".nav-link:not(.nav-link--toggle)").forEach(function (link) {
      link.addEventListener("click", function () {
        if (typeof bootstrap === "undefined") {
          return;
        }

        var instance = bootstrap.Offcanvas.getInstance(nav);
        if (instance) {
          instance.hide();
        }
      });
    });
  }

  function initStickyNav() {
    var header = document.querySelector(".site-header");
    if (!header || header.dataset.navReady === "true") {
      return;
    }

    header.dataset.navReady = "true";

    setActiveNavLinks();
    initDesktopProductsToggle();
    initMobileNav();
    syncHeaderHeight(header);

    var scrollTicking = false;

    function updateScrollState() {
      header.classList.toggle("is-scrolled", window.scrollY > 8);
      scrollTicking = false;
    }

    function onScroll() {
      if (!scrollTicking) {
        scrollTicking = true;
        window.requestAnimationFrame(updateScrollState);
      }
    }

    updateScrollState();
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", function () {
      syncHeaderHeight(header);
    });
  }

  function bootNav() {
    initStickyNav();
  }

  function bootComponents() {
    loadIncludes()
      .then(function () {
        scrollTop();
        document.dispatchEvent(new CustomEvent("aashi:includes-loaded"));
        bootNav();
      })
      .catch(function (error) {
        console.error("[navbar.js]", error);
      });
  }

  document.addEventListener("aashi:includes-loaded", bootNav);

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootComponents);
  } else {
    bootComponents();
  }
})();
