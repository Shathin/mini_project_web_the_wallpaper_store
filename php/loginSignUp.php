<?php
    if(((isset($_SESSION['usernamecheck']) && !$_SESSION['usernamecheck']) ||(isset($_SESSION['passwordcheck']) && !$_SESSION['passwordcheck'])) && $_GET['error'] == 'Yes')
    {
        $f = '{';
        echo "<script> $(document).ready(function()".$f."$('#loginModal').modal()}); </script>";
    }
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo "<p class='navbar-text navbar-right'>Welcome ".$_SESSION['username']."! <a id='logout' href='php/logout.php' id ='logout' class='navbar-link' >Logout</a></p>";
    }
    else    
    {    
        echo "<li id='login' class='navbar-link' data-toggle='modal' data-target='#loginModal'>
            Login
        </li>";
        echo "<li id='register' class='navbar-link' data-toggle='modal' data-target='#registerModal'>
            Register
        </li>";
    }
?>