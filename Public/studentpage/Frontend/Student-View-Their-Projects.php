<?php
session_start();
// Auth check, to check if the person accessing the page is logged in as a student.
if (!isset($_SESSION['studentEmail'])) {
    header("Location: ../../Loginpage/web");
}
$hostName = "localhost";
$userName = "root";
$password = "";
$id=$_SESSION["StudentID"];
// Create connection
$conn = mysqli_connect($hostName, $userName, $password);
mysqli_set_charset($conn,"utf8");
mysqli_select_db($conn,"allocate system");

$sql="select * from `allocate system`.studentprojects where StudentID ='$id'";
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

                    <li class="menu-title">Main</li>

                    <li>
                        <a href="Student-View-Their-Projects.php" class="waves-effect"><i class="dripicons-clipboard"></i><span> View YOUR PROJECT </span></a>
                    </li>
                    <li>
                        <a href="ADD-STUDENT-PROJECTS.php" class="waves-effect"><i class="dripicons-document-new"></i><span> ADD YOUR PROJECT </span></a>
                    </li>
                    <li>
                        <a href="studentallocatepage.php" class="waves-effect"><i class="dripicons-to-do"></i><span> CHOOSE PROJECT </span></a>
                    </li>
                    <li>
                        <a href="../../Loginpage/web/index.html" class="waves-effect"><i class="dripicons-exit"></i><span> Exit Sytem</span></a>
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
                            <h3 class="page-title">View Your ALL projects Tables</h3>
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

                                    <h4 class="mt-0 header-title">Student Projects Datatable</h4>
                                    <p class="text-muted m-b-30 font-14">
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>StudentID</th>
                                            <th>StudentEmail</th>
                                            <th>StudentProjectsName</th>
                                            <th>StudentProjectsInfo</th>
                                            <th>Project Status</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr class="tbContext">
                                                <td><?php echo $row["StudentID"]?></td>
                                                <td><?php echo $row["StudentEmail"]?></td>
                                                <td><?php echo $row["StudentProjectName"]?></td>
                                                <td><?php echo $row["StudentProjectInfo"]?></td>
                                                <td><?php echo $row["Status"]?></td>
                                                <td><button  class="btn btn-info" value="<?php echo $row["StudentID"]?>" name="vieST" data-toggle="modal" data-target="#exampleModal">View Info Details</button></td>
                                                <form action="Modify%20your%20projects.php" method="post">
                                                    <td><button  class="btn btn-info" value="<?php echo $row["StudentID"]?>" name="update" >Update</button></td>
                                                </form>
                                                <form action="../Backend/deletestuProjects.php" method="post">
                                                    <td><button  name="delete" value="<?php echo $row["StudentID"]?>" class="btn btn-info">Delete</button></td>
                                                </form>
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

        <!--modal exmaple-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Projects Info Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $hostName = "localhost";
                        $userName = "root";
                        $password = "";
                        $Stu=$_SESSION["StudentID"];
                        // Create connection
                        $conn = mysqli_connect($hostName, $userName, $password);
                        mysqli_set_charset($conn,"utf8");
                        mysqli_select_db($conn,"allocate system");

                        $sql="select * from `allocate system`.studentprojects where StudentID ='$Stu'";
                        $result=mysqli_query($conn,$sql) ;
                        ?>
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <td><?php echo $row["StudentProjectInfo"]?></td>

                            <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


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
</html>