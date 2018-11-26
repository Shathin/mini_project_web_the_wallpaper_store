<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        session_start();
        $conn = new mysqli("localhost","root","","wallpaper_store");
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user WHERE username='$username';";
        $results = $conn->query($query);
        if($results->num_rows > 0)
        {
            
            $_SESSION['usernamecheck'] = true;
            $result = $results->fetch_assoc();
            if($result['password'] == $password)
            {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['passwordcheck'] = true;
                header('location: ../wallpapers.php?cat=Abstract&page=1&error=No');
            }
            else
            {
                $_SESSION['passwordcheck'] = false;
                header('location: ../wallpapers.php?cat=Abstract&page=1&error=Yes');
            }
        }
        else
            $_SESSION['usernamecheck'] = false;
            header('location: ../wallpapers.php?cat=Abstract&page=1&error=Yes');
    }
?>