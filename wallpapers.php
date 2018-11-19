<html>
    <head>
        <title>Wallpaper Store</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.css">
        <link rel="stylesheet" href="assets/css/main.css">
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="assets/js/wallpaperLogic.js"></script>
        <script src="assets/js/regFieldValidation.js"></script>
        <script src="assets/js/modal.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Federant|Saira+Extra+Condensed|Tajawal:500,700" rel="stylesheet">
    </head>
    <body id="main">
        <?php 
            session_start(); 
        ?>
        
        <!-- Nav bar code goes here -->
        <div class="ui secondary menu custom-menu" >
            <a id="heading" class="item"  href="wallpapers.php?cat=Abstract">
            <i class="images icon"></i> 
                The Wallpaper Store
            </a>
            <div class="right menu">
                <?php
                    if((isset($_SESSION['usernamecheck']) && !$_SESSION['usernamecheck']) ||(isset($_SESSION['passwordcheck']) && !$_SESSION['passwordcheck']))
                    {
                        $f = '{';
                        echo "<script> $(document).ready(function()".$f."$('#loginModal').modal()}); </script>";
                    }
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                    {
                        echo "<span class='ui item'>Welcome ".$_SESSION['username']."!</span> <a id ='logout' class='ui item' href='logout.php'>
                             Logout
                        </a>";
                    }
                    else    
                    {    
                        echo "<a id='login' class='ui item' data-toggle='modal' data-target='#loginModal'>
                            Login
                        </a>";
                        echo "<a id='register' class='ui item' data-toggle='modal' data-target='#registerModal'>
                            Register
                        </a>";
                    }
                ?>
            </div>
        </div>

        <div class="scroll dark">
            <div class="ui grid">
                <!-- Contains the category names -->
                <div class="two wide column">
                    <div class="ui vertical fluid tabular menu">
                        <?php    
                            $conn = new mysqli("localhost","root","","wallpaper_store");
                            $query = "SELECT category_name FROM category";
                            $result = ($conn->query($query))->fetch_all();
                            foreach($result as $category)
                            {
                                if($category[0] == $_GET['cat'])
                                {
                                    echo "<span class='item category active-category'>
                                        ".$category[0]."
                                    </span>";
                                }
                                else
                                {
                                    echo "<a class='item category' href='wallpapers.php?cat=".$category[0]."'>
                                        ".$category[0]."
                                    </a>";
                                }
                            }
                        ?>
                    </div>
                </div>
                <!-- Containes the images -->
                    <div class="fourteen wide stretched column">
                    <div class="scroll">
                        <div class="ui segment">
                            <!-- Image thumbnails must go here -->
                            <div class="ui three column grid">
                                <?php
                                    $query = "SELECT wallpaper_url,premium FROM wallpapers WHERE category_name='".$_GET['cat']."';";
                                    $result = ($conn->query($query))->fetch_all();
                                    foreach($result as $wallpaper)
                                    {
                                        if(!isset($_SESSION['loggedin']) && strcmp($wallpaper[1],'Premium') > 0)
                                        {
                                            echo "<div class='column'>
                                                    <div class='ui segment thumbnail'>
                                                        <img class='thumb premium pointer' src='".$wallpaper[0]."'>
                                                    </div>
                                                </div>";
                                        }
                                        else
                                        {    
                                            echo "<div class='column'>
                                                    <div class='ui segment thumbnail'>
                                                        <img class='thumb pointer' src='".$wallpaper[0]."'>
                                                    </div>
                                                </div>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Login Modal -->
        
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog alignment">
              <div class="modal-content size">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                  </div>
                  <div class="modal-body">
                      <div class="ui segment form">
                        <form action="checklogin.php" method="POST">
                            <div class="form-items">
                                <div class="ui input">
                                    <input type="text" id="loginusername" name="username" placeholder="Enter your username" required>
                                </div>  
                            </div>
                            <div class="form-items">
                                <div class="ui input">
                                    <input type="password" name="password" id="loginPassword" placeholder="Enter your password" required>
                                </div>
                            </div>
                            <?php
                                if((isset($_SESSION['usernamecheck']) && !$_SESSION['usernamecheck']))
                                {
                                    echo "<span class='incorrect'>Username not found. <a id='failedUser' class='ui item pointer' data-toggle='modal' data-target='#registerModal'>
                            Register Now!
                        </a></span>";
                                }
                                else if(isset($_SESSION['passwordcheck']) && !$_SESSION['passwordcheck'])
                                {
                                    echo "<span class='incorrect'>Username or Password incorrect!</span>";
                                }
                            ?>
                            <div class="form-items">
                                <div class="ui buttons">
                                    <input type="reset" value="Reset" class="ui button active">
                                    <div class="or"></div>
                                    <button class="ui positive button" name="submit" type="submit" value="submit">Login</button>
                                </div>
                            </div>
                        </form> 
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" role="dialog">
            <div class="modal-dialog alignment">
              <div class="modal-content size">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Register</h4>
                  </div>
                  <div class="modal-body">
                      <div class="ui segment form">
                        <form action="registration.php" method="POST">
                            <div class="form-items">
                                <div class="ui input">
                                    <input type="text" id="username" name="username" placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="form-items">
                                <div class="ui input">
                                    <input type="text" name="email" id="email" placeholder="Enter your e-mail ID">
                                </div>  
                            </div>
                            <div class="form-items">
                                <div class="ui input">
                                    <input type="password" name="password" id="newPassword" placeholder="Enter your password">
                                    <a id="rulesButton" data-toggle='modal' data-target='#passwordRulesModal'><i class="info circle icon"></i></a>
                                </div>
                            </div>
                            <div id="passwordValidity" class="form-items"> 
                            </div>
                            <div class="form-items">
                                <div class="ui input">
                                    <input type="password" name="password" id="confirmPassword" placeholder="Retype the chosen password">
                                </div>
                            </div>
                            <div class="form-items">
                                <div class="ui buttons">
                                    <input type="reset" value="Reset" class="ui button active">
                                    <div class="or"></div>
                                    <button class="ui positive button" id="registerButton" disabled>Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="modal fade" id="passwordRulesModal" role="dialog">
            <div class="modal-dialog alignment">
              <div class="modal-content size">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Rules</h4>
                  </div>
                  <div class="modal-body">
                     Password must :
                     <br> &nbsp; &nbsp; - be atleast 8 characters in length
                     <br> &nbsp; &nbsp; - contain atleast one small letter
                     <br> &nbsp; &nbsp; - contain atleast one capital letter
                     <br> &nbsp; &nbsp; - contian atleast one number
                     <br> &nbsp; &nbsp; - contain atleast one special symbol. 
                  </div>
              </div>
            </div>
        </div>
        <img class="ui fluid bordered image hidden" id="popUp" src="">
    </body>
</html>