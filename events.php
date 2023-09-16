<?php
    include 'includes/autoLoader.php';  
    session_start();
  if (isset($_SESSION['userID'])) {

    $userID = $_SESSION['userID'];

  }else{
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events - CS ALUMNI IBBUL</title>
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
              <h1>Events</h1>
            </div>
          </div>
        </div>
      </section>
      <?php
        if (isset($_GET['read_event'])) {
          $read_event = $_GET['read_event'];
          $read_event = explode(",", $read_event);
          $token = $read_event[0];
          $event_title = $read_event[1];
          $event_date = $read_event[2];
          $event_venue = $read_event[3];
          $event_img = $read_event[4];
          $event_desc = $read_event[5];
          $viewSkillObj = new EventsContr($event_title, $event_date, $event_venue, $event_img, $event_desc);
          $result = $viewSkillObj->showEventRecord($token);
          foreach($result as $results){
            $results['event_id'];
            $results['event_title'];
            $results['event_date'];
            $results['event_venue'];
            $results['event_img'];
            $results['event_desc'];
          }
      ?>
      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-flex-block">
                <div class="probootstrap-text probootstrap-animate">
                  <div class="text-uppercase probootstrap-uppercase">Featured Events</div>
                  <h3><?php echo $results['event_title']; ?></h3>
                  <p><?php echo $results['event_desc']; ?></p>
                  <p>
                    <span class="probootstrap-date"><i class="icon-calendar"></i><?php echo $results['event_date']; ?></span>
                    <span class="probootstrap-location"><i class="icon-location2"></i><?php echo $results['event_venue']; ?></span>
                  </p>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="events.php" class="btn btn-primary">View all events</a></p>  
                    </div>
                  </div>
                </div>
                <div class="probootstrap-image probootstrap-animate" style="background-image: url(admin/assets/images/event/<?php echo $results['event_img']; ?>)">
                  <!-- <a href="https://vimeo.com/45830194" class="btn-video popup-vimeo"><i class="icon-play3"></i></a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
        }else{
      ?>
      <section class="probootstrap-section">
        <div class="container">

          <div class="row">
            <?php 
              $skillObj = new EventsView();
              $skillObj->showAllUserEvents();
            ?>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
          </div>

        </div>
      </section>
      <?php } ?>
      
      <?php include 'footer.php'; ?>
    </div>
    <!-- END wrapper -->
    

    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>