<?php
session_start();

unset($_SESSION['logedIn']);
session_destroy();
header('Location: index.php');
?>