const hamburgerMenu = document.getElementsByClassName("hamburger_menu_icon");
const closeMenu = document.getElementsByClassName("close_menu_icon");
const dropdownMenu = document.getElementsByClassName("dropdown_menu")[0];
console.log(dropdownMenu);
console.log(hamburgerMenu);

hamburgerMenu[0].addEventListener("click", () => {
  console.log("clicked");
  dropdownMenu.classList.add("dropdown_menu_show");
});

closeMenu[0].addEventListener("click", () => {
  console.log("clicked");
  dropdownMenu.classList.remove("dropdown_menu_show");
});
