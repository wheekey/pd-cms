(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Dashboard_Index_js"],{

/***/ "./resources/js/Pages/Dashboard/Index.js":
/*!***********************************************!*\
  !*** ./resources/js/Pages/Dashboard/Index.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-react */ "./node_modules/@inertiajs/inertia-react/dist/index.js");
/* harmony import */ var _Shared_Layout__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Shared/Layout */ "./resources/js/Shared/Layout.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");






var Dashboard = function Dashboard() {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("h1", {
      className: "mb-8 text-3xl font-bold",
      children: "Dashboard"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("p", {
      className: "mb-12 leading-normal",
      children: ["Hey there! Welcome to Ping CRM, a demo app designed to help illustrate how", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("a", {
        className: "mx-1 text-indigo-600 underline hover:text-orange-500",
        href: "https://inertiajs.com",
        children: "Inertia.js"
      }), "works with", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("a", {
        className: "ml-1 text-indigo-600 underline hover:text-orange-500",
        href: "https://reactjs.org/",
        children: "React"
      }), "."]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
        className: "mr-1 btn-indigo",
        href: "/500",
        children: "500 error"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
        className: "btn-indigo",
        href: "/404",
        children: "404 error"
      })]
    })]
  });
}; // Persistent layout
// Docs: https://inertiajs.com/pages#persistent-layouts


Dashboard.layout = function (page) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_Shared_Layout__WEBPACK_IMPORTED_MODULE_2__.default, {
    title: "Dashboard",
    children: page
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Dashboard);

/***/ }),

/***/ "./resources/js/Shared/BottomHeader.js":
/*!*********************************************!*\
  !*** ./resources/js/Shared/BottomHeader.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-react */ "./node_modules/@inertiajs/inertia-react/dist/index.js");
/* harmony import */ var _Icon__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Icon */ "./resources/js/Shared/Icon.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr && (typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]); if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }






/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function () {
  var auth = (0,_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.usePage)().props.auth;

  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false),
      _useState2 = _slicedToArray(_useState, 2),
      menuOpened = _useState2[0],
      setMenuOpened = _useState2[1];

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
    className: "flex items-center justify-between w-full p-4 text-sm bg-white border-b md:py-0 md:px-12 d:text-md",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      className: "mt-1 mr-4",
      children: "Postel Deluxe"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
      className: "relative",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
        className: "flex items-center cursor-pointer select-none group",
        onClick: function onClick() {
          return setMenuOpened(true);
        },
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
          className: "mr-1 text-gray-800 whitespace-nowrap group-hover:text-indigo-600 focus:text-indigo-600",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("span", {
            children: auth.user.name
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_Icon__WEBPACK_IMPORTED_MODULE_2__.default, {
          className: "w-5 h-5 text-gray-800 fill-current group-hover:text-indigo-600 focus:text-indigo-600",
          name: "cheveron-down"
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
        className: menuOpened ? '' : 'hidden',
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
          className: "absolute top-0 right-0 left-auto z-20 py-2 mt-8 text-sm whitespace-nowrap bg-white rounded shadow-xl",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
            href: route('users.edit', auth.user.id),
            className: "block px-6 py-2 hover:bg-indigo-600 hover:text-white",
            onClick: function onClick() {
              return setMenuOpened(false);
            },
            children: "My Profile"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
            href: route('users'),
            className: "block px-6 py-2 hover:bg-indigo-600 hover:text-white",
            onClick: function onClick() {
              return setMenuOpened(false);
            },
            children: "Manage Users"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
            as: "button",
            href: route('logout'),
            className: "block w-full px-6 py-2 text-left focus:outline-none hover:bg-indigo-600 hover:text-white",
            method: "post",
            children: "Logout"
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
          onClick: function onClick() {
            setMenuOpened(false);
          },
          className: "fixed inset-0 z-10 bg-black opacity-25"
        })]
      })]
    })]
  });
});

/***/ }),

/***/ "./resources/js/Shared/FlashMessages.js":
/*!**********************************************!*\
  !*** ./resources/js/Shared/FlashMessages.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-react */ "./node_modules/@inertiajs/inertia-react/dist/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr && (typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]); if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }







var IconSuccess = function IconSuccess() {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("svg", {
    className: "ml-4 mr-2 flex-shrink-0 w-4 h-4 text-white fill-current",
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 20 20",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("polygon", {
      points: "0 11 2 9 7 14 18 3 20 5 7 18"
    })
  });
};

var IconDanger = function IconDanger() {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("svg", {
    className: "ml-4 mr-2 flex-shrink-0 w-4 h-4 text-white fill-current",
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 20 20",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("path", {
      d: "M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z"
    })
  });
};

var ButtonClose = function ButtonClose(_ref) {
  var color = _ref.color,
      onClick = _ref.onClick;
  var className = classnames__WEBPACK_IMPORTED_MODULE_2___default()('block  w-2 h-2 fill-current', {
    'text-red-700 group-hover:text-red-800': color === 'red',
    'text-green-700 group-hover:text-green-800': color === 'green'
  });
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("button", {
    onClick: onClick,
    type: "button",
    className: "focus:outline-none group mr-2 p-2",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      width: "235.908",
      height: "235.908",
      viewBox: "278.046 126.846 235.908 235.908",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("path", {
        d: "M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
      })
    })
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function () {
  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(true),
      _useState2 = _slicedToArray(_useState, 2),
      visible = _useState2[0],
      setVisible = _useState2[1];

  var _usePage$props = (0,_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.usePage)().props,
      flash = _usePage$props.flash,
      errors = _usePage$props.errors;
  var numOfErrors = Object.keys(errors).length;
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    setVisible(true);
  }, [flash, errors]);
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
    children: [flash.success && visible && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
      className: "mb-8 flex items-center justify-between bg-green-500 rounded max-w-3xl",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
        className: "flex items-center",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(IconSuccess, {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
          className: "py-4 text-white text-sm font-medium",
          children: flash.success
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(ButtonClose, {
        onClick: function onClick() {
          return setVisible(false);
        },
        color: "green"
      })]
    }), (flash.error || numOfErrors > 0) && visible && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
      className: "mb-8 flex items-center justify-between bg-red-500 rounded max-w-3xl",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
        className: "flex items-center",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(IconDanger, {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
          className: "py-4 text-white text-sm font-medium",
          children: [flash.error && flash.error, numOfErrors === 1 && 'There is one form error', numOfErrors > 1 && "There are ".concat(numOfErrors, " form errors.")]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(ButtonClose, {
        onClick: function onClick() {
          return setVisible(false);
        },
        color: "red"
      })]
    })]
  });
});

/***/ }),

/***/ "./resources/js/Shared/Icon.js":
/*!*************************************!*\
  !*** ./resources/js/Shared/Icon.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function (_ref) {
  var name = _ref.name,
      className = _ref.className;

  if (name === 'apple') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      width: "100",
      height: "100",
      viewBox: "0 0 100 100",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("g", {
        fillRule: "nonzero",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
          d: "M46.173 19.967C49.927-1.838 19.797-.233 14.538.21c-.429.035-.648.4-.483.8 2.004 4.825 14.168 31.66 32.118 18.957zm13.18 1.636c1.269-.891 1.35-1.614.047-2.453l-2.657-1.71c-.94-.607-1.685-.606-2.532.129-5.094 4.42-7.336 9.18-8.211 15.24 1.597.682 3.55.79 5.265.328 1.298-4.283 3.64-8.412 8.088-11.534z"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
          d: "M88.588 67.75c9.65-27.532-13.697-45.537-35.453-32.322-1.84 1.118-4.601 1.118-6.441 0-21.757-13.215-45.105 4.79-35.454 32.321 5.302 15.123 17.06 39.95 37.295 29.995.772-.38 1.986-.38 2.758 0 20.235 9.955 31.991-14.872 37.295-29.995z"
        })]
      })
    });
  }

  if (name === 'book') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z"
      })
    });
  }

  if (name === 'check') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      xmlns: "http://www.w3.org/2000/svg",
      className: className,
      fill: "none",
      viewBox: "0 0 24 24",
      stroke: "currentColor",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        strokeLinecap: "round",
        strokeLinejoin: "round",
        strokeWidth: 2,
        d: "M5 13l4 4L19 7"
      })
    });
  }

  if (name === 'collection') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      xmlns: "http://www.w3.org/2000/svg",
      className: className,
      fill: "none",
      viewBox: "0 0 24 24",
      stroke: "currentColor",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        strokeLinecap: "round",
        strokeLinejoin: "round",
        strokeWidth: 2,
        d: "M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
      })
    });
  }

  if (name === 'badge-check') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      xmlns: "http://www.w3.org/2000/svg",
      className: className,
      fill: "none",
      viewBox: "0 0 24 24",
      stroke: "currentColor",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        strokeLinecap: "round",
        strokeLinejoin: "round",
        strokeWidth: 2,
        d: "M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
      })
    });
  }

  if (name === 'cheveron-down') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
      })
    });
  }

  if (name === 'cheveron-right') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("polygon", {
        points: "12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"
      })
    });
  }

  if (name === 'dashboard') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-5.6-4.29a9.95 9.95 0 0 1 11.2 0 8 8 0 1 0-11.2 0zm6.12-7.64l3.02-3.02 1.41 1.41-3.02 3.02a2 2 0 1 1-1.41-1.41z"
      })
    });
  }

  if (name === 'location') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
      })
    });
  }

  if (name === 'office') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      width: "100",
      height: "100",
      viewBox: "0 0 100 100",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        fillRule: "evenodd",
        d: "M7 0h86v100H57.108V88.418H42.892V100H7V0zm9 64h11v15H16V64zm57 0h11v15H73V64zm-19 0h11v15H54V64zm-19 0h11v15H35V64zM16 37h11v15H16V37zm57 0h11v15H73V37zm-19 0h11v15H54V37zm-19 0h11v15H35V37zM16 11h11v15H16V11zm57 0h11v15H73V11zm-19 0h11v15H54V11zm-19 0h11v15H35V11z"
      })
    });
  }

  if (name == 'printer') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M4 16H0V6h20v10h-4v4H4v-4zm2-4v6h8v-6H6zM4 0h12v5H4V0zM2 8v2h2V8H2zm4 0v2h2V8H6z"
      })
    });
  }

  if (name === 'shopping-cart') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M4 2h16l-3 9H4a1 1 0 1 0 0 2h13v2H4a3 3 0 0 1 0-6h.33L3 5 2 2H0V0h3a1 1 0 0 1 1 1v1zm1 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm10 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
      })
    });
  }

  if (name === 'store-front') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z"
      })
    });
  }

  if (name === 'trash') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"
      })
    });
  }

  if (name === 'users') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", {
      className: className,
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 20 20",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z"
      })
    });
  }

  return null;
});

/***/ }),

/***/ "./resources/js/Shared/Layout.js":
/*!***************************************!*\
  !*** ./resources/js/Shared/Layout.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Layout)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_helmet__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-helmet */ "./node_modules/react-helmet/es/Helmet.js");
/* harmony import */ var _MainMenu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./MainMenu */ "./resources/js/Shared/MainMenu.js");
/* harmony import */ var _FlashMessages__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./FlashMessages */ "./resources/js/Shared/FlashMessages.js");
/* harmony import */ var _TopHeader__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./TopHeader */ "./resources/js/Shared/TopHeader.js");
/* harmony import */ var _BottomHeader__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./BottomHeader */ "./resources/js/Shared/BottomHeader.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");








function Layout(_ref) {
  var title = _ref.title,
      children = _ref.children;
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(react_helmet__WEBPACK_IMPORTED_MODULE_1__.default, {
      titleTemplate: "%s | Ping CRM",
      title: title
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
      className: "flex flex-col",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
        className: "flex flex-col h-screen",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
          className: "md:flex",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_TopHeader__WEBPACK_IMPORTED_MODULE_4__.default, {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_BottomHeader__WEBPACK_IMPORTED_MODULE_5__.default, {})]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
          className: "flex flex-grow ",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_MainMenu__WEBPACK_IMPORTED_MODULE_2__.default, {
            className: "flex-shrink-0 hidden w-56 p-12 overflow-y-auto bg-indigo-800 md:block"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
            className: "w-full px-4 py-8 overflow-hidden overflow-y-auto md:p-12",
            children: children
          })]
        })]
      })
    })]
  });
}

