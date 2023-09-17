<?php
    include 'includes/autoLoader.php';  
  //   session_start();
  // if (isset($_SESSION['userID'])) {

  //   $userID = $_SESSION['userID'];

  // }else{
  //   header("location: index.php");
  // }
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
    <title>Senate List - CS ALUMNI IBBUL</title>
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
              <h1 class="mb0">Verify Senate List</h1>
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
                    <h3>NB:</h3>
                    <p>Verify your details on the senate list to gain access to the registration page.</p>
                  </div>
                </div>
                <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                  <h2>Check Your Details</h2>
                  <!-- <p>Contact us using the form below.</p> -->
                  <?php echo $msg; ?>
                  <form action="includes/senate_list.php" method="post" class="probootstrap-form">
                    <div class="form-group">
                      <label for="name">Surname</label>
                      <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="form-group">
                      <label for="email">Matriculation Number</label>
                      <input type="text" class="form-control" id="matNo" name="matNo">
                    </div>
                    <div class="form-group">
                      <label for="subject">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-lg" id="submit" name="check_senate_btn" value="Check List">
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