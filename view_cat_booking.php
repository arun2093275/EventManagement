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
      <h3>Catering Bookings</h3>
      <table>
        <thead>
          <tr>
              <th>Item Name</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Address</th>
              <th>Price</th>
              <th>Note</th>
              <th class='center-align'>Status</th>
          </tr>
        </thead>

        <tbody>
        <?php
          $userId = $_SESSION['userId'];
          $getBookings = "select * from catering_bookings where cid='$userId'";
          $runBookings = mysqli_query($conn, $getBookings);
          while ($rowBookings = mysqli_fetch_array($runBookings)) {
            $bId = $rowBookings['id'];
            $uId = $rowBookings['cid'];
            $eId = $rowBookings['caterings_id'];
            $fromDate = $rowBookings['from_date'];
            $toDate = $rowBookings['to_date'] == '0000-00-00' ? '-' : $rowBookings['to_date'];
            $address = $rowBookings['address'];
            $price = $rowBookings['total_price'];
            $note=$rowBookings['note'];
            $status=$rowBookings['status'];
            $getUser = "select * from caterings where id='$eId'";
            $runUser = mysqli_query($conn, $getUser);
            $rowUser =  mysqli_fetch_array($runUser);
            $name = $rowUser['item_name'];
            
            echo "
                  <tr>
                    <td>$name</td>
                    <td>$fromDate</td>
                    <td>$toDate</td>
                    <td>$address</td>
                    <td>$price</td>
                    <td>$note</td>
                  ";

                  if($status == NULL)
                 echo "<td class='center-align'>
                <a href='./catering_cancel.php?cancelId=$bId' class='waves-effect waves-light btn red'>Cancel<i class='material-icons left'>delete</i></a></td>
                      </tr>";
                     
                    else if($status == 0)
                    echo "
                    
                    <td class='center-align red-text'><h6>Rejected</h6></td>
                    </tr>";

                    else if($status == 2)
                    echo "
                    
                    <td class='center-align red-text'><h6>Cancelled</h6></td>
                    </tr>";
                  else
                  echo "
                  <td class='center-align green-text'><h6>Approved</h6></td>
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