<?php

//update
if (isset($_POST['update'])) {
    session_start();
    include "connection/connection.php";
    
    $errorCheck = false;

    $data["firstErr"] = "";
    $data["lastErr"] = "";
    $data["usernameErr"] = "";
    $data["emailErr"] = "";
    $data["passwordsErr"] = "";

    $user = $_SESSION['username'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $_POST['email'];
    $oldP = $mysqli->real_escape_string($_POST['oldP']);
    $newP = $mysqli->real_escape_string($_POST['newP']);
    $confirmP = $mysqli->real_escape_string($_POST['confirmP']);

    $query = "SELECT password FROM user WHERE username = '$user' ";
    $result = $mysqli->query($query);
    // if ($result !== false) {
    //     $row = mysqli_fetch_row($result);
    //     $passFromDb = $row[0];
    // }
    if($row = $result->fetch_object()) {
        $passFromDb = $row->password;
    }

    if ($oldP != $passFromDb) {
        $data["passwordsErr"] = "Please check your password inputs! Old password doesn't match!";
        $errorCheck = true;
    }

    if ($username != $user) {
        if (!validateUsername($username)) {
            $data["usernameErr"] = "That username is already taken!";
            $errorCheck = true;
        }
    }

    if (!validateFirstLastName($firstName)) {
        $data["firstErr"] = "Only letters and white space are allowed!";
        $errorCheck = true;
    }
    if (!validateFirstLastName($lastName)) {
        $data["lastErr"] = "Only letters and white space are allowed!";
        $errorCheck = true;
    }
    if (!validateEmail($email)) {
        $data["emailErr"] = "Invalid email format!";
        $errorCheck = true;
    }
    if ($newP != $confirmP) {
        $data["passwordsErr"] = "Please check your new password inputs!";
        $errorCheck = true;
    }

    if (!$errorCheck) {
        $setPassword = empty($newP) ? $oldP : $newP;
        $updateQuery = "UPDATE user SET first_name = '$firstName', last_name = '$lastName', username = '$username', email = '$email', password = '$setPassword' WHERE username = '$user'";
        $mysqli->query($updateQuery);
        $_SESSION["username"] = $username;
        $data['success'] ='<script type="text/javascript">document.getElementById("newPassword").value = "";' .
                            'document.getElementById("oldPassword").value = "";' .
                            'document.getElementById("confirmPassword").value = "";' .
                            'alert("Updated successfully");</script>';
    } else {
        $data['success'] ='<script type="text/javascript">document.getElementById("newPassword").value = "";' .
                            'document.getElementById("oldPassword").value = "";' .
                            'document.getElementById("confirmPassword").value = "";</script>';
    }

        echo json_encode($data);
};

// signup
if (isset($_POST['signup'])) {
    include "connection/connection.php";
    
    $errorCheck = false;

    $data["sufirstErr"] = "";
    $data["sulastErr"] = "";
    $data["suusernameErr"] = "";
    $data["suemailErr"] = "";
    $data["supasswordsErr"] = "";

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $_POST['email'];
    $password = $mysqli->real_escape_string($_POST['password']);
    $conPassword = $mysqli->real_escape_string($_POST['conPassword']);

    if (!validateUsername($username)) {
        $data["suusernameErr"] = "That username is already taken!";
        $errorCheck = true;
    }

    if (!validateFirstLastName($firstName)) {
        $data["sufirstErr"] = "Only letters and white space are allowed!";
        $errorCheck = true;
    }
    if (!validateFirstLastName($lastName)) {
        $data["sulastErr"] = "Only letters and white space are allowed!";
        $errorCheck = true;
    }
    if (!validateEmail($email)) {
        $data["suemailErr"] = "Invalid email format!";
        $errorCheck = true;
    }
    if ($password != $conPassword) {
        $data["supasswordsErr"] = "You must confirm your password!";
        $errorCheck = true;
    }

    if (!$errorCheck) {
        $updateQuery = "INSERT INTO user (username, password, first_name, last_name, email)" . 
                       " VALUES ('$username', '$password', '$firstName', '$lastName', '$email')";
        $mysqli->query($updateQuery);
        $data['susuccess'] ='<script type="text/javascript">alert("Sign up successfully");' . 
                            '$("#signupModal").modal("hide");</script>';
    } else {
        $data['susuccess'] ='<script type="text/javascript">document.getElementById("supassword").value = "";' .
                            'document.getElementById("suconfirmPassword").value = "";';
    }

        echo json_encode($data);
};

function test_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function validateFirstLastName($name)
{
    $name = test_input($name);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        return false;
    }
    return true;
}

function validateUsername($username)
{
    $username = test_input($username);
    if (strlen($username) < 2) {
        return false;
    }
    include "connection/connection.php";
    $query = "SELECT id FROM user WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        return false;
    }
    return true;
}

function validateEmail($email)
{
    $email = test_input($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}
