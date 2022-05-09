<?php
session_start();
// Auth check, to check if the person accessing the page is logged in as an admin.
if (!isset($_SESSION['adminEmail'])) {
    header("Location: ../../Loginpage/web");
}
$hostName = "localhost";
$userName = "root";
$password = "";

// Create connection
$conn = mysqli_connect($hostName, $userName, $password);
mysqli_set_charset($conn,"utf8");
mysqli_select_db($conn,"allocate system");

$sql="select * from `allocate system`.allocatesystemforstudent";
$result=mysqli_query($conn,$sql) ;
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

    <!-- DataTables -->
    <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                    <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input" type="search" placeholder="Search" />
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div>



                    <!-- Page title -->
                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                        <li class="hide-phone list-inline-item app-search">
                            <h3 class="page-title">VIEW ALLOCATED PROJECTS</h3>
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
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Your Projects Datatable</h4>
                                    <p class="text-muted m-b-30 font-14">
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>StudentID</th>
                                            <th>StudentEmail</th>
                                            <th>SupervisorID</th>
                                            <th>SupervisorEmail</th>
                                            <th>SupervisorProjectName</th>
                                            <th>SupervisorProjectInfo</th>


                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr class="tbContext">
                                                <td><?php echo $row["StudentID"]?></td>
                                                <td><?php echo $row["StudentEmail"]?></td>
                                                <td><?php echo $row["SupID"]?></td>
                                                <td><?php echo $row["SupervisorEmail"]?></td>
                                                <td><?php echo $row["SupervisorProjectName"]?></td>
                                                <td><?php echo $row["SupervisorProjectInfo"]?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
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

<!-- Required datatable js -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables/jszip.min.js"></script>
<script src="../assets/plugins/datatables/pdfmake.min.js"></script>
<script src="../assets/plugins/datatables/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="../assets/pages/datatables.init.js"></script>

<!-- App js -->
<script src="../assets/js/app.js"></script>

</body>
