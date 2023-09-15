<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);


    // Code for restore
    if ($_GET['resid']) {
        $id = intval($_GET['resid']);
        
        try
        {
            $sql = "UPDATE tblsubcategory SET IsActive=1 WHERE SubCategoryId=?";
            $con->prepare($sql)->execute([$id]);
            
            $msg = "Sub-Category restored succesfully";
        } 
        catch (PDOException $e) 
        {
            $error = "Something went wrong. Please try again.";
        } 
        
    }

    // Code for permanently delete
    if ($_GET['action'] == 'perdel' && $_GET['scid']) {
        $id = intval($_GET['scid']);
        
        try
        {
            $sql = "DELETE FROM  tblsubcategory  where SubCategoryId=?";
            $con->prepare($sql)->execute([$id]);
            
            $msg = "Sub-Category deleted successfully";
            
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

        <title>Trash Sub-Category | Newsportal</title>
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
                                    <h4 class="page-title">Manage Trash Sub-Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Sub-Category </a>
                                        </li>
                                        <li class="active">
                                            Trash Sub-Category
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

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                    </div>
                                <?php } ?>

                            </div>

                            <!--- end row -->

                            <div class="col-md-12">
                                <div class="m-t-10">

                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-danger">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Category</th>
                                                    <th>Sub Category</th>
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
                                                        $sql = "Select tblcategory.CategoryName as catname,tblsubcategory.SubcategoryName as subcatname,tblsubcategory.SubCategoryDescription as SubCatDescription,tblsubcategory.CreatedDate as subcatpostingdate,tblsubcategory.ModifiedDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.IsActive=0"; 
                                                        $stmt = $con->prepare($sql); 
                                                        $stmt->execute(); 
                                                        
                                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        $cnt = 1;
                                                        foreach ($results as $row)
                                                        { ?>

                                                        <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                        <td><?php echo htmlentities($row['catname']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatname']); ?></td>
                                                        <td><?php echo htmlentities($row['SubCatDescription']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatpostingdate']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatupdationdate']); ?></td>
                                                        <td><a href="trash-subcategories.php?resid=<?php echo htmlentities($row['subcatid']); ?>"><i class="ion-arrow-return-right" title="Restore this Sub-Category"></i></a>
                                                            &nbsp;<a href="trash-subcategories.php?scid=<?php echo htmlentities($row['subcatid']); ?>&action=perdel"> <i class="fa fa-times-circle" style="color: red;" title="Permanently delete this Sub-Category"></i></a> </td>
                                                        </tr>
                                                <?php   $cnt++;
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
