<?php
session_start();
if (!empty($_SESSION["email"])) {
    // User session is not empty, redirect to home.php
    header("Location: UI/home.php");
    exit();
} else {
    // User session is empty, redirect to signin.php
    header("Location: UI/signin.php");
    exit();
}

?>
