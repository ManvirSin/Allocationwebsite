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

$sql="select * from `allocate system`.supervisorprojects where SupervisorEmail not in(select SupervisorEmail from allocatesystemforstudent)";
$result=mysqli_query($conn,$sql) ;
$sql2="select * from `allocate system`.studentaccountinformation where StudentEmail not in (select StudentEmail from allocatesystemforstudent)";
$result2=mysqli_query($conn,$sql2);
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
                        <a href="view%20all%20projects.php" class="waves-effect"><i class="dripicons-copy"></i><span> View All Projects </span></a>
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
                        <a href="view%20allocatesystem%20result.php" class="waves-effect"><i class="dripicons-to-do"></i><span> View Allocation Results </span></a>
                    </li>
                    <li>
                        <a href="view%20students.php" class="waves-effect"><i class="dripicons-user"></i><span> View All Students </span></a>
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

                    <ul class="list-inline float-right mb-0">
                        <!-- Search -->

                    </ul>

                    <!-- Page title -->
                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                        <li class="hide-phone list-inline-item app-search">
                            <h3 class="page-title">ALLOCATION SYSTEM</h3>
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
                        <div class="col-lg-12">
                            <div class="card m-b-20">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Choose Students and Supervisors To allocate</h4>
                                    <p class="text-muted m-b-30 font-14">This system can let you see which Students
                                        and Supervisors have not chosen each others, and you can allocate them through this below</p>

                                    <form action="../Backend/allocatesystemfunction.php" method="POST">

                                        <div class="form-group">
                                            <label>Sup Details</label>
                                        </div>

                                        <select name="Supdetails" class=" btn form-select col-12 form-select-lg" aria-label=".form-select-lg example">
                                            <?php

                                            while($row = mysqli_fetch_assoc($result)){

                                                ?>
                                                <option selected name="Supdetails" value="<?php echo $row["SupID"]?>"> SupEmail:<?php echo $row["SupervisorEmail"]?>; SupProjectName:<?php echo $row["SupervisorProjectName"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>


                                        <div class="form-group">
                                            <label>Student Details</label>

                                        </div>
                                        <select name="Studentdetails" class=" btn form-select col-12 form-select-lg" aria-label=".form-select-lg example">
                                            <?php

                                            while($row1 = mysqli_fetch_assoc($result2)){

                                                ?>
                                                <?php echo '<option selected name="Studentdetails" value='.$row1["StudentID"].'>StudentID:'.$row1["StudentID"].'; StudentEmail:'.$row1["StudentEmail"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                        <button name="allocate" class="btn btn-pink waves-effect waves-light">
                                            Allocate
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
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

</body>
</html>