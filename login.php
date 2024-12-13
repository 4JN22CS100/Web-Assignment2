<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admission_number = $_POST['admission_number'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE admission_number = ?");
        $stmt->execute([$admission_number]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($student && password_verify($password, $student['password'])) {
            $_SESSION['student'] = $student;
            header("Location: home.php");
        } else {
            echo "Invalid credentials. <a href='login.html'>Try again</a>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
