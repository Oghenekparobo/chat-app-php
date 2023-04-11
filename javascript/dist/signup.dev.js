"use strict";

var form = document.querySelector(".signup form");
var continueBtn = form.querySelector(".button input");
var errorText = form.querySelector(".error-txt");
form.addEventListener("submit", function (e) {
  e.preventDefault(); //   console.log("hello");
});
continueBtn.addEventListener("click", function () {
  // Get the form data
  var formData = new FormData(form); // Send the form data via AJAX

  var xhr = new XMLHttpRequest(); //creating xml object

  xhr.open("POST", "backend/signup.php", true);

  xhr.onload = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var data = xhr.response;

        if (data === "success") {
          errorText.classList.remove("error-txt");
          errorText.textContent = "";
          location.href = "login.php";
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    } else {
      console.log("failed request");
    }
  };

  xhr.send(formData);
});