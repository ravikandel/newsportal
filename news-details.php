<?php
session_start();
include('includes/config.php');
include('includes/helperfunctions.php');

$postid = intval($_GET['id']);

//Genrating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
  //Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];

      // Attempt insert query execution
      try {
        $sql = "INSERT INTO tblcomments (postId,name,email,comment,status) values(?,?,?,?,?)";
        $con->prepare($sql)->execute([$postid, $name, $email,$comment,0]);
       
        echo "<script>alert('Comment Successfully Submitted. It will be display after admin review.');</script>";
      } 
      catch (PDOException $e) {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
      }
    }
  }
}

$currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

try{
$sql = "UPDATE tblposts SET viewCounter=IFNULL(viewCounter,0) + 1 WHERE id = ?";
$con->prepare($sql)->execute([$postid]);
} 
catch (PDOException $e) {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

$mypostitem = getNewsInfo($postid);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
  <title><?php echo htmlentities($mypostitem['posttitle']); ?> | News Portal</title>
  <meta name="title" content="<?php echo htmlentities($mypostitem['posttitle']); ?>" />
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
        <div class="col* col-xs-12  col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="category.php?catid=<?php echo htmlentities($mypostitem['cid']); ?>"><?php echo htmlentities($mypostitem['category']); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo htmlentities($mypostitem['posttitle']); ?></li>
            </ol>
          </nav>
        </div>

        <div class="col* col-xs-12  col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <h1><?php echo htmlentities($mypostitem['posttitle']); ?></h1>
          <div class="cl-gray"><i class="ri-time-line"></i> Posted on <?php echo htmlentities(date('d M, Y', strtotime($mypostitem['postingdate']))) ?></div>
        </div>
        <!--advertisement -->
           <?php  $sql = "SELECT * FROM tbladvertisement WHERE Location=2 ORDER BY Id DESC LIMIT 1";
              $allAd = $con->query($sql)->fetchAll();
              if (count($allAd) > 0) { ?>
                    <div class="col* col-md-12">
                          <?php  foreach ($allAd as $ad) { ?>
                              <div class="my-3">
                                  <a targe="_blank" href="<?php echo htmlentities($ad['URL']); ?>" target="_blank"><img src="admin/postimages/<?php echo htmlentities($ad['Image']); ?>" alt="<?php echo htmlentities($ad['Description']); ?>" class="img-fluid" title="<?php echo htmlentities($ad['Description']); ?>"></a>
                              </div>
                         <?php } ?>
                    </div>
       <?php } ?>
        
        <!--advertisement -->

        <div class="col* col-xs-12  col-sm-12 col-md-12 col-lg-12 col-xl-9">
          <div class="row">
            <div class="item col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
              <img src="admin/postimages/<?php echo htmlentities($mypostitem['PostImage']); ?>" alt="<?php echo htmlentities($mypostitem['posttitle']); ?>" class="img-fluid" title="<?php echo htmlentities($mypostitem['posttitle']); ?>" />
              <div id="newsContent" class="my-3">
                <hr />
                <div class="col-md-12 text-center">
                  <button type="button" id="A" class="btn btn-lg btn-primary">A</button>
                  <button type="button" id="AA" class="btn btn-lg btn-outline-primary">A</button>
                  <button type="button" id="AAA" class="btn btn-lg btn-outline-primary">A</button>
                </div>
                <hr />
                <?php echo $mypostitem['postdetails']; ?>
              </div>
              <p><strong>Share:</strong> <a href="http://www.facebook.com/share.php?u=<?php echo $currenturl; ?>" target="_blank">Facebook</a> |
                <a href="https://twitter.com/share?url=<?php echo $currenturl; ?>" target="_blank">Twitter</a> |
                <a href="https://web.whatsapp.com/send?text=<?php echo $currenturl; ?>" target="_blank">Whatsapp</a> |
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $currenturl; ?>" target="_blank">Linkedin</a><br><strong>Total Views:</strong> <?php echo htmlentities($mypostitem['ViewCounter']); ?>
              </p>
              <hr />
            </div>
                  <!--advertisement -->
                   <?php  $sql = "SELECT * FROM tbladvertisement WHERE Location=3 ORDER BY Id DESC LIMIT 1";
                      $allAd = $con->query($sql)->fetchAll();
                      if (count($allAd) > 0) { ?>
                            <div class="col* col-md-12">
                                  <?php  foreach ($allAd as $ad) { ?>
                                      <div class="my-3">
                                          <a targe="_blank" href="<?php echo htmlentities($ad['URL']); ?>" target="_blank"><img src="admin/postimages/<?php echo htmlentities($ad['Image']); ?>" alt="<?php echo htmlentities($ad['Description']); ?>" class="img-fluid" title="<?php echo htmlentities($ad['Description']); ?>"></a>
                                      </div>
                                 <?php } ?>
                            </div>
               <?php } ?>
                
                <!--advertisement -->
            <!--comment section-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">

              <div class="card my-4">
                <h5 class="card-header">Leave a Comment</h5>
                <div class="card-body">
                  <form name="Comment" method="post">
                    <div class="form-row">
                      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                      <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter your fullname" required>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your Valid email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                  </form>
                </div>
              </div>
              <hr />
              <?php displayComments($postid); ?>
            </div>
          </div>
        </div>

        <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">
          <div class="section-title mb-3">
            <h3><a class="section-title-link px-3" href="#"><i class="ri-equalizer-line"></i> Popular News</a>
            </h3>
          </div>
          <div class="row mb-3">
            <?php getMostPopularNews($mypostitem['cid']); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--./ Section-->

  <?php include('includes/footer.php'); ?>

</body>

</html>