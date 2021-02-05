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

    <?php include 'basic/header.php'; ?>

    
    <?php


    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
     //   echo "Welcome to the Checkout Page of Urban Kleid, " . $_SESSION['username'] . "!";
     session_start();
     $total=$_SESSION['total'];
     $mob_no=$_SESSION['mob_no'];   
    
      
    $id= $_SESSION["id"];

        
    include 'dbconnect.php';
 //  Turn off error  reporting
        error_reporting(0);

         $sql = "SELECT * FROM users where id=$id";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $addid = $row['id'];
            $mobile=$row['mob_no'];
            $address = $row['address'];
            $city = $row['city'];
            $postalcode = $row['postal_code'];
            $state = $row['state'];
            $country = $row['country'];

            $fullname=$row['fullname'];
            $email=$row['username'];
            
           $_SESSION["mob_no"] = $mobile;

            session_start();
            $fulladdress=$fullname." , ".$mobile ." , ".$address ." , ".$city ." , ".$postalcode ." , ".$state ." , ".$country;
            $_SESSION['fulladdress']=$fulladdress;

            echo '  <div class="container mt-4">
            <div class="row">        
                <div class=col-4> <p><b>DELIVERY ADDRESS : </b> </p></div>        
                <div class=col-8>
                    <p> <b>'.$fullname.' </b> </br> Mob. No. : '.$mobile.' <br>'.$address.','. $city.'-'. $postalcode.' ,'.$state.'-'.$country.' </p> <br>
                  
                    <div class="btn-group mt-2">       
                    <a href="edit_detail.php" type="submit" class="btn Button-Cart productbtnmobile ">Update Details</a> 
                    </div>
                </div>
            </div>
            <p class="lead mt-4">Your order amount :<b> <i class="fa fa-rupee"> '.$total.'</i></b></p>
            <div class="btn-group mt-2">        
                <a href="PayUMoney-Payment\payu_form.php" type="submit" class="btn Button-Cart productbtnmobile ml-2">Place Your Order </a>        
            </div>  </br>
            <small>by clicking place your order ,you are accepting our <a href="#" data-toggle="modal" data-target="#exampleModalLong4">Return Policy</a> </small>
        </div>  ';
   
        }

    } else {
       
        // echo "<script>
        // alert('You must be logged in before processing checkout');
        // window.location.href='loginhandle.php';
        //     </script>";  
            echo '
            <script>
          swal({
            title: "You must be logged in before processing checkout",
            icon: "warning",
        }).then(function() {
            window.location = "loginhandle.php";
        }); </script>';
        
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