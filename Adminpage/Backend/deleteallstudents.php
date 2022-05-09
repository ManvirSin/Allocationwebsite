<?php
if(isset($_POST['delete'])) {
    $StudentID=$_POST["delete"];
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("allocate system");
    // Delete selected student from database
    $sql = "DELETE FROM studentaccountinformation WHERE StudentID='$StudentID'";
    echo $sql;
    $conn->multi_query($sql);

    $conn->close();
    header("Location:../Frontend/view students.php");
    die();
} else {
    header("Location:../Frontend/view students.php");
    die();
}
?>