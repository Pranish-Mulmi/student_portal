<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Logout</title>
</head>
<body>
<div class="container">
    <h2>You have been logged out.</h2>
    <p><a href="login.php">Login again</a></p>
</div>
</body>
</html>