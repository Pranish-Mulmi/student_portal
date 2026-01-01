<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$theme = $_COOKIE['theme'] ?? 'light';
$bg    = ($theme === 'dark') ? '#111' : '#f4f6f9';
$fg    = ($theme === 'dark') ? '#f1f1f1' : '#333';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { background: <?= $bg ?>; color: <?= $fg ?>; font-family: Arial, sans-serif; }
        .nav { margin-bottom:20px; }
        .nav a, .nav form button { padding:8px 12px; margin-right:10px; text-decoration:none; border:none; border-radius:4px; cursor:pointer; }
        .btn { background:#007bff; color:white; }
        .danger { background:#dc3545; color:white; }
    </style>
</head>
<body>
<div class="nav">
    <a class="btn" href="dashboard.php">Dashboard</a>
    <a class="btn" href="prefrence.php">Preferences</a>
    <form method="POST" action="logout.php" style="display:inline;">
        <button class="danger" type="submit">Logout</button>
    </form>
</div>

<h2>Welcome, <?= htmlspecialchars($_SESSION['full_name']) ?>!</h2>
<p>Current theme: <strong><?= htmlspecialchars($theme) ?></strong></p>
</body>
</html>