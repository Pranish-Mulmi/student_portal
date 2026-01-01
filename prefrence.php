<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = $_POST['theme'] ?? 'light';
    setcookie('theme', $theme, time() + 86400 * 30, "/");
    $_COOKIE['theme'] = $theme; // immediate effect
    $message = "Theme updated to " . htmlspecialchars($theme);
}

$theme = $_COOKIE['theme'] ?? 'light';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Preferences</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Preferences</h2>
<?php if ($message): ?><p class="notice"><?= $message ?></p><?php endif; ?>
<form method="POST">
    <label>Select Theme</label>
    <select name="theme">
        <option value="light" <?= $theme === 'light' ? 'selected' : '' ?>>Light Mode</option>
        <option value="dark" <?= $theme === 'dark' ? 'selected' : '' ?>>Dark Mode</option>
    </select>
    <button type="submit">Save</button>
</form>
<p>Current theme: <strong><?= htmlspecialchars($theme) ?></strong></p>
</body>
</html>