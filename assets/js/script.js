document.addEventListener("DOMContentLoaded", () => {
  const btn = document.querySelector('.nav_menu_mobile');
  const menu = document.querySelector('.nav_menu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('show');
  });
});


