<?php
    include 'includes/autoLoader.php';  
  $msg = '';
  if (isset($_GET['error'])) {
    $error = $_GET['error'];
    $msg = '<div class="alert alert-danger" role="alert">'.$error.'</div>';
  }

  if (isset($_GET['success'])) {
    $success = $_GET['success'];
    $msg = '<div class="alert alert-success" role="alert">'.$success.'</div>';
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - CS ALUMNI IBBUL</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php include 'header.php'; ?>
      
      <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h1 class="mb0">Login</h1>
            </div>
          </div>
        </div>
      </section>

      

      <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row probootstrap-gutter0">
                
                <div class="col-md-4" id="probootstrap-sidebar">
                  <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                    <h3>Welcome Back</h3>
                    <p>Enter your account details to login</p>
                  </div>
                </div>
                <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                  <h2>Login</h2>
                  <!-- <p>Contact us using the form below.</p> -->
                  <?php echo $msg; ?>
                  <form action="includes/signin.php" method="post" class="probootstrap-form">
                    <div class="form-group">
                      <label for="email">Matriculation Number</label>
                      <input type="text" class="form-control" id="matNo" name="matNo" placeholder="U07/FNS/CSC/0001">
                    </div>
                    <div class="form-group">
                      <label for="subject">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-lg" id="submit" name="login_btn" value="Login">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <?php include 'footer.php'; ?>

    </div>
    <!-- END wrapper -->
    

    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>

    
  </body>
</html>