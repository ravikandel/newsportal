   <?php  $sql = "SELECT * FROM tbladvertisement WHERE Location=2 ORDER BY Id DESC LIMIT 1";
              $allAd = $con->query($sql)->fetchAll();
              if (count($allAd) > 0) { ?>
              <section class="clearfix main-section">
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col* col-md-12">
                          <?php  foreach ($allAd as $ad) { ?>
                              <div class="my-3">
                                  <a targe="_blank" href="<?php echo htmlentities($ad['URL']); ?>" target="_blank"><img src="admin/postimages/<?php echo htmlentities($ad['Image']); ?>" alt="<?php echo htmlentities($ad['Description']); ?>" class="img-fluid" title="<?php echo htmlentities($ad['Description']); ?>"></a>
                              </div>
                         <?php } ?>
                    </div>
                  </div>
                </div>
              </section>
       <?php } ?>
        
        


