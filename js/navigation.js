const menuBtn = document.querySelector('#menuBtn');
const nav = document.querySelector('#nav');
const closeIcon = document.querySelector('#closeIcon');
const menuIcon = document.querySelector('#menuIcon');
let menuOpen = false;

menuBtn.addEventListener('click', () => {
    menuOpen = !menuOpen;
    nav.classList.toggle('open');

    if (menuOpen) {
        closeIcon.style.display = 'block';
        menuIcon.style.display = 'none';
    } else {
        closeIcon.style.display = 'none';
        menuIcon.style.display = 'block';
    }

})