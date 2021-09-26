<?php
session_start();
include('./db/db.php');
include('./functions/functions.php');
if (!isset($_SESSION['userId'])) {
  echo "<script> window.open('login.php','_self')</script>";
}

require_once ('stripe.php');
if(isset($_POST['stripeToken'])){
    \Stripe\Stripe::setVerifySslCerts(false);

    $token=$_POST['stripeToken'];

    $data=\Stripe\Charge::create(array(
        "amount"=>1000,
        "currency"=>"cad",
        "description"=>"sample",
        "source"=>$token,
    ));

    $chargeJson = $data->jsonSerialize();

    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){

        $transactionID = $chargeJson['balance_transaction'];
        $paidAmount = $chargeJson['amount'];
        $paidCurrency = $chargeJson['currency'];
        $payment_status = $chargeJson['status'];
        $payment_date = date("Y-m-d H:i:s");
        $dt_tm = date('Y-m-d H:i:s');


        if($payment_status == 'succeeded'){
            $ordStatus = 'success';

         $fromDate=$_SESSION['fromDate'];
         $toDate= $_SESSION['toDate'];
         $address= $_SESSION['address'];
         $userId= $_SESSION['userId'];
         $eventId= $_SESSION['eventId'];
         $total_price= $_SESSION['total_price'];

        $bookEvent = "insert into bookings (userId,event,fromDate,toDate,address,total_price, payment_status)
                          values ('$userId','$eventId','$fromDate','$toDate','$address','$total_price','Completed')";
      $runEvents = mysqli_query($conn, $bookEvent);
      if ($runEvents) {
        showErrorSuccessModel(1, 'Event Booked. We will contact you soon.');
       //echo "<script>window.location.href='events.php'</script>";
      }
    }

  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./includes/head.php'); ?>
</head>

<body>
  <?php include('./includes/nav.php'); ?>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <?php
      if (isset($_GET['eventid'])) {
        $id = $_GET['eventid'];
        $getEvent = "select * from events where id='$id'";
        $runEvent = mysqli_query($conn, $getEvent);
        $rowEvent = mysqli_fetch_array($runEvent);
        $name = $rowEvent['name'];
        $price=$rowEvent['price'];
        $hours=$rowEvent['duration'];
      }
      ?>
      <form action="payment.php" method="post" enctype="multipart/form-data">
        <h4>Book <span class="green-text"><?php echo $name; ?></span> Event- Price C$<?php echo strval($price) ." for ".strval($hours)." hours"; ?></h4>
        <div class="input-field col s6">
          <div class="switch">
            <label>
              More than one day
              <input type="checkbox" id="switch">
              <span class="lever"></span>
            </label>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <div class="row" id="dates">
                <div class="input-field col s12" id="fromDateDiv">
                  <input type="date" name="fromDate" id="fromDate" required="required">
                  <label for="fromDate">Date</label>
                </div>
                <div class="input-field col s6" id="toDateDiv" style="display: none;">
                  <input type="date" name="toDate" id="toDate" onchange="price()">
                  <label for="toDate">To Date</label>
                </div>
              </div>
            </div>
          </div>
          <div class="input-field col s12">
            <input type="text" required="required"  name="address" id="address">
            <label for="address">Customer Address & Requirements</label>
          </div>

          <div class="input-field col s12">
            <input type="text" readonly="readonly"  value="<?php echo $price; ?>" name="price1" id="price1" data-length="120">
            <label for="address">Total Price C$</label>
          </div>
          <div class="input-field col s12">
            <input type="hidden"  value="<?php echo $hours; ?>" name="duration1" id="duration1" data-length="120">
            
          </div>
          <div class="input-field col s12">
            <input type="hidden"  value="<?php echo $id; ?>" name="eventid" id="eventidd" data-length="120">
            
          </div>
          <div class="input-field col s12">

            <button type="submit" name="bookevent" class="waves-effect waves-light btn light-blue">Proceed to Checkout</button> 
          </div>
        </div>
      </form>
    </div>
  </div>

<script type="text/javascript">
  function price(){
    var from_date=new Date(document.getElementById("fromDate").value);
    var to_date= new Date(document.getElementById("toDate").value);
    var duration= document.getElementById("duration1").value;
    var pricee=document.getElementById("price1").value;
    var diffTime = to_date.getTime()-from_date.getTime();
    var diffdays=diffTime/(1000 * 3600 * 24);
    
    if((diffdays*24)>duration){
      var hours_for_billing=(diffdays*24);
      var bill_per_hour=pricee/duration;
      var total_bill=hours_for_billing*bill_per_hour;
      document.getElementById("price1").value=total_bill;
    }
  }
</script>

  <?php include('./includes/footerScripts.php'); ?>
  <script>
    $(document).ready(function() {
      $('.modal').modal();
    });
    $(document).ready(function() {
      $('.datepicker').datepicker();
    })

    let daySwitch = document.querySelector('#switch');
    daySwitch.addEventListener('change', (e) => {
      console.log(e.target.checked);
      let dates = document.querySelector('#dates');
      let fromDateDiv = document.querySelector('#fromDateDiv');
      if (e.target.checked) {
        fromDateDiv.classList.remove('s12');
        fromDateDiv.classList.add('s6');
        toDateDiv.style.display = 'block';
      } else {
        fromDateDiv.classList.remove('s6');
        fromDateDiv.classList.add('s12');
        let toDateDiv = document.querySelector('#toDateDiv');
        toDateDiv.style.display = 'none';
      }
    })
  </script>


</body>




</html>