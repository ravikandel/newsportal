   <?php  $sql = "SELECT * FROM tbladvertisement WHERE Location=1 ORDER BY Id DESC LIMIT 1";
              $allAd = $con->query($sql)->fetchAll();
              if (count($allAd) > 0) {
                foreach ($allAd as $ad) { ?>
                  <div class="col* col-md-9 col-lg-9 d-md-block d-lg-block text-right">
                      <a targe="_blank" href="<?php echo htmlentities($ad['URL']); ?>" target="_blank"><img src="admin/postimages/<?php echo htmlentities($ad['Image']); ?>" alt="<?php echo htmlentities($ad['Description']); ?>" class="img-fluid" title="<?php echo htmlentities($ad['Description']); ?>"></a>
                  </div>
        <?php } } ?>