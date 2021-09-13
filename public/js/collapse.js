/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/collapse.js":
/*!**********************************!*\
  !*** ./resources/js/collapse.js ***!
  \**********************************/
/***/ (function() {

var _this = this;

window.Collapse = function (o) {
  var el = o;
  var active = false;

  var addStyling = function addStyling() {
    if (document.querySelectorAll('[data-name="collapse-styling"]').length > 0) {
      return;
    }

    var css = "\n            [data-type=\"collapse\"] [data-name=\"collapse-btn\"] {\n                cursor: pointer;\n                position: relative;\n            }\n            [data-name=\"collapse-btn\"]::after {\n                content: '\\25be';\n                float:left;\n                margin-left:10px;\n            }\n            [data-name=\"collapse-btn\"].active::after {\n                content: '\\25b4';\n            }\n            [data-type=\"collapse\"] [data-name=\"collapse-content\"] {\n                overflow: hidden;\n                max-height: 0;\n                transition: max-height 1s ease-in-out;\n            }\n        ";
    head = document.head || document.getElementsByTagName('head')[0], style = document.createElement('style');
    style.setAttribute('data-name', 'collapse-styling');
    head.appendChild(style);
    style.type = 'text/css';

    if (style.styleSheet) {
      // This is required for IE8 and below.
      style.styleSheet.cssText = css;
    } else {
      style.appendChild(document.createTextNode(css));
    }
  };

  _this.init = function () {
    var btnName = o.getAttribute('data-button');
    var contentName = o.getAttribute('data-target');
    var btn = o.querySelector("[data-name=\"".concat(btnName, "\"]"));
    var content = o.querySelector("[data-name=\"".concat(contentName, "\"]")); // btn.style.cursor = "pointer"
    // content.style.maxHeight = 0
    // content.classList.add('overflow-hidden')

    addStyling();
    btn.addEventListener('click', function () {
      if (active) {
        content.style.maxHeight = 0;
        active = !active;
        btn.classList.remove('active');
      } else {
        content.style.maxHeight = content.scrollHeight + 'px';
        active = !active;
        btn.classList.add('active');
      }
    });
  };

  _this.init();
};

window.CollapseInit = function () {
  document.querySelectorAll('[data-type="collapse"]').forEach(function (col) {
    Collapse(col);
  });
};

CollapseInit();

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/collapse.js"]();
/******/ 	
/******/ })()
;