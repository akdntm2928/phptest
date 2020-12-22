const toggleBtn = document.querySelector('.navber_toogleBtn');
const menu = document.querySelector(".navbar_menu");
const icons = document.querySelector('.navber_icons');

toggleBtn.addEventListener('click',() =>{

    menu.classList.toggle('active');
    icons.classList.toggle('active');
});