<?php
session_start();
if (isset($_POST['login'])) {
    $_SESSION["supervisorEmail"] = $_POST["email"];
    $Email=$_POST["email"];
    $Password=$_POST["password"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Verification check, checking if inputted details match pre-registered supervisors details
    $sql = "SELECT * FROM `allocate system`.supervisoraccount WHERE SupervisorEmail='".$Email."' AND SupervisorPassword='".$Password."';";
    echo $sql;
    $reports = $conn->query($sql);
    if ($reports->num_rows == 1) {
        session_start();
        while($row = $reports->fetch_assoc()) {
            $_SESSION["SUPID"] = $row["SupID"];
            $_SESSION["ID"] = "";
        }
        header("Location:../../Supervisorpages/Frontend/Supervsior-View-Their-Projects.php");
        die();
    }else {
        echo "<h3>No such Email account</h3>";
        echo "<h3>Or wrong Email and Password</h3>";
        echo "<h3>Please try Again</h3>";

        echo "<a href='../web/index.html'>Click Login Page to Back</a>";
    }
    $conn->close();
}else{
    header("Location:../../Supervisorpages/Frontend/Supervsior-View-Their-Projects.php");
    die();
}
?>