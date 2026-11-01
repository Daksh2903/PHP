<?php
session_start();

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<body>

<h2>Student Login</h2>

<p><?php echo $error; ?></p>

<form method="POST" action="db.php">

    <input type="hidden" name="operation" value="login">

    Name:
    <input type="text" name="name" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">

</form>

<br>
<a href="register.php">New Student? Register Here</a>

</body>
</html>