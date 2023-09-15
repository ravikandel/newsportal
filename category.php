<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/helperfunctions.php');

if ($_GET['catid'] != '') {
  $CatId = intval($_GET['catid']);
}
if (isset($_GET['pageno'])) {
  $pageno = intval($_GET['pageno']);
} else {
  $pageno = 1;
}

$myItem = getCategoryInfo($CatId);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
  <title> <?php echo htmlentities($myItem['CategoryName']); ?> | News Portal</title>

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

   <?php include('includes/adv2.php'); ?>

  <?php

  $no_of_records_per_page = 9;
  $offset = ($pageno - 1) * $no_of_records_per_page;

  $sql = 'SELECT COUNT(*) FROM tblposts WHERE CategoryId =' . $CatId . ' AND IsActive=1';

  $total_rows = $con->query($sql)->fetchColumn();
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  ?>

  <!-- Section-->
  <section class="clearfix main-section">
    <div class="container">
      <div class="row">
        <div class="col* col-xs-12  col-sm-12 col-md-12 col-lg-12 col-xl-9">
          <div class="section-title mb-3">
            <h3> <a class="section-title-link px-3" href="category.php?id=<?php echo htmlentities($myItem['Id']); ?>"><i class="ri-equalizer-line"></i> <?php echo htmlentities($myItem['CategoryName']); ?></a>
              <a class="section-all-link px-3" id="list" href="#"><i class="ri-file-list-line"></i> List</a>
              <a class="section-all-link px-3" id="grid" href="#"><i class="ri-layout-grid-line"></i> Grid</a>
            </h3>
          </div>
          <div id="news" class="row">
            <?php
            getPostsByCategory($CatId, $offset, $no_of_records_per_page); ?>
          </div>
          <?php if ($total_rows > $no_of_records_per_page) { ?>
            <div class="container-fluid text-center py-3">
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item"><a href="?id=<?php echo $CatId; ?>&pageno=1" class="page-link">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                              echo 'disabled';
                            } ?> page-item">
                  <a href="<?php if ($pageno <= 1) {
                              echo '#';
                            } else {
                              echo "?id=$CatId&pageno=" . ($pageno - 1);
                            } ?>" class="page-link">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                              echo 'disabled';
                            } ?> page-item">
                  <a href="<?php if ($pageno >= $total_pages) {
                              echo '#';
                            } else {
                              echo "?id=$CatId&pageno=" . ($pageno + 1);
                            } ?> " class="page-link">Next</a>
                </li>
                <li class="page-item"><a href="?id=<?php echo $CatId; ?>&pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
              </ul>
            </div>
          <?php } ?>

        </div>
        <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">
          <div class="section-title mb-3">
            <h3><a class="section-title-link px-3" href="#"><i class="ri-equalizer-line"></i> Popular News</a>
            </h3>
          </div>
          <div class="row mb-3">
            <?php getMostPopularNews($CatId); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--./ Section-->


   <?php include('includes/adv3.php'); ?>


  <!-- Footer -->
  <?php include('includes/footer.php'); ?>

</body>

</html>