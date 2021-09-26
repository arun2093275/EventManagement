<?php
session_start();
include('./db/db.php');
if (!isset($_SESSION['userId'])) {
  echo "<script> window.open('login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./includes/head.php'); ?>
  <style>
     body{
        height:80%; 
        background-image : url('images/decor.jpg');
        height:80%;
        background-position: center;
        background-repeat: no-repeart;
        background-size:cover;
    }

    table{
      background-color:white;
    }

    h3{
      background-color:white;
      text-align:center;
    }
   
    </style>
</head>

<body>
  <?php include('./includes/nav.php'); ?>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h3>Booking Requests</h3>
      <table>
        <thead>
          <tr>
              <th>Name</th>
              <th>Event</th>
              <th>Date</th>
              <th>To Date</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Note</th>
              <th class="right-align">Action</th>
          </tr>
        </thead>

        <tbody>
        <?php
          $userId = $_SESSION['userId'];
          $getBookings = "select * from bookings where userId='$userId'";
          $runBookings = mysqli_query($conn, $getBookings);
          while ($rowBookings = mysqli_fetch_array($runBookings)) {
            $bId = $rowBookings['id'];
            $uId = $rowBookings['userId'];
            $eId = $rowBookings['event'];
            $fromDate = $rowBookings['fromDate'];
            $toDate = $rowBookings['toDate'] == '0000-00-00' ? '-' : $rowBookings['toDate'];
            $address = $rowBookings['address'];
            $status = $rowBookings['status'];
            $note=$rowBookings['note'];
            $getUser = "select * from users where id='$uId'";
            $runUser = mysqli_query($conn, $getUser);
            $rowUser =  mysqli_fetch_array($runUser);
            $name = $rowUser['name'];
            $phone = $rowUser['phone'];

            $getEvent = "select * from events where id='$eId'";
            $runEvent = mysqli_query($conn, $getEvent);
            $rowEvent =  mysqli_fetch_array($runEvent);
            $event = $rowEvent['name'];



            echo "
                  <tr>
                    <td>$name</td>
                    <td>$event</td>
                    <td>$fromDate</td>
                    <td>$toDate</td>
                    <td>$phone</td>
                    <td>$address</td>
                    <td>$note</td>
                  ";


                  if($status == NULL)
                  echo "<td class='right-align'>
                <a href='./event_cancel.php?eventid=$bId' class='waves-effect waves-light btn red'>Cancel<i class='material-icons left'>delete</i></a></td>
                      </tr>";
                    
                    else if($status == 0)
                    echo "
                    
                    <td class='right-align red-text'><h6>Rejected</h6></td>
                    </tr>";
                    else if($status == 2)
                    echo "
                    
                    <td class='right-align red-text'><h6>Cancelled</h6></td>
                    </tr>";
                  else
                  echo "
                  <td class='right-align green-text'><h6>Approved</h6></td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  
  
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
</body>

</html>

<?php

if (isset($_GET['approve'])) {
  echo 'Done';
}


?>