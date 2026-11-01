<?php
session_start();

$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';

unset($_SESSION['success'], $_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<body>

<h2>Student Registration</h2>

<p><?php echo $success; ?></p>
<p><?php echo $error; ?></p>

<form method="POST" action="db.php">

    <input type="hidden" name="operation" value="register">

    Name:
    <input type="text" name="name" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    Course:
    <input type="text" name="course" required><br><br>

    City:
    <input type="text" name="city" required><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    <input type="submit" value="Register">

</form>

<br>
<a href="index.php">Back to Login</a>

</body>
</html>