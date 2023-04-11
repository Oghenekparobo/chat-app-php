"use strict";

var searchBar = document.querySelector(".users .search input");
var searchBtn = document.querySelector(".users .search button");
var userList = document.querySelector(".users .users-list");
searchBtn.addEventListener("click", function () {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBar.value = "";
});
searchBar.addEventListener("keyup", function () {
  var searchTerm = searchBar.value;

  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }

  var xhr = new XMLHttpRequest(); //creating xml object

  xhr.open("POST", "backend/search.php", true);

  xhr.onload = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var data = xhr.response;
        userList.innerHTML = data;
      }
    }
  };

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
});
setInterval(function () {
  var xhr = new XMLHttpRequest(); //creating xml object

  xhr.open("GET", "backend/users.php", true);

  xhr.onload = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var data = xhr.response;

        if (!searchBar.classList.contains("active")) {
          userList.innerHTML = data;
        }
      }
    }
  };

  xhr.send();
}, 500);