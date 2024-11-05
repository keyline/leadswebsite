// Define the URL

// var apiUrl = "https://victoria.keylines.net.in/api/";

var apiUrl = "https://victoriatravels.com/api/";



// $.ajaxSetup({

//   headers: {

//     "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),

//   },

// });



function apiCall(options) {

  // Define default options for the AJAX request

  var defaultOptions = {

    method: "GET",

    url: apiUrl,

    data: null,

    dataType: "json",

    contentType: "application/json",

    success: function (response) {

      console.log("API Request Successful:", response);

    },

    error: function (xhr, status, error) {

      console.error("API Request Error:", error);

    },

  };



  // Merge the provided options with the default options

  options = $.extend({}, defaultOptions, options);



  // Make the AJAX request

  $.ajax({

    method: options.method,

    url: apiUrl + options.url,

    data: options.data ? JSON.stringify(options.data) : null,

    dataType: options.dataType,

    contentType: options.contentType,

    success: options.success,

    error: options.error,

  });

}



// ===============================  Expression pattern  ===============================



// Define a regular expression pattern for a valid name (letters and spaces)

const namePattern = /^[A-Za-z\s]+$/;

// Define a regular expression pattern for a valid email address

const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

// Define a regular expression pattern for a valid mobile number

const mobilePattern = /^[0-9]{10}$/;



// ===============================  parse Query String  ===============================

function parseQueryString(queryString) {

  const params = new URLSearchParams(queryString);

  const obj = {};



  for (const [key, value] of params) {

    obj[key] = decodeURIComponent(value);

  }



  return obj;

}



// =======================================   =========================================

// Get the full URL

let currentURL = window.location.href;



// Get the path (URI) of the current page

let currentPath = window.location.pathname.substring(1);



// Get query parameters

let queryParams = window.location.search;

;