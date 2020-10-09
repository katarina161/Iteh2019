<div id="signupModal" class="modal fade">
    <div class="modal-dialog modal-login modal-signup">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Sign Up</h2>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Please fill in this form to create an account!</p>
                <hr>
                <form action="processUserProfile.php" method="post">
                    <p id="sufirstNameErr" class="err"></p>
                    <div class="input-group mb-2">
                        <input type="text" id="sufirstName" name="firstName" value="" class="form-control" placeholder="First Name">
                    </div>
                    <p id="sulastNameErr" class="err"></p>
                    <div class="input-group mb-2">
                        <input type="text" id="sulastName" name="lastName" value="" class="form-control" placeholder="Last Name">
                    </div>
                    <p id="suusernameErr" class="err"></p>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" id="suusername" name="username" value="" class="form-control" placeholder="Username">
                    </div>
                    <p id="suemailErr" class="err"></p>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-paper-plane"></i></div>
                        </div>
                        <input type="email" id="suemail" name="email" value="" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" id="supassword" name="password" value="" class="form-control" placeholder="Password">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i><i class="fa fa-check"></i></div>
                        </div>
                        <input type="password" id="suconfirmPassword" name="confirm_password" value="" class="form-control" placeholder="Confirm Password">
                    </div>
                    <p id="termsErr" class="err"></p>
                    <div class="form-group">
                        <label class="checkbox-inline"><input type="checkbox" id="checkTerm"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                    </div>
                    <p id="suPasswordsErr" class="err"></p>
                    <div class="form-group">
                        <input type="button" id="btnSignup" class="btn btn-primary btn-block btn-lg" value="Sign Up">
                    </div>
                    <div id="signupSuccess"></div>
                </form>

            </div>
            <div class="modal-footer">
                Already have an account?
                <a href="#loginModal" data-toggle="modal" data-dismiss="modal">Log In</a>
            </div>
        </div>
    </div>
</div>