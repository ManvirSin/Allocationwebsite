<?php
session_start();
$hostName = "localhost";
$userName = "root";
$password = "";
// Create connection
$conn = mysqli_connect($hostName, $userName, $password);
mysqli_set_charset($conn,"utf8");
mysqli_select_db($conn,"allocate system");

$sql="select * from `allocate system`.supervisorprojects ";
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
    <link href="../Contactpage/css/Contactuspagecss.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>


<body class="fixed-left">
<div class="container">

<header> <a href="">
        <h4 class="logo" style="padding-top: 10px">University of Bradford Allocation System</h4>

    </a>
    <nav>
        <ul>
            <li><a href="../Homepage/HomePage.html" style="padding-top: 25px">HOME</a></li>
            <li><a href="../../Loginpage/web/index.html" style="padding-top: 25px">LOGIN</a></li>
            <li> <a href="../Contactpage/Contactnewpage.html" style="padding-top: 25px">CONTACT US</a></li>
            <li> <a href="../view%20all%20projects/view%20all%20projects.php" style="padding-top: 25px">View projects</a></li>
        </ul>
    </nav>
</header>

<!-- Begin page -->
<div id="wrapper" style="margin-top: 200px">
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Your Projects Datatable</h4>
                                    <p class="text-muted m-b-30 font-14"></p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>SUPID</th>
                                            <th>SUPEmail</th>
                                            <th>SUPProjectsName</th>
                                            <th>SUPProjectsInfo</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr class="tbContext">
                                                <td><?php echo $row["SupID"]?></td>
                                                <td><?php echo $row["SupervisorEmail"]?></td>
                                                <td><?php echo $row["SupervisorProjectName"]?></td>
                                                <td><button  class="btn btn-info"  name="vieInfo" data-toggle="modal" data-target="#exampleModal">View Info Details</button></td>
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
                        // Create connection
                        $conn = mysqli_connect($hostName, $userName, $password);
                        mysqli_set_charset($conn,"utf8");
                        mysqli_select_db($conn,"allocate system");

                        $sql="select * from `allocate system`.supervisorprojects ";
                        $result=mysqli_query($conn,$sql) ;
                        ?>
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <td>Information :<?php echo $row["SupervisorProjectInfo"]?></td>
                            <p>&nbsp;</p>

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
</div>
<!-- END wrapper -->
<section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
    <p class="hero_header">FOR THE LATEST NEWS &amp; UPDATES</p>
    <div class="button">subscribe</div>
</section>
<!-- Copyrights Section -->
<div class="copyright">Please report instances of computer misuse originating from University of Bradford to abuse@bradford.ac.uk — all complaints are investigated fully.<br>
</div>

</body>


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
