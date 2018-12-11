<html>
    <head>
        <title>Wallpaper Store</title>
        <link rel="icon" href="assets/icons/gallery.png">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Federant|Saira+Extra+Condensed|Tajawal:500,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- Custom CSS -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/navbar.css">
        <link rel="stylesheet" href="assets/css/form.css">
        <link rel="stylesheet" href="assets/css/sidebar.css">
        <link rel="stylesheet" href="assets/css/wallpaper.css">
        <link rel="stylesheet" href="assets/css/modal.css">

        <!-- Custom scripts -->
        <script src="assets/js/wallpaperLogic.js"></script>
        <script src="assets/js/validateRegistration.js"></script>
        <script src="assets/js/modal.js"></script>

    </head>
    <body id="main">
        <?php 
            session_start(); 
        ?>
            
        <nav class="navbar navbar-inverse" style="z-index:1001">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false" >
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" href="wallpapers.php?cat=Abstract&page=1&error=No">
                        <img src="assets/icons/gallery.png" class="brand-image pointer">
                        The Wallpaper Store
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <?php
                            include 'php/loginSignUp.php';
                        ?>  
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" id="wallpaper-screen">
            <div class="row">
        
                <div class="col-md-2">
                    <div class="list-group">
                        <?php
                            include 'php/fetchCategory.php';
                        ?>
                    </div>

                    <li class="dropdown" id="categoryDrop" >
                        <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <div class="list-group">
                                <?php
                                    include 'php/fetchCategory.php';
                                ?>
                            </div>
                        </ul>
                    </li>
                </div>

                <div class="col-md-10" id="wallpaper-screen">
                    <div class="container">
                        <?php
                            include 'php/fetchImage.php';
                        ?>
                    </div>
                    <?php
                        include 'php/pagination.php';
                    ?>
                </div>
                <!-- Wallpaper content -->

        </div>
        
            </div>


        <!-- Login Modal -->
        <?php
            include 'php/loginModal.php';
        ?>
        
        <!-- Register Modal -->
        <?php
            include 'php/registerModal.php';
        ?>

        <img class="img-fluid hidden" id="popUp" src="">
    </body>
</html>