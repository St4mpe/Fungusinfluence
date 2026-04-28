document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById('hamburgerBtn');
    const nav = document.getElementById('navbar');

    btn.addEventListener('click', () => {
        btn.classList.toggle('open');
        nav.classList.toggle('open');
    });
});