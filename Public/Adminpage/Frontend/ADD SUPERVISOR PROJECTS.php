<?php
session_start();
// Auth check, to check if the person accessing the page is logged in as an admin.
if (!isset($_SESSION['adminEmail'])) {
    header("Location: ../../Loginpage/web");
}
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
                        <a href="ADD SUPERVISORS.php" class="waves-effect"><i class="dripicons-user"></i><span> ADD Supervisor</span></a>
                    </li>
                    <li>
                        <a href="ADD SUPERVISOR PROJECTS.php" class="waves-effect"><i class="dripicons-document-new"></i><span> ADD Projects for Sup</span></a>
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


                    <!-- Page title -->
                    <ul class="list-inline menu-left mb-0">
                        <li class="list-inline-item">
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="ion-navicon"></i>
                            </button>
                        </li>
                        <li class="hide-phone list-inline-item app-search">
                            <h3 class="page-title">ADD SUPERVISORS' PROJECTS</h3>
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

                                    <h4 class="mt-0 header-title">PLEASE ENTER THE SUPERVISORS' PROJECTS INFORMATION BELOW</h4>
                                    <p class="text-muted m-b-30 font-14">You can input new project here</p>

                                    <form action="../Backend/Addsupervisorprojectsfunction.php" method="post">
                                        <div class="form-group">
                                            <label>Supervisor ID</label>
                                            <input type="text" name="SupID" class="form-control" required placeholder="Type Your SupID"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Supervisor Email</label>
                                            <input type="email" name="SupervisorEmail" class="form-control" required placeholder="Type Your SupID"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Supervisor project Name</label>
                                            <div>
                                                <input type="text" name="SupervisorProjectName" id="pass2" class="form-control" required
                                                       placeholder="Type project name"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Project Info</label>
                                            <div>
                                                <textarea required class="form-control"name="SupervisorProjectInfo" rows="5" placeholder="Your project info"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button name="ADD" class="btn btn-pink waves-effect waves-light">
                                                    Submit
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
</div>
</body>
</html>