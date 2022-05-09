<?php
session_start();
if(isset($_POST['Modify'])) {
    $SUPID=$_SESSION["SupID"];
    $SupervisorProjectName=$_POST["SupervisorProjectName"];
    $SupervisorProjectInfo=$_POST["SupervisorProjectInfo"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "UPDATE supervisorprojects SET SupervisorProjectName='$SupervisorProjectName',SupervisorProjectInfo='$SupervisorProjectInfo' where SupID='$SUPID'";
    echo $sql;
    $conn->query($sql);

    $conn->close();
    header("Location:../Frontend/view all projects.php");
    die();
} else {
    header("Location:../Frontend/view all projects.php");
    die();
}
?>