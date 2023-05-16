document.addEventListener("DOMContentLoaded", function() {
  let headerIcons = document.querySelectorAll(".headerA");
  
  for (let i = 0; i < headerIcons.length; i++) {
      headerIcons[i].addEventListener("click", function() {
        this.href = "loginPage.html";
      });
    }
  });