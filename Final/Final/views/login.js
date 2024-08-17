function validateForm() {
    var userNameInput = document.querySelector("input[name='login-email']");
    var passwordInput = document.querySelector("input[name='login-password']");
    var adminRadio = document.querySelector("input[value='admin']");
    var employeeRadio = document.querySelector("input[value='employee']");

    if (userNameInput.value.trim() === "") {
        alert("Please enter an email.");
        return false; // Prevent form submission
    }

    if (passwordInput.value.trim() === "") {
        alert("Please enter a password.");
        return false; // Prevent form submission
    }

    // Check if at least one radio button is selected
    if (!adminRadio.checked && !employeeRadio.checked) {
        alert("Please select a login role.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}
