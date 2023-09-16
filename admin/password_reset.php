<?php 
    include '../includes/autoLoader.php';
  $msg = '';
  if (isset($_GET['error'])) {
    $error = $_GET['error'];
    $msg = '<div class="alert alert-danger" role="alert">'.$error.'</div>';
  }

  if (isset($_GET['success'])) {
    $success = $_GET['success'];
    $msg = '<div class="alert alert-success" role="alert">'.$success.'</div>';
  }

  
  if (isset($_POST['recover_btn'])) {
    
   
    $email = $_POST['email'];
    $password = null;
    // controller classes
    include '../classes/dbh.php';
    include '../classes/signin.php';
    include '../classes/signinContr.php';
    $signin = new SigninContr($email, $password);
    $results = $signin->checkUserByEmail();
    foreach ($results as $result) {
      $user=$result['user_id'];
      $user = md5($user);
    }
    header('location: recover.php?token='.$user .', '.$email .'');
  }
  
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recover Password | MuqsitX</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <!-- <img src="assets/images/logo.svg"> -->
                  <h2>MuqsitX</h2>
                </div>
                <h4>Recover Password</h4>
                <?php echo $msg; ?>
                <form class="pt-3" method="post" action="password_reset.php">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>
                  <div class="mt-3">
                    <input type="submit" name="recover_btn" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Send">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        </label>
                    </div>
                    <a href="index.php" class="auth-link text-black">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>