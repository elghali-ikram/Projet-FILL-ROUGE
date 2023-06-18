<?php
session_start();

// Unset session variables
unset($_SESSION['email']);
// ... unset other session variables if needed

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: ../index.php");
exit;
?>