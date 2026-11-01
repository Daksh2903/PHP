<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';

unset($_SESSION['success'], $_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<body>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<p><?php echo $success; ?></p>
<p><?php echo $error; ?></p>

<h3>Student Details</h3>

ID: <?php echo $_SESSION['id']; ?><br><br>
Name: <?php echo $_SESSION['name']; ?><br><br>
Course: <?php echo $_SESSION['course']; ?><br><br>
City: <?php echo $_SESSION['city']; ?><br><br>
Gender: <?php echo $_SESSION['gender']; ?><br><br>

<a href="update.php">
    <button>Update</button>
</a>

<br><br>

<form method="POST" action="db.php"
      onsubmit="return confirm('Are you sure?');">

    <input type="hidden" name="operation" value="delete">
    <input type="submit" value="Delete Account">

</form>

<br>

<form method="POST" action="db.php">

    <input type="hidden" name="operation" value="logout">
    <input type="submit" value="Logout">

</form>

</body>
</html>