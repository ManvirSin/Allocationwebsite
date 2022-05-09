<?php
session_start();
if(isset($_POST['submit'])) {
    $StudentID=$_POST["choose"];
    $Status=0;
    $SUPID=$_SESSION["SUPID"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "insert into supervisorprojects (SupID, SupervisorEmail, SupervisorProjectName, SupervisorProjectInfo, Status)  SELECT SupID,SupervisorEmail ,StudentProjectName,StudentProjectInfo,'$Status'from studentprojects,supervisoraccount where StudentID='$StudentID' and  SupID='$SUPID'; ";
    echo $sql;
    $conn->query($sql);

    $conn->close();
}
header("Location:../Frontend/Supervsior-View-Their-Projects.php");
die();
?>
