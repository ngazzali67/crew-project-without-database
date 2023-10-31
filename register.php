<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $user = [
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "role" => "user"
    ];

    // Save user data to a file (for simplicity)
    file_put_contents("users.json", json_encode($user) . '<br>', FILE_APPEND);

    // Redirect to login page
    header("location: login.php");
    exit();
}
