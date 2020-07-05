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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/ticker.js":
/*!********************************!*\
  !*** ./resources/js/ticker.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  // var reloaded  = function(){...} //страницу перезагрузили
  window.onload = function () {
    var loaded = sessionStorage.getItem('loaded');
    console.log('Loaded: ', sessionStorage.getItem('loaded'));
    sessionStorage.setItem('loaded', true); // $('.navigate li a').not(".menu-active a").delay(1000).fadeTo( "slow", 0 );

    if (loaded) {
      // $('.navigate li a').css("visibility", "hidden");
      $('.navigate li a').each(function (i) {
        $(this).delay(700 * i).fadeTo(500, 1);
        $(this).delay(350 * i).not(".menu-active a").fadeTo(300, 0);
      });
    } else {
      console.log('RELOADED!!!!!!!!');
    }
  };

  function printed_el_text(el) {
    console.log('printed_el_text text: ', el.text(), el.text().length);

    var text = el.text(),
        i = 0,
        __print = function __print() {
      i++;

      if (i <= text.length) {
        el.text(text.substr(0, i));
        setTimeout(__print, 70);
      }
    };

    __print();
  }

  ;
  $(document).ready(function () {// var CharTimeout = 50; // скорость печатания
    // var StoryTimeout = 200; // время ожидания перед переключением
    //
    // var Summaries = new Array();
    // var SiteLinks = new Array();
    //
    // Summaries[0] = 'Плагин Webmaster Yandex для WordPress';
    // SiteLinks[0] = 'http://wp-kama.ru/?p=4015';
    // Summaries[1] = 'Kama Thumbnail: плагин WordPress для создание картинок-миниатюр записи';
    // SiteLinks[1] = 'http://wp-kama.ru/id_142/kama-thumbnail.html';
    // Summaries[2] = 'Настраиваем robots.txt для WordPress';
    // SiteLinks[2] = 'http://wp-kama.ru/id_803/pishem-pravilnyiy-robotstxt-dlya-wordpress.html';
    // Summaries[3] = 'WP-Cumulus: 3D облако меток на flash (улучшенная русская версия)';
    // SiteLinks[3] = 'http://wp-kama.ru/?p=4271';
    // Summaries[4] = 'Плагин для защиты от спама в комментариях WordPress';
    // SiteLinks[4] = 'http://wp-kama.ru/id_95/plagin-dlya-blokirovki-spama-v-kommentariyah-dlya-wordpress.html';
    // Summaries[5] = 'Плагин для легкого управления сайтом на WordPress (версия 3)';
    // SiteLinks[5] = 'http://wp-kama.ru/id_127/plagin-dlya-legkogo-upravleniya-saytom-na-wordpress-versiya-3.html';
    // Summaries[6] = 'Автоматическое растягивание textarea на javascript и jQuery';
    // SiteLinks[6] = 'http://wp-kama.ru/id_112/avtomaticheskoe-rastyagivanie-polya-textarea-kommentariya-versiya-2.html';
    //
    // /* Печатание текста - Тиккер
    // ----------------------------------------------------------------
    // var CharTimeout = 20;
    // var StoryTimeout = 7000;
    // var Summaries = new Array();
    // var SiteLinks = new Array();
    //     Summaries[0] = "CMS для простых сайтов GetSimple на русском языке";
    //     SiteLinks[0] = "#link1";
    //     Summaries[1] = "Spectrum - шикарная тема для WordPress на русском языке";
    //     SiteLinks[1] = "#link2";
    // startTicker();
    // */
    //
    // function startTicker(){
    //     massiveItemCount =  Number(Summaries.length); //количество элементов массива
    //     // Определяем значения запуска
    //     CurrentStory     = -1;
    //     CurrentLength    = 0;
    //     // Расположение объекта
    //     AnchorObject     = document.getElementById("Ticker");
    //     runTheTicker();
    // }
    // // Основной цикл тиккера
    // function runTheTicker(){
    //     var myTimeout;
    //     // Переход к следующему элементу
    //     if(CurrentLength == 0){
    //         CurrentStory++;
    //         CurrentStory      = CurrentStory % massiveItemCount;
    //         StorySummary      = Summaries[CurrentStory].replace(/"/g,'-');
    //         AnchorObject.href = SiteLinks[CurrentStory];
    //     }
    //     // Располагаем текущий текст в анкор с печатанием
    //     AnchorObject.innerHTML = StorySummary.substring(0,CurrentLength) + znak();
    //     // Преобразуем длину для подстроки и определяем таймер
    //     if(CurrentLength != StorySummary.length){
    //         CurrentLength++;
    //         myTimeout = CharTimeout;
    //     } else {
    //         CurrentLength = 0;
    //         myTimeout = StoryTimeout;
    //     }
    //     // Повторяем цикл с учетом задержки
    //     setTimeout(runTheTicker, myTimeout);
    // }
    // // Генератор подстановки знака
    // function znak(){
    //     if(CurrentLength == StorySummary.length) return "";
    //     else return "";
    // }
    //
    // startTicker();
  });
})(jQuery);

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/ticker.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OServer\OSPanel\domains\reviews.loc\resources\js\ticker.js */"./resources/js/ticker.js");


/***/ })

/******/ });