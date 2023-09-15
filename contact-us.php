<?php
include('includes/config.php');
include('includes/helperfunctions.php');

if (isset($_POST['submit'])) 
{
    try 
    {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];
      $message = $_POST['message'];

     // send mail in php
     
        $messages = "
        <html>
        <head>
        <title>Message Received from Contact form</title>
        </head>
        <body>
        <p>The details are as below!</p>
        <table>
            <tr><td>Full Name</td><td>$name</td></tr>
            <tr><td>Email</td><td>$email</td></tr>
            <tr><td>Phone</td><td>$phone</td></tr>
            <tr><td>Address</td><td>$address</td></tr>
            <tr><td>Message</td><td>$message</td></tr>
        </table>
        </body>
        </html>";
        
        
        $to = "ravkdl@gmail.com";
        $subject = "Message Received from Contact form.";
       
        $headers = 'MIME-Version: 1.0'. "\r\n" .
            'Content-type:text/html;charset=UTF-8'. "\r\n" .
            'From: '.$email. "\r\n" .
            'Reply-To: '.$email. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        mail($to, $subject, $messages, $headers);

        echo "<script>alert('Message Submitted Successfully.');</script>";
    } 
    catch (Exception  $e) {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}

$contactitem = getPageContent(2);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
  <title> <?php echo htmlentities($contactitem['PageTitle']); ?> | News Portal</title>
  <meta name="title" content="<?php echo htmlentities($contactitem['PageTitle']); ?>" />
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
              <div class="my-3">
                <h2 style="font-weight: 500;color: #004499;"><?php echo htmlentities($contactitem['PageTitle']); ?></h2>

                <?php echo $contactitem['Description']; ?>

              </div>
              
              <div class="card my-4">
                <h5 class="card-header">Please feel free to write us.</h5>
                <div class="card-body">
                  <form class="needs-validation" method="post" name="contact">
                    <div class="form-row">
                          <div class="form-group col-md-6">
                              <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name *" required>
                              <div class="invalid-feedback">Please enter your full name.</div>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address *" required>
                            <div class="invalid-feedback">Please enter your valid email.</div>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <input type="text" name="address" class="form-control form-control-lg" placeholder="Address *" required>
                              <div class="invalid-feedback">Please enter your address.</div>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="text" name="phone" class="form-control form-control-lg" maxlength="10" pattern="\d{10}" placeholder="Phone Number *" required>
                            <div class="invalid-feedback">Please enter your valid Phone Number.</div>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <textarea class="form-control" name="message" rows="3" placeholder="Your Message *" required></textarea>
                          <div class="invalid-feedback">Please enter your message.</div>
                        </div>
                      </div>
                     <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                  </form>
                </div>
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

<script>
        // Self-executing function
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>

</html>