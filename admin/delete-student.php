<?php
session_start();
if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}

include("../connection.php");

if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    $sql_delete = "DELETE FROM patient WHERE pid = $pid;";
    $database->query($sql_delete);
}

header("location: student.php");
?>