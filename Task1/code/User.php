<?php

class User
{

    // Validate the username, email and password
    public function validate($username, $email, $password)
    {
        require_once '../config/Database.php';

        $db = new Database();

        // Check if username already exist in the table
        $result = $db->query("SELECT * FROM users WHERE username = '$username'");
        if ($result->num_rows > 0) {
            $_SESSION['error'] = $username . ' Username is already taken.';
            header('Location: ../register.php');
            exit();
        }
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email format.';
            header('Location: ../register.php');
            exit();
        }
        // Check If Password is secure
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/', $password)) {
            $_SESSION['error'] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
            header('Location: ../register.php');
            exit();
        }
    }

    // Insert the user into the Database
    public function register($username, $email, $password)
    {
        $username = $username;
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $password = trim($password);

        require_once '../config/Database.php';
        try {
            $db = new Database();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                $db->close();
                $this->login($username, $password);
            } else {
                throw new Exception('Unable to register user');
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error: ' . $e->getMessage();
            header('Location: ../register.php');
            exit();
        }
    }

    // Try to Login
    public function login($username, $password)
    {
        require_once '../config/Database.php';
        try {
            $db = new Database();

            $stmt = $db->prepare("SELECT id,password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($id, $hashedPassword);

            if ($stmt->fetch()) {
                if (password_verify($password, $hashedPassword)) {
                    $db->close();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = $username;
                    header('Location: ../home.php');
                    exit();
                } else {
                    $db->close();
                    $_SESSION['error'] = 'Password Mismatch';
                    header('Location: ../index.php');
                    exit();
                }
            } else {
                throw new Exception('User Not Found');
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error: ' . $e->getMessage();
            header('Location: ../index.php');
            exit();
        }
    }
}
