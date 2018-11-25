<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog alignment">
        <div class="modal-content size">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form action="php/checklogin.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="loginusername"  name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
                    </div>   
                    <div class="form-group" id="form-button">
                        <input type="reset" value="Reset" class="btn btn-lg btn-danger">
                        <input type="submit" value="Login" class="btn btn-lg btn-success">
                    </div>
                </form> 
                    <?php
                        if((isset($_SESSION['usernamecheck']) && !$_SESSION['usernamecheck']))
                        {
                            echo "
                                <div class='incorrect'>
                                    Username not found. 
                                    <a id='failedUser' data-toggle='modal' data-target='#registerModal' style='cursor : pointer'>
                                        Register Now!
                                    </a>
                                </div>";
                        }
                        else if(isset($_SESSION['passwordcheck']) && !$_SESSION['passwordcheck'])
                        {
                            echo "<div class='incorrect'>Username or Password incorrect!</div>";
                        }
                    ?>
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>