<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $dob = $_POST['dob'];
    $admission_number = $_POST['admission_number'];
    $student_phone = $_POST['student_phone'];
    $parents_phone = $_POST['parents_phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO students (student_name, dob, admission_number, student_phone, parents_phone, email, password)
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$student_name, $dob, $admission_number, $student_phone, $parents_phone, $email, $password]);
        header("Location: login.html");
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Error: Duplicate Admission Number or Email. <a href='register.html'>Try again</a>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
