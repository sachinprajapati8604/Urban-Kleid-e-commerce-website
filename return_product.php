<?php
// Initialize the session
session_start();

// Turn off error reporting
error_reporting(0);

// Check if the user is logged in, if not then redirect him to loginhandle page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: loginhandle.php");
    exit;
}
?>




<?php

include 'dbconnect.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM `users` WHERE id='$id'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    $name = $row['fullname'];
    $mobile = $row['mob_no'];
    $address = $row['address'];
    $city = $row['city'];
    $postalcode = $row['postal_code'];
    $state = $row['state'];
    $country = $row['country'];

    $fulladdress = $name . '</br>' . $mobile . '<br>' . $address . ', ' . $city . ', ' . $postalcode . ', ' . $state . '-' . $country;
}


?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta content="IE-edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, intial-scale=1.0" name="viewport">
<title>URBAN KLEID</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--using FontAwesome--------------->
<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
<!--fav-icon---------------->
<link rel="shortcut icon" href="img/Transparent.png" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/mystyle.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/login-signup.css">
<link rel="stylesheet" href="css/contactus.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/productdetail.css">

</head>

<body>

    <!-- ---adding indexpage---- -->

    <?php include 'basic/login_header.php'; ?>


    <?php

    include 'dbconnect.php';
    session_start();


    $id = $_SESSION['id'];

    $transid = $_GET['transid'];
    $return_replace=$_POST['return_replace'];
    $reason=$_POST['reason'];
    $detailed_reason=$_POST['detailedreason'];

    if(($reason && $detailed_reason)!="")
    {
     
      $sql="UPDATE `transcations` SET `trans_return_replace`='$return_replace',`trans_return_status`='yes',`trans_return_reason`='$reason',`trans_return_reason_detail`='$detailed_reason',`trans_return_created`=current_timestamp()  WHERE `trans_id`='$transid'";

      if(mysqli_query($conn, $sql)){

        $sql2 = "SELECT * FROM `transcations` WHERE trans_userid='$id'";
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


        }
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
     <h3>Your '.$return_replace.' request has been initiated of order.</h3>
     <h1 class="heading">Order Details</h1>
 
     <table id="transtable">
       <tr>
       <td scope="row">Replace/Return Id </td>
       <td>' . $transid . '</td>
       
     </tr>
     <tr>
       <td scope="row"> Reason </td>
       <td>' . $reason . '</td>
       
     </tr>
     <tr>
       <td scope="row">Detailed Reason </td>
       <td>' . $detailed_reason. '</td>
       
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
       <td scope="row">Replace/Return Date</td>
       <td>' . $return_date. '</td>
         
       </tr>
     
       
     </table>

 
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
            title: "Your return request has been initiated  !",
            text: "it will take upto 15 days to complete process ,you will recieve email for updation process",
            type: "success",
            icon: "success"
        }).then(function() {
            window.location = "userprofile.php";
        }); </script>';
          
      } else {
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }

    }
   
    ?>

    <div class="container border" style="max-width: 500px;">
        <header>
            <h4 class="text-center my-4">Fill Replace/Return Form </h4>
        </header>
        <form action="" method="POST">
        <div class="form-floating">
                <select name="return_replace" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                    <option selected></option>
                    <option value="REPLACE">REPLACE</option>
                    <option value="RETURN">RETURN</option>
                   
                </select>
                <label for="floatingSelect">Select Choice for REPLACE/RETURN</label>
            </div>
            <div class="form-floating my-3">
                <select name="reason" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                    <option selected></option>
                    <option value="Product was defected">Product was defected</option>
                    <option value="Different product delivered">Different product delivered</option>
                    <option value="Product was not same as you seen">Product was not same as you seen</option>
                </select>
                <label for="floatingSelect">Select Reason for Return</label>
            </div>
            <div class="form-floating my-4">
                <textarea  name="detailedreason" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">Describe in details....</label>
            </div>
            <button type="submit" class="btn Button-Cart productbtnmobile my-4" onclick="Return()">Return</button> 
        </form>

    </div>




    <?php
    include 'basic/footer.php';
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <!--Get your own code at fontawesome.com-->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

    <!--using JQuery--------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</body>

</html>