<?php
    require_once "db.php";
    session_start();

    $message = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_id = trim($_POST['student_id']);
        $full_name  = trim($_POST['full_name']);
        $password   = $_POST['password'];

        if ($student_id && $full_name && $password) {
            $hash = password_hash($password, PASSWORD_BCRYPT);

            try {
                $stmt = $conn->prepare("INSERT INTO students (student_id, full_name, password_hash) VALUES (?, ?, ?)");
                $stmt->execute([$student_id, $full_name, $hash]);
                header("Location: login.php?registered=1");
                exit;
            } catch (PDOException $e) {
                $message = "Error: " . $e->getMessage();
            }
        } else {
            $message = "All fields are required.";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if ($message): ?><p class="notice"><?= htmlspecialchars($message) ?></p><?php endif; ?>
    <form method="POST">
        <label>Student ID</label>
        <input type="text" name="student_id" required>
        <label>Full Name</label>
        <input type="text" name="full_name" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Register</button>
    </form>
    <p><a href="login.php">Already registered? Login</a></p>

</div>
</body>
</html>