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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

var imagesPreview = function imagesPreview(input, placeToInsertImagePreview) {
  placeToInsertImagePreview.empty();

  if (input.files) {
    var filesAmount = input.files.length;

    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();

      reader.onload = function (event) {
        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
      };

      reader.readAsDataURL(input.files[i]);
    }
  }
};

var copyToClipboard = function copyToClipboard(str) {
  var el = document.createElement('textarea'); // Create a <textarea> element

  el.value = str; // Set its value to the string that you want copied

  el.setAttribute('readonly', ''); // Make it readonly to be tamper-proof

  el.style.position = 'absolute';
  el.style.left = '-9999px'; // Move outside the screen to make it invisible

  document.body.appendChild(el); // Append the <textarea> element to the HTML document

  var selected = document.getSelection().rangeCount > 0 // Check if there is any content selected previously
  ? document.getSelection().getRangeAt(0) // Store selection if found
  : false; // Mark as false to know no selection existed before

  el.select(); // Select the <textarea> content

  document.execCommand('copy'); // Copy - only works as a result of a user action (e.g. click events)

  document.body.removeChild(el); // Remove the <textarea> element

  if (selected) {
    // If a selection existed before copying
    document.getSelection().removeAllRanges(); // Unselect everything on the HTML document

    document.getSelection().addRange(selected); // Restore the original selection
  }
};

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover();
});

/***/ }),

/***/ "./resources/sass/front.sass":
/*!***********************************!*\
  !*** ./resources/sass/front.sass ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/front.sass ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Volumes/DATA/a/courier/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Volumes/DATA/a/courier/resources/sass/front.sass */"./resources/sass/front.sass");


/***/ })

/******/ });