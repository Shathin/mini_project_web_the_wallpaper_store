// This is a fix for the logout out button issue
window.onload = function() {
    var logout = document.querySelector("#logout");
    if(logout !== null) {
        // logout.addEventListener("click", function() {
        //     window.location = "php/logout.php";
        // });
    }

};

// ISSUE >
/*
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    If this bootstrap jQuery is included, logout functionality will stop working, no idea why.
    But then if this is not there, modal functionality won't be there.
*/