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
 
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'basic/navbar.php'; ?>

  <!-- this is for updating heading -->

<?php
 error_reporting(0);
if($_GET['proid']==10 || $_GET['proid']==11){
    
  include 'dbconnect.php';
 
      //getting variable data from form by post method
      $proid=$_GET['proid'];
      $p_title = $_POST['title'];
      $p_detail = $_POST['detail'];
      $p_title=mysqli_real_escape_string($conn,$p_title);
      $p_detail = mysqli_real_escape_string($conn,$p_detail);


    

   if($p_title && $p_detail !=""){
$sql="UPDATE `index_page` SET `index_title`='$p_title',`index_desc`='$p_detail',`index_created`=current_timestamp() WHERE index_id='$proid'";

if(mysqli_query($conn, $sql)){
    
    // echo '<script>alert("Record Updated Successfully")
    // location.replace("modify_index.php")
    // </script>';
    echo '
    <script>
  swal({
    title: "Record Updated Successfully",
    icon: "success"
}).then(function() {
    window.location = "modify_index.php";
}); </script>';
    
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
   }

    
}

  ?>

  <?php

$proid=$_GET['proid'];
$sql = "SELECT * FROM `index_page` where index_id='$proid'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $id = $row['index_id'];
  $img = $row['index_img'];
  $title = $row['index_title'];
  $desc = $row['index_desc'];
 
 echo '  <div class="container my-4 border shadow-sm" style="max-width: 800px;">
 <h2 class="text-center">Update your Content  </h2>
   <form action="" method="post" enctype="multipart/form-data">
     <hr>
     <div class="form-group">
       <label for="title"> Product Title<sup class="font-weight-bold" style="color: red;">*</sup></label>
       <input type="text" class="form-control" id="title" name="title" aria-describedby="title" required />
       <small id="title" class="form-text text-muted">please use as short as possible.</small>
     </div>
     <div class="form-group">
   <label for="exampleFormControlTextarea1">Product Details</label>
   <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3" required></textarea>
 </div>
    

<button type="submit" name="submit" class="btn btn-primary my-4 btn-block ">Submit</button>

    
   </form>
 </div>

';
    
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