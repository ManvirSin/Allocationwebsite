<?php
session_start();
if(isset($_POST['ADD'])) {
        $SUPID=$_SESSION["SUPID"];
        $SUPEmail=$_POST["SupervisorEmail"];
        $SUPPROJECTNAME=$_POST["SupervisorProjectName"];
        $SUPPROJECTINFO=$_POST["SupervisorProjectInfo"];
        $Status=0;

        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");
        // Stores users entered data from form into database
        $sql = "INSERT INTO `allocate system`.supervisorprojects (SupID, SupervisorEmail, SupervisorProjectName, SupervisorProjectInfo, Status) VALUES (
            '".$SUPID."',
            '".$SUPEmail."',
            '".$SUPPROJECTNAME."',
            '$SUPPROJECTINFO',
            '$Status')
            ; ";

        $result=$conn->multi_query($sql);

        $conn->close();
         header("Location:../Frontend/Supervsior-View-Their-Projects.php");
}
?>
