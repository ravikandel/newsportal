<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);

    // Code for Add New Sub Admi
    if (isset($_POST['submit'])) {
        
        $loc = $_POST['aloc'];
        $des = $_POST['ades'];
        $url = $_POST['url'];
        $imgfile = $_FILES["postimage"]["name"];
        
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);

            
             try 
            {
                $sql = "INSERT INTO tbladvertisement(Location,Image,Description,URL ) values(?,?,?,?)";
                $con->prepare($sql)->execute([$loc, $imgnewfile, $des,$url]);
            
                $msg = "Advertisement created succesfully";
            } 
            catch (PDOException $e) 
            {
                $error = "Something went wrong. Please try again.";
            }
            
        }
        
    }

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Add Advertisement | Newsportal</title>

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
                                    <h4 class="page-title">Add Advertisement</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Theme Setting </a>
                                        </li>
                                        <li class="active">
                                            Add Advertisement
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
                                        <div class="col-md-6">
                                            <form class="form-horizontal" name="addadv" method="post" enctype="multipart/form-data">
                                                
                                                <div class="form-group">
                                                    <label for="aloc" class="col-md-3 control-label">Location *</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="aloc" name="aloc" required>
                                                            <option value="1">Advertisement 1</option>
                                                            <option value="2">Advertisement 2</option>
                                                            <option value="3">Advertisement 3</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ades" class="col-md-3 control-label">Description *</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" id="ades" name="ades" placeholder="Enter description" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="url" class="col-md-3 control-label">URL *</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="aimage" class="col-md-3 control-label">Image *</label>
                                                    <div class="col-md-9">
                                                   <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                    </div>
                                                </div>

                        
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">&nbsp;</label>
                                                    <div class="col-md-9">
                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" id="submit" name="submit">
                                                            Create</button>
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
