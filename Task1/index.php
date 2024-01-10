<?php
session_start();
// If the user is logged in redirect to the home page
if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
    exit;
}



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid">

        <?php
        if (isset($_SESSION['error'])) {
            echo '<center>
                    <div class="alert alert-danger alert-dismissible show mt-5" role="alert" style="width:50%;">
                        <strong>' . $_SESSION['error'] . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </center>';
            unset($_SESSION['error']);
        }
        ?>
        <div class="container mt-5 p-3" id="main">
            <h1 class="text-center">Login</h1>
            <form action="code/login.php" method="Post">
                <div class="mb-3">
                    <label for="username" class="form-label">Please Enter your username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <a href="register.php">Not Registered!!! Click to Register</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>