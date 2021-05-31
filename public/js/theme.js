/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/theme.js ***!
  \*******************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

!function () {
  "use strict";

  var e = document.querySelector(".sidebar"),
      o = document.querySelectorAll("#sidebarToggle, #sidebarToggleTop");

  if (e) {
    e.querySelector(".collapse");
    var t = [].slice.call(document.querySelectorAll(".sidebar .collapse")).map(function (e) {
      return new bootstrap.Collapse(e, {
        toggle: !1
      });
    });

    var _iterator = _createForOfIteratorHelper(o),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var l = _step.value;
        l.addEventListener("click", function (o) {
          if (document.body.classList.toggle("sidebar-toggled"), e.classList.toggle("toggled"), e.classList.contains("toggled")) {
            var _iterator3 = _createForOfIteratorHelper(t),
                _step3;

            try {
              for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
                var l = _step3.value;
                l.hide();
              }
            } catch (err) {
              _iterator3.e(err);
            } finally {
              _iterator3.f();
            }
          }
        });
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }

    window.addEventListener("resize", function () {
      if (Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0) < 768) {
        var _iterator2 = _createForOfIteratorHelper(t),
            _step2;

        try {
          for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
            var e = _step2.value;
            e.hide();
          }
        } catch (err) {
          _iterator2.e(err);
        } finally {
          _iterator2.f();
        }
      }
    });
  }

  var n = document.querySelector("body.fixed-nav .sidebar");
  n && n.on("mousewheel DOMMouseScroll wheel", function (e) {
    if (Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0) > 768) {
      var o = e.originalEvent,
          t = o.wheelDelta || -o.detail;
      this.scrollTop += 30 * (t < 0 ? 1 : -1), e.preventDefault();
    }
  });
  var i = document.querySelector(".scroll-to-top");
  i && window.addEventListener("scroll", function () {
    var e = window.pageYOffset;
    i.style.display = e > 100 ? "block" : "none";
  });
}();
/******/ })()
;