/***/ }),

/***/ "./resources/js/Shared/Logo.js":
/*!*************************************!*\
  !*** ./resources/js/Shared/Logo.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

 // Original Logo
// export default props => (
//   <svg {...props} viewBox="0 0 1185 266" xmlns="http://www.w3.org/2000/svg">
//     <path d="M77.463 265c-19.497 0-35.318-15.405-35.318-34.39v-22.054C17.987 202.676 0 181.326 0 155.948V55.206C0 25.291 24.946 1 55.668 1h154.664C241.054 1 266 25.29 266 55.206v100.806c0 29.916-24.946 54.206-55.668 54.206H145.67c-2.823 0-5.383 1.407-6.827 3.58-10.7 17.067-24.158 31.897-39.98 43.915-6.236 4.794-13.654 7.287-21.4 7.287zM55.701 27.336c-15.771 0-28.65 12.465-28.65 27.87v100.806c0 15.342 12.813 27.87 28.65 27.87 7.49 0 13.536 5.881 13.536 13.168v33.624c0 4.922 4.272 7.99 8.214 7.99 1.709 0 3.286-.575 4.732-1.662 13.273-10.1 24.576-22.565 33.578-36.947 6.309-10.036 17.743-16.237 29.965-16.237h64.727c15.77 0 28.65-12.464 28.65-27.87V55.206c0-15.341-12.814-27.87-28.65-27.87H55.7z" />
//     <path d="M395.752 2.4c37.152 0 65.088 27.936 65.088 64.8 0 36.576-27.936 64.8-65.088 64.8h-46.368v72H322.6V2.4h73.152zm0 104.544c22.176 0 38.592-16.992 38.592-39.744 0-23.04-16.416-39.744-38.592-39.744h-46.368v79.488h46.368zM502.6 33.792c-9.504 0-16.992-7.488-16.992-16.704 0-9.216 7.488-16.992 16.992-16.992 9.216 0 16.704 7.776 16.704 16.992 0 9.216-7.488 16.704-16.704 16.704zM489.928 204V60h25.056v144h-25.056zM625 56.256c33.696 0 55.872 22.464 55.872 59.328V204h-25.056v-86.976c0-23.616-13.536-36.864-35.712-36.864-23.04 0-41.76 13.536-41.76 47.52V204h-25.056V60h25.056v20.736C589 63.744 604.84 56.256 625 56.256zM835.24 60h24.768v137.952c0 44.928-36 67.392-73.44 67.392-32.256 0-56.448-12.384-68.256-35.136l21.888-12.384c6.624 13.536 18.72 24.192 46.944 24.192 29.952 0 48.096-16.992 48.096-44.064v-20.448c-11.52 17.568-29.952 28.8-54.144 28.8-40.896 0-73.44-33.12-73.44-75.168 0-41.76 32.544-74.88 73.44-74.88 24.192 0 42.624 10.944 54.144 28.512V60zm-51.264 122.4c29.088 0 51.264-22.176 51.264-51.264 0-28.8-22.176-50.976-51.264-50.976-29.088 0-51.264 22.176-51.264 50.976 0 29.088 22.176 51.264 51.264 51.264zM946.8 205.08c-28.21 0-45.63-20.8-41.08-48.88 4.42-27.17 26.91-46.28 53.56-46.28 19.37 0 31.59 9.36 38.35 22.36l-23.79 12.61c-3.25-5.85-9.1-9.49-16.9-9.49-12.35 0-23.14 9.23-25.35 22.1-2.08 11.83 4.29 22.1 17.16 22.1 8.06 0 13.91-4.03 18.59-10.14l21.58 13.65c-9.36 13.78-24.44 21.97-42.12 21.97zm126.36-59.93c-1.95 11.18-8.58 19.5-18.2 24.44l11.7 33.28h-26l-9.36-28.6h-8.32l-5.07 28.6h-26l16.12-91h36.4c18.33 0 32.24 13.65 28.73 33.28zm-43.42-9.36l-2.99 16.9h10.66c5.07.13 8.84-2.99 9.75-8.32.91-5.33-1.82-8.58-7.02-8.58h-10.4zM1184.05 112l-15.99 91h-26l7.67-43.81-25.48 33.54h-2.34l-14.82-35.23-7.93 45.5h-26l15.99-91h26l13.65 37.31 27.95-37.31h27.3z" />
//   </svg>
// );



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function (props) {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("svg", _objectSpread(_objectSpread({}, props), {}, {
    viewBox: "0 0 1131 266",
    xmlns: "http://www.w3.org/2000/svg",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("g", {
      fill: "currentColor",
      fillRule: "nonzero",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
        d: "M341.752 2.4c37.152 0 65.088 27.936 65.088 64.8 0 36.576-27.936 64.8-65.088 64.8h-46.368v72H268.6V2.4h73.152zm0 104.544c22.176 0 38.592-16.992 38.592-39.744 0-23.04-16.416-39.744-38.592-39.744h-46.368v79.488h46.368zM448.6 33.792c-9.504 0-16.992-7.488-16.992-16.704 0-9.216 7.488-16.992 16.992-16.992 9.216 0 16.704 7.776 16.704 16.992 0 9.216-7.488 16.704-16.704 16.704zM435.928 204V60h25.056v144h-25.056zM571 56.256c33.696 0 55.872 22.464 55.872 59.328V204h-25.056v-86.976c0-23.616-13.536-36.864-35.712-36.864-23.04 0-41.76 13.536-41.76 47.52V204h-25.056V60h25.056v20.736C535 63.744 550.84 56.256 571 56.256zM781.24 60h24.768v137.952c0 44.928-36 67.392-73.44 67.392-32.256 0-56.448-12.384-68.256-35.136l21.888-12.384c6.624 13.536 18.72 24.192 46.944 24.192 29.952 0 48.096-16.992 48.096-44.064v-20.448c-11.52 17.568-29.952 28.8-54.144 28.8-40.896 0-73.44-33.12-73.44-75.168 0-41.76 32.544-74.88 73.44-74.88 24.192 0 42.624 10.944 54.144 28.512V60zm-51.264 122.4c29.088 0 51.264-22.176 51.264-51.264 0-28.8-22.176-50.976-51.264-50.976-29.088 0-51.264 22.176-51.264 50.976 0 29.088 22.176 51.264 51.264 51.264zM892.8 205.08c-28.21 0-45.63-20.8-41.08-48.88 4.42-27.17 26.91-46.28 53.56-46.28 19.37 0 31.59 9.36 38.35 22.36l-23.79 12.61c-3.25-5.85-9.1-9.49-16.9-9.49-12.35 0-23.14 9.23-25.35 22.1-2.08 11.83 4.29 22.1 17.16 22.1 8.06 0 13.91-4.03 18.59-10.14l21.58 13.65c-9.36 13.78-24.44 21.97-42.12 21.97zm126.36-59.93c-1.95 11.18-8.58 19.5-18.2 24.44l11.7 33.28h-26l-9.36-28.6h-8.32l-5.07 28.6h-26l16.12-91h36.4c18.33 0 32.24 13.65 28.73 33.28zm-43.42-9.36l-2.99 16.9h10.66c5.07.13 8.84-2.99 9.75-8.32.91-5.33-1.82-8.58-7.02-8.58h-10.4zM1130.05 112l-15.99 91h-26l7.67-43.81-25.48 33.54h-2.34l-14.82-35.23-7.93 45.5h-26l15.99-91h26l13.65 37.31 27.95-37.31h27.3z"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("g", {
        transform: "matrix(-1 0 0 1 228 0)",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("path", {
          d: "M228 102.023c0-15.175-18.915-29.556-47.914-38.474 6.692-29.697 3.718-53.323-9.388-60.888-3.02-1.774-6.553-2.614-10.41-2.614v10.412c2.138 0 3.857.42 5.298 1.214 6.32 3.642 9.062 17.51 6.924 35.346-.51 4.39-1.347 9.012-2.37 13.728-9.109-2.241-19.054-3.969-29.51-5.09-6.275-8.638-12.78-16.482-19.334-23.346 15.15-14.148 29.372-21.899 39.038-21.899V0c-12.78 0-29.51 9.152-46.427 25.027C96.991 9.245 80.26.187 67.48.187v10.412c9.62 0 23.887 7.705 39.038 21.759a220.31 220.31 0 00-19.194 23.3c-10.503 1.12-20.448 2.848-29.557 5.136a141.466 141.466 0 01-2.417-13.541c-2.184-17.837.511-31.704 6.785-35.393 1.395-.84 3.207-1.214 5.345-1.214V.233c-3.904 0-7.436.84-10.503 2.615-13.06 7.564-15.987 31.144-9.249 60.747C18.822 72.56 0 86.895 0 102.023c0 15.175 18.915 29.557 47.914 38.475-6.692 29.697-3.718 53.323 9.388 60.887C60.322 203.16 63.855 204 67.76 204c12.78 0 29.51-9.152 46.427-25.027 16.916 15.782 33.647 24.84 46.427 24.84 3.904 0 7.436-.84 10.503-2.615 13.06-7.564 15.987-31.144 9.248-60.747 28.814-8.918 47.636-23.3 47.636-38.428zM167.491 70.88c-1.72 6.024-3.857 12.234-6.274 18.444-1.905-3.735-3.904-7.47-6.088-11.206-2.138-3.736-4.415-7.378-6.692-10.926 6.6.98 12.966 2.194 19.054 3.688zm-21.285 49.728c-3.625 6.304-7.343 12.28-11.2 17.837-6.924.607-13.942.933-21.006.933-7.018 0-14.035-.326-20.913-.887a257.555 257.555 0 01-11.247-17.743 243.626 243.626 0 01-9.666-18.584c2.881-6.256 6.134-12.513 9.62-18.63 3.625-6.303 7.343-12.28 11.2-17.837A240.687 240.687 0 01114 64.763c7.018 0 14.035.326 20.913.887a257.555 257.555 0 0111.247 17.743 243.626 243.626 0 019.666 18.584 261.885 261.885 0 01-9.62 18.63zm15.011-6.07a200.745 200.745 0 016.414 18.584 207.707 207.707 0 01-19.148 3.735c2.278-3.595 4.555-7.284 6.693-11.066 2.137-3.736 4.136-7.518 6.041-11.253zm-47.124 49.821c-4.322-4.483-8.644-9.479-12.92-14.942 4.183.187 8.458.327 12.78.327 4.37 0 8.691-.093 12.92-.327a182.02 182.02 0 01-12.78 14.942zm-34.576-27.502c-6.6-.98-12.967-2.195-19.055-3.689 1.72-6.023 3.858-12.233 6.274-18.443 1.906 3.735 3.904 7.47 6.088 11.206a309.507 309.507 0 006.693 10.926zm34.344-97.167c4.322 4.482 8.644 9.478 12.92 14.941-4.183-.186-8.459-.326-12.781-.326-4.369 0-8.69.093-12.92.326a182.02 182.02 0 0112.78-14.941zM79.47 67.19c-2.277 3.595-4.554 7.284-6.692 11.066a264.169 264.169 0 00-6.042 11.206 200.745 200.745 0 01-6.413-18.584 224.755 224.755 0 0119.147-3.688zM37.411 125.65c-16.451-7.05-27.094-16.296-27.094-23.627 0-7.33 10.643-16.622 27.094-23.626 3.997-1.728 8.366-3.269 12.874-4.716 2.649 9.152 6.134 18.677 10.456 28.436-4.275 9.712-7.715 19.19-10.317 28.295-4.6-1.447-8.97-3.035-13.013-4.762zm25.003 66.724c-6.32-3.642-9.062-17.51-6.924-35.347.51-4.389 1.347-9.011 2.37-13.727 9.109 2.24 19.054 3.968 29.51 5.09 6.275 8.637 12.78 16.482 19.334 23.345-15.15 14.148-29.372 21.9-39.038 21.9-2.092-.047-3.858-.468-5.252-1.261zm110.236-35.58c2.184 17.836-.511 31.704-6.785 35.393-1.395.84-3.207 1.214-5.345 1.214-9.62 0-23.887-7.705-39.038-21.759a220.31 220.31 0 0019.194-23.3c10.503-1.12 20.448-2.848 29.557-5.136 1.07 4.716 1.906 9.245 2.417 13.588zm17.892-31.144c-3.997 1.727-8.365 3.268-12.873 4.716-2.649-9.152-6.135-18.677-10.457-28.436 4.276-9.712 7.715-19.19 10.318-28.296 4.6 1.448 8.969 3.035 13.059 4.763 16.451 7.05 27.094 16.296 27.094 23.626-.047 7.331-10.69 16.623-27.14 23.627z"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("circle", {
          cx: "113.5",
          cy: "102.5",
          r: "21.5"
        })]
      })]
    })
  }));
});

/***/ }),

