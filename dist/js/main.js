document.getElementById("redirectButton").addEventListener("click", function() {
    // Example validation (optional)
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username && password) {
        // Redirect to a specific path
        window.location.href = "/pages/home.html"; // Change to your desired path
    } else {
        alert("Please fill in all fields.");
    }
});