<?php
session_start();
if (isset($_POST['login'])) {
    $_SESSION["adminEmail"] = $_POST["email"];
    $Email=$_POST["email"];
    $Password=$_POST["password"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verification check, checking if inputted details match pre-registered admin details
    $sql = "SELECT * FROM `allocate system`.adminaccount WHERE AdminEmail='".$Email."' AND AdminPassword='".$Password."';";
    echo $sql;
    $reports = $conn->query($sql);
    if ($reports->num_rows == 1) {
        session_start();
        while($row = $reports->fetch_assoc()) {
            $_SESSION["AdminID"] = $row["AdminID"];
            $_SESSION["ID"] = "";
        }
        header("Location:../../Adminpage/Frontend/view all projects.php");
        die();
    }else {
        echo "<h3>No such Email account</h3>";
        echo "<h3>Or wrong Email and Password</h3>";
        echo "<h3>Please try Again</h3>";
        echo "<a href='../web/index.html'>Click Login Page to Back</a>";
    }
    $conn->close();
}else{
    header("Location:../web");
    die();
}