<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog alignment">
        <div class="modal-content size">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body">
                <form action="php/registration.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username">
                    </div>
                    <div class="form-group" id="usernameAvailability">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your E-Mail ID">
                    </div>
                    <div class="form-group" id="emailValidity">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="newPassword" name="password" placeholder="Enter your Password">
                        <a id="rulesButton" data-toggle='modal' data-target='#passwordRulesModal' class="glyphicon glyphicon-info-sign form-control-feedback"></a>
                    </div> 
                    <div class="form-group" id="passwordValidity">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Retype the Password">
                    </div>  
                    <div class="form-group" id="register-form-button">
                        <input type="reset" id="reset" value="Reset" class="btn btn-md btn-danger">
                        <input type="submit" id="registerButton" value="Register" class="btn btn-md btn-success" disabled>
                    </div>
                </form> 
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