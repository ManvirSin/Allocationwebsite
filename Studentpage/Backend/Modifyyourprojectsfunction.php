<?php
session_start();
if(isset($_POST['Modify'])) {
    $StudentID=$_SESSION["StudentID"];
    $StudentProjectName=$_POST["StudentProjectName"];
    $StudentProjectInfo=$_POST["StudentProjectInfo"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "UPDATE `allocate system`.studentprojects SET StudentProjectName='$StudentProjectName',StudentProjectInfo='$StudentProjectInfo' WHERE StudentID='$StudentID'";
    echo $sql;
    $conn->query($sql);

    $conn->close();
    header("Location:../Frontend/Student-View-Their-Projects.php");
    die();
} else {
    header("Location:../Frontend/view all projects.php");
    die();
}
?>