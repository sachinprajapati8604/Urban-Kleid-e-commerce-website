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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

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

<style>
    .welcometext {
        font-size: 20px;
    }
</style>
</head>

<body>

    <!-- ---adding indexpage---- -->

    <?php include 'basic/login_header.php'; ?>

    <div class="container mx-auto shadow-sm p-3 mb-5 bg-white rounded mt-4">
        <header class="PageHeader">
            <a href="logout.php" class="PageHeader__Back Heading u-h7">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>

            <div class="SectionHeader">
                <h1 class="SectionHeader__Heading Heading u-h1">My account</h1>
                <p class="SectionHeader__Description">Welcome back,
                    <b><?php echo htmlspecialchars($_SESSION["fullname"]); ?></b>
                </p>
            </div>
        </header>
        <div class="PageLayout PageLayout--breakLap">
            <div class="PageLayout__Section">
                <div class="Segment">
                    <h2 class="Segment__Title Heading u-h7"><b>My orders</b></h2>

                    <div class="Segment__Content">
                      
                        <?php

                        include 'dbconnect.php';

                        $email = $_SESSION['username'];
                        $id = $_SESSION['id'];

                       
                        $sql = "SELECT * FROM `transcations` WHERE trans_userid='$id'  ORDER BY `sr` DESC ";
                        $result = mysqli_query($conn, $sql);
                        $rowcount = mysqli_num_rows($result);
                        if ($rowcount == 0) {
                            echo '<p>You have not ordered yet</p>
                            <a href="products.php" class="btn Button-Cart productbtnmobile ml-2">Shop Now</a>';
                        } else {
                            echo '<h5>You have ' . $rowcount . ' ordered</h5> </br>';
                        }
                        $i=0;

                        while ($row = mysqli_fetch_assoc($result)) {

                           $i++;
                            $transid = $row['trans_id'];                            
                            $trans_userid = $row['trans_user_id'];

                            //store as session variable
                          //  $_SESSION['transid'][$i] = $transid;
                        
                            $name = $row['trans_cust_name'];
                            $proinfo = $row['trans_prod_info'];
                            $amount = $row['trans_amount'];
                            $status = $row['trans_status'];
                            $image=$row['trans_image'];
                            // $created=$row['trans_created'];
                            //we are making format of date
                            $date = strtotime($row['trans_created']);
                            $created = date("d-m-Y", $date);
                            $today=date("d-m-Y");
                            $return_ended= date('d-M-Y',strtotime($created. ' + 10 days'));
                            $diff=abs(strtotime($created) - strtotime($today));  
                            $years = floor($diff / (365*60*60*24));
                            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                            $remaindays=10-$days;
                          if ($days <= 10) {
                            $msg = ' <a href="#" class="btn Button-Cart productbtnmobile ml-2" onclick="Return()">Return</a> 
                            <a href="#" class="btn Button-Cart productbtnmobile ml-2" onclick="Return()">Track Order</a> 
                            <p class="text-right remainingdays">'.$remaindays.' days left for return.</p>                      
                     ';
                        }
                        if ($days > 10) {
                            $msgend = '<p>RETURN ENDED FOR THIS PRODUCT ON '.$return_ended.' .</p>
                    <h5 class="mb-0 font-weight-bold">Thank You For shopping with us</h5>
                    ';
                        }

                            echo '<div class="media my-2">
                            
                            <img class="mr-3 " src="img/'.$image.'" height="280px" width="300px" alt="">
                                    <div class="media-body">
                                    <p class="mt-0">Product Details :<b>' . $proinfo . '</b></p>
                                    <p class="mt-0">Transaction ID :<b>' . $transid . '</b></p>
                                    <p>Paid Amount <b> &#8377; ' . $amount . ' </b></p>
                                    <p>Order : <b>' . $status . '</b> </p>
                                    <p>Order Date : ' . $created . ' </p>
                                    '.$msgend.'
                                    <a href="PayUMoney-Payment\invoice2.php?transid='.$transid.'" class="btn Button-Cart productbtnmobile ml-2">Download Invoice</a>
                                   '.$msg.'
                                    </div>
                                 </div> <hr>';
                        }



                        ?>

                    </div>
                </div>
            </div>
            <script>
                function Return () {
                    alert("We cant return your order yet this part  is under development. \n server are under sachin prajapati😀😀😀");
                }
            </script>

            <div class="PageLayout__Section PageLayout__Section--secondary">
                <div class="Segment">
                    <h2 class="Segment__Title Heading u-h7"><b>Your addresses</b></h2>

                    <div class="Segment__Content">

                        <?php
                        if ($fulladdress != "") {
                            echo '<p>' . $fulladdress . '</p>';
                        } else {
                            echo "<p>No addresses are currently saved</p>";
                        }
                        ?>
                        <div class="Segment__ButtonWrapper">
                            <a href="manage_address.php" class="btn  Button-Cart Accbutton">Manage addresses</a>
                        </div>
                    </div>
                </div>
                <div class="PageLayout PageLayout--breakLap">
                    <div class="PageLayout__Section">
                        <div class="Segment">
                            <h2 class="Segment__Title Heading u-h7"> <b>Reset Password</b></h2>
                            <div class="Segment__ButtonWrapper">
                                <a href="reset-password.php" class="btn  Button-Cart Accbutton">Reset Here</a>
                            </div>
                        </div>
                    </div>
                </div>
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