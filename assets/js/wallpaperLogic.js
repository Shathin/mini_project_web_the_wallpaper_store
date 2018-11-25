
window.setTimeout(function() {
    
    var popUpImg = document.querySelector("#popUp"); // Pop up image object

    var images = document.querySelectorAll(".img-fluid.img-thumbnail"); // Returns a node list containing objects of each image on the screen

    var background = document.querySelector("#wallpaper-screen"); // Background > Used for fadeout effect and closing pop up

    // Iterating through each item in the NodeList
    images.forEach(function(image) {
        // Adding on click event listener to each image object
        image.addEventListener("click", function() {
            if(image.classList.contains("premium")) {
                // Open login modal
                $('#loginModal').modal();
            }
            else {
                
                popUpImg.src = fixURL(this.src);
                background.classList.add("backFadeOut");
                popUpImg.classList.remove("hidden");
                // background.classList.add("backFadeOut");
            }
        });
    });

    function fixURL(url) {
        return "https://hdqwalls.com/wallpapers/" + url.substring(51);
    }

    // Adding event listener to windows > Used for closing the pop up image when clicked anywhere outside the image
    window.addEventListener("click", function(event) {
        // If clicked anywhere outside the pop up image
        if(event.target != popUpImg) {
            // If what you clicked isn't an image
            if(!(event.target instanceof Image)) {
                var currentHeight = 87;
                var zoomOutInterval = setInterval(zoomOut, 1);
                // Closing pop up image animation
                function zoomOut() {
                    if(popUpImg.style.height == "0vh") {
                        clearInterval(zoomOutInterval);
                        // Hide the image
                        popUpImg.classList.add("hidden");
                        popUpImg.classList.add("fadeOut");
                        background.classList.remove("backFadeOut");
                        console.log("Clearing . . .")
                        currentHeight = 87;
                        popUpImg.style.height = currentHeight + "vh";
                    }
                    else {  
                        popUpImg.style.height = currentHeight + "vh";
                        currentHeight -= 1.5;
                        console.log("Running . . . > " + currentHeight);
                    }
                }
            }
        }
    })

}, 500);