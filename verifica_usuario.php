<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 

if (!isset($_SESSION['user_id'])) {
    $redirect = basename($_SERVER['SCRIPT_NAME'], '.php');
    header("Location: login.php?redirect=$redirect.php");
    exit;
}