<?php
session_start();
if(isset($_POST['submit'])) {
    $SUPID=$_POST["choose"];
    $Status=1;
    $StudentID=$_SESSION["StudentID"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "insert into allocatesystemforstudent (StudentID, StudentEmail, SupID, SupervisorEmail, SupervisorProjectName, SupervisorProjectInfo, Status)   SELECT StudentID,StudentEmail,SupID,SupervisorEmail,SupervisorProjectName,SupervisorProjectInfo,'$Status'from studentaccountinformation,supervisorprojects where StudentID='$StudentID' and  SupID='$SUPID'; ";
    echo $sql;
    $conn->query($sql);

    $conn->close();
}
header("Location:../Frontend/Student-View-Their-Projects.php");
die();
?>
