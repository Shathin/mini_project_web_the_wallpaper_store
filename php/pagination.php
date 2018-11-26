<nav aria-label="..." id="pagination">
    <ul class="pager">
        <?php
            $previous_page = $_GET['page'] - 1;
            $current_page = $_GET['page'];
            $next_page = $_GET['page'] + 1;
            $cat = $_GET['cat'];
            
            if($current_page != 1) {
                echo "
                    <li class='previous'>
                        <a href='wallpapers.php?cat=".$cat."&page=".$previous_page."'>
                            <span aria-hidden='true'>
                                &larr;
                            </span> 
                                Previous
                        </a>
                    </li>
                ";
            }
            else {
                echo "
                    <li class='previous disabled'>
                        <a>
                            <span aria-hidden='true'>
                                &larr;
                            </span>
                                Previous
                        </a>
                    </li>
                ";
            }

            if($current_page*12 < $_SESSION["count"]) {
                echo "
                    <li class='next'>
                        <a href='wallpapers.php?cat=".$cat."&page=".$next_page."'>
                            Next
                             <span aria-hidden='true'>
                                &rarr;
                            </span>
                        </a>
                    </li>";
            }
            else if($current_page*12 >= $_SESSION["count"]){
                echo "
                <li class='next disabled'>
                    <a>
                        Next
                        <span aria-hidden='true'>
                            &rarr;
                        </span>
                    </a>
                </li>";
            }
        ?>
        
    </ul>
</nav>