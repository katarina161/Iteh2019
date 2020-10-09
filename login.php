<?php
session_start();

if (isset($_POST['login'])) {
    include "connection/connection.php";

    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $query = "SELECT id FROM user WHERE username = '$username' AND password = '$password'";
    $data = $mysqli->query($query);

    if ($data->num_rows > 0) {
        $_SESSION['logedIn'] = 1;
        $_SESSION['username'] = $username;
    } else {
        echo '<script type="text/javascript">document.getElementById("password").value = "";</script>';
        exit('Please check your inputs!');
    }

    $mysqli->close();

}

if (isset($_SESSION['logedIn'])) {
    echo '<script type="text/javascript">alert("Logged in successfully");';
    echo '$("#loginModal").modal("hide");</script>';
}

?>