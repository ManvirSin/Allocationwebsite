<?php 
    session_start();
    // Verification check
    if ((!isset($_SESSION['ADMIN_ID'])) || $_SESSION['ADMIN_ID']==""){
        header("Location:../html/Mtfirstpage.html");
        die();
    }
    // Setting the nav bar for admin view
    echo"<nav>";
    echo"<label class=\"logo\">University Of Bradford</label>";
    echo"<ul>";
    echo"<li><a href=\"../php/adminStudents.php\">Students</a></li>";
    echo"<li><a href=\"../php/adminSup.php\">Supervisors</a></li>";
    echo"<li><a href=\"../php/adminApproval.php\">Projects</a></li>";
    echo"<li><a href=\"../php/logout.php\">Allocation</a></li>";
    echo"<li><a href=\"../php/logout.php\">Log Out</a></li>";
    echo"</ul>";
    echo"</nav>";
    echo"<body style=\"background-color:darkgrey\"></body>";
    $conn = new mysqli("localhost", "root", "", "desi_spice");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>
<!Doctype html>
<head>
	<title>UOB - Students</title>
	<link rel="stylesheet" href="../css/main.css" />
</head>
	<body>
		<br>
		<h2 class="form_head">MANAGE SUPERVISORS</span></h2><br>
		<p class="form_slg">List Of All Students registered with the UOB. Any changes to a students records must be noted. </p>
        <br>
        <br>
    </body>
</html>
<?php 
    // Extracting all reservations that are pending from database to display to admin
    $conn->select_db("desi_spice");
    $sql = "SELECT * FROM sup_data;";
    $reports = $conn->query($sql);
        if ($reports->num_rows > 0) {
            while($row = $reports->fetch_assoc()) {
                echo "<center><b> ID: </b>". $row["ID"].".". "<b> Email: </b>" .$row["Email"].".". " <b> Password: </b>" .$row["Password"]."."."</center>";
                echo "<link rel=\"stylesheet\" href=\"../css/style.css\">";
                echo "<form action=\"../php/processApproval.php\" method=\"post\">";
                echo "<center><button name=\"submit\" value=".$row["ID"].">Modify</button></center>";
                echo "</form>";
                echo "<form action=\"../php/deleteSup.php\" method=\"post\">";
                echo "<center><button name=\"decline\" value=".$row["ID"].">Delete</button></center>";
                echo "</form>";
                echo "</br> ";
            }
        }else {
            echo "</br> ";
            echo "</br> ";
            echo "</br> ";
            echo "<center><h3>No registered students.</h3></center>";
        }
    $conn->close();
?>
<meta charset="utf-8">
    <!-- <title>Responsive Navbar | CodingNepal</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
