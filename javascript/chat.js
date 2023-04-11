const form = document.querySelector(".typing-area");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.addEventListener("submit", (e) => {
  e.preventDefault();
});

sendBtn.addEventListener("click", () => {
  // Get the form data
  const formData = new FormData(form);

  // Send the form data via AJAX
  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("POST", "backend/insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = "";
        scrollToBottom();
      }
    }
  };
  xhr.send(formData);
});

chatBox.addEventListener("mouseenter", () => {
  chatBox.classList.add("active");
});

chatBox.addEventListener("mouseleave", () => {
  chatBox.classList.remove("active");
});

setInterval(() => {
  // Get the form data
  const formData = new FormData(form);

  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("POST", "backend/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
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