/***/ "./resources/js/Shared/MainMenu.js":
/*!*****************************************!*\
  !*** ./resources/js/Shared/MainMenu.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _MainMenuItem__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MainMenuItem */ "./resources/js/Shared/MainMenuItem.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function (_ref) {
  var className = _ref.className;
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
    className: className,
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_MainMenuItem__WEBPACK_IMPORTED_MODULE_1__.default, {
      text: "Dashboard",
      link: "dashboard",
      icon: "dashboard"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_MainMenuItem__WEBPACK_IMPORTED_MODULE_1__.default, {
      text: "Check Sku",
      link: "check-sku",
      icon: "check"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_MainMenuItem__WEBPACK_IMPORTED_MODULE_1__.default, {
      text: "Grouping",
      link: "grouping",
      icon: "collection"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_MainMenuItem__WEBPACK_IMPORTED_MODULE_1__.default, {
      text: "Groups Merger",
      link: "groups-merger",
      icon: "collection"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_MainMenuItem__WEBPACK_IMPORTED_MODULE_1__.default, {
      text: "Attribute Setter",
      link: "attribute-setter",
      icon: "badge-check"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_MainMenuItem__WEBPACK_IMPORTED_MODULE_1__.default, {
      text: "Category Setter",
      link: "category-setter",
      icon: "badge-check"
    })]
  });
});

/***/ }),

/***/ "./resources/js/Shared/MainMenuItem.js":
/*!*********************************************!*\
  !*** ./resources/js/Shared/MainMenuItem.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-react */ "./node_modules/@inertiajs/inertia-react/dist/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _Icon__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Icon */ "./resources/js/Shared/Icon.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");






/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function (_ref) {
  var icon = _ref.icon,
      link = _ref.link,
      text = _ref.text;
  var isActive = route().current(link + '*');
  var iconClasses = classnames__WEBPACK_IMPORTED_MODULE_2___default()('w-4 h-4 mr-2', {
    'text-white fill-current': isActive,
    'text-indigo-400 group-hover:text-white fill-current': !isActive
  });
  var textClasses = classnames__WEBPACK_IMPORTED_MODULE_2___default()({
    'text-white': isActive,
    'text-indigo-200 group-hover:text-white': !isActive
  });
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("div", {
    className: "mb-4",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
      href: route(link),
      className: "flex items-center group py-3",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_Icon__WEBPACK_IMPORTED_MODULE_3__.default, {
        name: icon,
        className: iconClasses
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("div", {
        className: textClasses,
        children: text
      })]
    })
  });
});

/***/ }),

/***/ "./resources/js/Shared/TopHeader.js":
/*!******************************************!*\
  !*** ./resources/js/Shared/TopHeader.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-react */ "./node_modules/@inertiajs/inertia-react/dist/index.js");
/* harmony import */ var _Logo__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Logo */ "./resources/js/Shared/Logo.js");
/* harmony import */ var _MainMenu__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./MainMenu */ "./resources/js/Shared/MainMenu.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr && (typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]); if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }







/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function () {
  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false),
      _useState2 = _slicedToArray(_useState, 2),
      menuOpened = _useState2[0],
      setMenuOpened = _useState2[1];

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("div", {
    className: "flex items-center justify-between px-6 py-4 bg-indigo-900 md:flex-shrink-0 md:w-56 md:justify-center",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
      className: "mt-1",
      href: "/",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_Logo__WEBPACK_IMPORTED_MODULE_2__.default, {
        className: "text-white fill-current",
        width: "120",
        height: "28"
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("div", {
      className: "relative md:hidden",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("svg", {
        onClick: function onClick() {
          return setMenuOpened(true);
        },
        className: "w-6 h-6 text-white cursor-pointer fill-current",
        xmlns: "http://www.w3.org/2000/svg",
        viewBox: "0 0 20 20",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("path", {
          d: "M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("div", {
        className: "".concat(menuOpened ? '' : 'hidden', " absolute right-0 z-20"),
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_MainMenu__WEBPACK_IMPORTED_MODULE_3__.default, {
          className: "relative z-20 px-8 py-4 pb-2 mt-2 bg-indigo-800 rounded shadow-lg"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("div", {
          onClick: function onClick() {
            setMenuOpened(false);
          },
          className: "fixed inset-0 z-10 bg-black opacity-25"
        })]
      })]
    })]
  });
});

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./node_modules/prop-types/checkPropTypes.js":
/*!***************************************************!*\
  !*** ./node_modules/prop-types/checkPropTypes.js ***!
  \***************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var printWarning = function() {};

if (true) {
  var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
  var loggedTypeFailures = {};
  var has = Function.call.bind(Object.prototype.hasOwnProperty);

  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

/**
 * Assert that the values match with the type specs.
 * Error messages are memorized and will only be shown once.
 *
 * @param {object} typeSpecs Map of name to a ReactPropType
 * @param {object} values Runtime values that need to be type-checked
 * @param {string} location e.g. "prop", "context", "child context"
 * @param {string} componentName Name of the component for error messages.
 * @param {?Function} getStack Returns the component stack.
 * @private
 */
function checkPropTypes(typeSpecs, values, location, componentName, getStack) {
  if (true) {
    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error;
        // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.
        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            var err = Error(
              (componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' +
              'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.'
            );
            err.name = 'Invariant Violation';
            throw err;
          }
          error = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, ReactPropTypesSecret);
        } catch (ex) {
          error = ex;
        }
        if (error && !(error instanceof Error)) {
          printWarning(
            (componentName || 'React class') + ': type specification of ' +
            location + ' `' + typeSpecName + '` is invalid; the type checker ' +
            'function must return `null` or an `Error` but returned a ' + typeof error + '. ' +
            'You may have forgotten to pass an argument to the type checker ' +
            'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' +
            'shape all require an argument).'
          );
        }
        if (error instanceof Error && !(error.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error.message] = true;

          var stack = getStack ? getStack() : '';

          printWarning(
            'Failed ' + location + ' type: ' + error.message + (stack != null ? stack : '')
          );
        }
      }
    }
  }
}

/**
 * Resets warning cache when testing.
 *
 * @private
 */
checkPropTypes.resetWarningCache = function() {
  if (true) {
    loggedTypeFailures = {};
  }
}

module.exports = checkPropTypes;


/***/ }),

