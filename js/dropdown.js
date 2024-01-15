let dropdown = document.querySelector('.menu'), //ul
submenu = document.querySelector('.sub-menu'), //ul li ul
sideMenuLogo = document.querySelector('.sidemenu_logo'), //sidemenu logo
buttonClick = document.querySelector('.check-button'), //button
hamburger = document.querySelector('.menu-icon'); //burger icon

buttonClick.addEventListener( 'click', () => {

    dropdown.classList.toggle('show-dropdown');
    if(submenu){
        submenu.classList.toggle('show-dropdown');
        sideMenuLogo.classList.toggle('sidemenu_logo');
    }
    hamburger.classList.toggle('animate-button');
    

})