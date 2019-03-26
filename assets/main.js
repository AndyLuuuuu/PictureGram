const showMenu = document.getElementById("showMenu");
const closeMenu = document.getElementById("closeMenu");
const dropdown = document.getElementById("dropdown");
const header = document.getElementById("headerContainer");
const logoH1 = document.getElementById("PGLogo");

console.log(showMenu);
console.log(closeMenu);

showMenu.addEventListener("click", () => {
  header.classList.toggle("toggleHeader");
  logoH1.classList.toggle("toggleLogo");
  showMenu.classList.toggle("invisible");
  closeMenu.classList.toggle("visible");
  dropdown.style.zIndex = 50;
  dropdown.style.opacity = 1;
});

closeMenu.addEventListener("click", () => {
  console.log("clicked");
  header.classList.toggle("toggleHeader");
  logoH1.classList.toggle("toggleLogo");
  showMenu.classList.toggle("invisible");
  closeMenu.classList.toggle("visible");
  dropdown.style.opacity = 0;
  dropdown.style.zIndex = -50;
});
// const dropdownMenu = document.getElementsByClassName("dropdown_menu")[0];
// console.log(dropdownMenu);
// console.log(hamburgerMenu);

// hamburgerMenu[0].addEventListener("click", () => {
//   console.log("clicked");
//   dropdownMenu.classList.add("dropdown_menu_show");
// });

// closeMenu[0].addEventListener("click", () => {
//   console.log("clicked");
//   dropdownMenu.classList.remove("dropdown_menu_show");
// });
