document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".message a");
    const registerForm = document.querySelector(".register-form");
    const loginForm = document.querySelector(".login-form");

    links.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            registerForm.classList.toggle("active");
            loginForm.classList.toggle("active");
        });
    });
});