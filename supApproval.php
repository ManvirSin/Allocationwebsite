<?php 
    session_start();
    // Verification check
    if ((!isset($_SESSION['SUP_ID'])) || $_SESSION['SUP_ID']==""){
        header("Location:../html/Mtfirstpage.html");
        die();
    }
    // Setting the nav bar for admin view
    echo"<nav>";
    echo"<label class=\"logo\">University Of Bradford</label>";
    echo"<ul>";
    echo"<li><a href=\"../php/logout.php\">Students</a></li>";
    echo"<li><a href=\"../php/logout.php\">Supervisors</a></li>";
    echo"<li><a href=\"../php/logout.php\">Projects</a></li>";
    echo"<li><a href=\"../php/adminApproval.php\">Allocation</a></li>";
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
	<title>UOB - Admin</title>
	<link rel="stylesheet" href="../css/main.css" />
</head>
	<body>
		<br>
		<h2 class="form_head">Project Proposals</span></h2><br>
		<p class="form_slg">List Of All Students Selected Projects. Any Additional Requests Should Be Noted. </p>
        <br>
        <br>
    </body>
</html>
<?php 
    // Extracting all reservations that are pending from database to display to admin
    $conn->select_db("desi_spice");
    $sql = "SELECT * FROM sup_projects;";
    $reports = $conn->query($sql);
        if ($reports->num_rows > 0) {
            while($row = $reports->fetch_assoc()) {
                echo "<center><b> PROJECT: </b>". $row["project_name"].". ". "<b> INFO: </b>" .$row["project_info"].".". "</center>";
                echo "<link rel=\"stylesheet\" href=\"../css/style.css\">";
                echo "<form action=\"../php/processApproval.php\" method=\"post\">";
                echo "<center><button name=\"submit\" value=".$row["sup_id"].">Modify</button></center>";
                echo "</form>";
                echo "<form action=\"../php/processDeclined.php\" method=\"post\">";
                echo "<center><button name=\"decline\" value=".$row["sup_id"].">Delete</button></center>";
                echo "</form>";
                echo "</br> ";
            }
        }else {
            echo "</br> ";
            echo "</br> ";
            echo "</br> ";
            echo "<center><h3>No Selected/Proposed Projects.</h3></center>";
        }
    $conn->close();
?>
<meta charset="utf-8">
    <!-- <title>Responsive Navbar | CodingNepal</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
