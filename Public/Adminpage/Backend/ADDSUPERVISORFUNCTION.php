<?php
if(isset($_POST['ADD'])) {

    $SupervisorEmail=$_POST["SupervisorEmail"];
    $SupervisorPassword=$_POST["SupervsiorPassword"];
    $First_Name=$_POST["First_Name"];
    $Last_Name=$_POST["Last_Name"];


    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Stores users entered data from form into database
    $sql = "INSERT INTO supervisoraccount (SupervisorEmail, SupervisorPassword, First_Name, Last_Name) VALUES (
            '".$SupervisorEmail."',
            '".$SupervisorPassword."',
            '".$First_Name."',
            '$Last_Name')
            ; ";

    $result=$conn->multi_query($sql);

    $conn->close();
    header("Location:../Frontend/sup.php");
//        die();
//    } else {
//        header("Location:../html/Mtfirstpage.html");
//        die();
}
?>

