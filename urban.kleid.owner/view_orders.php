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
    
 <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <?php
  session_start();
  // Check if the user is logged in, if not then redirect him to loginhandle page
  if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("location: index.php");
    exit;
  }
  ?>

<?php include 'basic/navbar.php'; ?>


  <div class="container mt-4">
  
  <?php

include 'dbconnect.php';

                      
                        $sql = "SELECT * FROM `transcations`  ORDER BY `sr` DESC ";
                        $result = mysqli_query($conn, $sql);                    
                       $count=mysqli_num_rows($result);
                       echo '  <h2>Total : '.$count.' Customers had orderd</h2> <small>Details sorted by order descending</small> </br></br>';
$i= $count+1;
                        while ($row = mysqli_fetch_assoc($result)) {

                        $i--;
                            $transid = $row['trans_id'];                          
                        
                            $name = $row['trans_cust_name'];
                            $proinfo = $row['trans_prod_info'];
                            $amount = $row['trans_amount'];
                            $status = $row['trans_status'];
                            $image=$row['trans_image'];
                            $address=$row['trans_address'];
                            // $created=$row['trans_created'];
                            //we are making format of date
                            $date = strtotime($row['trans_created']);
                            $created = date("d-m-Y", $date);
                     
                            echo '
                          
                            <div class="media my-2">
                            
                            <img class="mr-3 " src="../img/'.$image.'" height="240px" width="300px" alt="">
                                    <div class="media-body">
                                    <small>#'.$i.'</small>
                                    <p class="mb-1">Product Details :<b>' . $proinfo . '</b></p>
                                    <p class="mb-1">Transaction ID :<b>' . $transid . '</b></p>
                                    <p class="mb-1">Customer Name : <b>'.$name.'</b></p>
                                    <p class="mb-1">Order Amount :<b> &#8377; ' . $amount . '</b> </p>
                                    <p class="mb-1">Order :<b> ' . $status . ' </b></p>
                                    <p class="mb-1">Address :<b> ' . $address . ' </b></p>
                                    <p class="mb-1">Order Date : ' . $created . ' </p>
                                    <a href="invoice.php?transid='.$transid.'" class="btn btn-success ml-2">Generate Invoice</a>
                                    
                                    </div>
                                 </div>
                                 
                                 <hr>';
                        }


  ?>
  </div>




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