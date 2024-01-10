<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // check if all the POST variables are set and not empty
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        $_SESSION['error'] = 'Something is Wrong';
        header("Location: ../register.php");
    }
    if (empty($_POST['username'])) {
        $_SESSION['error'] = 'Username Required';
        header("Location: ../register.php");
        exit();
    }
    if (empty($_POST['email'])) {
        $_SESSION['error'] = 'Email Required';
        header("Location: ../register.php");
        exit();
    }
    if (empty($_POST['password'])) {
        $_SESSION['error'] = 'Password Required';
        header("Location: ../register.php");
        exit();
    }

    require_once('User.php');
    $user = new User();

    // Validate the user data
    $user->validate($_POST['username'], $_POST['email'], $_POST['password']);
    // Attempt to register
    $user->register($_POST['username'], $_POST['email'], $_POST['password']);
} else {
    header('Location: ../register.php');
}
