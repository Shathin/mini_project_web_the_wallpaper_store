<?php    
    $conn = new mysqli("localhost","root","","wallpaper_store");
    $query = "SELECT category_name FROM category";
    $result = ($conn->query($query))->fetch_all();
    foreach($result as $category)
    {
        if($category[0] == $_GET['cat'])
        {
            echo "<li class='list-group-item active'>
                ".$category[0]."
            </li>";
        }
        else
        {
            echo "<li class='list-group-item' onclick='location.href=\"wallpapers.php?cat=".$category[0]."&page=1\";'><a href='wallpapers.php?cat=".$category[0]."&page=1'>
                ".$category[0]."
            </a></li>";
        }
    }
?>