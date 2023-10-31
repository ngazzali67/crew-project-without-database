<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "user") {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo $_SESSION["username"]; ?> (User)</h2>
        <p>User dashboard content goes here.</p>
    </div>
</body>

</html>