/***/ "./node_modules/prop-types/factoryWithTypeCheckers.js":
/*!************************************************************!*\
  !*** ./node_modules/prop-types/factoryWithTypeCheckers.js ***!
  \************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");
var assign = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");

var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
var checkPropTypes = __webpack_require__(/*! ./checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

var has = Function.call.bind(Object.prototype.hasOwnProperty);
var printWarning = function() {};

if (true) {
  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

function emptyFunctionThatReturnsNull() {
  return null;
}

module.exports = function(isValidElement, throwOnDirectAccess) {
  /* global Symbol */
  var ITERATOR_SYMBOL = typeof Symbol === 'function' && Symbol.iterator;
  var FAUX_ITERATOR_SYMBOL = '@@iterator'; // Before Symbol spec.

  /**
   * Returns the iterator method function contained on the iterable object.
   *
   * Be sure to invoke the function with the iterable as context:
   *
   *     var iteratorFn = getIteratorFn(myIterable);
   *     if (iteratorFn) {
   *       var iterator = iteratorFn.call(myIterable);
   *       ...
   *     }
   *
   * @param {?object} maybeIterable
   * @return {?function}
   */
  function getIteratorFn(maybeIterable) {
    var iteratorFn = maybeIterable && (ITERATOR_SYMBOL && maybeIterable[ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL]);
    if (typeof iteratorFn === 'function') {
      return iteratorFn;
    }
  }

  /**
   * Collection of methods that allow declaration and validation of props that are
   * supplied to React components. Example usage:
   *
   *   var Props = require('ReactPropTypes');
   *   var MyArticle = React.createClass({
   *     propTypes: {
   *       // An optional string prop named "description".
   *       description: Props.string,
   *
   *       // A required enum prop named "category".
   *       category: Props.oneOf(['News','Photos']).isRequired,
   *
   *       // A prop named "dialog" that requires an instance of Dialog.
   *       dialog: Props.instanceOf(Dialog).isRequired
   *     },
   *     render: function() { ... }
   *   });
   *
   * A more formal specification of how these methods are used:
   *
   *   type := array|bool|func|object|number|string|oneOf([...])|instanceOf(...)
   *   decl := ReactPropTypes.{type}(.isRequired)?
   *
   * Each and every declaration produces a function with the same signature. This
   * allows the creation of custom validation functions. For example:
   *
   *  var MyLink = React.createClass({
   *    propTypes: {
   *      // An optional string or URI prop named "href".
   *      href: function(props, propName, componentName) {
   *        var propValue = props[propName];
   *        if (propValue != null && typeof propValue !== 'string' &&
   *            !(propValue instanceof URI)) {
   *          return new Error(
   *            'Expected a string or an URI for ' + propName + ' in ' +
   *            componentName
   *          );
   *        }
   *      }
   *    },
   *    render: function() {...}
   *  });
   *
   * @internal
   */

  var ANONYMOUS = '<<anonymous>>';

  // Important!
  // Keep this list in sync with production version in `./factoryWithThrowingShims.js`.
  var ReactPropTypes = {
    array: createPrimitiveTypeChecker('array'),
    bool: createPrimitiveTypeChecker('boolean'),
    func: createPrimitiveTypeChecker('function'),
    number: createPrimitiveTypeChecker('number'),
    object: createPrimitiveTypeChecker('object'),
    string: createPrimitiveTypeChecker('string'),
    symbol: createPrimitiveTypeChecker('symbol'),

    any: createAnyTypeChecker(),
    arrayOf: createArrayOfTypeChecker,
    element: createElementTypeChecker(),
    elementType: createElementTypeTypeChecker(),
    instanceOf: createInstanceTypeChecker,
    node: createNodeChecker(),
    objectOf: createObjectOfTypeChecker,
    oneOf: createEnumTypeChecker,
    oneOfType: createUnionTypeChecker,
    shape: createShapeTypeChecker,
    exact: createStrictShapeTypeChecker,
  };

  /**
   * inlined Object.is polyfill to avoid requiring consumers ship their own
   * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/is
   */
  /*eslint-disable no-self-compare*/
  function is(x, y) {
    // SameValue algorithm
    if (x === y) {
      // Steps 1-5, 7-10
      // Steps 6.b-6.e: +0 != -0
      return x !== 0 || 1 / x === 1 / y;
    } else {
      // Step 6.a: NaN == NaN
      return x !== x && y !== y;
    }
  }
  /*eslint-enable no-self-compare*/

  /**
   * We use an Error-like object for backward compatibility as people may call
   * PropTypes directly and inspect their output. However, we don't use real
   * Errors anymore. We don't inspect their stack anyway, and creating them
   * is prohibitively expensive if they are created too often, such as what
   * happens in oneOfType() for any type before the one that matched.
   */
  function PropTypeError(message) {
    this.message = message;
    this.stack = '';
  }
  // Make `instanceof Error` still work for returned errors.
  PropTypeError.prototype = Error.prototype;

  function createChainableTypeChecker(validate) {
    if (true) {
      var manualPropTypeCallCache = {};
      var manualPropTypeWarningCount = 0;
    }
    function checkType(isRequired, props, propName, componentName, location, propFullName, secret) {
      componentName = componentName || ANONYMOUS;
      propFullName = propFullName || propName;

      if (secret !== ReactPropTypesSecret) {
        if (throwOnDirectAccess) {
          // New behavior only for users of `prop-types` package
          var err = new Error(
            'Calling PropTypes validators directly is not supported by the `prop-types` package. ' +
            'Use `PropTypes.checkPropTypes()` to call them. ' +
            'Read more at http://fb.me/use-check-prop-types'
          );
          err.name = 'Invariant Violation';
          throw err;
        } else if ( true && typeof console !== 'undefined') {
          // Old behavior for people using React.PropTypes
          var cacheKey = componentName + ':' + propName;
          if (
            !manualPropTypeCallCache[cacheKey] &&
            // Avoid spamming the console because they are often not actionable except for lib authors
            manualPropTypeWarningCount < 3
          ) {
            printWarning(
              'You are manually calling a React.PropTypes validation ' +
              'function for the `' + propFullName + '` prop on `' + componentName  + '`. This is deprecated ' +
              'and will throw in the standalone `prop-types` package. ' +
              'You may be seeing this warning due to a third-party PropTypes ' +
              'library. See https://fb.me/react-warning-dont-call-proptypes ' + 'for details.'
            );
            manualPropTypeCallCache[cacheKey] = true;
            manualPropTypeWarningCount++;
          }
        }
      }
      if (props[propName] == null) {
        if (isRequired) {
          if (props[propName] === null) {
            return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required ' + ('in `' + componentName + '`, but its value is `null`.'));
          }
          return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required in ' + ('`' + componentName + '`, but its value is `undefined`.'));
        }
        return null;
      } else {
        return validate(props, propName, componentName, location, propFullName);
      }
    }

    var chainedCheckType = checkType.bind(null, false);
    chainedCheckType.isRequired = checkType.bind(null, true);

    return chainedCheckType;
  }

  function createPrimitiveTypeChecker(expectedType) {
    function validate(props, propName, componentName, location, propFullName, secret) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== expectedType) {
        // `propValue` being instance of, say, date/regexp, pass the 'object'
        // check, but we can offer a more precise error message here rather than
        // 'of type `object`'.
        var preciseType = getPreciseType(propValue);

        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + preciseType + '` supplied to `' + componentName + '`, expected ') + ('`' + expectedType + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createAnyTypeChecker() {
    return createChainableTypeChecker(emptyFunctionThatReturnsNull);
  }

  function createArrayOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside arrayOf.');
      }
      var propValue = props[propName];
      if (!Array.isArray(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an array.'));
      }
      for (var i = 0; i < propValue.length; i++) {
        var error = typeChecker(propValue, i, componentName, location, propFullName + '[' + i + ']', ReactPropTypesSecret);
        if (error instanceof Error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!isValidElement(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!ReactIs.isValidElementType(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement type.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createInstanceTypeChecker(expectedClass) {
    function validate(props, propName, componentName, location, propFullName) {
      if (!(props[propName] instanceof expectedClass)) {
        var expectedClassName = expectedClass.name || ANONYMOUS;
        var actualClassName = getClassName(props[propName]);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + actualClassName + '` supplied to `' + componentName + '`, expected ') + ('instance of `' + expectedClassName + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createEnumTypeChecker(expectedValues) {
    if (!Array.isArray(expectedValues)) {
      if (true) {
        if (arguments.length > 1) {
          printWarning(
            'Invalid arguments supplied to oneOf, expected an array, got ' + arguments.length + ' arguments. ' +
            'A common mistake is to write oneOf(x, y, z) instead of oneOf([x, y, z]).'
          );
        } else {
          printWarning('Invalid argument supplied to oneOf, expected an array.');
        }
      }
      return emptyFunctionThatReturnsNull;
    }

    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      for (var i = 0; i < expectedValues.length; i++) {
        if (is(propValue, expectedValues[i])) {
          return null;
        }
      }

      var valuesString = JSON.stringify(expectedValues, function replacer(key, value) {
        var type = getPreciseType(value);
        if (type === 'symbol') {
          return String(value);
        }
        return value;
      });
      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of value `' + String(propValue) + '` ' + ('supplied to `' + componentName + '`, expected one of ' + valuesString + '.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createObjectOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside objectOf.');
      }
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an object.'));
      }
      for (var key in propValue) {
        if (has(propValue, key)) {
          var error = typeChecker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
          if (error instanceof Error) {
            return error;
          }
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createUnionTypeChecker(arrayOfTypeCheckers) {
    if (!Array.isArray(arrayOfTypeCheckers)) {
       true ? printWarning('Invalid argument supplied to oneOfType, expected an instance of array.') : 0;
      return emptyFunctionThatReturnsNull;
    }

    for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
      var checker = arrayOfTypeCheckers[i];
      if (typeof checker !== 'function') {
        printWarning(
          'Invalid argument supplied to oneOfType. Expected an array of check functions, but ' +
          'received ' + getPostfixForTypeWarning(checker) + ' at index ' + i + '.'
        );
        return emptyFunctionThatReturnsNull;
      }
    }

    function validate(props, propName, componentName, location, propFullName) {
      for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
        var checker = arrayOfTypeCheckers[i];
        if (checker(props, propName, componentName, location, propFullName, ReactPropTypesSecret) == null) {
          return null;
        }
      }

      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createNodeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      if (!isNode(props[propName])) {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`, expected a ReactNode.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      for (var key in shapeTypes) {
        var checker = shapeTypes[key];
        if (!checker) {
          continue;
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createStrictShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      // We need to check all keys in case some are required but missing from
      // props.
      var allKeys = assign({}, props[propName], shapeTypes);
      for (var key in allKeys) {
        var checker = shapeTypes[key];
        if (!checker) {
          return new PropTypeError(
            'Invalid ' + location + ' `' + propFullName + '` key `' + key + '` supplied to `' + componentName + '`.' +
            '\nBad object: ' + JSON.stringify(props[propName], null, '  ') +
            '\nValid keys: ' +  JSON.stringify(Object.keys(shapeTypes), null, '  ')
          );
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }

    return createChainableTypeChecker(validate);
  }

  function isNode(propValue) {
    switch (typeof propValue) {
      case 'number':
      case 'string':
      case 'undefined':
        return true;
      case 'boolean':
        return !propValue;
      case 'object':
        if (Array.isArray(propValue)) {
          return propValue.every(isNode);
        }
        if (propValue === null || isValidElement(propValue)) {
          return true;
        }

        var iteratorFn = getIteratorFn(propValue);
        if (iteratorFn) {
          var iterator = iteratorFn.call(propValue);
          var step;
          if (iteratorFn !== propValue.entries) {
            while (!(step = iterator.next()).done) {
              if (!isNode(step.value)) {
                return false;
              }
            }
          } else {
            // Iterator will provide entry [k,v] tuples rather than values.
            while (!(step = iterator.next()).done) {
              var entry = step.value;
              if (entry) {
                if (!isNode(entry[1])) {
                  return false;
                }
              }
            }
          }
        } else {
          return false;
        }

        return true;
      default:
        return false;
    }
  }

  function isSymbol(propType, propValue) {
    // Native Symbol.
    if (propType === 'symbol') {
      return true;
    }

    // falsy value can't be a Symbol
    if (!propValue) {
      return false;
    }

    // 19.4.3.5 Symbol.prototype[@@toStringTag] === 'Symbol'
    if (propValue['@@toStringTag'] === 'Symbol') {
      return true;
    }

    // Fallback for non-spec compliant Symbols which are polyfilled.
    if (typeof Symbol === 'function' && propValue instanceof Symbol) {
      return true;
    }

    return false;
  }

  // Equivalent of `typeof` but with special handling for array and regexp.
  function getPropType(propValue) {
    var propType = typeof propValue;
    if (Array.isArray(propValue)) {
      return 'array';
    }
    if (propValue instanceof RegExp) {
      // Old webkits (at least until Android 4.0) return 'function' rather than
      // 'object' for typeof a RegExp. We'll normalize this here so that /bla/
      // passes PropTypes.object.
      return 'object';
    }
    if (isSymbol(propType, propValue)) {
      return 'symbol';
    }
    return propType;
  }

  // This handles more types than `getPropType`. Only used for error messages.
  // See `createPrimitiveTypeChecker`.
  function getPreciseType(propValue) {
    if (typeof propValue === 'undefined' || propValue === null) {
      return '' + propValue;
    }
    var propType = getPropType(propValue);
    if (propType === 'object') {
      if (propValue instanceof Date) {
        return 'date';
      } else if (propValue instanceof RegExp) {
        return 'regexp';
      }
    }
    return propType;
  }

  // Returns a string that is postfixed to a warning about an invalid type.
  // For example, "undefined" or "of type array"
  function getPostfixForTypeWarning(value) {
    var type = getPreciseType(value);
    switch (type) {
      case 'array':
      case 'object':
        return 'an ' + type;
      case 'boolean':
      case 'date':
      case 'regexp':
        return 'a ' + type;
      default:
        return type;
    }
  }

  // Returns class name of the object, if any.
  function getClassName(propValue) {
    if (!propValue.constructor || !propValue.constructor.name) {
      return ANONYMOUS;
    }
    return propValue.constructor.name;
  }

  ReactPropTypes.checkPropTypes = checkPropTypes;
  ReactPropTypes.resetWarningCache = checkPropTypes.resetWarningCache;
  ReactPropTypes.PropTypes = ReactPropTypes;

  return ReactPropTypes;
};


/***/ }),

/***/ "./node_modules/prop-types/index.js":
/*!******************************************!*\
  !*** ./node_modules/prop-types/index.js ***!
  \******************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

if (true) {
  var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");

  // By explicitly using `prop-types` you are opting into new development behavior.
  // http://fb.me/prop-types-in-prod
  var throwOnDirectAccess = true;
  module.exports = __webpack_require__(/*! ./factoryWithTypeCheckers */ "./node_modules/prop-types/factoryWithTypeCheckers.js")(ReactIs.isElement, throwOnDirectAccess);
} else {}


/***/ }),

/***/ "./node_modules/prop-types/lib/ReactPropTypesSecret.js":
/*!*************************************************************!*\
  !*** ./node_modules/prop-types/lib/ReactPropTypesSecret.js ***!
  \*************************************************************/
/***/ ((module) => {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),

/***/ "./node_modules/react-fast-compare/index.js":
/*!**************************************************!*\
  !*** ./node_modules/react-fast-compare/index.js ***!
  \**************************************************/
/***/ ((module) => {

/* global Map:readonly, Set:readonly, ArrayBuffer:readonly */

var hasElementType = typeof Element !== 'undefined';
var hasMap = typeof Map === 'function';
var hasSet = typeof Set === 'function';
var hasArrayBuffer = typeof ArrayBuffer === 'function' && !!ArrayBuffer.isView;

// Note: We **don't** need `envHasBigInt64Array` in fde es6/index.js

function equal(a, b) {
  // START: fast-deep-equal es6/index.js 3.1.1
  if (a === b) return true;

  if (a && b && typeof a == 'object' && typeof b == 'object') {
    if (a.constructor !== b.constructor) return false;

    var length, i, keys;
    if (Array.isArray(a)) {
      length = a.length;
      if (length != b.length) return false;
      for (i = length; i-- !== 0;)
        if (!equal(a[i], b[i])) return false;
      return true;
    }

    // START: Modifications:
    // 1. Extra `has<Type> &&` helpers in initial condition allow es6 code
    //    to co-exist with es5.
    // 2. Replace `for of` with es5 compliant iteration using `for`.
    //    Basically, take:
    //
    //    ```js
    //    for (i of a.entries())
    //      if (!b.has(i[0])) return false;
    //    ```
    //
    //    ... and convert to:
    //
    //    ```js
    //    it = a.entries();
    //    while (!(i = it.next()).done)
    //      if (!b.has(i.value[0])) return false;
    //    ```
    //
    //    **Note**: `i` access switches to `i.value`.
    var it;
    if (hasMap && (a instanceof Map) && (b instanceof Map)) {
      if (a.size !== b.size) return false;
      it = a.entries();
      while (!(i = it.next()).done)
        if (!b.has(i.value[0])) return false;
      it = a.entries();
      while (!(i = it.next()).done)
        if (!equal(i.value[1], b.get(i.value[0]))) return false;
      return true;
    }

    if (hasSet && (a instanceof Set) && (b instanceof Set)) {
      if (a.size !== b.size) return false;
      it = a.entries();
      while (!(i = it.next()).done)
        if (!b.has(i.value[0])) return false;
      return true;
    }
    // END: Modifications

    if (hasArrayBuffer && ArrayBuffer.isView(a) && ArrayBuffer.isView(b)) {
      length = a.length;
      if (length != b.length) return false;
      for (i = length; i-- !== 0;)
        if (a[i] !== b[i]) return false;
      return true;
    }

    if (a.constructor === RegExp) return a.source === b.source && a.flags === b.flags;
    if (a.valueOf !== Object.prototype.valueOf) return a.valueOf() === b.valueOf();
    if (a.toString !== Object.prototype.toString) return a.toString() === b.toString();

    keys = Object.keys(a);
    length = keys.length;
    if (length !== Object.keys(b).length) return false;

    for (i = length; i-- !== 0;)
      if (!Object.prototype.hasOwnProperty.call(b, keys[i])) return false;
    // END: fast-deep-equal

    // START: react-fast-compare
    // custom handling for DOM elements
    if (hasElementType && a instanceof Element) return false;

    // custom handling for React/Preact
    for (i = length; i-- !== 0;) {
      if ((keys[i] === '_owner' || keys[i] === '__v' || keys[i] === '__o') && a.$$typeof) {
        // React-specific: avoid traversing React elements' _owner
        // Preact-specific: avoid traversing Preact elements' __v and __o
        //    __v = $_original / $_vnode
        //    __o = $_owner
        // These properties contain circular references and are not needed when
        // comparing the actual elements (and not their owners)
        // .$$typeof and ._store on just reasonable markers of elements

        continue;
      }

      // all other properties should be traversed as usual
      if (!equal(a[keys[i]], b[keys[i]])) return false;
    }
    // END: react-fast-compare

    // START: fast-deep-equal
    return true;
  }

  return a !== a && b !== b;
}
// end fast-deep-equal

module.exports = function isEqual(a, b) {
  try {
    return equal(a, b);
  } catch (error) {
    if (((error.message || '').match(/stack|recursion/i))) {
      // warn on circular references, don't crash
      // browsers give this different errors name and messages:
      // chrome/safari: "RangeError", "Maximum call stack size exceeded"
      // firefox: "InternalError", too much recursion"
      // edge: "Error", "Out of stack space"
      console.warn('react-fast-compare cannot handle circular refs');
      return false;
    }
    // some other error. we should definitely know about these
    throw error;
  }
};


/***/ }),

/***/ "./node_modules/react-helmet/es/Helmet.js":
/*!************************************************!*\
  !*** ./node_modules/react-helmet/es/Helmet.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "Helmet": () => (/* binding */ HelmetExport)
/* harmony export */ });
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_side_effect__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-side-effect */ "./node_modules/react-side-effect/lib/index.js");
/* harmony import */ var react_side_effect__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_side_effect__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_fast_compare__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-fast-compare */ "./node_modules/react-fast-compare/index.js");
/* harmony import */ var react_fast_compare__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_fast_compare__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var object_assign__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");
/* harmony import */ var object_assign__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(object_assign__WEBPACK_IMPORTED_MODULE_4__);






var ATTRIBUTE_NAMES = {
    BODY: "bodyAttributes",
    HTML: "htmlAttributes",
    TITLE: "titleAttributes"
};

var TAG_NAMES = {
    BASE: "base",
    BODY: "body",
    HEAD: "head",
    HTML: "html",
    LINK: "link",
    META: "meta",
    NOSCRIPT: "noscript",
    SCRIPT: "script",
    STYLE: "style",
    TITLE: "title"
};

var VALID_TAG_NAMES = Object.keys(TAG_NAMES).map(function (name) {
    return TAG_NAMES[name];
});

var TAG_PROPERTIES = {
    CHARSET: "charset",
    CSS_TEXT: "cssText",
    HREF: "href",
    HTTPEQUIV: "http-equiv",
    INNER_HTML: "innerHTML",
    ITEM_PROP: "itemprop",
    NAME: "name",
    PROPERTY: "property",
    REL: "rel",
    SRC: "src",
    TARGET: "target"
};

var REACT_TAG_MAP = {
    accesskey: "accessKey",
    charset: "charSet",
    class: "className",
    contenteditable: "contentEditable",
    contextmenu: "contextMenu",
    "http-equiv": "httpEquiv",
    itemprop: "itemProp",
    tabindex: "tabIndex"
};

var HELMET_PROPS = {
    DEFAULT_TITLE: "defaultTitle",
    DEFER: "defer",
    ENCODE_SPECIAL_CHARACTERS: "encodeSpecialCharacters",
    ON_CHANGE_CLIENT_STATE: "onChangeClientState",
    TITLE_TEMPLATE: "titleTemplate"
};

var HTML_TAG_MAP = Object.keys(REACT_TAG_MAP).reduce(function (obj, key) {
    obj[REACT_TAG_MAP[key]] = key;
    return obj;
}, {});

var SELF_CLOSING_TAGS = [TAG_NAMES.NOSCRIPT, TAG_NAMES.SCRIPT, TAG_NAMES.STYLE];

var HELMET_ATTRIBUTE = "data-react-helmet";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
  return typeof obj;
} : function (obj) {
  return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
};

