<?php
session_start();
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $docid = $_POST["docid"];
    $docname = $_POST["docname"];
    $title = $_POST["title"];
    $sheduledate = $_POST["sheduledate"];
    $scheduletime = $_POST["scheduletime"];
    $nop = $_POST["nop"];

    // আজকের তারিখ বের করি
    date_default_timezone_set('Asia/Kolkata');
    $today = date("Y-m-d");

    // চেক করি যে future date কিনা
    if ($sheduledate <= $today) {
        // যদি আজ বা পুরানো date হয় → back করে error দেখাও
        echo "<script>
            alert('Session date must be a future date!');
            window.location.href = 'schedule.php';
        </script>";
        exit();
    }

    // যদি valid হয় তবে insert করি
    $sql = "INSERT INTO schedule (docid, title, scheduledate, scheduletime, nop) 
            VALUES ('$docid', '$title', '$sheduledate', '$scheduletime', '$nop')";

    if ($database->query($sql)) {
        echo "<script>
            alert('Session added successfully!');
            window.location.href = 'schedule.php';
        </script>";
    } else {
        echo "<script>
            alert('Error while adding session!');
            window.location.href = 'schedule.php';
        </script>";
    }
}
?>
