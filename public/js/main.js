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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  var isCheckedTermOfCondition = true;
  var isCheckedYearsOld = true;
  var isExistBadWords = false;
  var isSubmitFormAccept = true;
  setTimeout(function () {
    $('.close').click();
  }, 3000);
  $(document).ready(function () {
    $(".submitLoginButton").click(function (event) {
      var form = $("#loginForm");
      validation(form, event);
    });
    $(".submitChangePassButton").click(function (event) {
      var form = $("#changePassForm");
      validation(form, event);
    });
    $(".submitRegisterButton").click(function (event) {
      var form = $("#registerForm");
      isCheckedTermOfCondition = $('#confirmTermOfConditions').is(':checked');
      isCheckedTermOfCondition ? $('#confirmTermOfConditions').removeClass('invalid-checkbox') : $('#confirmTermOfConditions').addClass('invalid-checkbox');
      isCheckedYearsOld = $('#confirmYearsOld').is(':checked');
      isCheckedYearsOld ? $('#confirmYearsOld').removeClass('invalid-checkbox') : $('#confirmYearsOld').addClass('invalid-checkbox');
      validation(form, event);
    });
    $(".submitReviewButton").click(function (event) {
      var form = $("#createReviewForm").length > 0 ? $("#createReviewForm") : $("#editReviewForm");
      isExistBadWords = form.find('mark').length ? true : false;
      isSubmitFormAccept = $('#submitFormAccept').val() > 0 ? true : false;

      if (!isSubmitFormAccept) {
        $('#acceptFormModal').modal('show');
      }

      validation(form, event);
    });
    $('.slider__item').click(function () {
      $('#addPostRedirect').modal('show');
    });
    $('#acceptModal').click(function () {
      $('#submitFormAccept').val(1);
      $('#acceptFormModal').modal('hide');
    });
    $(".submitTouchInfoButton").click(function (event) {
      var form = $("#sendTouchInfo");
      validation(form, event);
    }); //Choosing region after country

    $('#selectCountry').change(function () {
      $.ajax({
        url: "/ajax/regions/" + this.value,
        dataType: "json",
        success: function success(data) {
          $('#registerLabel').text(data[0].region_naming);
          $('#selectRegion').empty();

          for (var k in data) {
            $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
          }
        }
      });
      $('#selectRegion').removeAttr("disabled");
    }); //Choosing region after country

    $('#selectCategoryGood').change(function () {
      $.ajax({
        url: "/ajax/groups/" + this.value,
        dataType: "json",
        success: function success(data) {
          $('#selectGroup').empty();

          for (var k in data) {
            $('#selectGroup').prepend('<option value="' + data[k].id + '">' + data[k].name + '</option>');
          }
        }
      });
      $('#selectGroup').removeAttr("disabled");
    });
    $('#enableInputsButton').click(function () {
      var editForm = $(this).data('form');
      $('#' + editForm + ' input, textarea').each(function () {
        $(this).prop("disabled", false);
      });
    });
    $('#editProfileButton').click(function () {
      $('#personalForm input').each(function () {
        $(this).prop("disabled", false);
      });
      $('#selectCountry').prop("disabled", false);
      $('#cancelButton').prop("disabled", false);
      $('#saveButton').prop("disabled", false);
    });
    $("#password, #new-password").on('keyup', ValidatePassword);
    $("#password, #new-password").focus(function () {
      $('#password-rules').show();
    }).blur(function () {
      $('#password-rules').hide();
    }); // console.log($('#selectCountry').attr('data-country'));

    if ($('#selectCountry') !== null && $('#selectCountry').length && $('#selectCountry').attr('data-country').length) {
      $.ajax({
        url: "/ajax/regions/" + $('#selectCountry').attr('data-country'),
        dataType: "json",
        success: function success(data) {
          $('#registerLabel').text(data[0].region_naming);
          $('#selectRegion').empty();

          for (var k in data) {
            $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
          }

          $('#selectCountry option[value=' + $('#selectCountry').attr('data-country') + ']').prop('selected', true);
          $('#selectRegion').removeAttr("disabled");
          $('#selectRegion option[value=' + $('#selectRegion').attr('data-region') + ']').prop('selected', true);
        }
      });
    }

    if ($("#review-create-text, #review-text").length) {
      var badWords = [];
      $.ajax({
        url: "/ajax/bad-words",
        dataType: "json",
        success: function success(data) {
          badWords = data;
          $('#review-create-text, #review-text').highlightWithinTextarea({
            highlight: badWords,
            className: 'red'
          });
        },
        error: function error() {
          $('#review-create-text, #review-text').highlightWithinTextarea({
            highlight: [],
            className: 'red'
          });
        }
      });
    }
  });

  var validation = function validation(form, event) {
    var allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
    var checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
    var isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;

    if (isCheckPassInvalid) {
      $('#password, #new-password').addClass('invalid-input');
    } else {
      $('#password, #new-password').removeClass('invalid-input');
    }

    if (isExistBadWords) {
      // alert('Your review contain Bad Words! You must delete Bad Words!');
      $('#errorBadWords').modal('show');
    }

    if (form[0].checkValidity() === false || isCheckPassInvalid || !isCheckedTermOfCondition || !isCheckedYearsOld || isExistBadWords || !isSubmitFormAccept) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.addClass('was-validated');
  };
  /*Actual validation function*/


  function ValidatePassword() {
    /*Array of rules and the information target*/
    var rules = [{
      Pattern: "[A-Z]",
      Target: "UpperCase"
    }, {
      Pattern: "[a-z]",
      Target: "LowerCase"
    }, {
      Pattern: "[0-9]",
      Target: "Numbers"
    }, {
      Pattern: "[!@@#$%^&*]",
      Target: "Symbols"
    }]; //Just grab the password once

    var password = $(this).val();
    /*Length Check, add and remove class could be chained*/

    /*I've left them seperate here so you can see what is going on */

    /*Note the Ternary operators ? : to select the classes*/

    $("#Length").prop('checked', password.length > 7 ? true : false);

    for (var i = 0; i < rules.length; i++) {
      $("#" + rules[i].Target).prop('checked', new RegExp(rules[i].Pattern).test(password) ? true : false);
    }

    var allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
    var checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
    var isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;

    if (isCheckPassInvalid) {
      $('#password, #new-password').addClass('invalid-input');
    } else {
      $('#password, #new-password').removeClass('invalid-input');
    }
  }
})(jQuery);

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OServer\OSPanel\domains\reviews.loc\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });