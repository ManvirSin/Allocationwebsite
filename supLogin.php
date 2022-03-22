<?php
    $msg="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email=$_POST["email"];
        $password=$_POST["password"];
        $conn = new mysqli("localhost", "root", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $conn->select_db("desi_spice");
        // Verification check, checking if inputted details match pre-registered admin details
        $sql = "SELECT * FROM sup_data WHERE Email='".$email."' AND Password='".$password."';";
        echo $sql;
        $reports = $conn->query($sql);
		if ($reports->num_rows == 1) {
            session_start();
			while($row = $reports->fetch_assoc()) {
                $_SESSION["SUP_ID"] = $row["ID"];
                $_SESSION["ID"] = "";
			}
            header("Location:../php/viewApproval.php");
            die();
		}else {
			echo "<h3>No such account</h3>";
            echo "<a href=\"../html/login.html\">Home</a>";
		}
        $conn->close();
    }else{
        header("Location:../html/login.html");
        die();
    }
?>