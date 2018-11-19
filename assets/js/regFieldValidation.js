window.setTimeout(function() {
    // Registration Page

    var username = document.querySelector("#username");
    var email = document.querySelector("#email");
    var passwordValidityMessage = document.querySelector("#passwordValidity");
    var newPassword = document.querySelector("#newPassword");
    var confirmPassword = document.querySelector("#confirmPassword");

    var registerButton = document.querySelector("#registerButton");
    
    // A variable's value which determines whether registration button must be clickable or not
    var isEmailSet = false;
    var isUsernameSet = false;
    var isNewPasswordSet = false;
    var isConfirmPasswordSet = false;

    username.addEventListener("input", function() {

        // Check username availability


        // temp 
        isUsernameSet = true;

        if(isEmailSet && isNewPasswordSet && isConfirmPasswordSet && isUsernameSet) {
            registerButton.disabled = false;
        }
        else {
            console.log("Not yet set!");
            registerButton.disabled = true;
        }
    });

    email.addEventListener("input", function() {
        // Validate email > Should be of the form string@string.string
        var content = email.value;
        var email_re = /\S+@\S+\.\S+/;
        if(!content.match(email_re)) {
            console.log("Email Invalid!");
            // A small pop up that prints invalid
            isEmailSet = false;
        }
        else {
            console.log("Email Valid");
            isEmailSet = true;
        }
        if(isEmailSet && isNewPasswordSet && isConfirmPasswordSet && isUsernameSet) {
            registerButton.disabled = false;
        }
        else {
            console.log("Not yet set!");
            registerButton.disabled = true;
        }
    });

    newPassword.addEventListener("input", function() {
        var content = newPassword.value;
        var content_re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(!content.match(content_re)) {
            console.log("Password invalid");
            // A small pop up that prints invalid
            isNewPasswordSet = false;
            passwordValidityMessage.textContent = "Password Invalid!";
        }
        else {
            console.log("Password valid!");
            passwordValidityMessage.textContent = "";
            isNewPasswordSet = true;
        }
        passwordCheck();
        if(isEmailSet && isNewPasswordSet && isConfirmPasswordSet && isUsernameSet) {
            registerButton.disabled = false;
        }
        else {
            console.log("Not yet set!");
            registerButton.disabled = true;
        }
    });

    confirmPassword.addEventListener("input", passwordCheck);

    function passwordCheck() {
        var newPasswordContent = newPassword.value;
        var content = confirmPassword.value;
        if(newPasswordContent !== content) {
            console.log("Passwords not matching!");
            // A small pop up that prints invalid
            confirmPassword.style.borderColor = "red";
            isConfirmPasswordSet = false;
        }
        else {
            console.log("Passwords matching!");
            confirmPassword.style.borderColor = "green";
            isConfirmPasswordSet = true;
        }
        if(isEmailSet && isNewPasswordSet && isConfirmPasswordSet && isUsernameSet) {
            registerButton.disabled = false;
        }
        else {
            console.log("Not yet set!");
            registerButton.disabled = true;
        }
    }

}, 500);