<?php
    require_once "db.php";
    session_start();

    $message = "";
    if (isset($_GET['registered'])) {
        $message = "Registration successful. Please log in.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_id = trim($_POST['student_id']);
        $password   = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
        $stmt->execute([$student_id]);
        $student = $stmt->fetch();

        if ($student && password_verify($password, $student['password_hash'])) {
            $_SESSION['logged_in']  = true;
            $_SESSION['student_id'] = $student['student_id'];
            $_SESSION['full_name']  = $student['full_name'];
            header("Location: dashboard.php");
            exit;
        } else {
            $message = "Invalid Student ID or Password.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php if ($message): ?><p class="notice"><?= htmlspecialchars($message) ?></p><?php endif; ?>
<form method="POST">
    <label>Student ID</label>
    <input type="text" name="student_id" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
<p><a href="register.php">Create a new account</a></p>
</body>
</html>
