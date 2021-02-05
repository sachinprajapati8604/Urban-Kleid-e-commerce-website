<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URBAN KLEID</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <!--using FontAwesome--------------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

    <?php include 'basic/header.php'; ?>


    <?php

    $id=$_SESSION['id'];

    
//echo $id;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   //     echo "Welcome to the Checkout Page of Urban Kleid, " . $_SESSION['username'] . "!";

        include 'dbconnect.php';
        //  Turn off error  reporting
             error_reporting(0);

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];     
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postalcode = $_POST['postalcode'];
        $country = $_POST['country'];

      if(($fullname && $email && $mobile && $address && $city && $state && $postalcode && $country)!="")
      {
        $sql="UPDATE `users` SET `mob_no`='$mobile',`address`='$address',`city`='$city',`postal_code`='$postalcode',`state`='$state',`country`='$country' WHERE id=$id";
        
        if(mysqli_query($conn, $sql)){
           
            echo '
              <script>
            swal({
              title: "Good Job !",
              text: "Record updated successfully!",
              type: "success",
              icon: "success"
          }).then(function() {
              window.location = "checkout.php";
          }); </script>';
            
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

      }else{
        
        echo '
        <script>
      swal({
        title: "Please fill all mandatory fields",
        text: "all fields are mandatory",
        icon: "warning"
    }).then(function() {
        window.location = "edit_detail.php";
    }); </script>';
     
      }
      
        
    } else {
        echo "Please log in first to see this page.";
    }


    ?>





    <?php include 'basic/footer.php';  ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <!--Get your own code at fontawesome.com-->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

    <!--using JQuery--------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</body>

</html>