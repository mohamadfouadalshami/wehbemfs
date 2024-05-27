document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.querySelector('.menu-icon');
    const sidebarMenu = document.querySelector('.sidebar-menu');
  
    menuIcon.addEventListener('click', () => {
      sidebarMenu.classList.toggle('show');
    });
  });

  document.addEventListener('DOMContentLoaded', () => {
    const cancelIcon = document.querySelector('.cancel-icon');
    const sidebarMenu = document.querySelector('.sidebar-menu');
  
    cancelIcon.addEventListener('click', () => {
      sidebarMenu.classList.remove('show');
    });
  });
 