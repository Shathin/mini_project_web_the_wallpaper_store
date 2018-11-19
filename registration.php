<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $conn = new mysqli("localhost","root","","wallpaper_store");
        $query = "INSERT INTO user(username,password,email) VALUES ('".$username."','".$password."','".$email."');";
        $result = $conn->query($query) or die("Database Error!");
        if($result)
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('location: wallpapers.php?cat=Abstract');   
        }        
    }
?>