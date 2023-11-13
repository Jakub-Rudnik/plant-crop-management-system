const menuBtn = document.querySelector('#menuBtn');
const nav = document.querySelector('#nav');
const body = document.querySelector('body');
let menuOpen = false;
const MID_BREAKPOINT = 768;

let currWidth = window.innerWidth;
window.addEventListener('resize', () => currWidth = window.innerWidth);

menuBtn.addEventListener('click', () => {
    menuOpen = !menuOpen;
    nav.style.display = currWidth >= MID_BREAKPOINT ? "flex" : menuOpen ? "flex" : "none";
})