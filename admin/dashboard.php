<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App title -->
        <title>Dashboard | NewsPortal</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="dashboard.php" class="logo"><span>NP<span>Admin</span></span><i class="mdi mdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <?php include('includes/topheader.php'); ?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->


            
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <a href="manage-categories.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one alert alert-info">
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total Category">Total Category</p>
                                            <?php 
                                                $sql = "SELECT count(*) FROM tblcategory where IsActive=1"; 
                                                $stmt = $con->prepare($sql); 
                                                $stmt->execute(); 
                                                $number_of_rows = $stmt->fetchColumn(); 
                                            ?>

                                            <h2><?php echo htmlentities($number_of_rows); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a><!-- end col -->
                            <a href="manage-subcategories.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one alert alert-dark">
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total Sub-category">Total Sub-category</p>
                                          <?php 
                                                $sql = "SELECT count(*) FROM tblsubcategory where IsActive=1"; 
                                                $stmt = $con->prepare($sql); 
                                                $stmt->execute(); 
                                                $number_of_rows = $stmt->fetchColumn(); 
                                            ?>
                                            <h2><?php echo htmlentities($number_of_rows); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a>

                            <a href="manage-posts.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one alert alert-success">
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total News">Total News</p>
                                            <?php 
                                                $sql = "SELECT count(*) FROM tblposts where IsActive=1"; 
                                                $stmt = $con->prepare($sql); 
                                                $stmt->execute(); 
                                                $number_of_rows = $stmt->fetchColumn(); 
                                            ?>
                                            <h2><?php echo htmlentities($number_of_rows); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a>


                        </div>
                        <!-- end row -->

                        <div class="row">

                            <a href="trash-posts.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one alert alert-danger">
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total Trash News">Trash News</p>
                                            <?php 
                                                $sql = "SELECT count(*) FROM tblposts where IsActive=0"; 
                                                $stmt = $con->prepare($sql); 
                                                $stmt->execute(); 
                                                $number_of_rows = $stmt->fetchColumn(); 
                                            ?>
                                            <h2><?php echo htmlentities($number_of_rows); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>


                            <a href="unapprove-comment.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one alert alert-warning">
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Unapproved Comments">UnApproved Comments</p>
                                            <?php 
                                                $sql = "SELECT count(*) FROM tblcomments where Status=0"; 
                                                $stmt = $con->prepare($sql); 
                                                $stmt->execute(); 
                                                $number_of_rows = $stmt->fetchColumn(); 
                                            ?>
                                            <h2><?php echo htmlentities($number_of_rows); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->
                <?php include('includes/footer.php'); ?>

            </div>

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>