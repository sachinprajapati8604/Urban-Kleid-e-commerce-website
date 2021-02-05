<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>URBAN KLEID</title>
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

  <!-- -------------alert-------------- -->

  <div class="alert alert-info" role="alert">
    Welcome <strong> <?php echo htmlspecialchars($_SESSION["admin_fullname"]); ?></strong>
    <a href="index.php" class="btn btn-success"> Logout</a>
  </div>

  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4 text-center title">Hello,  <?php echo htmlspecialchars($_SESSION["admin_fullname"]); ?>!</h1>
      <p class="lead text-center sm-title"><i>Welcome to the admin section of Urban Kleid.</i></p>
      <p>Note - All data are in descending orders, means latest data will be display first. <br>  </p>
      <hr class="my-4">
      <p class="  font-weight-bold">Some Useful Quick Links</p>
     
     <div class="addproduct">
     <h5 class="h3">Order Statements</h5>
     <a class="btn btn-outline-success btn-lg mt-1" href="view_orders.php" role="button">Order Summary</a>
     <a class="btn btn-outline-success btn-lg mt-1" href="return_order_list.php" role="button">View Return Request</a>
     <a class="btn btn-outline-success btn-lg mt-1" href="update_tracking.php" role="button">Update Tracking details</a>
       
     </div> <br> <div class="addproduct">
     <h5 class="h3">Modify Index Page</h5>
     <a class="btn btn-outline-success btn-lg mt-1" href="modify_index.php" role="button">Update</a>
       
     </div> <br>
     <div class="addproduct">
     <h5 class="h3">Upload Products Images</h5>
    <p> upload your all images for every time when you upload product of any category. <small>Click to Upload Images in Navigation bar. </small> or click below to upload . <br><a class="btn btn-outline-success  mt-1" href="upload_images.php" role="button">Upload Images</a></p>
     </div> <br>

     <div class="addproduct">
     <h5 class="h3">Add Products to server</h5>
     <a class="btn btn-outline-success btn-lg mt-1" href="add_tshirt.php" role="button">T-Shirts</a>
         <a class="btn btn-outline-success btn-lg mt-1" href="add_sweatshirts.php" role="button">Sweatshirts</a>
         <a class="btn btn-outline-success btn-lg mt-1" href="add_hoodies.php" role="button">Hoodies</a>
     </div> <br>

     <div class="addproduct">
     <h5 class="h3">View Uploaded Products <small>(you can use for delete or update products also)</small> </h5>
     <a class="btn btn-outline-success btn-lg mt-1" href="view_tshirt.php" role="button">T-Shirts</a>
         <a class="btn btn-outline-success btn-lg mt-1" href="view_sweatshirt.php" role="button">Sweatshirts</a>
         <a class="btn btn-outline-success btn-lg mt-1" href="view_hoodies.php" role="button">Hoodies</a>
     </div> <br>
     <div class="addproduct">
     <h5 class="h3">Push mail to your subscriber</h5>
     <a class="btn btn-outline-success btn-lg mt-1" href="send_news_letter.php" role="button">Write mail</a>
        
     </div>
       
   
    </div>
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