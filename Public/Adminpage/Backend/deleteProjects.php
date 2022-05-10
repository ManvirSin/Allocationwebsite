<?php
if(isset($_POST['delete'])) {
        $SUPID=$_POST["delete"];
        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");
        // Delete selected student from database
        $sql = "DELETE FROM supervisorprojects WHERE SupID='$SUPID'";
        echo $sql;
        $conn->multi_query($sql);
        
        $conn->close();
        header("Location:../Frontend/view all projects.php");
        die();
    } else {
        header("Location:../Frontend/view all projects.php");
        die();
    }
?>