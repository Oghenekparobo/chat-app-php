const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");
const userList = document.querySelector(".users .users-list");

searchBtn.addEventListener("click", () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBar.value = "";
});

searchBar.addEventListener("keyup", () => {
  let searchTerm = searchBar.value;
  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("POST", "backend/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        userList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.send("searchTerm=" + searchTerm);
});

setInterval(() => {
  let xhr = new XMLHttpRequest(); //creating xml object
  xhr.open("GET", "backend/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains("active")) {
          userList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500);
