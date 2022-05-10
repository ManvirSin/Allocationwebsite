<?php
if(isset($_POST['ADD'])) {
        $Status=0;
        $SupID=$_POST["SupID"];
        $SupervisorEmail=$_POST["SupervisorEmail"];
        $SupervisorProjectName=$_POST["SupervisorProjectName"];
        $SupervisorProjectInfo=$_POST["SupervisorProjectInfo"];

        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");
        // Stores users entered data from form into database
        $sql = "INSERT INTO supervisorprojects ( SupID, SupervisorEmail, SupervisorProjectName, SupervisorProjectInfo, Status) VALUES (
            '".$SupID."',
            '".$SupervisorEmail."',
            '".$SupervisorProjectName."',
            '$SupervisorProjectInfo',
            '$Status')
            ; ";

        $result=$conn->multi_query($sql);

        $conn->close();
         header("Location:../Frontend/view%20all%20projects.php");

    }
?>
