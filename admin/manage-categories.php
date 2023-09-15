<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);

    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        
         try
        {
            $sql = "UPDATE tblcategory SET IsActive='0' WHERE id=?";
            $con->prepare($sql)->execute([$id]);
            
            $msg = "Category Moved to Trash succesfully";
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

        <title>Manage Category | Newsportal</title>
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

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Manage Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Category </a>
                                        </li>
                                        <li class="active">
                                            Manage Category
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-6">

                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>

                            </div>

                            <div class="col-md-12">
                                <div class="m-t-10">

                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Category</th>
                                                    <th>Description</th>

                                                    <th>Created Date</th>
                                                    <th>Last Modified Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                               
                                               try
                                                    {
                                                    $sql = "Select id,CategoryName,CategoryDescription,CreatedDate AS PostingDate,ModifiedDate AS UpdationDate from  tblcategory where IsActive=1"; 
                                                    $stmt = $con->prepare($sql); 
                                                    $stmt->execute(); 
                                                    
                                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    
                                                    $cnt = 1;
                                                    foreach ($results as $row)
                                                        { ?>
                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><?php echo htmlentities($row['CategoryName']); ?></td>
                                                            <td><?php echo htmlentities($row['CategoryDescription']); ?></td>
                                                            <td><?php echo htmlentities($row['PostingDate']); ?></td>
                                                            <td><?php echo htmlentities($row['UpdationDate']); ?></td>
                                                            <td><a href="edit-category.php?cid=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-pencil" style="color: green;" title="Edit"></i></a>
                                                                &nbsp;<a href="manage-categories.php?rid=<?php echo htmlentities($row['id']); ?>&action=del"> <i class="fa fa-times-circle" title="Delete" style="color: red;"></i></a> </td>
                                                        </tr>
                                                        <?php
                                                               $cnt++;
                                                        }
                                                    }
                                                    catch (PDOException $e) {
                                                        // Handle any database errors
                                                        echo "<script>alert('Please try Again.')</script>";
                                                    } ?>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>

                            </div>


                            <!--- end row -->

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
