<?php  $sql = "SELECT * FROM tblagencyinfo";
      $info = $con->query($sql)->fetch();
 ?>
    
     <!--Footer-->
     <footer>
       <!-- Footer Top-->
       <section class="footer__top">
         <div class="container">
           <div class="row align-items-center">
             <div class="col* col-md-12 text-center">
               <div class="my-3">
                 <a href="index.php">
                   <img src="assets/images/logo_dark.png" class="img-fluid" alt="<?php echo htmlentities($info['Name']); ?> Logo" />
                 </a>
               </div>
               <div class="my-3">
                 <a href="<?php echo htmlentities($info['FacebookUrl']); ?>" target="_blank"><i class="ri-facebook-box-line"></i> Facebook</a>
                 <a href="<?php echo htmlentities($info['TwitterUrl']); ?>" target="_blank"><i class="ri-twitter-line"></i> Twitter</a>
                 <a href="<?php echo htmlentities($info['YoutubeUrl']); ?>" target="_blank"><i class="ri-youtube-line"></i> Youtube</a>
               </div>
             </div>
           </div>
           <div class="pt-4 bdr-pt-1 row align-items-center">
             <div class="col* col-md-4 col-xs-12">
               <div class="text-left">
                 <h3><?php echo htmlentities($info['Name']); ?></h3>

                 <!--Footer Column-->
                 <p><a>Registered No.: <?php echo htmlentities($info['RegisteredNo']); ?></a></p>
                 <p><a>Address: <?php echo htmlentities($info['Address']); ?></a></p>
                 <p><a>Contact No.: <?php echo htmlentities($info['ContactNo']); ?></a></p>
                 <p><a>Email: <?php echo htmlentities($info['Email']); ?></a></p>
                 <!--Footer Column-->
               </div>
             </div>

             <div class="col* col-md-8 col-xs-12">
               <div class="row">
                 <div class="col* col-md-3 col-sm-6 col-xs-6">
                   <div class="text-left">
                     <?php
                      $catId = 3;
                      $sql = "SELECT SubCategoryId,SubCategoryName FROM tblsubcategory where IsActive=1 AND CategoryId=" . $catId . " LIMIT 4";
                      $subcategoryList = $con->query($sql)->fetchAll();

                      if (count($subcategoryList) > 0) {
                        echo '<h3>National</h3>';
                        foreach ($subcategoryList as $item) { ?>
                         <p><a href="subcategory.php?catid=8&subcatid=<?php echo htmlentities($item['SubCategoryId']); ?>"><?php echo htmlentities($item['SubCategoryName']); ?></a></p>
                     <?php }
                      }
                      ?>
                   </div>
                 </div>
                 <div class="col* col-md-3 col-sm-6 col-xs-6">
                   <div class="text-left">
                     <?php
                      $catId = 8;
                      $sql = "SELECT SubCategoryId,SubCategoryName FROM tblsubcategory where IsActive=1 AND CategoryId=" . $catId . " LIMIT 4";
                      $subcategoryList = $con->query($sql)->fetchAll();

                      if (count($subcategoryList) > 0) {
                        echo '<h3>Sports</h3>';
                        foreach ($subcategoryList as $item) { ?>
                         <p><a href="subcategory.php?catid=8&subcatid=<?php echo htmlentities($item['SubCategoryId']); ?>"><?php echo htmlentities($item['SubCategoryName']); ?></a></p>
                     <?php }
                      }
                      ?>
                   </div>
                 </div>
                 <div class="col* col-md-3 col-sm-6 col-xs-6">
                   <div class="text-left">
                     <?php
                      $catId = 5;
                      $sql = "SELECT SubCategoryId,SubCategoryName FROM tblsubcategory where IsActive=1 AND CategoryId=" . $catId . " LIMIT 4";
                      $subcategoryList = $con->query($sql)->fetchAll();

                      if (count($subcategoryList) > 0) {
                        echo '<h3>World</h3>';
                        foreach ($subcategoryList as $item) { ?>
                         <p><a href="subcategory.php?catid=8&subcatid=<?php echo htmlentities($item['SubCategoryId']); ?>"><?php echo htmlentities($item['SubCategoryName']); ?></a></p>
                     <?php }
                      }
                      ?>
                   </div>
                 </div>
                 <div class="col* col-md-3 col-sm-6 col-xs-6">
                   <div class="text-left">
                     <?php
                      $catId = 12;
                      $sql = "SELECT SubCategoryId,SubCategoryName FROM tblsubcategory where IsActive=1 AND CategoryId=" . $catId . " LIMIT 4";
                      $subcategoryList = $con->query($sql)->fetchAll();

                      if (count($subcategoryList) > 0) {
                        echo '<h3>Others</h3>';
                        foreach ($subcategoryList as $item) { ?>
                         <p><a href="subcategory.php?catid=8&subcatid=<?php echo htmlentities($item['SubCategoryId']); ?>"><?php echo htmlentities($item['SubCategoryName']); ?></a></p>
                     <?php }
                      }
                      ?>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </section>
       <!--./ Footer Top-->

       <!-- Footer Bottom-->
       <section class="footer__btm">
         <div class="container">
           <div class="row align-items-center">
             <div class="col* col-md-4 col-xs-12">
               <div class="text-center text-md-left">
                 <p>&copy; <?php echo date('Y'); ?> <?php echo htmlentities($info['Name']); ?> </p>
               </div>
             </div>
             <div class="col* col-md-4 col-xs-12">
               <div class="btm-bar text-center">
                 <ul id="top-menu">
                   <li><a href="about-us.php">About Us</a></li>
                   <li><a href="contact-us.php">Contact Us</a></li>
                 </ul>
               </div>
             </div>
             <div class="col* col-md-4 col-xs-12">
               <div class="text-center text-md-right">
                 <p>Developed by: <a href="#"> LAG5</a></p>
               </div>
             </div>
           </div>
         </div>
       </section>
       <!--./ Footer Bottom-->
     </footer>
     <!--./Footer-->

     <a id="back-to-top" href="#" class="back-to-top"> <i class="ri-arrow-up-s-line"></i></a>

     <!-- Bootstrap core JavaScript -->
     <script src="assets/js/jquery-3.4.1.min.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/main.min.js"></script>
     <script src="assets/js/script.min.js"></script>