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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/profile.js":
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    $('.deleteReview').click(function () {
      var id = $(this).data("reviewId");
      var name = $(this).data("reviewName");
      console.log(name);
      var url = $("#deleteReviewForm").data('action');
      url = url.replace(':id', id);
      $("#deleteReviewForm").attr('action', url);
      setModalData(name);
    });
    $('.deleteComment').click(function () {
      var id = $(this).data("reviewId");
      console.log(id);
      var url = $("#deleteCommentForm").data('action');
      url = url.replace(':id', id);
      $("#deleteCommentForm").attr('action', url);
    });
    $('#editReview').click(function () {
      var name = $(this).data("reviewName");
      setModalData(name);
    });
    $('[id^="enableEditCommentButton"]').click(function () {
      var editForm = $(this).data('form');
      $('#' + editForm).find('textarea').each(function () {
        $(this).prop("disabled", false);
      });
      $(this).parent().find('[id^="saveCommentButton"]').show();
      $(this).parent().find('[id^="cancelSaveCommentButton"]').show();
    });
    $('[id^="saveCommentButton"]').click(function () {
      var saveForm = $(this).data('form');
      $("#" + saveForm).submit();
    });
    $('[id^="cancelSaveCommentButton"]').click(function () {
      var cancelForm = $(this).data('form');
      $('#' + cancelForm).find('textarea').each(function () {
        $(this).prop("disabled", true);
      });
      $(this).parent().find('[id^="saveCommentButton"]').hide();
      $(this).parent().find('[id^="cancelSaveCommentButton"]').hide();
    }); // $('#confirmReviewButton').click(function(){
    //     console.log('confirmReviewButton');
    //     console.log($('[id^="ReviewForm"]'));
    //     $('[id^="ReviewForm"]').submit();
    // });

    $(function () {
      $(".datepicker").datepicker({
        minDate: 0
      });
    });
    $('#imgBanner').change(function () {
      readURL(this);
    });
    $("#bannerButton").click(function (event) {
      var form = $("#bannerForm");

      if ($('#bannerCategory option:selected').val() == '') {
        $('#bannerCategory').addClass('invalid-selector');
      } else {
        $('#bannerCategory').removeClass("invalid-selector");
      }

      if ($('#imgBanner').val() == '') {
        $('.bannerFileUpload').addClass('invalid-selector');
      } else {
        $('.bannerFileUpload').removeClass("invalid-selector");
      }

      validation(form, event);
    });
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  function setModalData(name) {
    $("#reviewName").text(name);
  }

  var validation = function validation(form, event) {
    // let allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
    // let checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
    // let isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;
    // if(isCheckPassInvalid){
    //     $('#password, #new-password').addClass('invalid-input');
    // } else {
    //     $('#password, #new-password').removeClass('invalid-input');
    // }
    // if(isExistBadWords){
    //     // alert('Your review contain Bad Words! You must delete Bad Words!');
    //     $('#errorBadWords').modal('show');
    // }
    //
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.addClass('was-validated');
  };

  $('[id^="profileComplaintButton"]').click(function (event) {
    var review = $(this).parent().parent();
    var complains = review.find('.complain');
    complains.each(function (index) {
      if ($(this).text().trim()) {
        $(this).toggle(750);
        $(this).css('display', 'flex');
      }
    });
    $(this).text().trim() !== 'Close' ? $(this).text('Close') : $(this).text('Complains (' + $(this).data('complains') + ')');
  });
})(jQuery);

/***/ }),

/***/ 5:
/*!***************************************!*\
  !*** multi ./resources/js/profile.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OServer\OSPanel\domains\reviews.loc\resources\js\profile.js */"./resources/js/profile.js");


/***/ })

/******/ });