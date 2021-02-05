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


<?php
 include 'dbconnect.php';
 //  Turn off error  reporting
      error_reporting(0);

      $proid=$_GET['proid'];

      $p_title = $_POST['title'];
      $p_title=mysqli_real_escape_string($conn,$p_title);
      $p_detail = $_POST['detail'];
      $p_detail = mysqli_real_escape_string($conn,$p_detail);

if(isset($_POST['update_text']))
{
 
 $sql="UPDATE `index_page` SET `index_title`='$p_title',`index_desc`='$p_detail',`index_created`=current_timestamp() WHERE index_id='$proid'";
 
 if(mysqli_query($conn, $sql)){
    
     echo '
       <script>
     swal({
       title: "Good Job !",
       text: "Text Content updated successfully!",
       type: "success",
       icon: "success"
   }).then(function() {
       window.location = "modify_index.php";
   }); </script>';
     
 } else {
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 }
}
?>

<!-- this is for updating carousel,text,images  -->

  <?php

  include 'dbconnect.php';
 
  if (count($_FILES) > 0) {

    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
      
      require_once "dbconnect.php";
      //variable for storing the images in folder and database
      $filename = $_FILES["userImage"]["name"];      
      $tempname = $_FILES["userImage"]["tmp_name"];
      $folder = "../img/" . $filename;

      //getting variable data from form by post method
      $proid=$_GET['proid'];
     
     
     
      $sql="UPDATE `index_page` SET `index_img`='{$filename}',`index_created`=current_timestamp() WHERE index_id='$proid'";
      $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));


      $showalert = true;

      // Now let's move the uploaded image into the folder: image 
      if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
      } else {
        $msg = "Failed to upload image";
      }


      if ($showalert) {

        echo '
        <script>
      swal({
        title: "Image Updated Successfully",
        icon: "success"
    }).then(function() {
        window.location = "modify_index.php";
    }); </script>';
                
      } else {
        $showalert = "Somthing went wrong";
      }
    }
  }

  ?>

  <?php

include 'dbconnect.php';
    //  Turn off error  reporting
          error_reporting(0);

$proid=$_GET['proid'];
$sql = "SELECT * FROM `index_page` where index_id='$proid'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $id = $row['index_id'];
  $img = $row['index_img'];
  $title = $row['index_title'];
  $detail = $row['index_desc'];
  

 echo '  <div class="container my-4 border shadow-sm" style="max-width: 800px;">
 <h2 class="text-center my-4">Update your content</h2>
 <h5>Data saved as previously in our record :</h5>
   <form action="" method="post">

     <hr>
     <div class="form-group">
       <label for="title"> Product Title<sup class="font-weight-bold" style="color: red;">*</sup></label>
       <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="'.$title.'" required />
       <small id="title" class="form-text text-muted">please use as short as possible.</small>
     </div>
     <div class="form-group">
   <label for="exampleFormControlTextarea1">Product Details </label>
   <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3">'.$detail.'</textarea>
 </div>

 <button type="submit" name="update_text" class="btn btn-primary my-4 btn-block ">Update Text </button>
</form>
 <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group mt-4">
     <h5>Upload Products Image</h5>
       <label for="exampleFormControlFile1"> Image 1 <sup class="font-weight-bold" style="color: red;">*</sup></label>
       <input   type="file" class="form-control-file" id="exampleFormControlFile1" name="userImage" required />
       <span>Image already saved as : '.$img.' ,</span> <small>For Update Image choose file above</small>
     </div>

    <button type="submit" name="submit" class="btn btn-primary my-4 btn-block ">Update Image</button>

    
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