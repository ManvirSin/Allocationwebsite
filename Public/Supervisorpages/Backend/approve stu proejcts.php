<?php
session_start();
if(isset($_POST['approve'])) {
    $sid=$_POST["choose"];
    $dd="approved";
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Delete selected student from database
    $sql = "UPDATE studentprojects SET Status='$dd' where StudentID='$sid'";
    echo $sql;
    $conn->multi_query($sql);

    $conn->close();
    header("Location:../Frontend/Supervisor Choose project.php");
    die();
} else {
    header("Location:../Frontend/Supervisor Choose project.php");
    die();
}
?>

