/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/home.js":
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  window.onload = function () {
    console.log('document.getElementById(audio): ', document.getElementById('audio')); // $('#audio').play();

    var loaded = sessionStorage.getItem('loaded');
    sessionStorage.setItem('loaded', true); // $('.home *').show();
    // if(loaded !== 'true') {

    $('.nav-gradient').addClass('nav-first-menu-showing');
    $('.navigate li a').addClass('first-menu-showing');

    var _loop = function _loop(i) {
      setTimeout(function () {
        if (i >= 1) {
          setTimeout(function () {
            $('.nav-gradient').removeClass('nav-first-menu-showing');
          }, 1000);
        }

        $('.navigate li a').each(function (i) {
          $(this).delay(700 * i).fadeTo(500, 1);
          $(this).delay(350 * i).not(".menu-active a").fadeTo(300, 0);
        });
      }, 4750 * i);
    };

    for (var i = 0; i <= 2; i++) {
      _loop(i);
    }

    setTimeout(function () {
      $('.navigate li a').removeClass('first-menu-showing');
    }, 900000);
    setTimeout(function () {
      $('.home .home-main-content').fadeTo(1000, 1);
    }, 4000);
    $('.home .home-title').each(function (index) {
      var $this = $(this);
      setTimeout(function () {
        $this.delay(1500 * index).fadeTo(500, 1).fadeTo(500, 0).fadeTo(500, 1).fadeTo(500, 0).fadeTo(500, 1).fadeTo(500, 0).fadeTo(500, 1);
      }, 79000 * index);
    });
    setTimeout(function () {
      $('.home-point img').each(function (index) {
        $(this).delay(700 * (index + 1)).fadeTo(500, 1);
      });
    }, 5000);
    setTimeout(function () {
      $('.home .home-point-title').each(function (index) {
        $(this).delay(2500 * index).fadeTo(500, 1).fadeTo(500, 0).fadeTo(500, 1).fadeTo(500, 0).fadeTo(500, 1);
      });
    }, 14500);
    setTimeout(function () {
      var delay = 0;
      $('.home-point-show').each(function (index) {
        var item = $(this);
        console.log('item: ', item);
        setTimeout(function () {
          // item.show();
          // $(this).css('opacity',0).animate({'opacity': 1, 'display': 'inline-block'}, 1000);
          item.parent().fadeTo(1000, 1);
          item.fadeTo(1000, 1);
          item.animate_Text();

          if (item.hasClass('home-list')) {
            setTimeout(function () {
              item.parent().fadeTo(1000, 1);
            }, 3000);
          } else if ($('.home').height() > $('.home-content-place').height()) {
            animateContent('down');
          }
        }, delay);
        delay = item.text().length * 10 + delay;
      });
      setTimeout(function () {
        if ($('.home').height() > $('.home-content-place').height()) {
          animateContent('up');
        }
      }, delay + 3000);
      setTimeout(function () {
        // if(localStorage.getItem('hideAlert') == 'false'){
        $("#instructionModal").modal('show'); // }
      }, delay + 3000);
    }, 44500); // } else {
    //     $('.home *').show();
    // }
  };

  $.fn.animate_Text = function () {
    var string = $.trim(this.text());
    return this.each(function () {
      var $this = $(this);
      $this.html(string.replace(/./g, '<span class="new">$&</span>'));
      $this.find('span.new').each(function (i, el) {
        setTimeout(function () {
          $(el).addClass('div_opacity');
        }, 10 * i);
      });
    });
  };

  function animateContent(direction) {
    var animationOffset = $('.home-content-place').height() - $('.home').height();

    if (direction == 'up') {
      animationOffset = 0;
    }

    $('.home').animate({
      "marginTop": animationOffset + "px"
    }, 2000);
  }
})(jQuery);

/***/ }),

/***/ 3:
/*!************************************!*\
  !*** multi ./resources/js/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/home.js */"./resources/js/home.js");


/***/ })

/******/ });