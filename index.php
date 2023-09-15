<?php
session_start();
include('includes/config.php');
include('includes/helperfunctions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
<title>Home | International Media Network</title>
<meta name="title" content="Home | International Media Network" />
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
  <?php include('includes/header.php');
        include('includes/adv2.php'); ?>
        
<!-- Section 1-->

<?php  $sql = "SELECT * FROM tblposts WHERE IsActive=1 ORDER BY Id DESC LIMIT 4";
          $topnews = $con->query($sql)->fetchAll();
          if (count($topnews) > 0) { ?>
          <section class="clearfix main-section">
        	<div class="container">
        		<div class="row align-items-center">
                      <?php $maincnt = 1; 
                        foreach ($topnews as $topnew) { ?>
                          <div class="col* col-md-12">
    						<div class="headlines-box text-center">
                              <h1><a targe="_blank" href="news-details.php?id=<?php echo htmlentities($topnew['Id']); ?>" target="_blank"><?php echo htmlentities($topnew['PostTitle']); ?></a></h1>
                                  <a targe="_blank" href="news-details.php?id=<?php echo htmlentities($topnew['Id']); ?>" target="_blank">
                                     <?php if($maincnt == 4) { ?>
                                        <div class="img_wrap9">
        									<img src="admin/postimages/<?php echo htmlentities($topnew['PostImage']); ?>" alt="<?php echo htmlentities($topnew['PostTitle']); ?>" class="img-fluid small-img" title="<?php echo htmlentities($topnew['PostTitle']); ?>">
        								</div>
        							<?php } ?>
    							</a>
                                <div class="cl-gray"><i class="ri-time-line"></i> Posted on <?php echo htmlentities(date('d M, Y', strtotime($topnew['CreatedDate']))) ?></div>
                            </div>
                          </div>
                     <?php $maincnt++;
                            } ?>
                </div>
              </div>
          </section>
   <?php } ?>
<!--./ Section 1-->	

<?php include('includes/adv3.php'); ?>
  
<!-- Section 2-->  
<section class="clearfix main-section">
	<div class="container">
		<div class="row">
			<div class="col* col-xs-12  col-sm-12 col-md-12 col-lg-12 col-xl-9">
				<div class="section-title mb-3">
					<h3><a class="section-title-link px-3" href="category.php?catid=3"><i class="ri-equalizer-line"></i> National</a>
						<div class="tab">
							<button class="tablinks active" id="defaultOpen" onclick="switchTab(event, 'list3')">
								<div class="d-none d-lg-inline-flex">NSW</div>
							</button>
							<button class="tablinks" onclick="switchTab(event, 'list6')">
								<div class="d-none d-lg-inline-flex">VIC</div>
							</button>
							<button class="tablinks" onclick="switchTab(event, 'list7')">
								<div class="d-none d-lg-inline-flex">QLD</div>
							</button>
							<button class="tablinks" onclick="switchTab(event, 'list8')">
								<div class="d-none d-lg-inline-flex">SA</div>
							</button>
							<button class="tablinks" onclick="switchTab(event, 'list9')">
								<div class="d-none d-lg-inline-flex">WA</div>
							</button>
							<button class="tablinks" onclick="switchTab(event, 'list11')">
								<div class="d-none d-lg-inline-flex">TAS</div>
							</button>
							<button class="tablinks" onclick="switchTab(event, 'list12')">
								<div class="d-none d-lg-inline-flex">NT</div>
							</button>
							<button class="tablinks" onclick="switchTab(event, 'list13')">
								<div class="d-none d-lg-inline-flex">ACT</div>
							</button>
						</div>
						<a class="section-all-link px-3" href="category.php?catid=3">View All <i class="ri-more-2-fill"></i></a>
					</h3>
				</div>
				
				<?php $nationalList = array(3,6,7,8,9,11,12,13); 
				
				 foreach ($nationalList as $nationalId) { 
				    $myLists = getRecentNewsBySubCategory($nationalId);?>
				        <div id="list<?php echo $nationalId; ?>" class="tabcontent">
							<?php if (count($myLists) > 0)
							{ 
							    $newscnt = 0; 
							    foreach ($myLists as $myList) 
							    {
    								if ($newscnt == 0 || $newscnt == 2 || $newscnt == 4) { ?>
    									<div class="row">
    									<?php }
    									if ($newscnt == 0 || $newscnt == 1 || $newscnt == 2 || $newscnt == 3) { ?>
    										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
    											<div class="row mb-3">
    												<div class="col-xs-6 col-sm-4 mb-3">
    													<a href="news-details.php?id=<?php echo htmlentities($myList['Id']); ?>">
    														<div class="img_wrap2">
    															<img src="admin/postimages/<?php echo htmlentities($myList['PostImage']); ?>" alt="<?php echo htmlentities($myList['PostTitle']); ?>" class="img-fluid small-img" title="<?php echo htmlentities($myList['PostTitle']); ?>" />
    														</div>
    													</a>
    												</div>
    												<div class="col-xs-6 col-sm-8">
    													<h4><a href="news-details.php?id=<?php echo htmlentities($myList['Id']); ?>"><?php echo htmlentities($myList['PostTitle']); ?></a></h4>
    													<div class="cl-gray"><i class="ri-time-line"></i> <?php echo htmlentities(date('d M, Y', strtotime($myList['CreatedDate']))) ?></div>
    												</div>
    											</div>
    										</div>
    									<?php } else if ($newscnt == 4 || $newscnt == 5 || $newscnt == 6) { ?>
    										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 mb-3">
    											<a href="news-details.php?id=<?php echo htmlentities($myList['Id']); ?>">
    												<div class="img_wrap5">
    													<img src="admin/postimages/<?php echo htmlentities($myList['PostImage']); ?>" alt="<?php echo htmlentities($myList['PostTitle']); ?>" class="img-fluid small-img" title="<?php echo htmlentities($myList['PostTitle']); ?>" />
    												</div>
    											</a>
    											<div class="my-3">
    												<h4><a href="news-details.php?id=<?php echo htmlentities($myList['Id']); ?>"><?php echo htmlentities($myList['PostTitle']); ?></a></h4>
    													<div class="cl-gray"><i class="ri-time-line"></i> <?php echo htmlentities(date('d M, Y', strtotime($myList['CreatedDate']))) ?></div>
    											</div>
    										</div>
    									<?php }
    									if ($newscnt == 1 || $newscnt == 3 || $newscnt == 6) { ?>
    									</div>
    								<?php } 
    							      $newscnt++; 
								} ?>
			         <?php  } ?>
						</div>
			      <?php  } ?>
	        </div>	
	        
	        <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">

                <div class="section-title mb-3">
                    <h3><a class="section-title-link px-3" href="category.php?catid=5"><i class="ri-equalizer-line"></i> World</a>
                        <a class="section-all-link px-3" href="category.php?catid=5">View All <i class="ri-more-2-fill"></i></a>
                    </h3>
                </div>
                <?php $ourres= getMostRecentNews(5); 
                    if (count($ourres) > 0) 
                    {
                        foreach ($ourres as $row)
                        {  ?>
                            <div class="row mb-3">
                                <div class="col-xs-6 col-sm-4 mb-3">
                                    <a href="news-details.php?id=<?php echo htmlentities($row['Id']);?>">
                                      <div class="img_wrap1">
                                        <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo $row['PostTitle'];?>" class="img-fluid small-img" title="<?php echo $row['PostTitle'];?>">
                                      </div>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-8">
                                  <h5><a href="news-details.php?id=<?php echo htmlentities($row['Id']);?>"><?php echo $row['PostTitle'];?></a></h5>
                                  <div class="cl-gray"><i class="ri-time-line"></i> Posted on <?php echo htmlentities(date('d M, Y', strtotime($row['CreatedDate'])));?></div>
                                </div>
                            </div>
             <?php      }
                    } 
                    else { ?>
                       <div class="row mb-3"><div class="col-md-12"><p class="text-center">No News Posted Yet.</p></div></div>
                    <?php  } ?>
                  </div>

            </div>
		</div>
	</div>
</section>
<!--./ Section 2-->	

<!-- Section 3-->
<?php $displayed_News = 0;

$sql = "SELECT * FROM tblposts WHERE IsActive=1 AND CategoryId=11 ORDER BY Id DESC LIMIT 6";
$cat6News = $con->query($sql)->fetchAll();
if (count($cat6News) > 0) { ?>

<section class="clearfix main-section">
    <div class="container">
        <div class="row">
            <div class="col* col-md-12">
                <div class="section-title mb-3">
                    <h3><a class="section-title-link px-3" href="category.php?catid=11"><i class="ri-equalizer-line"></i> Technology</a>
                        <a class="section-all-link px-3" href="category.php?catid=11">View All<i class="ri-more-2-fill"></i></a>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <?php  foreach ($cat6News as $news) 
                        { 
                            $displayed_News = $displayed_News . ',' . htmlentities($news['Id']); ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-3">
                                <a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>">
									<div class="img_wrap4">
										<img src="admin/postimages/<?php echo htmlentities($news['PostImage']); ?>" alt="<?php echo htmlentities($news['PostTitle']); ?>" class="img-fluid small-img" title="<?php echo htmlentities($news['PostTitle']); ?>" />
									</div>
								</a>
                                <div class="my-3">
                                    <h5><a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>"><?php echo htmlentities($news['PostTitle']); ?></a></h5>
    								<div class="cl-gray"><i class="ri-time-line"></i> <?php echo htmlentities(date('d M, Y', strtotime($news['CreatedDate']))) ?></div>
                                </div>
                            </div>
                <?php   } ?>
                    </div>
                </div>
                
            <?php $sql="";
                  $sql = "SELECT * FROM tblposts WHERE IsActive=1 AND CategoryId=11 AND Id NOT IN ($displayed_News) ORDER BY Id DESC LIMIT 4";
                  $cat6moreNews = $con->query($sql)->fetchAll();
            
            if (count($cat6moreNews) > 0) 
            { ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                    <?php  foreach ($cat6moreNews as $news) 
                        { ?>
                        <div class="row mb-3">
                            <div class="col-xs-6 col-sm-4 mb-3">
                                <a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>">
									<div class="img_wrap3">
										<img src="admin/postimages/<?php echo htmlentities($news['PostImage']); ?>" alt="<?php echo htmlentities($news['PostTitle']); ?>" class="img-fluid small-img" title="<?php echo htmlentities($news['PostTitle']); ?>" />
									</div>
								</a>
                            </div>
                            <div class="col-xs-6 col-sm-8 mb-3">
                                <h5><a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>"><?php echo htmlentities($news['PostTitle']); ?></a></h5>
    								<div class="cl-gray"><i class="ri-time-line"></i> <?php echo htmlentities(date('d M, Y', strtotime($news['CreatedDate']))) ?></div>
                            </div>
                        </div>
                 <?php } ?>
                </div>
      <?php } ?>
        </div>
    </div>
</section>

<?php } ?>

<!--./Section 3-->

<!-- Section 4-->	
<section class="clearfix main-section">
    <div class="container">
        <div class="row">
            
            <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                <div class="bdr-1 p-3">
                    <div class="section-title mb-3">
                        <h3><a class="section-title-link px-3" href="category.php?catid=6"><i class="ri-equalizer-line"></i> Politics</a>
                            <a class="section-all-link px-3" href="category.php?catid=6">View All<i class="ri-more-2-fill"></i></a>
                        </h3>
                    </div>
                    <?php 
                    $news6= getMostRecentNews(6); 
                    $cnt6 = 0;
                    if (count($news6) > 0) 
                    { ?>
                        <?php foreach ($news6 as $news)
                        { ?>
                            <?php if ($cnt6 == 0) { ?>
                                <div class="my-3">
                                    <a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>">
                                        <img src="admin/postimages/<?php echo htmlentities($news['PostImage']); ?>" alt="<?php echo htmlentities($news['PostTitle']); ?>" class="img-fluid" title="<?php echo htmlentities($news['PostTitle']); ?>" />
                                    </a>
                                </div>
                            <?php }  ?>
                            <?php if ($cnt6 == 0) { ?>
                                <ul class="ul-list">
                                <?php } ?>
                                <li class="my-4">
                                    <h6><a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>"><?php echo htmlentities($news['PostTitle']); ?></a></h6>
                                </li>
                                <?php if ($cnt6 == 4) { ?>
                                </ul>
                            <?php } ?>
                        <?php $cnt6++;
                        } 
                   } ?>
                </div>
            </div>
            <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                <div class="bdr-1 p-3">
                    <div class="section-title mb-3">
                        <h3><a class="section-title-link px-3" href="category.php?catid=7"><i class="ri-equalizer-line"></i> Business</a>
                            <a class="section-all-link px-3" href="category.php?catid=7">View All<i class="ri-more-2-fill"></i></a>
                        </h3>
                    </div>
                    <?php 
                    $news6= getMostRecentNews(7); 
                    $cnt6 = 0;
                    if (count($news6) > 0) 
                    { ?>
                        <?php foreach ($news6 as $news)
                        { ?>
                            <?php if ($cnt6 == 0) { ?>
                                <div class="my-3">
                                    <a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>">
                                        <img src="admin/postimages/<?php echo htmlentities($news['PostImage']); ?>" alt="<?php echo htmlentities($news['PostTitle']); ?>" class="img-fluid" title="<?php echo htmlentities($news['PostTitle']); ?>" />
                                    </a>
                                </div>
                            <?php }  ?>
                            <?php if ($cnt6 == 0) { ?>
                                <ul class="ul-list">
                                <?php } ?>
                                <li class="my-4">
                                    <h6><a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>"><?php echo htmlentities($news['PostTitle']); ?></a></h6>
                                </li>
                                <?php if ($cnt6 == 4) { ?>
                                </ul>
                            <?php } ?>
                        <?php $cnt6++;
                        } 
                   } ?>
                </div>
            </div>
            <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                <div class="bdr-1 p-3">
                    <div class="section-title mb-3">
                        <h3><a class="section-title-link px-3" href="category.php?catid=8"><i class="ri-equalizer-line"></i> Sports</a>
                            <a class="section-all-link px-3" href="category.php?catid=8">View All<i class="ri-more-2-fill"></i></a>
                        </h3>
                    </div>
                    <?php 
                    $news6= getMostRecentNews(8); 
                    $cnt6 = 0;
                    if (count($news6) > 0) 
                    { ?>
                        <?php foreach ($news6 as $news)
                        { ?>
                            <?php if ($cnt6 == 0) { ?>
                                <div class="my-3">
                                    <a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>">
                                        <img src="admin/postimages/<?php echo htmlentities($news['PostImage']); ?>" alt="<?php echo htmlentities($news['PostTitle']); ?>" class="img-fluid" title="<?php echo htmlentities($news['PostTitle']); ?>" />
                                    </a>
                                </div>
                            <?php }  ?>
                            <?php if ($cnt6 == 0) { ?>
                                <ul class="ul-list">
                                <?php } ?>
                                <li class="my-4">
                                    <h6><a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>"><?php echo htmlentities($news['PostTitle']); ?></a></h6>
                                </li>
                                <?php if ($cnt6 == 4) { ?>
                                </ul>
                            <?php } ?>
                        <?php $cnt6++;
                        } 
                   } ?>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--./ Section 4-->	

<!-- Section 5-->	
<section class="clearfix main-section">
    <div class="container">
        
        <div class="row">
            <div class="col* col-md-12">
                <div class="section-title mb-3">
                    <h3><a class="section-title-link px-3" href="category.php?catid=12"><i class="ri-equalizer-line"></i> Others</a>
                            <a class="section-all-link px-3" href="category.php?catid=12">View All<i class="ri-more-2-fill"></i></a>
                    </h3>
                </div>
            </div>
        </div>
        
        <?php 
        $news6= getMostRecentNews(12); 
        if (count($news6) > 0) 
        { ?>
         <div class="row">
            <div class="col* col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">
                <div class="row">
                    <?php foreach ($news6 as $news)
                    { ?>
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-3">
                           <a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>">
                                <div class="img_wrap5">
                                    <img src="admin/postimages/<?php echo htmlentities($news['PostImage']); ?>" alt="<?php echo htmlentities($news['PostTitle']); ?>" class="img-fluid small-img" title="<?php echo htmlentities($news['PostTitle']); ?>" />
                                </div>
                            </a>
                            <div class="my-3">
                                <h5><a href="news-details.php?id=<?php echo htmlentities($news['Id']); ?>"><?php echo htmlentities($news['PostTitle']); ?></a></h5>
                            </div>
                        </div>
                    
            <?php  } ?> 
                </div>
            </div>
        </div>    
       <?php } ?>
    </div>
</section>
<!--./ Section 5-->	

<!-- Footer -->
<?php include('includes/footer.php'); ?>

<script type="text/javascript" charset="utf-8">
    (function($) {
        $(document).ready(function() {
            document.getElementById("defaultOpen").click(); // for home page only
        });
    }(jQuery));
</script>


</body>

</html>