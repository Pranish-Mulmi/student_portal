<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : "light";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
    <style>
        body {
            background-color: <?php echo $theme == "dark" ? "black" : "white"; ?>;
            color: <?php echo $theme == "dark" ? "white" : "black"; ?>;
        }
    </style>
</head>
<body>
<div class="container dashboard">
    <h1>Welcome to Student Dashboard</h1>
    <p>Hello, <?php echo $_SESSION['student_id']; ?>!</p>
    <nav>
        <a href="preference.php">Change Theme</a>
        <a href="logout.php">Logout</a>
    </nav>
</div>
</body>
</html>