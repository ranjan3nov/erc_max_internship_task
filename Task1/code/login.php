<?php
session_start();
// Check if request is from Post Method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // check the post variables
    if (!isset($_POST['username'], $_POST['password'])) {
        header("Location: ../index.php");
        exit();
    }
    if (empty($_POST['username'])) {
        $_SESSION['error'] = 'Username Required';
        header("Location: ../index.php");
        exit();
    }
    if (empty($_POST['password'])) {
        $_SESSION['error'] = 'Password Required';
        header("Location: ../index.php");
        exit();
    }
    require_once('User.php');

    $user = new User();
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Attempt to Login
    $user->login($username, $password);
} else {
    header("Location: ../index.php");
}
