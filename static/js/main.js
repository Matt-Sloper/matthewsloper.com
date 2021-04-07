const mobileMenu = document.getElementById('mobile-menu'),
nav = document.querySelector('nav'),
mobileCloseNav = document.getElementById('close-mobile-menu'),
hero = document.getElementById('hero');

mobileMenu.addEventListener('click', () => {
    nav.classList.add('display-block');
    hero.classList.add('opacity-70');
});
mobileCloseNav.addEventListener('click', () => {
    nav.classList.remove('display-block');
    hero.classList.remove('opacity-70');
});