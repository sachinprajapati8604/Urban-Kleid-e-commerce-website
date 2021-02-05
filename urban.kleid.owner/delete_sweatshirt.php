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
   

<!-- ----adding row for product display---------------- -->

    
                    
    <?php
$proid=$_GET['proid'];
  include 'dbconnect.php';
  // Turn off error reporting
  //  error_reporting(0);

  $sql = "DELETE FROM `sweatshirts` WHERE pro_id='$proid'";
  $result = mysqli_query($conn, $sql);
  $showalert = true;
  if ($showalert) {

    echo '<div class="alert alert-info" role="alert">
               Product has been deleted successfully 
               <a href="view_sweatshirt.php" class="btn btn-success"> View Product</a>
              </div>';
  } else {
    $showalert = "Somthing went wrong";
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