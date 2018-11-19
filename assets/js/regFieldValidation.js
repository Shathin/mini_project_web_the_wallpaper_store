window.setTimeout(function() {
    // Registration Page

    var email = document.querySelector("#email");
    var newPassword = document.querySelector("#newPassword");
    var confirmPassword = document.querySelector("#confirmPassword");
    
    // A variable's value which determines whether registration button must be clickable or not

    email.addEventListener("input", function() {
        // Validate email > Should be of the form string@string.string
        var content = email.value;
        var email_re = /\S+@\S+\.\S+/;
        if(!content.match(email_re)) {
            console.log("Email Invalid!");
            // A small pop up that prints invalid
        }
        else {
            console.log("Email Valid");
        }
    });

    newPassword.addEventListener("input", function() {
        var content = newPassword.value;
        var content_re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(!content.match(content_re)) {
            console.log("Password invalid");
            // A small pop up that prints invalid
        }
        else {
            console.log("Password valid!");
        } 
    });

    confirmPassword.addEventListener("input", function() {
        var newPasswordContent = newPassword.value;
        var content = confirmPassword.value;
        if(newPasswordContent !== content) {
            console.log("Passwords not matching!");
            // A small pop up that prints invalid
        }
        else {
            console.log("Passwords matching!");
        }
    });

}, 500);