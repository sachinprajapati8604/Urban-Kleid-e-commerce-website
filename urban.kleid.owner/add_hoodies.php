<?php
session_start();
// Check if the user is logged in, if not then redirect him to loginhandle page
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
  header("location: index.php");
  exit;
}
?>
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

<?php include 'basic/navbar.php'; ?>

  

  <?php

  include 'dbconnect.php';

  if (count($_FILES) > 0) {

    if (is_uploaded_file($_FILES['userImage']['tmp_name']) || ($_FILES['userImage2']['tmp_name']) || ($_FILES['userImage3']['tmp_name']) || ($_FILES['userImage4']['tmp_name'])) {

      require_once "dbconnect.php";
      //variable for storing the images in folder and database
      $filename = $_FILES["userImage"]["name"];
      $filename2 = $_FILES["userImage2"]["name"];
      $filename3 = $_FILES["userImage3"]["name"];
      $filename4 = $_FILES["userImage4"]["name"];

      $tempname = $_FILES["userImage"]["tmp_name"];
      $tempname2 = $_FILES["userImage2"]["tmp_name"];
      $tempname3 = $_FILES["userImage3"]["tmp_name"];
      $tempname4 = $_FILES["userImage4"]["tmp_name"];

     $folder = "../img/" . $filename;
         $folder1 = "../img/" . $filename2;
         $folder2 = "../img/" . $filename3;
        $folder3 = "../img/" . $filename4;

      //variable to store image data and type in database
           $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
          $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

      

      //getting variable data from form by post method
      $p_title = $_POST['title'];
      $p_detail = $_POST['detail'];
      $p_price = $_POST['price'];
      $p_bidprice = $_POST['bidprice'];

      $sql = "INSERT INTO `hoodies`(`pro_name`, `pro_shortdetail`, `pro_price`, `pro_bid_price`, `pro_imagename`, `imageType`, `vp_img2`, `vp_img3`, `vp_img4`, `created`) VALUES ('$p_title','$p_detail','$p_price','$p_bidprice','{$filename}','{$imageProperties['mime']}','{$filename2}','{$filename3}','{$filename4}',current_timestamp())";

      $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));


      $showalert = true;

      // Now let's move the uploaded image into the folder: image 
      if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
      } else {
        $msg = "Failed to upload image";
      }


      if ($showalert) {

        echo '<div class="alert alert-info" role="alert">
                   Product has been Uploaded 
                   <a href="view_hoodies.php" class="btn btn-success"> View Product</a>
                  </div>';
      } else {
        $showalert = "Somthing went wrong";
      }
    }
  }

  ?>

  <div class="container  shadow-sm border my-4" style="max-width: 800px;">
  <h2 class="text-center">HOODIES</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <p class="mb-3 font-weight-normal text-center">Upload your Hoodies here</p>
      <hr>
      <div class="form-group">
        <label for="title"> Product Title<sup class="font-weight-bold" style="color: red;">*</sup></label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="title" required />
        <small id="title" class="form-text text-muted">please use as short as possible.</small>
      </div>
      <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Details</label>
    <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
      <div class="form-group row">
        <div class="col">
          <label for="price">Price<sup class="font-weight-bold" style="color: red;">*</sup></label>
          <input type="text" class="form-control" id="price" name="price" required />
        </div>
        <div class="col">
          <label for="bidprice">Max  price<sup class="font-weight-bold" style="color: red;">*</sup></label>
          <input type="text" class="form-control" id="bidprice" name="bidprice" aria-describedby="title" required />

        </div>

      </div>

      <div class="form-group mt-4">
      <h5>Upload Products Image</h5>
        <label for="exampleFormControlFile1"> Image 1 <sup class="font-weight-bold" style="color: red;">*</sup></label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="userImage" required />
        <div class="form-group row mt-4">
        
        <div class="col-sm-4 mt-1">
        <label for="exampleFormControlFile1">Image 2 </label>
        <input type="file" class="form-control-file" id="exampleFormControlFile2" name="userImage2"  />
        </div> 
        <div class="col-sm-4 mt-1">
        <label for="exampleFormControlFile1">Image 3 </label>
        <input type="file" class="form-control-file" id="exampleFormControlFile3" name="userImage3"  />
        </div> 
        <div class="col-sm-4 mt-1">
        <label for="exampleFormControlFile1">Image 4 </label>
        <input type="file" class="form-control-file" id="exampleFormControlFile4" name="userImage4"  />
        </div> <br>
       
        </div>
      </div>

<button type="submit" name="submit" class="btn btn-primary my-4 btn-block ">Submit</button>

     
    </form>
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