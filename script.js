// script.js

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();
        
        let formData = new FormData(this);
        
        fetch("login.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = "homesection.html";
            } else {
                alert("Invalid credentials");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});