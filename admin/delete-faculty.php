<?php
session_start();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
        header("location: ../login.php");
        exit();
    }
} else {
    header("location: ../login.php");
    exit();
}

include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete faculty (doctor) from DB
    $sql = "DELETE FROM doctor WHERE docid='$id'";
    $database->query($sql);

    // After delete redirect back
    header("location: faculty.php");
    exit();
} else {
    header("location: faculty.php");
    exit();
}
?>
