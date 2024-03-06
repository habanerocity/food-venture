let sideMenu = document.querySelector('.wp_nav_wrapper'), //ul
submenu = document.querySelector('.sub-menu'), //ul li ul
sideMenuLogo = document.querySelector('.sidemenu_logo'), //sidemenu logo
buttonClick = document.querySelector('.check-button'), //button
searchBox = document.querySelector('.searchbox'), //search field
hamburgerElements = document.querySelector('.menu-icon, #home-menu-icon'), //burger icon
overlay = document.querySelector('.overlay'); //burger icon

buttonClick.addEventListener( 'click', () => {
    sideMenu.classList.toggle('show-navMenu');

    const display = window.getComputedStyle(searchBox).display;
    if (display === "none") {
        searchBox.style.display = "flex";
    } else {
        searchBox.style.display = "none";
    }

    overlay.classList.toggle('hidden');
    sideMenuLogo.classList.toggle('hidden');
    hamburgerElements.classList.toggle('animate-button');

})

window.addEventListener('resize', () => {
    if (window.innerWidth > 767) {
        searchBox.style.display = "flex";
    } else {
        // Keep the current display state of searchBox when window width is 767px or less
    }
});