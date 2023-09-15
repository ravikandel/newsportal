<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);

    if (isset($_POST['submit'])) {
        $aid = intval($_GET['said']);
        $email = $_POST['emailid'];
        
        try
        {
            $sql = "UPDATE tbladmin SET AdminEmailId=? WHERE userType=0 AND id=?";
            $con->prepare($sql)->execute([$email,$aid]);
            
            $msg = "User updated succesfully";
            
        } 
        catch (PDOException $e) 
        {
            $error = "Something went wrong. Please try again.";
        } 
       
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Edit Users | Newsportal</title>

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
            <?php include('includes/topheader.php'); ?>
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
                                    <h4 class="page-title">Edit User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">User </a>
                                        </li>
                                        <li class="active">
                                            Edit User
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!---Success Message--->
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                                </div>
                                            <?php } ?>

                                            <!---Error Message--->
                                            <?php if ($error) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                </div>
                                            <?php } ?>


                                        </div>
                                    </div>

                                    <?php
                                    try
                                    {
                                        $aid = intval($_GET['said']);
                                        
                                        $sql = "SELECT * FROM tbladmin WHERE userType=0 AND id=?"; 
                                        $stmt = $con->prepare($sql); 
                                        $stmt->execute([$aid]); 
                                        
                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($results as $row)
                                        { ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form class="form-horizontal" name="suadmin" method="post">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Username</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" value="<?php echo htmlentities($row['AdminUserName']); ?>" name="adminusernmae" readonly>
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Emailid</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" value="<?php echo htmlentities($row['AdminEmailId']); ?>" name="emailid" required>
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Creation Date</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" value="<?php echo htmlentities($row['CreatedDate']); ?>" name="cdate" readonly>
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Updation date</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" value="<?php echo htmlentities($row['UpdatedDate']); ?>" name="udate" readonly>
                                                            </div>
                                                        </div>
                                                   
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">&nbsp;</label>
                                                        <div class="col-md-10">
    
                                                            <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </div>
    
                                                    </form>
                                                </div>
    
                                            </div>
                                            
                                 <?php } 
                                    }
                                    catch (PDOException $e) {
                                        // Handle any database errors
                                        echo "<script>alert('Please try Again.')</script>";
                                        } ?>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->


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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
