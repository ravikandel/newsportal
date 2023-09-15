<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);

    if (isset($_POST['submit'])) {
        
        //Current Password hashing 
        $password = md5($_POST['password']);
        
        $adminid = $_SESSION['login'];
        // new password hashing 
        $newpassword=md5($_POST['newpassword']);
        
        date_default_timezone_set('Australia/Sydney'); // change according timezone
        $currentTime = date('d-m-Y h:i:s A', time());
        
        try{
            $sql = "SELECT AdminPassword FROM tbladmin WHERE AdminUserName=? || AdminEmailId=?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$adminid,$adminid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                
                 $dbpassword = $result['AdminPassword'];

                if ($password == $dbpassword) {
    
                    $mysql = "update tbladmin set AdminPassword=?, UpdatedDate=? where AdminUserName=?";
                    $con->prepare($mysql)->execute([$newpassword,$currentTime,$adminid]);
                    $msg = "Password Changed Successfully !!";
                }
                else {
                 $error = "Old Password not matched !!";
                }
            }
            
            else{
                $error = "Old Password not match !!";
            }
            
        }
       catch (PDOException $e)
        {
            $error = "Something Went Wrong.";
        }
    }

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Change Password | Newsportal</title>

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
        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
    
            <?php include('includes/topheader.php'); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Change Password</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">User</a>
                                        </li>

                                        <li class="active">
                                            Change Password
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

                                    <div class="row">
                                        <div class="col-md-10">
                                            <form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Current Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" value="" name="password" required>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">New Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" value="" name="newpassword" required>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Confirm Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" value="" name="confirmpassword" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>


                                    </div>











                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
        </div>

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
