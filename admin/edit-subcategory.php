<?php
session_start();
include('includes/config.php');
require ('includes/checkAuth.php');
error_reporting(0);

    if (isset($_POST['sucatdescription'])) {
        $subcatid = intval($_GET['scid']);
        $categoryid = $_POST['category'];
        $subcatname = $_POST['subcategory'];
        $subcatdescription = $_POST['sucatdescription'];
        
        try
        {
            $sql = "UPDATE tblsubcategory SET CategoryId=?, SubcategoryName=?, SubCategoryDescription=? WHERE SubCategoryId=?";
            $con->prepare($sql)->execute([$categoryid,$subcatname,$subcatdescription,$subcatid]);
            
            $msg = "Sub-Category updated succesfully";
            
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

        <title>Edit Sub-Category | Newsportal</title>

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
                                    <h4 class="page-title">Edit Sub-Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Category </a>
                                        </li>
                                        <li class="active">
                                            Edit Sub-Category
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
                                         //fetching Category details
                                        $subcatid = intval($_GET['scid']);
                                    
                                        $sql = "Select tblcategory.CategoryName as catname,tblcategory.id as catid,tblsubcategory.SubcategoryName as subcatname,tblsubcategory.SubCategoryDescription as SubCatDescription,tblsubcategory.CreatedDate as subcatpostingdate,tblsubcategory.ModifiedDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.IsActive=1 and  SubCategoryId=?"; 
                                        $stmt = $con->prepare($sql); 
                                        $stmt->execute([$subcatid]); 
                                        
                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($results as $row)
                                        { ?>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" name="category" method="post">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Category</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name="category" required>
                                                                <option value="<?php echo htmlentities($row['catid']); ?>"><?php echo htmlentities($row['catname']); ?></option>
                                                                <?php
                                                                
                                                                $sql = "select id,CategoryName from  tblcategory where IsActive=1"; 
                                                                $stmt1 = $con->prepare($sql); 
                                                                $stmt1->execute(); 
                                                                
                                                                $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($result1 as $res)
                                                                { ?>
                                                                    <option value="<?php echo htmlentities($res['id']); ?>"><?php echo htmlentities($res['CategoryName']); ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Sub-Category</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['subcatname']); ?>" name="subcategory" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Sub-Category Description</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" rows="5" name="sucatdescription" required><?php echo htmlentities($row['SubCatDescription']); ?></textarea>
                                                        </div>
                                                    </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submitsubcat">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>

                                        </div>
                                <?php  } 
                                    }
                                    catch (PDOException $e) 
                                    {
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