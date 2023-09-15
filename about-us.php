<?php
include('includes/config.php');
include('includes/helperfunctions.php');

$aboutitem = getPageContent(1);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
  <title> <?php echo htmlentities($aboutitem['PageTitle']); ?> | News Portal</title>
  <meta name="title" content="<?php echo htmlentities($aboutitem['PageTitle']); ?>" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />

  <!-- Bootstrap core CSS -->
  <link href="assets/css/remixicon.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/dark-theme.css" rel="stylesheet">
  <link href="assets/css/navigation.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">

</head>

<body class="light__theme" id="kbpatra-body">

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <br>

  <!-- Section-->
  <section class="clearfix main-section">
    <div class="container">
      <div class="row">
        <div class="col* col-xs-12  col-sm-12 col-md-12 col-lg-12 col-xl-9">
          <div class="row">
            <div class="item col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
              <div class="my-3">
                <h2 style="font-weight: 500;color: #004499;"><?php echo htmlentities($aboutitem['PageTitle']); ?></h2>

                <?php echo $aboutitem['Description']; ?>

              </div>
            </div>
          </div>
        </div>

        <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">
          <div class="section-title mb-3">
            <h3><a class="section-title-link px-3" href="#"><i class="ri-equalizer-line"></i> Popular News</a>
            </h3>
          </div>
          <div class="row mb-3">
            <?php getMostPopularNews(0); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--./ Section-->
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>

</body>

</html>