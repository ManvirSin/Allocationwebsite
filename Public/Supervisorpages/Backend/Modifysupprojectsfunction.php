<?php
session_start();
if(isset($_POST['Modify'])) {
    $SUPID=$_SESSION["SUPID"];
    $SUPPROJECTNAME=$_POST["SupervisorProjectName"];
    $SUPPROJECTINFO=$_POST["SupervisorProjectInfo"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "UPDATE `allocate system`.supervisorprojects SET SupervisorProjectName='$SUPPROJECTNAME',SupervisorProjectInfo='$SUPPROJECTINFO' where SupID='$SUPID'";
    echo $sql;
    $conn->query($sql);

    $conn->close();
    header("Location:../Frontend/Supervsior-View-Their-Projects.php");
    die();
} else {
    header("Location:../Frontend/Supervsior-View-Their-Projects.php");
    die();
}
?>