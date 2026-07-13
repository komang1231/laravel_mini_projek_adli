const sidebar = document.getElementById('sidebar');
const toggle = document.getElementById('sidebarToggle');
const navbar = document.querySelector('.navbar');
const mainContent = document.querySelector('.main-content');

toggle.addEventListener('click', () => {

    sidebar.classList.toggle('collapsed');

    navbar.classList.toggle('expanded');

    mainContent.classList.toggle('expanded');

});

// const navItems = document.querySelectorAll('.nav-item');

// navItems.forEach(item => {
//     item.addEventListener('click', () => {
//         navItems.forEach(i => i.classList.remove('active'));
//         item.classList.add('active');
//     });
// });