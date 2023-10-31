<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Load user data from the file (for simplicity)
    $users = file("users.json");

    foreach ($users as $user) {
        $userData = json_decode($user, true);
        if ($userData["email"] == $email && password_verify($password, $userData["password"])) {
            // Start the session and set user role
            session_start();
            $_SESSION["username"] = $userData["username"];
            $_SESSION["role"] = $userData["role"];

            // Redirect based on user role
            if ($_SESSION["role"] == "admin") {
                header("location: admin.php");
            } else {
                header("location: user.php");
            }
            exit();
        }
    }

    // Redirect back to login page if authentication fails
    header("location: login.php");
    exit();
}
