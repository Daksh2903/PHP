<?php
session_start();

$conn = new mysqli("localhost", "root", "", "practic");

if ($conn->connect_error) {
    die("Connection Failed");
}

$op = $_POST['operation'];

//                  LOGIN
if ($op == "login") {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM student WHERE name=?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $student = $stmt->get_result()->fetch_assoc();

    if ($student && $password == $student['password']) {

        $_SESSION['id'] = $student['id'];
        $_SESSION['name'] = $student['name'];
        $_SESSION['course'] = $student['course'];
        $_SESSION['city'] = $student['city'];
        $_SESSION['gender'] = $student['gender'];

        header("Location: main.php");
    } else {
        $_SESSION['error'] = "Invalid Name or Password";
        header("Location: index.php");
    }
    exit;
}
//                  REGISTER
elseif ($op == "register") {

    $stmt = $conn->prepare("INSERT INTO student(name,password,course,city,gender) VALUES(?,?,?,?,?)");

    $stmt->bind_param("sssss", $_POST['name'], $_POST['password'], $_POST['course'], $_POST['city'], $_POST['gender']);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration Successful";
    } else {
        $_SESSION['error'] = "Registration Failed";
    }

    header("Location: register.php");
    exit;
}
//                  UPDATE
elseif ($op == "update") {

    $id = $_SESSION['id'];

    $stmt = $conn->prepare("UPDATE student SET name=?,course=?,city=?,gender=? WHERE id=?");

    $stmt->bind_param("ssssi", $_POST['name'], $_POST['course'], $_POST['city'], $_POST['gender'], $id);

    if ($stmt->execute()) {

        $_SESSION['name'] = $_POST['name'];
        $_SESSION['course'] = $_POST['course'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['gender'] = $_POST['gender'];

        $_SESSION['success'] = "Record Updated Successfully";
    } else {
        $_SESSION['error'] = "Update Failed";
    }

    header("Location: main.php");
    exit;
}
//                  DELETE
elseif ($op == "delete") {

    $id = $_SESSION['id'];

    $stmt = $conn->prepare("DELETE FROM student WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}

elseif ($op == "logout") {

    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}

$conn->close();
?>