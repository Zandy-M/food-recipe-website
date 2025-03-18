// Register Form Validation
function validateForm() {
    let isValid = true;
    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    // Clear previous error messages
    document.getElementById("usernameError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("passwordError").textContent = "";
    // Username validation
    if (username.length < 3) {
        document.getElementById("usernameError").textContent = "Username must be at least 3 characters.";
        isValid = false;
    }
    // Email validation
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        document.getElementById("emailError").textContent = "Invalid email format.";
        isValid = false;
    }
    // Password validation
    if (password.length < 6) {
        document.getElementById("passwordError").textContent = "Password must be at least 6 characters.";
        isValid = false;
    }
    return isValid;
}
// Login Form Validation
function validateLoginForm() {
    let isValid = true;
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();
    document.getElementById("usernameError").textContent = "";
    document.getElementById("passwordError").textContent = "";
    // Username validation
    if (username.length < 3) {
        document.getElementById("usernameError").textContent = "Username must be at least 3 characters.";
        isValid = false;
    }
    // Password validation
    if (password.length < 6) {
        document.getElementById("passwordError").textContent = "Password must be at least 6 characters.";
        isValid = false;
    }
    return isValid;
}