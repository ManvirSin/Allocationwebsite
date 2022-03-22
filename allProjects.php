<?php
    session_start();
    // Verification check
    if ((!isset($_SESSION['SUP_ID'])) || $_SESSION['SUP_ID']==""){
        header("Location:../html/Mtfirstpage.html");
        die();
    }
    // Setting the nav bar for supervisor view
    echo"<nav>";
    echo"<label class=\"logo\">University Of Bradford</label>";
    echo"<ul>";
    echo"<li><a href=\"../php/logout.php\">View Students</a></li>";
    echo"<li><a href=\"../php/reservation.php\">Add Projects</a></li>";
    echo"<li><a href=\"../php/viewApproval.php\">Modify Projects</a></li>";
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
	<title>UOB - View Projects</title>
	<link rel="stylesheet" href="../css/main.css" />
</head>
<!-- Header for page -->
	<body>
		<br>
		<h2 class="form_head">YOUR PROJECTS</span></h2><br>
		<p class="form_slg">List Of Your Projects Currently Available To Students</p>
        <br>
        <br>
    </body>
</html>
<?php
    // Booking is synchronized to the specific user. Reservation details and status is shown to user
    $sql = "SELECT * FROM sup_projects WHERE user='".$_SESSION['ID']."';";
    $reports = $conn->query($sql);
		if ($reports->num_rows > 0) {
			while($row = $reports->fetch_assoc()) {
				echo "<center><b> PROJECT: </b>". $row["project_name"].". ". "<b> INFO: </b>" .$row["project_info"].".". "</center>";
                echo "<link rel=\"stylesheet\" href=\"../css/style.css\">";
                echo "</br> ";
			}
		}else {
            echo "</br> ";
            echo "</br> ";
            echo "</br> ";
            echo "</br> ";
            echo "</br> ";
            echo "</br> ";
			echo "<h3><center>You currently have no active projects. To add a project please click on the link below.</center></h3>";
            echo "</br> ";
            echo"<center><li><a href=\"../php/reservation.php\">ADD A PROJECT</a></li></center>";
		}
    $conn->close();
?>
<meta charset="utf-8">
    <!-- <title>Responsive Navbar | CodingNepal</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
