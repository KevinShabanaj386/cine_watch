document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("form");
    let messages = document.querySelectorAll(".success, .error");

    form.addEventListener("submit", function () {
        setTimeout(() => {
            messages.forEach(msg => msg.style.display = "none");
        }, 5000); // Hide messages after 5 seconds
    });
});
