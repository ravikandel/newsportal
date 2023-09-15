<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);


    // Code for Add New Sub Admi
    if (isset($_POST['update'])) {
        
        $agencyname = $_POST['agencyname'];
        $regno = $_POST['regno'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $youurl = $_POST['youurl'];
        $turl = $_POST['turl'];
        $fburl = $_POST['fburl'];
        
        
        try
        {
            $sql = "UPDATE tblagencyinfo SET Name=?, RegisteredNo=?, Address=?, ContactNo=?, Email=?, FacebookUrl=?, TwitterUrl=?, YoutubeUrl=?";
            $con->prepare($sql)->execute([$agencyname,$regno,$address,$contact,$email,$fburl,$turl,$youurl]);
            
            $msg = "Information updated succesfully";
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

        <title>Edit Theme Setting | Newsportal</title>

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
                                    <h4 class="page-title">Theme Setting</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        
                                        <li>
                                            <a href="#">Theme Setting </a>
                                        </li>
                                        <li class="active">
                                            General Setup
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
                                        $sql = "SELECT * FROM tblagencyinfo"; 
                                        $stmt = $con->prepare($sql); 
                                        $stmt->execute(); 
                                        
                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    
                                        foreach ($results as $row) {
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-horizontal" name="themesetting" method="post">
                                                    <div class="form-group">
                                                        <label for="agencyname" class="col-md-2 control-label">Agency Name *</label>
                                                        <div class="col-md-10">
                                                            <input type="text" placeholder="Enter Agency Name" name="agencyname" id="agencyname" class="form-control" value="<?php echo htmlentities($row['Name']); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="regno" class="col-md-2 control-label">Registered Number *</label>
                                                        <div class="col-md-10">
                                                            <input type="text" placeholder="Enter Registered Number" name="regno" id="regno" class="form-control"  value="<?php echo htmlentities($row['RegisteredNo']); ?>"  required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address" class="col-md-2 control-label">Address *</label>
                                                        <div class="col-md-10">
                                                            <input type="text" placeholder="Enter Address" name="address" id="address" class="form-control" value="<?php echo htmlentities($row['Address']); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contact" class="col-md-2 control-label">Contact No. *</label>
                                                        <div class="col-md-10">
                                                            <input type="text" placeholder="Enter Contact No." name="contact" id="contact" class="form-control" value="<?php echo htmlentities($row['ContactNo']); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="col-md-2 control-label">Email *</label>
                                                        <div class="col-md-10">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo htmlentities($row['Email']); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fburl" class="col-md-2 control-label">Facebook URL</label>
                                                        <div class="col-md-10">
                                                        <input type="text" class="form-control" id="fburl" name="fburl" placeholder="Enter Facebook URL"  value="<?php echo htmlentities($row['FacebookUrl']); ?>"required>
                                                        </div>
                                                    </div>
                                                   
                                                   <div class="form-group">
                                                        <label for="turl" class="col-md-2 control-label">Twitter URL</label>
                                                        <div class="col-md-10">
                                                        <input type="text" class="form-control" id="turl" name="turl" placeholder="Enter Twitter URL" value="<?php echo htmlentities($row['TwitterUrl']); ?>" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="youurl" class="col-md-2 control-label">Youtube URL</label>
                                                        <div class="col-md-10">
                                                        <input type="text" class="form-control" id="youurl" name="youurl" placeholder="Enter Youtube URL" value="<?php echo htmlentities($row['YoutubeUrl']); ?>" required>
                                                        </div>
                                                    </div>
                                                    
                            
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">&nbsp;</label>
                                                        <div class="col-md-10">
                                                            <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" id="submit" name="update">
                                                                Update</button>
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
                                }
                                ?>


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