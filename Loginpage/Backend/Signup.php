<?php
session_start();
if(isset($_POST['ADD'])) {
        $StudentEmail=$_POST["Email"];
        $StudentPassword=$_POST["Password"];
        $StudentFirstname=$_POST["firstname"];
        $StudentLastname=$_POST["lastname"];
        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("allocate system");

        $get_user = ("SELECT * FROM `allocate system`.studentaccountinformation WHERE StudentEmail='$StudentEmail'");
        $result = mysqli_query($conn, $get_user);

        if(mysqli_num_rows($result) > 0 ) {
            $conn->close();
            echo "<script type='text/javascript'>alert('Email Already in Use. Please try again with a different email.');
            window.location.href='../web';
            </script>";
        }

        // Stores users entered data from form into database
        else {
            $sql1 = "INSERT INTO  `allocate system`.studentaccountinformation(StudentEmail, StudentPassword, First_name, Last_name) VALUES (
            '" . $StudentEmail . "',
            '" . $StudentPassword . "',
            '$StudentFirstname',
            '$StudentLastname') 
            ; ";

            $result1 = mysqli_query($conn, $sql1);

            $conn->close();

            echo "<script type='text/javascript'>alert('Account Created. Please Login.');
            window.location.href='../web';
            </script>";
        }






    }
?>
