<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);

    if ($_GET['action'] == 'del' && $_GET['aid']) {
        $id = intval($_GET['aid']);
        
        try
        {
            $sql = "DELETE FROM tbladvertisement WHERE Id=?";
            $con->prepare($sql)->execute([$id]);
            
            $msg = "Advertisement deleted successfully";
            header('location:manage-adv.php');
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

        <title>Manage Advertisement | Newsportal</title>
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
                                    <h4 class="page-title">Manage Advertisement</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Advertisement </a>
                                        </li>
                                        <li class="active">
                                            Manage Advertisement
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
                                                    <th>Location</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                try
                                                    {
                                                    $sql = "SELECT * FROM tbladvertisement"; 
                                                    $stmt = $con->prepare($sql); 
                                                    $stmt->execute(); 
                                                    
                                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    
                                                    $cnt = 1;
                                                    foreach ($results as $row)
                                                        { ?>
                                                            <tr>
                                                                <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                                
                                                                <?php if (htmlentities($row['Location'])=='1'){
                                                                    echo '<td>Advertisement 1</td>';
                                                                } else if (htmlentities($row['Location'])=='2'){
                                                                    echo '<td>Advertisement 2</td>';
                                                                } else if (htmlentities($row['Location'])=='3'){
                                                                    echo '<td>Advertisement 3</td>';
                                                                }
                                                                ?>
                                                                <td><?php echo htmlentities($row['Description']); ?></td>
                                                                <td><img src="postimages/<?php echo htmlentities($row['Image']); ?>" width="300" /></td>
                                                                <td><?php echo htmlentities($row['CreatedDate']); ?></td>
                                                                <td><a href="manage-adv.php?aid=<?php echo htmlentities($row['Id']); ?>&action=del"> <i class="fa fa-times-circle" title="Delete" style="color: red;"></i></a> </td>
                                                            </tr>
                                                        <?php
                                                            $cnt++;
                                                        }
                                                    }
                                                    catch (PDOException $e) {
                                                        // Handle any database errors
                                                        echo "<script>alert('Please try Again.')</script>";
                                                    }
                                                ?>
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
