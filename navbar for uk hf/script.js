const overlay = document.querySelector(".overlay");
const overlay_exists = document.querySelector(".overlay--active");
const body = document.querySelector("body");
const menuBtn = document.querySelector(".menu-btn");
const menuItems = document.querySelector(".menu-items");
const expandBtn = document.querySelectorAll(".expand-btn");
const mbOpenMega = document.querySelectorAll(".srs_mobile_mega");
const cross = document.querySelector(".srs_cross");

function toggle() {
  // add open class
  menuBtn.classList.toggle("open");
  menuItems.classList.toggle("open");
    
}

menuBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  toggle();
});

window.onkeydown = function (event) {
  const key = event.key; // const {key} = event; in ES6+
  const active = menuItems.classList.contains("open");
  if (key === "Escape" && active) {
    toggle();
  }
};
function bg_toggle() {
    // disable overflow body
    body.classList.toggle("overflow");
    // dark background
    overlay.classList.toggle("overlay--active");
}
document.addEventListener("click", (e) => {
  let target = e.target,
    its_menu = target === menuItems || menuItems.contains(target),
    its_hamburger = target === menuBtn,
    menu_is_active = menuItems.classList.contains("open");
  if (!its_menu && !its_hamburger && menu_is_active) {
    toggle();
  }
});
overlay.addEventListener("click", (e) => {
  closeMega();
})
cross.addEventListener("click", (e) => {
  closeMega();
})
function closeMega(){
  mbOpenMega[0].classList.remove("open");
  bg_toggle();
}

// mobile menu expand
expandBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    mbOpenMega[0].classList.add("open");
    toggle();
    console.log(overlay_exists);
    if(overlay.classList[1] !== "overlay--active"){
      bg_toggle();
    }
    
  });
});
