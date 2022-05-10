<?php
session_start();
// Auth check, to check if the person accessing the page is logged in as a supervisor.
if (!isset($_SESSION['supervisorEmail'])) {
    header("Location: ../../Loginpage/web");
}
$hostName = "localhost";
$userName = "root";
$password = "";

// Create connection
$conn = mysqli_connect($hostName, $userName, $password);
mysqli_set_charset($conn,"utf8");
mysqli_select_db($conn,"allocate system");

$sql="select * from `allocate system`.studentprojects";
$result=mysqli_query($conn,$sql) ;
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
                <!--<a href="index.html" class="logo text-center">Fonik</a>-->
                <a href="" class="logo"><img src="../assets/images/logo.png" height="35" width="80%" alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">
            <div id="sidebar-menu">
                <ul>

                    <li class="menu-title">Main</li>

                    <li>
                        <a href="Supervsior-View-Their-Projects.php" class="waves-effect"><i class="dripicons-device-desktop"></i><span> View YOUR PROJECT </span></a>
                    </li>
                    <li>
                        <a href="ADD-SUPERVISOR-PROJECTS.php" class="waves-effect"><i class="dripicons-device-desktop"></i><span> ADD YOUR PROJECT </span></a>
                    </li>
                    <li>
                        <a href="Supervisor Choose project.php" class="waves-effect"><i class="dripicons-device-desktop"></i><span> CHOOSE student project  as yours</span></a>
                    </li>
                    <li>
                        <a href="Supervsior-View-Their-Allocate-inforamtion.php" class="waves-effect"><i class="dripicons-device-desktop"></i><span> View Your Allocate Information </span></a>
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
                            <h3 class="page-title">Choose student projects as yours</h3>
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



                            <!-- Right Sidebar -->
                            <div class="email ">

                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <div class="btn-group ml-1">
                                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-folder"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Updates</a>
                                            <a class="dropdown-item" href="#">Social</a>
                                            <a class="dropdown-item" href="#">Team Manage</a>
                                        </div>
                                    </div>
                                    <div class="btn-group ml-1">
                                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tag"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Updates</a>
                                            <a class="dropdown-item" href="#">Social</a>
                                            <a class="dropdown-item" href="#">Team Manage</a>
                                        </div>
                                    </div>

                                    <div class="btn-group ml-1">
                                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            More
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Mark as Unread</a>
                                            <a class="dropdown-item" href="#">Mark as Important</a>
                                            <a class="dropdown-item" href="#">Add to Tasks</a>
                                            <a class="dropdown-item" href="#">Add Star</a>
                                            <a class="dropdown-item" href="#">Mute</a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <form action="../Backend/supervisorchooseprojectfunction.php" method="post">
                                <div class="card m-t-20">
                                    <ul class="message-list">

                                        <li>
                                            <div class="col-mail col-mail-1">

                                                <div class="">
                                                    <input type="radio" id="chk19" value="<?php echo $row['StudentID']?>" name="choose">
                                                    <label for="chk19" class="toggle"></label>
                                                </div>
                                                <p  class="title"><?php echo $row["StudentEmail"]?></p>
                                            </div>

                                            <div class="col-mail col-mail-0.5">
                                                <p  class="subject"><?php echo $row["StudentProjectName"]?>
                                                </p>
                                            </div>
                                            <p>&nbsp;</p>
                                            <div class="col-mail col-mail-0.5"><p  class="subject">Status:<?php echo $row["Status"]?>
                                                </p> </div>

                                            <div  class="col-mail col-mail-1" >

                                                <button style="margin-left: 10px" value="<?php $row[StudentID]?>" name="decline">decline </button>

                                            </div>
                                                <div  class="col-mail col-mail-1" >

                                                <button name="approve" value="<?php $row[StudentID]?>">approve</button>

                                                </div>

                                                <div class="date"><button class="btn btn-info" type="button" id="11" style="background-color: #b1b1b1;border-radius: 15px" data-toggle="modal" data-target="#exampleModal">ViewDetails</button></div>



                                        </li>

                                        <?php
                                        }
                                        ?>
                                    </ul>

                                </div> <!-- panel -->


                                <div class="row m-t-20">
                                    <div class="col-7">
                                        Showing 1 - 20 of 1,524
                                    </div>
                                    <div>
                                        <button  name="submit">Confirm</button>
                                    </div>
                                    <div class="col-3">
                                        <div class="btn-group float-right">
                                            <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            </div> <!-- end Col-9 -->

                        </div>

                    </div><!-- End row -->


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
                            // Create connection
                        $conn = mysqli_connect($hostName, $userName, $password);
                            mysqli_set_charset($conn, "utf8");
                            mysqli_select_db($conn, "allocate system");

                            $sql = "select *from studentprojects  ";
                            $result = mysqli_query($conn, $sql);

                      ?>
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <td><?php echo $row["StudentEmail"]?></td>:
                            <div>&nbsp;</div>
                            <tr><?php echo $row["StudentProjectInfo"]?></tr>
                            <div>&nbsp;</div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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

<!-- App js -->
<script src="../assets/js/app.js"></script>

</body>
</html>
