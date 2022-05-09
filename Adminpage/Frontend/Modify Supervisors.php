<?php
session_start();
// Auth check, to check if the person accessing the page is logged in as an admin.
if (!isset($_SESSION['adminEmail'])) {
    header("Location: ../../Loginpage/web");
}
$_SESSION["SupID"] = $_POST["Update"];
$Supid=$_SESSION["SupID"];
$hostName = "localhost";
$userName = "root";
$password = "";
// Create connection
$conn = mysqli_connect($hostName, $userName, $password);
mysqli_set_charset($conn,"utf8");
mysqli_select_db($conn,"allocate system");
$sql="select * from supervisoraccount where SupID='$Supid'";
$result=mysqli_query($conn,$sql) ;
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>FYP Allocation System</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Basic Css files -->
    <link href="http://cdn.bootstrapmb.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="">
                <a href="" class="logo"><img src="../assets/images/logo.png" height="35" width="80%" alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">
                <ul>

                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="view all projects.php" class="waves-effect"><i class="dripicons-copy"></i><span> View All Projects </span></a>
                    </li>
                    <li>
                        <a href="ADD%20Students.php" class="waves-effect"><i class="dripicons-user"></i><span> ADD Student</span></a>
                    </li>
                    <li>
                        <a href="ADD%20SUPERVISORS.php" class="waves-effect"><i class="dripicons-user"></i><span> ADD Supervisor</span></a>
                    </li>
                    <li>
                        <a href="ADD%20SUPERVISOR%20PROJECTS.php" class="waves-effect"><i class="dripicons-document-new"></i><span> ADD Projects for Sup</span></a>
                    </li>
                    <li>
                        <a href="sup.php" class="waves-effect"><i class="dripicons-user"></i><span> View Supervisors </span></a>
                    </li>
                    <li>
                        <a href="allocatetest.php" class="waves-effect"><i class="dripicons-to-do"></i><span> Allocate System </span></a>
                    </li>
                    <li>
                        <a href="view allocatesystem result.php" class="waves-effect"><i class="dripicons-to-do"></i><span> View Allocation Results </span></a>
                    </li>
                    <li>
                        <a href="view students.php" class="waves-effect"><i class="dripicons-user"></i><span> View All Students </span></a>
                    </li>
                    <li>
                        <a href="../../Loginpage/web/index.html" class="waves-effect"><i class="dripicons-exit"></i><span> Exit System</span></a>
                    </li>



                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->


    <!-- Start right Content here -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">
                    <!-- Search input -->


                    <!-- Page title -->
                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                        <li class="hide-phone list-inline-item app-search">
                            <h3 class="page-title">Modify SUPERVISOR </h3>
                        </li>
                    </ul>

                    <div class="clearfix"></div>
                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ==================
                 PAGE CONTENT START
================== -->

            <div class="page-content-wrapper">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">PLEASE ENTER THE NEW SUPERVISOR INFORMATION BELOW</h4>
                                    <p class="text-muted m-b-30 font-14">You can edit new supervisor here</p>

                                    <form action="../Backend/Modifysupervisorfunction.php" METHOD="post">
                                        <div class="form-group">

                                            <div>
                                                <h2>SupID:<?php echo $row['SupID']?></h2>
                                            </div>
                                            <h1>&nbsp;</h1>

                                        </div>

                                        <div class="form-group">
                                            <label>Email: <?php echo $row['SupervisorEmail']?></label>
                                            <div>
                                                <input name="SupEmail" class="form-control" required
                                                       type="email" parsley-type="email" placeholder="Enter Email"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password: <?php echo $row['SupervisorPassword']?></label>
                                            <div>
                                                <input  name="SupPassword" class="form-control" required
                                                       type="password" data-parsley-maxlength="30" placeholder="Enter Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name: <?php echo $row['First_Name']?></label>
                                            <div>
                                                <input  name="SupFirstName" class="form-control" required
                                                        data-parsley-maxlength="30" placeholder="Enter First Name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name: <?php echo $row['Last_Name']?></label>
                                            <div>
                                                <input  name="SupLastName" class="form-control" required
                                                        data-parsley-maxlength="30" placeholder="Enter Last Name"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button name="Modify" class="btn btn-pink waves-effect waves-light" value="<?php echo $row['SupID']?>">
                                                 Modify
                                                </button>
                                                <button  class="btn btn-secondary waves-effect m-l-5" >
                                                 Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div> <!-- end col -->




                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                © University of Bradford - Created by Team 11. View our <a href="https://github.com/UOB-CEC/enterprisepro-team-11">GitHub</a>.
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="http://cdn.bootstrapmb.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../assets/js/modernizr.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/waves.js"></script>
    <script src="../assets/js/jquery.nicescroll.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>

    <!-- Parsley js -->
    <script src="../assets/plugins/parsleyjs/parsley.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.js"></script>

    <script>
$(document).ready(function() {
    $('form').parsley();
});
    </script>
</div>
</body>
</html>