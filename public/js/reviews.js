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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/reviews.js":
/*!*********************************!*\
  !*** ./resources/js/reviews.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    // Rating stars options
    var options = {
      max_value: 5,
      step_size: 1,
      initial_value: 0,
      selected_symbol_type: 'utf8_star',
      // Must be a key from symbols
      cursor: 'default',
      readonly: false,
      change_once: false // Determines if the rating can only be set once
      // ajax_method: 'POST',
      // url: 'http://localhost/test.php',
      // additional_data: {} // Additional data to send to the server

    };
    $(".rating").rate(options);
    $(".submitReviewButton").click(function (event) {
      // console.log($('#selectRegion option:selected').length);
      // console.log($('#selectRegion option:selected').val() == '');
      if ($('#selectRegion option:selected').val() == '') {
        $('#selectRegion').addClass('invalid-selector');
      } else {
        $('#selectRegion').removeClass("invalid-selector");
      }

      if ($('#selectCountry option:selected').val() == '') {
        $('#selectCountry').addClass('invalid-selector');
      } else {
        $('#selectCountry').removeClass("invalid-selector");
      }
    });
    $(".like-reaction").click(function (event) {
      // var liked = sessionStorage.getItem('liked');
      // var disliked = sessionStorage.getItem('disliked');
      // var likeReaction = sessionStorage.getItem('likeReaction'+this.id);
      var wasReaction = sessionStorage.getItem('wasReaction' + this.id); // var dislikeReaction = sessionStorage.getItem('dislikeReaction'+this.id);
      // console.log('Loaded: ', sessionStorage.getItem('loaded'));

      var $label = $("label[for='" + this.id + "']");
      var $id = $(this).data('reviewId');
      var $reaction = $(this).data('reactionName');
      console.log($reaction, wasReaction);

      if (wasReaction !== 'true') {
        // if($reaction == 'like'){
        $label.text(Number.parseInt($label.text()) + 1);
        sessionStorage.setItem('wasReaction' + this.id, true); // }
      } else if (wasReaction == 'true') {
        // if($reaction == 'like'){
        $label.text(Number.parseInt($label.text()) - 1);
        sessionStorage.setItem('wasReaction' + this.id, false); // }
      }

      console.log($(this).data('reactionName'));
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type: 'POST',
        url: '/ajax/review-reaction',
        data: {
          _token: CSRF_TOKEN,
          reaction: $(this).data('reactionName'),
          value: Number.parseInt($label.text()),
          id: $id
        },
        success: function success(data) {
          console.log(data);
        } // url : "/ajax/regions/" + this.value,
        // dataType:"json",
        // success:function(data)
        // {
        //     $('#registerLabel').text(data[0].region_naming);
        //     $('#selectRegion').empty();
        //     for(var k in data) {
        //         $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
        //     }
        // }

      }); // if($reaction == 'like' && wasReaction !== 'true'){
      //     $label.text(Number.parseInt($label.text()) + 1);
      //     sessionStorage.setItem('likeReaction'+this.id, true);
      // } else if($reaction == 'like' && likeReaction == 'true') {
      //     $label.text(Number.parseInt($label.text()) - 1);
      //     sessionStorage.setItem('likeReaction'+this.id, false);
      // }
      //
      // if($reaction == 'dislike' && likeReaction !== 'true' && dislikeReaction !== 'true'){
      //     $label.text(Number.parseInt($label.text()) + 1);
      //     sessionStorage.setItem('dislikeReaction'+this.id, true);
      // } else if($reaction == 'dislike' && dislikeReaction == 'true'){
      //     $label.text(Number.parseInt($label.text()) - 1);
      //     sessionStorage.setItem('dislikeReaction'+this.id, false);
      // }

      console.log('set reaction: ', $reaction, wasReaction, $label); // console.log($(this).attr('id'), $(this).data('reviewId'), );
      // $(this).attr('id');data-review-id
    });
  });
})(jQuery);

/***/ }),

/***/ 4:
/*!***************************************!*\
  !*** multi ./resources/js/reviews.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OServer\OSPanel\domains\reviews.loc\resources\js\reviews.js */"./resources/js/reviews.js");


/***/ })

/******/ });