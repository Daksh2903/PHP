<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Update Student Details</h2>

<form method="POST" action="db.php">

    <input type="hidden" name="operation" value="update">

    Name:
    <input type="text" name="name"
    value="<?php echo htmlspecialchars($_SESSION['name']); ?>" required>
    <br><br>

    Course:
    <input type="text" name="course"
    value="<?php echo htmlspecialchars($_SESSION['course']); ?>" required>
    <br><br>

    City:
    <input type="text" name="city"
    value="<?php echo htmlspecialchars($_SESSION['city']); ?>" required>
    <br><br>

    Gender:

    <input type="radio" name="gender" value="Male"
    <?php if ($_SESSION['gender'] == "Male") echo "checked"; ?> required> Male

    <input type="radio" name="gender" value="Female"
    <?php if ($_SESSION['gender'] == "Female") echo "checked"; ?>> Female

    <br><br>

    <input type="submit" value="Update">

</form>

<br>
<a href="main.php">Back to Dashboard</a>

</body>
</html>