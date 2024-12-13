<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: login.html");
    exit();
}
$student = $_SESSION['student'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($student['student_name']); ?>!</h1>
        <p>Your Admission Number: <?php echo htmlspecialchars($student['admission_number']); ?></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
