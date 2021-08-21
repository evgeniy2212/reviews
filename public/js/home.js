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
    console.log('document.getElementById(audio): ', document.getElementById('audio')); // consol.log('slider: ', slider);
    // var myAudio = $("#audio")[0];
    // myAudio.play();

    var loaded = sessionStorage.getItem('loaded');
    sessionStorage.setItem('loaded', true); // $('.home *').show();
    // if(loaded !== 'true') {

    $('.nav-gradient').addClass('nav-first-menu-showing');
    $('.navigate li a').addClass('first-menu-showing');

    for (var i = 0; i <= 2; i++) {
      setTimeout(function () {
        // if(i >= 1){
        //     setTimeout(function(){
        //         $('.nav-gradient').removeClass('nav-first-menu-showing');
        //     }, 1000);
        // }
        $('.navigate li a').each(function (i) {
          $(this).delay(250 * i).fadeTo(200, 1);
          $(this).delay(200 * i).not(".menu-active a").fadeTo(100, 0);
        });
      }, 2250 * i);
    }

    setTimeout(function () {
      $('.nav-gradient').removeClass('nav-first-menu-showing');
    }, 7500);
    setTimeout(function () {
      $('.navigate li a').removeClass('first-menu-showing');
    }, 22500); // setTimeout(function(){
    //     $('.home .home-main-content').fadeTo( 1000, 1 );
    // }, 4000);

    setTimeout(function () {
      $('.home .home-title').each(function (index) {
        var $this = $(this);
        setTimeout(function () {
          $this.delay(750 * index).fadeTo(250, 1).fadeTo(250, 0).fadeTo(250, 1).fadeTo(250, 0).fadeTo(250, 1).fadeTo(250, 0).fadeTo(250, 1);
        }, 34000 * index);
      });
    }, 7500);
    setTimeout(function () {
      var mainContentDelay = 0;
      $('.home-main-content').each(function (index) {
        var item = $(this);
        $("#audio")[0].play();
        setTimeout(function () {
          $("#audio")[0].play();
          item.parent().fadeTo(250, 1);
          item.fadeTo(250, 1);
          item.animate_Text();

          if ($('.home').height() > $('.home-content-place').height()) {
            animateContent('down');
          }
        }, mainContentDelay);
        mainContentDelay = item.text().length * 3 + mainContentDelay;
      });
    }, 9500);
    setTimeout(function () {
      $('.home-point img').each(function (index) {
        $(this).delay(250 * (index + 1)).fadeTo(200, 1);
      });
    }, 12000);
    setTimeout(function () {
      $('.home .home-point-title').each(function (index) {
        if ($('.home').height() > $('.home-content-place').height()) {
          animateContent('down');
        }

        if (index > 0) {
          $(this).delay(1250 * index).fadeTo(250, 1).fadeTo(250, 0).fadeTo(250, 1).fadeTo(250, 0).fadeTo(250, 1);
        } else {
          $(this).delay(1250 * index) // .fadeTo( 500, 1 )
          // .fadeTo( 500, 0 )
          // .fadeTo( 500, 1 )
          // .fadeTo( 500, 0 )
          .fadeTo(250, 1).fadeTo(250, 0).fadeTo(250, 1).fadeTo(250, 0).fadeTo(250, 1);
        }
      });
    }, 16000);
    setTimeout(function () {
      if ($('.home').height() > $('.home-content-place').height()) {
        animateContent('up');
      }

      var delay = 0;
      $('.home-point-show').each(function (index) {
        var item = $(this);
        $("#audio")[0].play();
        setTimeout(function () {
          $("#audio")[0].play();
          item.parent().fadeTo(500, 1);
          item.fadeTo(250, 1);
          item.animate_Text();

          if ($('.home').height() > $('.home-content-place').height()) {
            console.log('index: ', index);

            if (index >= 10) {
              animateContent('down', 7 * (index - 9), 300);
            } else if (index <= 1) {} else {
              animateContent('down');
            }
          }
        }, delay);
        delay = item.text().length * 3 + delay;
      });
      setTimeout(function () {
        if ($('.home').height() > $('.home-content-place').height()) {
          animateContent('up');
        }
      }, delay + 2000);
      setTimeout(function () {
        // if(localStorage.getItem('hideAlert') == 'false'){
        $("#instructionModal").modal('show'); // }
      }, delay + 2500);
    }, 31000); // } else {
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
        }, 3 * i);
      });
    });
  };

  function animateContent(direction) {
    var inputAddingHeight = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    var animateSpeed = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 500;
    var animationOffset = $('.home-content-place').height() - $('.home').height();

    if (direction == 'up') {
      animationOffset = 0;
    }

    $('.home').animate({
      "marginTop": animationOffset - inputAddingHeight + "px"
    }, animateSpeed);
  }
})(jQuery);

/***/ }),

/***/ 3:
/*!************************************!*\
  !*** multi ./resources/js/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OpenServer\domains\reviews.loc\resources\js\home.js */"./resources/js/home.js");


/***/ })

/******/ });