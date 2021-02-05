<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="IE-edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, intial-scale=1.0" name="viewport">
<title>URBAN KLEID</title>

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
 <link rel="stylesheet" href="css/style.css">

</head>
<body>



<?php include 'basic/navbar.php';
include 'dbconnect.php'; ?>

<?php
error_reporting(0);
 $track_update=$_POST['track_update'];
 $tracking_details=$_POST['tracking_details'];

  $id=$_GET['trackid'];   
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['track_order'])) {

    $sql="UPDATE `transcations` SET `trans_track`=CONCAT(`trans_track` , ' -> $track_update ' ),`trans_track_created`=current_timestamp()  WHERE `trans_id`='$id'";
      if(mysqli_query($conn, $sql)){

        $sql2 = "SELECT * FROM `transcations` WHERE trans_id='$id'";
        $result2 = mysqli_query($conn, $sql2);
        while($row2=mysqli_fetch_assoc($result2)){
            $fullname=$row2['trans_cust_name'];
            $emails=$row2['trans_cust_email'];
            $productinfo=$row2['trans_prod_info'];
            $img=$row2['trans_image'];
            $amount=$row2['trans_amount'];
            $address=$row2['trans_address'];
            $order_date=$row2['trans_created'];
            $order_track_status=$row2['trans_track'];
           echo  $track_date=$row2['trans_track_created'];
        

             // sending mail to user
           $to_email = $emails;
           $subject = "Tracking  update from  Urban Kleid";
           $htmlContent = '
           <!DOCTYPE html>
           <html>
           <head>
           <!-- Required meta tags -->
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <style>
           .heading{
               padding-top: 12px;
             padding-bottom: 12px;
             text-align: center;
             background-color: #4CAF50;
             color: white;
           }
           </style>
           </head>
           <body>
     <h2 style="color:green;">Hello  ' . $fullname . '</h2>
     <h3>Tracking details  of order id '.$id.' :.</h3>
     <h4>Tracking status :'.$track_update.'</h4>
     <h4>'.$tracking_details.'</h4>
     
     <h5>Thank You</h5>
      <i>Urban Kleid </i>  
      
    
 </body>
 </html>';
 

           // Set content-type header for sending HTML email
           $headers = "MIME-Version: 1.0" . "\r\n";
           $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

           // Additional headers
           // $headers .= 'From: sachinp8604@gmail.com.com>' . "\r\n";
           //$headers .= 'Cc: welcome@example.com' . "\r\n";
           $headers .= 'Bcc: sachinp8604@gmail.com' . "\r\n";

           // Send email
           $mail = mail($to_email, $subject, $htmlContent, $headers);
      
          echo '
            <script>
          swal({
            title: " Good Job !",
            text: "You have updated the tracking details \n You have choosen '.$track_update.'",
            type: "success",
            icon: "success"
        }).then(function() {
            window.location = "update_tracking.php";
        }); </script>';
          

        }
      }
      

}
?>

<?php 
echo '
<div class="container my-4">
<h1>Update the tracking details of :</h1>
<h3>Order ID:'.$id.' </h3>
<form class="form" method="POST" action="">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choose your preference</label>
  <select name="track_update" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required>
    <option selected></option>
    <option value="Order Accepted">Order Accepted</option>
    <option value="Product Shipped ">Product Shipped</option>
    <option value="Product Delivered ✅">Product Delivered </option>
  </select>

 <p class="my-2 lead"> Last Updated :<mark class="font-weight-bold"> '.$order_track_status.'</mark>  '.$track_date.'</p>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Write your own <small>(Optional)</small> </label>
    <textarea placeholder="You can add tracking id etc..."  name="tracking_details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <button name="track_order" type="submit" class="btn btn-primary my-1">Submit</button>
  <button onclick="goBack()" type="button" class="btn btn-outline-secondary">Go Back</button> 
</form>
</div>
';
?>
<script>
function goBack() {
  window.history.back();
}
</script>


<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <!--Get your own code at fontawesome.com-->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
</body>
 </html>