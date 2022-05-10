<?php
session_start();
if(isset($_POST["decline"])) {
    $sid=$_POST["decline"];
    $bb="declined";
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Delete selected student from database
    $sql = "UPDATE studentprojects SET Status='$bb' ";
    echo $sql;
    $conn->multi_query($sql);

    $conn->close();
    header("Location:../Frontend/Supervsior-View-Their-Projects.php");
    die();
} else {
    header("Location:../Frontend/Supervsior-View-Their-Projects.php");
    die();
}
?>
