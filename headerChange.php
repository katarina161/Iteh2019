<?php 
session_start();

if(isset($_GET['id'])) {
    if(isset($_SESSION['logedIn'])) {
        echo '<a class="dropdown-item" href="user.php">'.$_SESSION["username"];'</a>';
        echo '<a class="dropdown-item" href="logout.php" id="logout">Log out</a>';
    } else {
        echo '<a class="dropdown-item" href="#signupModal" class="trigger-btn" data-toggle="modal">Sign up</a>';
        echo '<a class="dropdown-item" href="#loginModal" class="trigger-btn" data-toggle="modal">Log in</a>';
    }
}
?>