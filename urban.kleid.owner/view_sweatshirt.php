<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>URBAN KLEID</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include 'basic/navbar.php'; ?>

    <div class="alert alert-info" role="alert">
      click to 
        <a href="add_sweatshirts.php" class="btn btn-success"> Add More Sweatshirts</a>
    </div>

<!-- ----adding row for product display---------------- -->

    <div class="container my-3 ">
                  <div class="row">
                    
    <?php

  include 'dbconnect.php';
  // Turn off error reporting
  //  error_reporting(0);

  $sql = "SELECT * FROM `sweatshirts` ORDER BY pro_id DESC";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['pro_id'];
    $title = $row['pro_name'];
    $detail = $row['pro_shortdetail'];
    $price = $row['pro_price'];
    $bidprice = $row['pro_bid_price'];

    $image_name=$row['pro_imagename'];  //this is the name of file

    $time=strtotime($row['created']);   //this is a time from database
    $TodayDate=strtotime(date('Y-m-d H:i:s'));  //Today date by date function
    $dateDiff=($TodayDate-$time)/86400;      //taking date difference then converting into days by dividing 86400.


    echo ' 
           <div class="col-md-3 my-2 card-deck">
                          <div class="card mx-auto" style="width: 18rem; min-height:500px">
                          <img height="300px" src="../img/'.$image_name. '" class="card-img-top catimg" alt="...">
                              <div class="card-body">
                              <p class="card-text">Product ID 👉#' . $id . ' </p>
                                  <h5 class="card-title">' . $title . '</h5>
                                  <p class="card-title">' . $detail . '</p>
								  <p class="card-text">Price  &#8377;  ' . $price . ' <s> &#8377; ' . $bidprice . '</s></p>
								   
                  <div class="text-center" role="group" aria-label="Basic example">
                  <a href="update_sweatshirts.php?proid='.$id.'" type="button" class="btn btn-outline-success ">Update</a>
                  <a href="delete_sweatshirts.php?proid='.$id.'" type="button" class="btn btn-outline-danger ">Delete</a>
                 
                </div>
                              </div>
                    
                          </div>
                      </div>
                      ';
  }
  ?>
  </div></div>

    

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