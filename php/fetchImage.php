<?php
    $page_number = $_GET['page']*12 - 12;

    $count_query = "select count(*) FROM wallpapers where category_name='".$_GET['cat']."'";
    $result_count = mysqli_query($conn, $count_query);
    $row = mysqli_fetch_array($result_count);

    $_SESSION["count"] = $row[0];

    $query = "SELECT wallpaper_url,premium FROM wallpapers WHERE category_name='".$_GET['cat']."' LIMIT 12 OFFSET ".$page_number.";";
    $result = ($conn->query($query))->fetch_all();
    foreach($result as $wallpaper)
    {
        if(!isset($_SESSION['loggedin']) && strcmp($wallpaper[1],'Premium') > 0)
        {
            echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-9'>
            
              <img class='img-fluid img-thumbnail premium pointer' src='".$wallpaper[0]."' alt=''>

          </div>";
        }
        else
        {    
            echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-9'>
              <img class='img-fluid img-thumbnail pointer' src='".$wallpaper[0]."' alt=''>
            
          </div>";
        }
    }
?>