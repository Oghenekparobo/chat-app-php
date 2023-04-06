const searchBar = document.querySelector(".users .search input");

const searchBtn = document.querySelector(".users .search button");

searchBtn.addEventListener("click", () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
});

setInterval(() => {
  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("GET", "backend/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if (data === "success") {
          // code to be executed if data is "success"
        }
      }
    }
  };
  xhr.send();
}, 500);