var classCallCheck = function (instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
};

var createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;
  };
}();

var _extends = Object.assign || function (target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i];

    for (var key in source) {
      if (Object.prototype.hasOwnProperty.call(source, key)) {
        target[key] = source[key];
      }
    }
  }

  return target;
};

var inherits = function (subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function, not " + typeof superClass);
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      enumerable: false,
      writable: true,
      configurable: true
    }
  });
  if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass;
};

var objectWithoutProperties = function (obj, keys) {
  var target = {};

  for (var i in obj) {
    if (keys.indexOf(i) >= 0) continue;
    if (!Object.prototype.hasOwnProperty.call(obj, i)) continue;
    target[i] = obj[i];
  }

  return target;
};

var possibleConstructorReturn = function (self, call) {
  if (!self) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return call && (typeof call === "object" || typeof call === "function") ? call : self;
};

var encodeSpecialCharacters = function encodeSpecialCharacters(str) {
    var encode = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

    if (encode === false) {
        return String(str);
    }

    return String(str).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#x27;");
};

var getTitleFromPropsList = function getTitleFromPropsList(propsList) {
    var innermostTitle = getInnermostProperty(propsList, TAG_NAMES.TITLE);
    var innermostTemplate = getInnermostProperty(propsList, HELMET_PROPS.TITLE_TEMPLATE);

    if (innermostTemplate && innermostTitle) {
        // use function arg to avoid need to escape $ characters
        return innermostTemplate.replace(/%s/g, function () {
            return Array.isArray(innermostTitle) ? innermostTitle.join("") : innermostTitle;
        });
    }

    var innermostDefaultTitle = getInnermostProperty(propsList, HELMET_PROPS.DEFAULT_TITLE);

    return innermostTitle || innermostDefaultTitle || undefined;
};

var getOnChangeClientState = function getOnChangeClientState(propsList) {
    return getInnermostProperty(propsList, HELMET_PROPS.ON_CHANGE_CLIENT_STATE) || function () {};
};

var getAttributesFromPropsList = function getAttributesFromPropsList(tagType, propsList) {
    return propsList.filter(function (props) {
        return typeof props[tagType] !== "undefined";
    }).map(function (props) {
        return props[tagType];
    }).reduce(function (tagAttrs, current) {
        return _extends({}, tagAttrs, current);
    }, {});
};

var getBaseTagFromPropsList = function getBaseTagFromPropsList(primaryAttributes, propsList) {
    return propsList.filter(function (props) {
        return typeof props[TAG_NAMES.BASE] !== "undefined";
    }).map(function (props) {
        return props[TAG_NAMES.BASE];
    }).reverse().reduce(function (innermostBaseTag, tag) {
        if (!innermostBaseTag.length) {
            var keys = Object.keys(tag);

            for (var i = 0; i < keys.length; i++) {
                var attributeKey = keys[i];
                var lowerCaseAttributeKey = attributeKey.toLowerCase();

                if (primaryAttributes.indexOf(lowerCaseAttributeKey) !== -1 && tag[lowerCaseAttributeKey]) {
                    return innermostBaseTag.concat(tag);
                }
            }
        }

        return innermostBaseTag;
    }, []);
};

var getTagsFromPropsList = function getTagsFromPropsList(tagName, primaryAttributes, propsList) {
    // Calculate list of tags, giving priority innermost component (end of the propslist)
    var approvedSeenTags = {};

    return propsList.filter(function (props) {
        if (Array.isArray(props[tagName])) {
            return true;
        }
        if (typeof props[tagName] !== "undefined") {
            warn("Helmet: " + tagName + " should be of type \"Array\". Instead found type \"" + _typeof(props[tagName]) + "\"");
        }
        return false;
    }).map(function (props) {
        return props[tagName];
    }).reverse().reduce(function (approvedTags, instanceTags) {
        var instanceSeenTags = {};

        instanceTags.filter(function (tag) {
            var primaryAttributeKey = void 0;
            var keys = Object.keys(tag);
            for (var i = 0; i < keys.length; i++) {
                var attributeKey = keys[i];
                var lowerCaseAttributeKey = attributeKey.toLowerCase();

                // Special rule with link tags, since rel and href are both primary tags, rel takes priority
                if (primaryAttributes.indexOf(lowerCaseAttributeKey) !== -1 && !(primaryAttributeKey === TAG_PROPERTIES.REL && tag[primaryAttributeKey].toLowerCase() === "canonical") && !(lowerCaseAttributeKey === TAG_PROPERTIES.REL && tag[lowerCaseAttributeKey].toLowerCase() === "stylesheet")) {
                    primaryAttributeKey = lowerCaseAttributeKey;
                }
                // Special case for innerHTML which doesn't work lowercased
                if (primaryAttributes.indexOf(attributeKey) !== -1 && (attributeKey === TAG_PROPERTIES.INNER_HTML || attributeKey === TAG_PROPERTIES.CSS_TEXT || attributeKey === TAG_PROPERTIES.ITEM_PROP)) {
                    primaryAttributeKey = attributeKey;
                }
            }

            if (!primaryAttributeKey || !tag[primaryAttributeKey]) {
                return false;
            }

            var value = tag[primaryAttributeKey].toLowerCase();

            if (!approvedSeenTags[primaryAttributeKey]) {
                approvedSeenTags[primaryAttributeKey] = {};
            }

            if (!instanceSeenTags[primaryAttributeKey]) {
                instanceSeenTags[primaryAttributeKey] = {};
            }

            if (!approvedSeenTags[primaryAttributeKey][value]) {
                instanceSeenTags[primaryAttributeKey][value] = true;
                return true;
            }

            return false;
        }).reverse().forEach(function (tag) {
            return approvedTags.push(tag);
        });

        // Update seen tags with tags from this instance
        var keys = Object.keys(instanceSeenTags);
        for (var i = 0; i < keys.length; i++) {
            var attributeKey = keys[i];
            var tagUnion = object_assign__WEBPACK_IMPORTED_MODULE_4___default()({}, approvedSeenTags[attributeKey], instanceSeenTags[attributeKey]);

            approvedSeenTags[attributeKey] = tagUnion;
        }

        return approvedTags;
    }, []).reverse();
};

var getInnermostProperty = function getInnermostProperty(propsList, property) {
    for (var i = propsList.length - 1; i >= 0; i--) {
        var props = propsList[i];

        if (props.hasOwnProperty(property)) {
            return props[property];
        }
    }

    return null;
};

