"use strict";

var form = document.querySelector(".typing-area");
var inputField = form.querySelector(".input-field");
var sendBtn = form.querySelector("button");
var chatBox = document.querySelector(".chat-box");
form.addEventListener("submit", function (e) {
  e.preventDefault();
});
sendBtn.addEventListener("click", function () {
  // Get the form data
  var formData = new FormData(form); // Send the form data via AJAX

  var xhr = new XMLHttpRequest(); //creating xml object

  xhr.open("POST", "backend/insert-chat.php", true);

  xhr.onload = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = "";
        scrollToBottom();
      }
    }
  };

  xhr.send(formData);
});
chatBox.addEventListener("mouseenter", function () {
  chatBox.classList.add("active");
});
chatBox.addEventListener("mouseleave", function () {
  chatBox.classList.remove("active");
});
setInterval(function () {
  // Get the form data
  var formData = new FormData(form);
  var xhr = new XMLHttpRequest(); //creating xml object

  xhr.open("POST", "backend/get-chat.php", true);

  xhr.onload = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var data = xhr.response;
        chatBox.innerHTML = data;

        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };

  xhr.send(formData);
}, 500);

function scrollToBottom() {
  // Only scroll to bottom if user is already at the bottom
  if (chatBox.scrollTop === chatBox.scrollHeight - chatBox.offsetHeight) {
    chatBox.scrollTop = chatBox.scrollHeight;
  }
}