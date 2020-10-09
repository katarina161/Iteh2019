<?php
session_start();

if(isset($_POST['delete'])) {
    include "connection/connection.php";
    
    $errorCheck = false;

    $user = $_SESSION['username'];
    $password = $mysqli->real_escape_string($_POST['password']);
    $conPassword = $mysqli->real_escape_string($_POST['conPassword']);

    if ($password != $conPassword) {
        exit("You must confirm your password!");
    }

    $query = "SELECT password FROM user WHERE username = '$user' ";
    $result = $mysqli->query($query);

    if($row = $result->fetch_object()) {
        $passFromDb = $row->password;
    }
    if ($password != $passFromDb) {
        exit("Password is incorrect!");
    }

    $deleteQuery = "DELETE FROM user WHERE username='$user'";
    $result = $mysqli->query($deleteQuery);
    echo '<script type="text/javascript">alert("You deleted your account successfully!");</script>';

    unset($_SESSION['logedIn']);
    session_destroy();
    echo '<script>window.location.replace("index.php");</script>';
    
}



?>
