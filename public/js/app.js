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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

var spinnerIcon = '<i class="fas fa-spinner fa-spin gray"></i>';
var successIcon = '<i class="fas fa-check green"></i>';
var failIcon = '<i class="fas fa-exclamation red"></i>';

var typingTimer;
var value;
var $input;

$('.check-value').on('keyup', function () {
    clearTimeout(typingTimer);
    var $this = $(this);
    $(this).next().hide();
    typingTimer = setTimeout(function () {
        doneTyping($this);
    }, 1000);
});

$('.check-value').on('keydown', function () {
    clearTimeout(typingTimer);
});

function doneTyping($input) {
    value = $input.val();
    $input.next().html(spinnerIcon);
    $input.next().show();
    $.ajax({
        method: 'GET',
        url: 'ajax/username/' + value,
        data: { value: value }
    }).done(function (msg) {
        $input.next().html(successIcon);
    });
}

// $('#email').on('keyup', function(e) {
//     e.stopPropagation();
//     var $this = $(this);
//     var value = $(this).val();
//     if (value != '' && value.length > 1) {
//         setTimeout(function() {
//             $this.next().show();
//             $.ajax({
//                 method: 'GET',
//                 url: 'ajax/username/' + value,
//                 data: { value: value }
//             })
//                 .done(function( msg ) {
//                     alert( "Data Saved: " + msg.status );
//             });
//         }, 500);
//     } else {
//         $this.next().hide();
//     }
// });

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);