var reducePropsToState = function reducePropsToState(propsList) {
    return {
        baseTag: getBaseTagFromPropsList([TAG_PROPERTIES.HREF, TAG_PROPERTIES.TARGET], propsList),
        bodyAttributes: getAttributesFromPropsList(ATTRIBUTE_NAMES.BODY, propsList),
        defer: getInnermostProperty(propsList, HELMET_PROPS.DEFER),
        encode: getInnermostProperty(propsList, HELMET_PROPS.ENCODE_SPECIAL_CHARACTERS),
        htmlAttributes: getAttributesFromPropsList(ATTRIBUTE_NAMES.HTML, propsList),
        linkTags: getTagsFromPropsList(TAG_NAMES.LINK, [TAG_PROPERTIES.REL, TAG_PROPERTIES.HREF], propsList),
        metaTags: getTagsFromPropsList(TAG_NAMES.META, [TAG_PROPERTIES.NAME, TAG_PROPERTIES.CHARSET, TAG_PROPERTIES.HTTPEQUIV, TAG_PROPERTIES.PROPERTY, TAG_PROPERTIES.ITEM_PROP], propsList),
        noscriptTags: getTagsFromPropsList(TAG_NAMES.NOSCRIPT, [TAG_PROPERTIES.INNER_HTML], propsList),
        onChangeClientState: getOnChangeClientState(propsList),
        scriptTags: getTagsFromPropsList(TAG_NAMES.SCRIPT, [TAG_PROPERTIES.SRC, TAG_PROPERTIES.INNER_HTML], propsList),
        styleTags: getTagsFromPropsList(TAG_NAMES.STYLE, [TAG_PROPERTIES.CSS_TEXT], propsList),
        title: getTitleFromPropsList(propsList),
        titleAttributes: getAttributesFromPropsList(ATTRIBUTE_NAMES.TITLE, propsList)
    };
};

var rafPolyfill = function () {
    var clock = Date.now();

    return function (callback) {
        var currentTime = Date.now();

        if (currentTime - clock > 16) {
            clock = currentTime;
            callback(currentTime);
        } else {
            setTimeout(function () {
                rafPolyfill(callback);
            }, 0);
        }
    };
}();

var cafPolyfill = function cafPolyfill(id) {
    return clearTimeout(id);
};

var requestAnimationFrame = typeof window !== "undefined" ? window.requestAnimationFrame && window.requestAnimationFrame.bind(window) || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || rafPolyfill : __webpack_require__.g.requestAnimationFrame || rafPolyfill;

var cancelAnimationFrame = typeof window !== "undefined" ? window.cancelAnimationFrame || window.webkitCancelAnimationFrame || window.mozCancelAnimationFrame || cafPolyfill : __webpack_require__.g.cancelAnimationFrame || cafPolyfill;

var warn = function warn(msg) {
    return console && typeof console.warn === "function" && console.warn(msg);
};

var _helmetCallback = null;

var handleClientStateChange = function handleClientStateChange(newState) {
    if (_helmetCallback) {
        cancelAnimationFrame(_helmetCallback);
    }

    if (newState.defer) {
        _helmetCallback = requestAnimationFrame(function () {
            commitTagChanges(newState, function () {
                _helmetCallback = null;
            });
        });
    } else {
        commitTagChanges(newState);
        _helmetCallback = null;
    }
};

var commitTagChanges = function commitTagChanges(newState, cb) {
    var baseTag = newState.baseTag,
        bodyAttributes = newState.bodyAttributes,
        htmlAttributes = newState.htmlAttributes,
        linkTags = newState.linkTags,
        metaTags = newState.metaTags,
        noscriptTags = newState.noscriptTags,
        onChangeClientState = newState.onChangeClientState,
        scriptTags = newState.scriptTags,
        styleTags = newState.styleTags,
        title = newState.title,
        titleAttributes = newState.titleAttributes;

    updateAttributes(TAG_NAMES.BODY, bodyAttributes);
    updateAttributes(TAG_NAMES.HTML, htmlAttributes);

    updateTitle(title, titleAttributes);

    var tagUpdates = {
        baseTag: updateTags(TAG_NAMES.BASE, baseTag),
        linkTags: updateTags(TAG_NAMES.LINK, linkTags),
        metaTags: updateTags(TAG_NAMES.META, metaTags),
        noscriptTags: updateTags(TAG_NAMES.NOSCRIPT, noscriptTags),
        scriptTags: updateTags(TAG_NAMES.SCRIPT, scriptTags),
        styleTags: updateTags(TAG_NAMES.STYLE, styleTags)
    };

    var addedTags = {};
    var removedTags = {};

    Object.keys(tagUpdates).forEach(function (tagType) {
        var _tagUpdates$tagType = tagUpdates[tagType],
            newTags = _tagUpdates$tagType.newTags,
            oldTags = _tagUpdates$tagType.oldTags;


        if (newTags.length) {
            addedTags[tagType] = newTags;
        }
        if (oldTags.length) {
            removedTags[tagType] = tagUpdates[tagType].oldTags;
        }
    });

    cb && cb();

    onChangeClientState(newState, addedTags, removedTags);
};

var flattenArray = function flattenArray(possibleArray) {
    return Array.isArray(possibleArray) ? possibleArray.join("") : possibleArray;
};

var updateTitle = function updateTitle(title, attributes) {
    if (typeof title !== "undefined" && document.title !== title) {
        document.title = flattenArray(title);
    }

    updateAttributes(TAG_NAMES.TITLE, attributes);
};

var updateAttributes = function updateAttributes(tagName, attributes) {
    var elementTag = document.getElementsByTagName(tagName)[0];

    if (!elementTag) {
        return;
    }

    var helmetAttributeString = elementTag.getAttribute(HELMET_ATTRIBUTE);
    var helmetAttributes = helmetAttributeString ? helmetAttributeString.split(",") : [];
    var attributesToRemove = [].concat(helmetAttributes);
    var attributeKeys = Object.keys(attributes);

    for (var i = 0; i < attributeKeys.length; i++) {
        var attribute = attributeKeys[i];
        var value = attributes[attribute] || "";

        if (elementTag.getAttribute(attribute) !== value) {
            elementTag.setAttribute(attribute, value);
        }

        if (helmetAttributes.indexOf(attribute) === -1) {
            helmetAttributes.push(attribute);
        }

        var indexToSave = attributesToRemove.indexOf(attribute);
        if (indexToSave !== -1) {
            attributesToRemove.splice(indexToSave, 1);
        }
    }

    for (var _i = attributesToRemove.length - 1; _i >= 0; _i--) {
        elementTag.removeAttribute(attributesToRemove[_i]);
    }

    if (helmetAttributes.length === attributesToRemove.length) {
        elementTag.removeAttribute(HELMET_ATTRIBUTE);
    } else if (elementTag.getAttribute(HELMET_ATTRIBUTE) !== attributeKeys.join(",")) {
        elementTag.setAttribute(HELMET_ATTRIBUTE, attributeKeys.join(","));
    }
};

var updateTags = function updateTags(type, tags) {
    var headElement = document.head || document.querySelector(TAG_NAMES.HEAD);
    var tagNodes = headElement.querySelectorAll(type + "[" + HELMET_ATTRIBUTE + "]");
    var oldTags = Array.prototype.slice.call(tagNodes);
    var newTags = [];
    var indexToDelete = void 0;

    if (tags && tags.length) {
        tags.forEach(function (tag) {
            var newElement = document.createElement(type);

            for (var attribute in tag) {
                if (tag.hasOwnProperty(attribute)) {
                    if (attribute === TAG_PROPERTIES.INNER_HTML) {
                        newElement.innerHTML = tag.innerHTML;
                    } else if (attribute === TAG_PROPERTIES.CSS_TEXT) {
                        if (newElement.styleSheet) {
                            newElement.styleSheet.cssText = tag.cssText;
                        } else {
                            newElement.appendChild(document.createTextNode(tag.cssText));
                        }
                    } else {
                        var value = typeof tag[attribute] === "undefined" ? "" : tag[attribute];
                        newElement.setAttribute(attribute, value);
                    }
                }
            }

            newElement.setAttribute(HELMET_ATTRIBUTE, "true");

            // Remove a duplicate tag from domTagstoRemove, so it isn't cleared.
            if (oldTags.some(function (existingTag, index) {
                indexToDelete = index;
                return newElement.isEqualNode(existingTag);
            })) {
                oldTags.splice(indexToDelete, 1);
            } else {
                newTags.push(newElement);
            }
        });
    }

    oldTags.forEach(function (tag) {
        return tag.parentNode.removeChild(tag);
    });
    newTags.forEach(function (tag) {
        return headElement.appendChild(tag);
    });

    return {
        oldTags: oldTags,
        newTags: newTags
    };
};

var generateElementAttributesAsString = function generateElementAttributesAsString(attributes) {
    return Object.keys(attributes).reduce(function (str, key) {
        var attr = typeof attributes[key] !== "undefined" ? key + "=\"" + attributes[key] + "\"" : "" + key;
        return str ? str + " " + attr : attr;
    }, "");
};

var generateTitleAsString = function generateTitleAsString(type, title, attributes, encode) {
    var attributeString = generateElementAttributesAsString(attributes);
    var flattenedTitle = flattenArray(title);
    return attributeString ? "<" + type + " " + HELMET_ATTRIBUTE + "=\"true\" " + attributeString + ">" + encodeSpecialCharacters(flattenedTitle, encode) + "</" + type + ">" : "<" + type + " " + HELMET_ATTRIBUTE + "=\"true\">" + encodeSpecialCharacters(flattenedTitle, encode) + "</" + type + ">";
};

var generateTagsAsString = function generateTagsAsString(type, tags, encode) {
    return tags.reduce(function (str, tag) {
        var attributeHtml = Object.keys(tag).filter(function (attribute) {
            return !(attribute === TAG_PROPERTIES.INNER_HTML || attribute === TAG_PROPERTIES.CSS_TEXT);
        }).reduce(function (string, attribute) {
            var attr = typeof tag[attribute] === "undefined" ? attribute : attribute + "=\"" + encodeSpecialCharacters(tag[attribute], encode) + "\"";
            return string ? string + " " + attr : attr;
        }, "");

        var tagContent = tag.innerHTML || tag.cssText || "";

        var isSelfClosing = SELF_CLOSING_TAGS.indexOf(type) === -1;

        return str + "<" + type + " " + HELMET_ATTRIBUTE + "=\"true\" " + attributeHtml + (isSelfClosing ? "/>" : ">" + tagContent + "</" + type + ">");
    }, "");
};

var convertElementAttributestoReactProps = function convertElementAttributestoReactProps(attributes) {
    var initProps = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

    return Object.keys(attributes).reduce(function (obj, key) {
        obj[REACT_TAG_MAP[key] || key] = attributes[key];
        return obj;
    }, initProps);
};

var convertReactPropstoHtmlAttributes = function convertReactPropstoHtmlAttributes(props) {
    var initAttributes = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

    return Object.keys(props).reduce(function (obj, key) {
        obj[HTML_TAG_MAP[key] || key] = props[key];
        return obj;
    }, initAttributes);
};

var generateTitleAsReactComponent = function generateTitleAsReactComponent(type, title, attributes) {
    var _initProps;

    // assigning into an array to define toString function on it
    var initProps = (_initProps = {
        key: title
    }, _initProps[HELMET_ATTRIBUTE] = true, _initProps);
    var props = convertElementAttributestoReactProps(attributes, initProps);

    return [react__WEBPACK_IMPORTED_MODULE_3__.createElement(TAG_NAMES.TITLE, props, title)];
};

var generateTagsAsReactComponent = function generateTagsAsReactComponent(type, tags) {
    return tags.map(function (tag, i) {
        var _mappedTag;

        var mappedTag = (_mappedTag = {
            key: i
        }, _mappedTag[HELMET_ATTRIBUTE] = true, _mappedTag);

        Object.keys(tag).forEach(function (attribute) {
            var mappedAttribute = REACT_TAG_MAP[attribute] || attribute;

            if (mappedAttribute === TAG_PROPERTIES.INNER_HTML || mappedAttribute === TAG_PROPERTIES.CSS_TEXT) {
                var content = tag.innerHTML || tag.cssText;
                mappedTag.dangerouslySetInnerHTML = { __html: content };
            } else {
                mappedTag[mappedAttribute] = tag[attribute];
            }
        });

        return react__WEBPACK_IMPORTED_MODULE_3__.createElement(type, mappedTag);
    });
};

