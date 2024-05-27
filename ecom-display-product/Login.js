function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var toggleIcon = document.querySelector(".toggle-password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.src = "eye-open.png"; 
    } else {
        passwordInput.type = "password";
        toggleIcon.src = "eye-close.png";
    }
}
