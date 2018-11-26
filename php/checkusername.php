<?php

    $conn = new mysqli("localhost","root","","wallpaper_store");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    /* Get username */
    $uname = $_POST['uname'];

    /* Query */
    $query = "select count(*) as cntUser from user where username='".$uname."'";

    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    echo $count;

?>