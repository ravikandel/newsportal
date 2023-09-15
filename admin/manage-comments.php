<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);


    // Code for UnApprove
    if ($_GET['appid']) {
        $id = intval($_GET['appid']);
        
        try
        {
            $sql = "UPDATE tblcomments SET status='0' WHERE id=?";
            $con->prepare($sql)->execute([$id]);
            
            $msg = "Comment Un-Approved succesfully.";
        } 
        catch (PDOException $e) 
        {
            $error = "Something went wrong. Please try again.";
        } 
        
    }

    // Code for deletion
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        
         try
        {
            $sql = "DELETE FROM tblcomments WHERE id=?";
            $con->prepare($sql)->execute([$id]);
            
            $msg = "Comment Deleted succesfully.";
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

        <title> Manage Approved Comments | News Portal</title>
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
                                    <h4 class="page-title">Manage Approved Comments</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Comments </a>
                                        </li>
                                        <li class="active">
                                            Approved Comments
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
                                                    <th> Name</th>
                                                    <th>Email Id</th>
                                                    <th width="300">Comment</th>
                                                    <th>Post / News</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                try
                                                    {
                                                    $sql = "Select tblcomments.id,  tblcomments.name,tblcomments.email,tblcomments.createdDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle from  tblcomments join tblposts on tblposts.id=tblcomments.postId where tblcomments.status=1"; 
                                                    $stmt = $con->prepare($sql); 
                                                    $stmt->execute(); 
                                                    
                                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    
                                                    $cnt = 1;
                                                    foreach ($results as $row)
                                                        { ?>
                                                        <tr>
                                                            <td scope="row"><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row['name']); ?></td>
                                                            <td><?php echo htmlentities($row['email']); ?></td>
                                                            <td><?php echo htmlentities($row['comment']); ?></td>
                                                            <td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']); ?>"><?php echo htmlentities($row['PostTitle']); ?></a> </td>
                                                            <td><?php echo htmlentities($row['createdDate']); ?></td>
                                                            <td>
                                                                <a href="manage-comments.php?appid=<?php echo htmlentities($row['id']); ?>" title="Un-Approve this comment"><i class="fa fa-times-circle" style="color: orange;"></i></a>
                                                                &nbsp;<a href="manage-comments.php?rid=<?php echo htmlentities($row['id']); ?>&action=del" title="Delete this comment"> <i class="fa fa-trash" style="color: red;"></i></a>
                                                            </td>
                                                        </tr>
                                            <?php      $cnt++;
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
