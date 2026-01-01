<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme = $_POST['theme'];
    setcookie("theme", $theme, time() + (86400 * 30)); // 30 days
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Preferences</title>
</head>
<body>
<div class="container">
    <h2>Theme Preference</h2>
    <form method="POST">
        <select name="theme">
            <option value="light">Light Mode</option>
            <option value="dark">Dark Mode</option>
        </select>
        <button type="submit">Save Preference</button>
    </form>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</div>
</body>
</html>