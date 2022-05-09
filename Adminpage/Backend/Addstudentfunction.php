<?php
if(isset($_POST['ADD'])) {
        $StudentEmail=$_POST["StudentEmail"];
        $StudentPassword=$_POST["StudentPassword"];
        $Fist_Name=$_POST["Fist_Name"];
        $Last_Name=$_POST["Last_Name"];
        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");
        // Stores users entered data from form into database
        $sql = "INSERT INTO studentaccountinformation (StudentEmail, StudentPassword, First_Name, Last_Name) VALUES (
            '".$StudentEmail."',
            '".$StudentPassword."',
            '".$Fist_Name."',
            '".$Last_Name."')
            ; ";
        $result=$conn->multi_query($sql);

        $conn->close();
         header("Location:../Frontend/view%20students.php");

    }
?>
