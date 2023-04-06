const form = document.querySelector(".login form");
const loginBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-txt");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  //   console.log("hello");
});

loginBtn.addEventListener("click", () => {
  // Get the form data
  const formData = new FormData(form);

  // Send the form data via AJAX
  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("POST", "backend/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          errorText.classList.remove("error-txt");
          errorText.textContent = "";
          location.href = "users.php";
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
