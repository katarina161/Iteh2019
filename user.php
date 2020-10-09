<?php
session_start();

if (!isset($_SESSION['logedIn'])) {
    header('Location: index.php');
    exit(0);
}
include "header.php";
include "loadUserProfile.php";
include "deleteModal.php";
?>

    <div id="userBackground"></div>
    <div class="container user-form">
        <h3>User Profile</h2>
            <form action="processUserProfile.php" method="post" id="userProfile">
                <div class="form-row">
                    <p class=" col-md-6 err" id="firstNameErr"></p>
                    <p class=" col-md-6 err" id="lastNameErr"></p>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-md-6">
                        <input type="text" id="firstName" name="firstName" value="<?php echo $user->get_firstName() ?>" class="form-control" placeholder="First Name">
                    </div>
                    <div class="input-group mb-3 col-md-6">
                        <input type="text" id="lastName" name="lastName" value="<?php echo $user->get_lastName() ?>" class="form-control" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-row">
                    <p class="col-md-4 err" id="usernameChangeErr"></p>
                    <p class="col-md-8 err" id="emailErr"></p>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-md-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" id="usernameChange" name="username" value="<?php echo $_SESSION['username'] ?>" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group mb-3 col-md-8">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-paper-plane"></i></div>
                        </div>
                        <input type="email" id="email" name="email" value="<?php echo $user->get_email() ?>" class="form-control" placeholder="Email Address">
                    </div>
                </div>
                <p>Change password:</p>
                <p id="oldPErr" class="err"></p>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    </div>
                    <input type="password" id="oldPassword" name="oldPassword" value="" class="form-control" placeholder="Old Password">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    </div>
                    <input type="password" id="newPassword" name="newPassword" value="" class="form-control" placeholder="New Password">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-lock"></i><i class="fa fa-check fa-check2"></i></div>
                    </div>
                    <input type="password" id="confirmPassword" name="confirm_password" value="" class="form-control" placeholder="Confirm Password">
                </div>
                <p id="passwordsErr" class="err"></p>

                <div class="form-row">
                    <div class="form-group mr-5">
                        <input type="button" id="btnSave" class="btn btn-primary btn-block btn-lg" value="Save Changes">
                    </div>
                    <div class="form-group">
                        <a href="#deleteModal" data-toggle="modal">
                            <input type="button" id="btnDelete" class="btn btn-primary btn-block btn-lg" value="Delete Account">
                        </a>
                    </div>                   
                </div>
                <div id="updateSuccess"></div>
            </form>
    </div>

</body>

</html>
