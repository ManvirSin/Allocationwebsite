<?php
session_start();
if(isset($_POST['allocate'])) {
    $SUPID=$_POST["Supdetails"];
    $Status=1;
    $StudentID=$_POST["Studentdetails"];

    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Updating student data based on what is inputted in the form
    $sql = "insert into allocatesystemforstudent (StudentID, StudentEmail, SupID, SupervisorEmail, SupervisorProjectName, SupervisorProjectInfo, Status)   SELECT StudentID,StudentEmail,SupID,SupervisorEmail,SupervisorProjectName,SupervisorProjectInfo,'$Status'from studentaccountinformation,supervisorprojects where StudentID='$StudentID' and SupID='$SUPID'";

    echo $sql;
   print_r($_POST["Studentdetails"]);

    $conn->query($sql);



}

die();
?>
