<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./includes/head.php'); ?>
</head>
<body>
  <?php include('./includes/nav.php'); ?>
  <div style="background-image: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url(images/index.jpg); background-repeat: no-repeat; background-size: cover;">
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Event Management</h1>
      <div class="row center">
        <h5 class="header col s12 light white-text">Best event management company in the world.</h5>
      </div>
      <div class="row center">
        <a href="./events.php" id="download-button" class="btn-large waves-effect waves-light orange">Show Events</a>
      </div>
      <br><br>
      <div class="row center">
        <a href="./caterings.php" id="download-button" class="btn-large waves-effect waves-light orange">Show Caterings</a>
      </div>
      
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center white-text">Speed In Work</h5>

            <p class="light white-text" style="text-align: justify;">We know our customers love to see the work done really quick, so ONEM created and trained our entire 
Staff members in a professional so that they can get the job done by taking less portion of your valuable time.  So when you give a job for us buckle up and rest assured our team will get it done way before deadline!!!!!.
 </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center white-text">Good Communication</h5>

            <p class="light white-text" style="text-align: justify;">Why on earth all these languages matter you ever wondered, simple answer is communication. If the communication goes wrong everything will fall apart. We as a team know the importance of communication and at ONEM we are making advantage of all modern methods of communication between our staffs and also between staff and clients. Your ideas as a customer for the events are valuable for us, so we will not leave no stones unturned while customizing your event.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center white-text">Best Planning</h5>

            <p class="light white-text" style="text-align: justify;">Planning matters the most when comes into event management and ONEM knows that very well!.
Our trained professional team members will work on each event relentlessly to organize that one according to the customer needs .Rest assured we got your back.
</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>
  </div>  

  <?php include('./includes/footer.php'); ?>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
