<?php
session_start();
if(isset($_POST['Modify'])) {
    $SupId=$_POST["Modify"];
    $supervisorEmail=$_POST["SupEmail"];
    $supervisorPassword=$_POST["SupPassword"];
    $supervisorFirstName=$_POST["SupFirstName"];
    $supervisorLastName=$_POST["SupLastName"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "UPDATE supervisoraccount SET SupervisorEmail='$supervisorEmail',SupervisorPassword='$supervisorPassword', First_Name='$supervisorFirstName', Last_Name='$supervisorLastName' where SupID='$SupId'";
    echo $sql;
    $conn->query($sql);

    $conn->close();
}
header("Location:../Frontend/sup.php");
die();
?>