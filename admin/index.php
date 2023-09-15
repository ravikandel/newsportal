<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if (isset($_POST['login'])) {
    
try{

    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    // Fetch data from database on the basis of username/email and password
    
    $sql = "SELECT userType FROM tbladmin WHERE (AdminUserName=? AND AdminPassword=?)";
    $stmt = $con->prepare($sql);
    $stmt->execute([$uname,$password]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
         $_SESSION['login'] = $_POST['username'];
         $_SESSION['utype'] = $result['userType'];
         
         //token goes here // adding 10 minute as token expiry time
         $token = base64_encode(json_encode(['exp' => time() + 600, 'user' => $_POST['username'], 'utype' => $result['userType']]));
         
         $_SESSION['token'] = $token;
         
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    }
    else{
       echo "<script>alert('Invalid username or password');</script>";
    }
    }
    catch (PDOException $e){
        echo "<script>alert('Something Went Wrong.');</script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- App title -->
    <title>Log In | News Portal</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="bg-transparent">


    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.php" class="text-success">
                                        NewsPortal
                                    </a>
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post">

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username" placeholder="Username or email" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn btn-lg w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Log In</button>
                                            <a class="btn btn-lg btn-primary" href="forgot-password.php"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                </form>

                                <div class="col-md-12 text-center m-t-10">
                                    <a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- end card-box-->




                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

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

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>