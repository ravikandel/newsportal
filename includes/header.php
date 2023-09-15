<?php  $sql = "SELECT * FROM tblagencyinfo";
      $info = $con->query($sql)->fetch();
 ?>
<header>
  <!-- Top Bar-->
  <section class="clearfix top-bar">
    <div class="container">
      <div class="row align-items-center">
        <div class="d-none d-lg-block col* col-md-4">
          <div class="text-center text-md-left">
            <ul id="top-menu">
              <li><a href="about-us.php">About Us</a></li>
              <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col* col-md-4 col-xs-12">
          <div class="nepali-date text-center">
            <div id="mydatewidget"></div>
            <i class="ri-time-line"></i> <?php echo date("F j, Y"); ?>
          </div>
        </div>
        <div class="d-none d-lg-block col* col-md-4">
          <div class="text-center text-lg-right">
            <ul id="top-menu">

              <li><a href="<?php echo htmlentities($info['FacebookUrl']); ?>" target="_blank"><i class="ri-facebook-box-line"></i> Facebook</a></li>
              <li><a href="<?php echo htmlentities($info['TwitterUrl']); ?>" target="_blank"><i class="ri-twitter-line"></i> Twitter</a></li>
              <li><a href="<?php echo htmlentities($info['YoutubeUrl']); ?>" target="_blank"><i class="ri-youtube-line"></i> Youtube</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--./ Top Bar-->

  <!--Header Top Logo and Advertisement -->
  <section class="clearfix header__top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col* col-md-3 col-lg-3">
          <div class="logo__wrap">
            <a href="index.php" class="logo__sec">
              <img src="assets/images/logo.png" class="img-fluid" alt="<?php echo htmlentities($info['Name']); ?> Logo" title=" Logo" />
            </a>

            <a href="index.php" class="logo__dark">
              <img src="assets/images/logo_dark.png" class="img-fluid" alt="<?php echo htmlentities($info['Name']); ?> Logo" title=" Logo" />
            </a>
          </div>
        </div>

         <?php include('includes/adv1.php'); ?>
      </div>
    </div>
  </section>
  <!--./Header Top Logo and Advertisement -->

  <!-- Menu & Navigation Section Start -->
  <?php include('includes/navigation.php'); ?>
  <!-- Menu & Navigation Section End -->

<?php  $sql = "SELECT * FROM tblposts WHERE IsActive=1 order by Id DESC LIMIT 5";
      $latestNews = $con->query($sql)->fetchAll();
      if (count($latestNews) > 0) {
    ?>
         <section class="clearfix trending__news__bar d-none d-md-block d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col* col-md-12">
                        <div class="trending__flex d-flex">
                            <label>Recent</label>
                            <ul class="list-unstyled">
                                <marquee><li>
                                 <?php foreach ($latestNews as $item) { ?>
                                   <a href="news-details.php?id=<?php echo htmlentities($item['Id']); ?>"><?php echo htmlentities($item['PostTitle']); ?></a> | 
                                 <?php } ?>
                                 </li></marquee> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
<?php } ?>

</header>