var getMethodsForTag = function getMethodsForTag(type, tags, encode) {
    switch (type) {
        case TAG_NAMES.TITLE:
            return {
                toComponent: function toComponent() {
                    return generateTitleAsReactComponent(type, tags.title, tags.titleAttributes, encode);
                },
                toString: function toString() {
                    return generateTitleAsString(type, tags.title, tags.titleAttributes, encode);
                }
            };
        case ATTRIBUTE_NAMES.BODY:
        case ATTRIBUTE_NAMES.HTML:
            return {
                toComponent: function toComponent() {
                    return convertElementAttributestoReactProps(tags);
                },
                toString: function toString() {
                    return generateElementAttributesAsString(tags);
                }
            };
        default:
            return {
                toComponent: function toComponent() {
                    return generateTagsAsReactComponent(type, tags);
                },
                toString: function toString() {
                    return generateTagsAsString(type, tags, encode);
                }
            };
    }
};

var mapStateOnServer = function mapStateOnServer(_ref) {
    var baseTag = _ref.baseTag,
        bodyAttributes = _ref.bodyAttributes,
        encode = _ref.encode,
        htmlAttributes = _ref.htmlAttributes,
        linkTags = _ref.linkTags,
        metaTags = _ref.metaTags,
        noscriptTags = _ref.noscriptTags,
        scriptTags = _ref.scriptTags,
        styleTags = _ref.styleTags,
        _ref$title = _ref.title,
        title = _ref$title === undefined ? "" : _ref$title,
        titleAttributes = _ref.titleAttributes;
    return {
        base: getMethodsForTag(TAG_NAMES.BASE, baseTag, encode),
        bodyAttributes: getMethodsForTag(ATTRIBUTE_NAMES.BODY, bodyAttributes, encode),
        htmlAttributes: getMethodsForTag(ATTRIBUTE_NAMES.HTML, htmlAttributes, encode),
        link: getMethodsForTag(TAG_NAMES.LINK, linkTags, encode),
        meta: getMethodsForTag(TAG_NAMES.META, metaTags, encode),
        noscript: getMethodsForTag(TAG_NAMES.NOSCRIPT, noscriptTags, encode),
        script: getMethodsForTag(TAG_NAMES.SCRIPT, scriptTags, encode),
        style: getMethodsForTag(TAG_NAMES.STYLE, styleTags, encode),
        title: getMethodsForTag(TAG_NAMES.TITLE, { title: title, titleAttributes: titleAttributes }, encode)
    };
};

var Helmet = function Helmet(Component) {
    var _class, _temp;

    return _temp = _class = function (_React$Component) {
        inherits(HelmetWrapper, _React$Component);

        function HelmetWrapper() {
            classCallCheck(this, HelmetWrapper);
            return possibleConstructorReturn(this, _React$Component.apply(this, arguments));
        }

        HelmetWrapper.prototype.shouldComponentUpdate = function shouldComponentUpdate(nextProps) {
            return !react_fast_compare__WEBPACK_IMPORTED_MODULE_2___default()(this.props, nextProps);
        };

        HelmetWrapper.prototype.mapNestedChildrenToProps = function mapNestedChildrenToProps(child, nestedChildren) {
            if (!nestedChildren) {
                return null;
            }

            switch (child.type) {
                case TAG_NAMES.SCRIPT:
                case TAG_NAMES.NOSCRIPT:
                    return {
                        innerHTML: nestedChildren
                    };

                case TAG_NAMES.STYLE:
                    return {
                        cssText: nestedChildren
                    };
            }

            throw new Error("<" + child.type + " /> elements are self-closing and can not contain children. Refer to our API for more information.");
        };

        HelmetWrapper.prototype.flattenArrayTypeChildren = function flattenArrayTypeChildren(_ref) {
            var _babelHelpers$extends;

            var child = _ref.child,
                arrayTypeChildren = _ref.arrayTypeChildren,
                newChildProps = _ref.newChildProps,
                nestedChildren = _ref.nestedChildren;

            return _extends({}, arrayTypeChildren, (_babelHelpers$extends = {}, _babelHelpers$extends[child.type] = [].concat(arrayTypeChildren[child.type] || [], [_extends({}, newChildProps, this.mapNestedChildrenToProps(child, nestedChildren))]), _babelHelpers$extends));
        };

        HelmetWrapper.prototype.mapObjectTypeChildren = function mapObjectTypeChildren(_ref2) {
            var _babelHelpers$extends2, _babelHelpers$extends3;

            var child = _ref2.child,
                newProps = _ref2.newProps,
                newChildProps = _ref2.newChildProps,
                nestedChildren = _ref2.nestedChildren;

            switch (child.type) {
                case TAG_NAMES.TITLE:
                    return _extends({}, newProps, (_babelHelpers$extends2 = {}, _babelHelpers$extends2[child.type] = nestedChildren, _babelHelpers$extends2.titleAttributes = _extends({}, newChildProps), _babelHelpers$extends2));

                case TAG_NAMES.BODY:
                    return _extends({}, newProps, {
                        bodyAttributes: _extends({}, newChildProps)
                    });

                case TAG_NAMES.HTML:
                    return _extends({}, newProps, {
                        htmlAttributes: _extends({}, newChildProps)
                    });
            }

            return _extends({}, newProps, (_babelHelpers$extends3 = {}, _babelHelpers$extends3[child.type] = _extends({}, newChildProps), _babelHelpers$extends3));
        };

        HelmetWrapper.prototype.mapArrayTypeChildrenToProps = function mapArrayTypeChildrenToProps(arrayTypeChildren, newProps) {
            var newFlattenedProps = _extends({}, newProps);

            Object.keys(arrayTypeChildren).forEach(function (arrayChildName) {
                var _babelHelpers$extends4;

                newFlattenedProps = _extends({}, newFlattenedProps, (_babelHelpers$extends4 = {}, _babelHelpers$extends4[arrayChildName] = arrayTypeChildren[arrayChildName], _babelHelpers$extends4));
            });

            return newFlattenedProps;
        };

        HelmetWrapper.prototype.warnOnInvalidChildren = function warnOnInvalidChildren(child, nestedChildren) {
            if (true) {
                if (!VALID_TAG_NAMES.some(function (name) {
                    return child.type === name;
                })) {
                    if (typeof child.type === "function") {
                        return warn("You may be attempting to nest <Helmet> components within each other, which is not allowed. Refer to our API for more information.");
                    }

                    return warn("Only elements types " + VALID_TAG_NAMES.join(", ") + " are allowed. Helmet does not support rendering <" + child.type + "> elements. Refer to our API for more information.");
                }

                if (nestedChildren && typeof nestedChildren !== "string" && (!Array.isArray(nestedChildren) || nestedChildren.some(function (nestedChild) {
                    return typeof nestedChild !== "string";
                }))) {
                    throw new Error("Helmet expects a string as a child of <" + child.type + ">. Did you forget to wrap your children in braces? ( <" + child.type + ">{``}</" + child.type + "> ) Refer to our API for more information.");
                }
            }

            return true;
        };

        HelmetWrapper.prototype.mapChildrenToProps = function mapChildrenToProps(children, newProps) {
            var _this2 = this;

            var arrayTypeChildren = {};

            react__WEBPACK_IMPORTED_MODULE_3__.Children.forEach(children, function (child) {
                if (!child || !child.props) {
                    return;
                }

                var _child$props = child.props,
                    nestedChildren = _child$props.children,
                    childProps = objectWithoutProperties(_child$props, ["children"]);

                var newChildProps = convertReactPropstoHtmlAttributes(childProps);

                _this2.warnOnInvalidChildren(child, nestedChildren);

                switch (child.type) {
                    case TAG_NAMES.LINK:
                    case TAG_NAMES.META:
                    case TAG_NAMES.NOSCRIPT:
                    case TAG_NAMES.SCRIPT:
                    case TAG_NAMES.STYLE:
                        arrayTypeChildren = _this2.flattenArrayTypeChildren({
                            child: child,
                            arrayTypeChildren: arrayTypeChildren,
                            newChildProps: newChildProps,
                            nestedChildren: nestedChildren
                        });
                        break;

                    default:
                        newProps = _this2.mapObjectTypeChildren({
                            child: child,
                            newProps: newProps,
                            newChildProps: newChildProps,
                            nestedChildren: nestedChildren
                        });
                        break;
                }
            });

            newProps = this.mapArrayTypeChildrenToProps(arrayTypeChildren, newProps);
            return newProps;
        };

        HelmetWrapper.prototype.render = function render() {
            var _props = this.props,
                children = _props.children,
                props = objectWithoutProperties(_props, ["children"]);

            var newProps = _extends({}, props);

            if (children) {
                newProps = this.mapChildrenToProps(children, newProps);
            }

            return react__WEBPACK_IMPORTED_MODULE_3__.createElement(Component, newProps);
        };

        createClass(HelmetWrapper, null, [{
            key: "canUseDOM",


            // Component.peek comes from react-side-effect:
            // For testing, you may use a static peek() method available on the returned component.
            // It lets you get the current state without resetting the mounted instance stack.
            // Don’t use it for anything other than testing.

            /**
             * @param {Object} base: {"target": "_blank", "href": "http://mysite.com/"}
             * @param {Object} bodyAttributes: {"className": "root"}
             * @param {String} defaultTitle: "Default Title"
             * @param {Boolean} defer: true
             * @param {Boolean} encodeSpecialCharacters: true
             * @param {Object} htmlAttributes: {"lang": "en", "amp": undefined}
             * @param {Array} link: [{"rel": "canonical", "href": "http://mysite.com/example"}]
             * @param {Array} meta: [{"name": "description", "content": "Test description"}]
             * @param {Array} noscript: [{"innerHTML": "<img src='http://mysite.com/js/test.js'"}]
             * @param {Function} onChangeClientState: "(newState) => console.log(newState)"
             * @param {Array} script: [{"type": "text/javascript", "src": "http://mysite.com/js/test.js"}]
             * @param {Array} style: [{"type": "text/css", "cssText": "div { display: block; color: blue; }"}]
             * @param {String} title: "Title"
             * @param {Object} titleAttributes: {"itemprop": "name"}
             * @param {String} titleTemplate: "MySite.com - %s"
             */
            set: function set$$1(canUseDOM) {
                Component.canUseDOM = canUseDOM;
            }
        }]);
        return HelmetWrapper;
    }(react__WEBPACK_IMPORTED_MODULE_3__.Component), _class.propTypes = {
        base: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().object),
        bodyAttributes: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().object),
        children: prop_types__WEBPACK_IMPORTED_MODULE_0___default().oneOfType([prop_types__WEBPACK_IMPORTED_MODULE_0___default().arrayOf((prop_types__WEBPACK_IMPORTED_MODULE_0___default().node)), (prop_types__WEBPACK_IMPORTED_MODULE_0___default().node)]),
        defaultTitle: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
        defer: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().bool),
        encodeSpecialCharacters: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().bool),
        htmlAttributes: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().object),
        link: prop_types__WEBPACK_IMPORTED_MODULE_0___default().arrayOf((prop_types__WEBPACK_IMPORTED_MODULE_0___default().object)),
        meta: prop_types__WEBPACK_IMPORTED_MODULE_0___default().arrayOf((prop_types__WEBPACK_IMPORTED_MODULE_0___default().object)),
        noscript: prop_types__WEBPACK_IMPORTED_MODULE_0___default().arrayOf((prop_types__WEBPACK_IMPORTED_MODULE_0___default().object)),
        onChangeClientState: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().func),
        script: prop_types__WEBPACK_IMPORTED_MODULE_0___default().arrayOf((prop_types__WEBPACK_IMPORTED_MODULE_0___default().object)),
        style: prop_types__WEBPACK_IMPORTED_MODULE_0___default().arrayOf((prop_types__WEBPACK_IMPORTED_MODULE_0___default().object)),
        title: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string),
        titleAttributes: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().object),
        titleTemplate: (prop_types__WEBPACK_IMPORTED_MODULE_0___default().string)
    }, _class.defaultProps = {
        defer: true,
        encodeSpecialCharacters: true
    }, _class.peek = Component.peek, _class.rewind = function () {
        var mappedState = Component.rewind();
        if (!mappedState) {
            // provide fallback if mappedState is undefined
            mappedState = mapStateOnServer({
                baseTag: [],
                bodyAttributes: {},
                encodeSpecialCharacters: true,
                htmlAttributes: {},
                linkTags: [],
                metaTags: [],
                noscriptTags: [],
                scriptTags: [],
                styleTags: [],
                title: "",
                titleAttributes: {}
            });
        }

        return mappedState;
    }, _temp;
};

