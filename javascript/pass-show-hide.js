const pswrdfield = document.querySelector(
  ".form .field input[type='password']"
);
const toggleBtn = document.querySelector(".form .field i");

toggleBtn.addEventListener("click", () => {
  if (pswrdfield.type === "password") {
    pswrdfield.type = "text";
    pswrdfield.classList.add("active");
  } else {
    pswrdfield.type = "password";
    pswrdfield.classList.remove("active");
  }
});
