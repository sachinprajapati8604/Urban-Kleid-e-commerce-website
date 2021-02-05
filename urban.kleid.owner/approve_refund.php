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
include 'dbconnect.php';

?>
<?php

$id=$_GET['returnid'];   
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['make_payment'])) {

    $sql="UPDATE `transcations` SET `trans_return_status`='completed',`trans_return_approve`=current_timestamp()  WHERE `trans_id`='$id'";
    
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
            $return_date=$row2['trans_return_created'];
            $return_comp_date=$row2['trans_return_approve'];

             // sending mail to user
           $to_email = $emails;
           $subject = "Return Product Urban Kleid";
           $htmlContent = '
           <!DOCTYPE html>
           <html>
           <head>
           <!-- Required meta tags -->
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <style>
           #transtable {
             font-family: Arial, Helvetica, sans-serif;
             border-collapse: collapse;
             width: 100%;
           }
           
           #transtable td, #transtable th {
             border: 1px solid #ddd;
             padding: 8px;
           }
           
           #transtable tr:nth-child(even){background-color: #f2f2f2;}
           
           #transtable tr:hover {background-color: #ddd;}
           
           #transtable th {
             padding-top: 12px;
             padding-bottom: 12px;
             text-align: left;
             background-color: #4CAF50;
             color: white;
           }
           #transtable td{
               font-weight: bold;
           }
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
     <h3>Your return request has been completed.</h3>
     <h1 class="heading">Order Details</h1>
 
     <table id="transtable">
       <tr>
       <td scope="row">Return Id </td>
       <td>' . $id . '</td>
       
     </tr>
    
      
       <tr>
       <td scope="row">Cutomer Name</td>
       <td>' . $fullname . '</td>
        
       </tr>
       <tr>
       <td scope="row">Email</td>
     <td>' . $emails . '</td>
        
       </tr>
       <tr>
     <td scope="row">Address</td>
     <td>' . $address . '</td>
     
     </tr>
       <tr>
       <td scope="row">Product  </td>
       <td>' . $productinfo . '</td>
     
     </tr>
     
       <tr>
         <td scope="row">Amount</td>
         <td>' . $amount . '</td>
     
       </tr>
       <tr>
       <td scope="row">Order Date</td>
       <td>' .$order_date.'</td>
         
       </tr>
       <tr>
       <td scope="row">Return Date</td>
       <td>' . $return_date. '</td>
         
       </tr>
       <tr>
       <td scope="row">Completion Date</td>
       <td>' . $return_comp_date. '</td>
         
       </tr>
     
       
     </table>
 
 <h4>Your amount of Rs. '.$amount.' has been completed ,it may take upto 5 days to reflect in your bank  .</h4>
 
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
            text: "You are approving to return request",
            type: "success",
            icon: "success"
        }).then(function() {
            window.location = "return_order_list.php";
        }); </script>';
          
      

    


        }
        
    }
    else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
?>


<div class="container mx-auto mt-2">

<?php


$id=$_GET['returnid'];                     
$sql = "SELECT * FROM `transcations` where trans_id='$id' ";
$result = mysqli_query($conn, $sql);                    
$rowcount=mysqli_num_rows($result);

// echo '<h1 class="text-left mb-4">Total '.$rowcount.' return request found</h1>';
$i=0;
while ($row = mysqli_fetch_assoc($result)) {
    $i++;
    $txnid=$row['trans_id'];
    $fullname=$row['trans_cust_name'];
    $email=$row['trans_cust_email'];
    $productinfo=$row['trans_prod_info'];
    $img=$row['trans_image'];
    $amount=$row['trans_amount'];
    $address=$row['trans_address'];
    $order_date=$row['trans_created'];
    $return_date=$row['trans_return_created'];

   //$new_date = date("d-M-Y",strtotime($created));
   
    echo '<form action="" method="post">
    <div class="card bg-light mb-3 mx-auto" style="max-width: 28rem;">
    <div class="card-header text-center">APPROVE RETURN/REPLACE</div>
    <div class="card-body">
      <h5 class="card-title">CUSTOMER DETAILS</h5>
      <p class="card-text"><strong>  Name : </strong> '.$fullname.'</p>
      <p class="card-text"><strong>  Return ID : </strong> '.$txnid.'</p>
      <p class="card-text"><strong>  Email : </strong> '.$email.'</p>
      <p class="card-text"><strong>  Address : </strong> '.$address.'</p>
      <p class="card-text"><strong> Amount to be refund  : </strong> Rs.  '.$amount.'</p>
      <p class="card-text"><strong>  Bank Details : </strong></p>
      <button name="make_payment"  type="submit" class="btn btn-success">RETURN</button>
      <button name="make_replace"  type="submit" class="btn btn-success">REPLACE</button>
    </div>
  </div>
  </form>
   ';
   

}


?>

 </div>


 <?php

$id=$_GET['returnid'];   
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['make_payment'])) {

    $sql="UPDATE `transcations` SET `trans_return_status`='completed',`trans_return_approve`=current_timestamp()  WHERE `trans_id`='$id'";
    
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
            $return_date=$row2['trans_return_created'];
            $return_comp_date=$row2['trans_return_approve'];

             // sending mail to user
           $to_email = $emails;
           $subject = "Replace Product from Urban Kleid";
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
     <h3>Your replace request for the product '.$productinfo.' has been processed . The product will be deliver to you soon . Please return the old product  to courier agent.</h3>
    
 
  
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
            text: "You have approved request for REPLACE PRODUCT",
            type: "success",
            icon: "success"
        }).then(function() {
            window.location = "return_order_list.php";
        }); </script>';
          
      

    


        }
        
    }
    else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
?>


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