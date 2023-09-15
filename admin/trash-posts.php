<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);


    if ($_GET['action'] == 'restore') {
        $postid = intval($_GET['pid']);
        
        try
        {
            $sql = "UPDATE tblposts SET IsActive=1 WHERE id=?";
            $con->prepare($sql)->execute([$postid]);
            
            $msg = "Post restored succesfully";
        } 
        catch (PDOException $e) 
        {
            $error = "Something went wrong. Please try again.";
        } 
        
    }


    // Code for Forever deletionparmdel
    if ($_GET['presid']) {
        $id = intval($_GET['presid']);
        
        try
        {
            $sql = "DELETE FROM  tblposts  where id=?";
            $con->prepare($sql)->execute([$id]);
            
            $msg = "Post deleted successfully";
            
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Trash Posts | Newsportal</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

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

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>


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
                                    <h4 class="page-title">Manage Trash Posts </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Post</a>
                                        </li>
                                        <li class="active">
                                            Trash Posts
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


                            <div class="col-sm-12">
                                <div class="m-t-10">

                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-danger">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Subcategory</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                
                                                try
                                                    {
                                                        $sql = "select tblposts.id as postid,tblposts.PostTitle as title,tblcategory.CategoryName as category,tblsubcategory.SubcategoryName as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.IsActive=0"; 
                                                        $stmt = $con->prepare($sql); 
                                                        $stmt->execute(); 
                                                        
                                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        $cnt = 1;
                                                        foreach ($results as $row)
                                                        { ?>
                                                    <tr>
                                                        <td scope="row"><?php echo htmlentities($cnt); ?></td>
                                                        <td><b><?php echo htmlentities($row['title']); ?></b></td>
                                                        <td><?php echo htmlentities($row['category']) ?></td>
                                                        <td><?php echo htmlentities($row['subcategory']) ?></td>

                                                        <td>
                                                            <a href="trash-posts.php?pid=<?php echo htmlentities($row['postid']); ?>&action=restore" onclick="return confirm('Do you really want to restore ?')"> <i class="ion-arrow-return-right" style="color:green;" title="Restore this Post"></i></a>
                                                            &nbsp;
                                                            <a href="trash-posts.php?presid=<?php echo htmlentities($row['postid']); ?>&action=perdel" onclick="return confirm('Do you really want to delete ?')"><i class="fa fa-times-circle" style="color: red;" title="Permanently delete this post"></i></a>
                                                        </td>
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


                <!-- ============================================================== -->
                <!-- End Right content here -->
                <!-- ============================================================== -->


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

            <!-- Dashboard Init js -->
            <script src="assets/pages/jquery.blog-dashboard.js"></script>

            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
