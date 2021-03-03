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
      readImageURL(this);
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
    $("#congratulationButton").click(function (event) {
      var form = $("#congratulationForm");

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

      if ($('#selectCategory option:selected').val() == '') {
        $('#selectCategory').addClass('invalid-selector');
      } else {
        $('#selectCategory').removeClass("invalid-selector");
      }

      validation(form, event);
    });
    $('#imgCongratulation').change(function () {
      readImageURL(this);
    });
    $('#videoCongratulation').change(function () {
      readVideoURL(this);
      $('.videoPreview').hide();
      $('.congratulationVideoPreview').show();
    });
    $('#imgDefaultCongratulation').click(function () {
      $('.congratulationContentContainer').hide();
      $('.congratulationDefaultImagesContainer').css('display', 'flex');
    });
    $('#imgCongratulation, #videoCongratulation').click(function () {
      $('.congratulationContentContainer').css('display', 'flex');
      $('.congratulationDefaultImagesContainer').hide();
    });
    $('#imgDefaultCongratulationClose').click(function () {
      $('.congratulationContentContainer').css('display', 'flex');
      $('.congratulationDefaultImagesContainer').hide();
      var src = '';

      if ($('#imgCongratulation').data('src') === '') {
        src = $('#blah').data('defaultSrc');
      } else {
        src = $('#imgCongratulation').data('src');
      }

      $('#blah').attr('src', src);
      $('#blah').data('src', src);
    });
    $('#imgDefaultCongratulationSave').click(function () {
      $('.congratulationContentContainer').css('display', 'flex');
      $('.congratulationDefaultImagesContainer').hide();
      var src = $('.congratulationDefaultImages .congratulationHighlight').find('img').attr('src');
      var saveImage = $('.congratulationDefaultImages .congratulationHighlight').find('img').data('imageid');
      $('#imgDefaultCongratulationValue').val(saveImage);
      $('#blah').attr('src', src);
      $('#blah').data('src', src);
      $('#blah').data('defaultSrc', src);
      $('#imgCongratulation').val('');
      $('#imgCongratulation').data('src', '');
      var uploadingImageInput = $('#imgCongratulation').parent().find('span');
      uploadingImageInput.text(uploadingImageInput.data('placeholder'));
    });
    $(".congratulationDefaultImagePreview").hover(function () {
      $('#blah').attr('src', $(this).find('img').attr('src'));
    }, function () {
      $('#blah').attr('src', $('#blah').data('src'));
    });
    $('.congratulationDefaultImagePreview').click(function () {
      var $this = $(this); // Clear formatting

      $('.congratulationDefaultImagePreview').removeClass('congratulationHighlight'); // Highlight with coloured border

      $this.addClass('congratulationHighlight');
      var src = $(this).find('img').attr('src');
      $('#blah').attr('src', src);
      $('#blah').data('src', src);
    });
    $('.congratulationDefaultImages').click(function () {
      $('.congratulationContentContainer').hide();
      $('.congratulationDefaultImagesContainer').css('display', 'flex');
    });
    $("#importantDateButton").click(function (event) {
      var form = $("#importantDateForm");

      if ($('#importantDateType option:selected').val() == '') {
        $('#importantDateType').addClass('invalid-selector');
      } else {
        $('#importantDateType').removeClass("invalid-selector");
      }

      if ($('[name^="important_date_reminds"]:checkbox:checked').length == 0) {
        $('#selectBox select').addClass('invalid-selector');
      } else {
        $('#selectBox select').removeClass("invalid-selector");
      }

      validation(form, event);
    });
    $('.checkImportantDate').change(function () {
      if ($(".profile-single-important-date input[type=checkbox]:checked").length > 0) {
        $("#deleteImportantDates").prop("disabled", false);
      } else {
        $("#deleteImportantDates").prop("disabled", true);
      }
    });
    $("#deleteImportantDates").click(function (event) {
      var deleteImportants = [];
      $(".profile-single-important-date input[type=checkbox]:checked").each(function () {
        deleteImportants.push($(this).val());
      });

      if (deleteImportants.length > 0) {
        $.ajax({
          type: "POST",
          url: "profile-important-dates-delete",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            dates: deleteImportants
          },
          success: function success(data) {
            location.reload();
          }
        });
      }
    });
    var expanded = false;
    $("#selectBox").click(function (event) {
      var checkboxes = document.getElementById("checkboxes");

      if (!expanded) {
        checkboxes.style.display = "flex";
        expanded = true;
      } else {
        checkboxes.style.display = "none";
        expanded = false;
      }
    });
    $("#importantDateRemindsButton .otherButton").click(function (event) {
      event.preventDefault();
      var checkboxes = document.getElementById("checkboxes");
      checkboxes.style.display = "none";
      expanded = false;
    });
  });

  function readImageURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
        $('#blah').data('src', e.target.result);
        $('#imgCongratulation').data('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  function readVideoURL(input) {
    var $source = $('#videoPreview');
    $source[0].src = URL.createObjectURL(input.files[0]);
    $source.parent()[0].load();
  }

  function setModalData(name) {
    $("#reviewName").text(name);
  }

  var validation = function validation(form, event) {
    console.log(form, form[0].checkValidity());

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

module.exports = __webpack_require__(/*! /var/www/resources/js/profile.js */"./resources/js/profile.js");


/***/ })

/******/ });