var NullComponent = function NullComponent() {
    return null;
};

var HelmetSideEffects = react_side_effect__WEBPACK_IMPORTED_MODULE_1___default()(reducePropsToState, handleClientStateChange, mapStateOnServer)(NullComponent);

var HelmetExport = Helmet(HelmetSideEffects);
HelmetExport.renderStatic = HelmetExport.rewind;

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (HelmetExport);



/***/ }),

/***/ "./node_modules/react-is/cjs/react-is.development.js":
/*!***********************************************************!*\
  !*** ./node_modules/react-is/cjs/react-is.development.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
/** @license React v16.13.1
 * react-is.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;
var REACT_ELEMENT_TYPE = hasSymbol ? Symbol.for('react.element') : 0xeac7;
var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace; // TODO: We don't use AsyncMode or ConcurrentMode anymore. They were temporary
// (unstable) APIs that have been removed. Can we remove the symbols?

var REACT_ASYNC_MODE_TYPE = hasSymbol ? Symbol.for('react.async_mode') : 0xeacf;
var REACT_CONCURRENT_MODE_TYPE = hasSymbol ? Symbol.for('react.concurrent_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_SUSPENSE_TYPE = hasSymbol ? Symbol.for('react.suspense') : 0xead1;
var REACT_SUSPENSE_LIST_TYPE = hasSymbol ? Symbol.for('react.suspense_list') : 0xead8;
var REACT_MEMO_TYPE = hasSymbol ? Symbol.for('react.memo') : 0xead3;
var REACT_LAZY_TYPE = hasSymbol ? Symbol.for('react.lazy') : 0xead4;
var REACT_BLOCK_TYPE = hasSymbol ? Symbol.for('react.block') : 0xead9;
var REACT_FUNDAMENTAL_TYPE = hasSymbol ? Symbol.for('react.fundamental') : 0xead5;
var REACT_RESPONDER_TYPE = hasSymbol ? Symbol.for('react.responder') : 0xead6;
var REACT_SCOPE_TYPE = hasSymbol ? Symbol.for('react.scope') : 0xead7;

function isValidElementType(type) {
  return typeof type === 'string' || typeof type === 'function' || // Note: its typeof might be other than 'symbol' or 'number' if it's a polyfill.
  type === REACT_FRAGMENT_TYPE || type === REACT_CONCURRENT_MODE_TYPE || type === REACT_PROFILER_TYPE || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || typeof type === 'object' && type !== null && (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || type.$$typeof === REACT_FUNDAMENTAL_TYPE || type.$$typeof === REACT_RESPONDER_TYPE || type.$$typeof === REACT_SCOPE_TYPE || type.$$typeof === REACT_BLOCK_TYPE);
}

function typeOf(object) {
  if (typeof object === 'object' && object !== null) {
    var $$typeof = object.$$typeof;

    switch ($$typeof) {
      case REACT_ELEMENT_TYPE:
        var type = object.type;

        switch (type) {
          case REACT_ASYNC_MODE_TYPE:
          case REACT_CONCURRENT_MODE_TYPE:
          case REACT_FRAGMENT_TYPE:
          case REACT_PROFILER_TYPE:
          case REACT_STRICT_MODE_TYPE:
          case REACT_SUSPENSE_TYPE:
            return type;

          default:
            var $$typeofType = type && type.$$typeof;

            switch ($$typeofType) {
              case REACT_CONTEXT_TYPE:
              case REACT_FORWARD_REF_TYPE:
              case REACT_LAZY_TYPE:
              case REACT_MEMO_TYPE:
              case REACT_PROVIDER_TYPE:
                return $$typeofType;

              default:
                return $$typeof;
            }

        }

      case REACT_PORTAL_TYPE:
        return $$typeof;
    }
  }

  return undefined;
} // AsyncMode is deprecated along with isAsyncMode

var AsyncMode = REACT_ASYNC_MODE_TYPE;
var ConcurrentMode = REACT_CONCURRENT_MODE_TYPE;
var ContextConsumer = REACT_CONTEXT_TYPE;
var ContextProvider = REACT_PROVIDER_TYPE;
var Element = REACT_ELEMENT_TYPE;
var ForwardRef = REACT_FORWARD_REF_TYPE;
var Fragment = REACT_FRAGMENT_TYPE;
var Lazy = REACT_LAZY_TYPE;
var Memo = REACT_MEMO_TYPE;
var Portal = REACT_PORTAL_TYPE;
var Profiler = REACT_PROFILER_TYPE;
var StrictMode = REACT_STRICT_MODE_TYPE;
var Suspense = REACT_SUSPENSE_TYPE;
var hasWarnedAboutDeprecatedIsAsyncMode = false; // AsyncMode should be deprecated

function isAsyncMode(object) {
  {
    if (!hasWarnedAboutDeprecatedIsAsyncMode) {
      hasWarnedAboutDeprecatedIsAsyncMode = true; // Using console['warn'] to evade Babel and ESLint

      console['warn']('The ReactIs.isAsyncMode() alias has been deprecated, ' + 'and will be removed in React 17+. Update your code to use ' + 'ReactIs.isConcurrentMode() instead. It has the exact same API.');
    }
  }

  return isConcurrentMode(object) || typeOf(object) === REACT_ASYNC_MODE_TYPE;
}
function isConcurrentMode(object) {
  return typeOf(object) === REACT_CONCURRENT_MODE_TYPE;
}
function isContextConsumer(object) {
  return typeOf(object) === REACT_CONTEXT_TYPE;
}
function isContextProvider(object) {
  return typeOf(object) === REACT_PROVIDER_TYPE;
}
function isElement(object) {
  return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
}
function isForwardRef(object) {
  return typeOf(object) === REACT_FORWARD_REF_TYPE;
}
function isFragment(object) {
  return typeOf(object) === REACT_FRAGMENT_TYPE;
}
function isLazy(object) {
  return typeOf(object) === REACT_LAZY_TYPE;
}
function isMemo(object) {
  return typeOf(object) === REACT_MEMO_TYPE;
}
function isPortal(object) {
  return typeOf(object) === REACT_PORTAL_TYPE;
}
function isProfiler(object) {
  return typeOf(object) === REACT_PROFILER_TYPE;
}
function isStrictMode(object) {
  return typeOf(object) === REACT_STRICT_MODE_TYPE;
}
function isSuspense(object) {
  return typeOf(object) === REACT_SUSPENSE_TYPE;
}

exports.AsyncMode = AsyncMode;
exports.ConcurrentMode = ConcurrentMode;
exports.ContextConsumer = ContextConsumer;
exports.ContextProvider = ContextProvider;
exports.Element = Element;
exports.ForwardRef = ForwardRef;
exports.Fragment = Fragment;
exports.Lazy = Lazy;
exports.Memo = Memo;
exports.Portal = Portal;
exports.Profiler = Profiler;
exports.StrictMode = StrictMode;
exports.Suspense = Suspense;
exports.isAsyncMode = isAsyncMode;
exports.isConcurrentMode = isConcurrentMode;
exports.isContextConsumer = isContextConsumer;
exports.isContextProvider = isContextProvider;
exports.isElement = isElement;
exports.isForwardRef = isForwardRef;
exports.isFragment = isFragment;
exports.isLazy = isLazy;
exports.isMemo = isMemo;
exports.isPortal = isPortal;
exports.isProfiler = isProfiler;
exports.isStrictMode = isStrictMode;
exports.isSuspense = isSuspense;
exports.isValidElementType = isValidElementType;
exports.typeOf = typeOf;
  })();
}


/***/ }),

/***/ "./node_modules/react-is/index.js":
/*!****************************************!*\
  !*** ./node_modules/react-is/index.js ***!
  \****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react-is.development.js */ "./node_modules/react-is/cjs/react-is.development.js");
}


/***/ }),

/***/ "./node_modules/react-side-effect/lib/index.js":
/*!*****************************************************!*\
  !*** ./node_modules/react-side-effect/lib/index.js ***!
  \*****************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


function _interopDefault (ex) { return (ex && (typeof ex === 'object') && 'default' in ex) ? ex['default'] : ex; }

var React = __webpack_require__(/*! react */ "./node_modules/react/index.js");
var React__default = _interopDefault(React);

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function _inheritsLoose(subClass, superClass) {
  subClass.prototype = Object.create(superClass.prototype);
  subClass.prototype.constructor = subClass;
  subClass.__proto__ = superClass;
}

var canUseDOM = !!(typeof window !== 'undefined' && window.document && window.document.createElement);
function withSideEffect(reducePropsToState, handleStateChangeOnClient, mapStateOnServer) {
  if (typeof reducePropsToState !== 'function') {
    throw new Error('Expected reducePropsToState to be a function.');
  }

  if (typeof handleStateChangeOnClient !== 'function') {
    throw new Error('Expected handleStateChangeOnClient to be a function.');
  }

  if (typeof mapStateOnServer !== 'undefined' && typeof mapStateOnServer !== 'function') {
    throw new Error('Expected mapStateOnServer to either be undefined or a function.');
  }

  function getDisplayName(WrappedComponent) {
    return WrappedComponent.displayName || WrappedComponent.name || 'Component';
  }

  return function wrap(WrappedComponent) {
    if (typeof WrappedComponent !== 'function') {
      throw new Error('Expected WrappedComponent to be a React component.');
    }

    var mountedInstances = [];
    var state;

    function emitChange() {
      state = reducePropsToState(mountedInstances.map(function (instance) {
        return instance.props;
      }));

      if (SideEffect.canUseDOM) {
        handleStateChangeOnClient(state);
      } else if (mapStateOnServer) {
        state = mapStateOnServer(state);
      }
    }

    var SideEffect = /*#__PURE__*/function (_PureComponent) {
      _inheritsLoose(SideEffect, _PureComponent);

      function SideEffect() {
        return _PureComponent.apply(this, arguments) || this;
      }

      // Try to use displayName of wrapped component
      // Expose canUseDOM so tests can monkeypatch it
      SideEffect.peek = function peek() {
        return state;
      };

      SideEffect.rewind = function rewind() {
        if (SideEffect.canUseDOM) {
          throw new Error('You may only call rewind() on the server. Call peek() to read the current state.');
        }

        var recordedState = state;
        state = undefined;
        mountedInstances = [];
        return recordedState;
      };

      var _proto = SideEffect.prototype;

      _proto.UNSAFE_componentWillMount = function UNSAFE_componentWillMount() {
        mountedInstances.push(this);
        emitChange();
      };

      _proto.componentDidUpdate = function componentDidUpdate() {
        emitChange();
      };

      _proto.componentWillUnmount = function componentWillUnmount() {
        var index = mountedInstances.indexOf(this);
        mountedInstances.splice(index, 1);
        emitChange();
      };

      _proto.render = function render() {
        return /*#__PURE__*/React__default.createElement(WrappedComponent, this.props);
      };

      return SideEffect;
    }(React.PureComponent);

    _defineProperty(SideEffect, "displayName", "SideEffect(" + getDisplayName(WrappedComponent) + ")");

    _defineProperty(SideEffect, "canUseDOM", canUseDOM);

    return SideEffect;
  };
}

module.exports = withSideEffect;


/***/ })

}]);