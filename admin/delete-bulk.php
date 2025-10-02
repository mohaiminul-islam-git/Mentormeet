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

if ($_POST && isset($_POST['pids'])) {
    $pids = $_POST['pids'];
    $ids_string = implode(',', array_map('intval', $pids));

    if (!empty($ids_string)) {
        $sql_delete = "DELETE FROM patient WHERE pid IN ($ids_string)";
        $database->query($sql_delete);
    }
}

header("location: student.php");
?>