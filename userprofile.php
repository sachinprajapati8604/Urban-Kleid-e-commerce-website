<?php
// Initialize the session
session_start();

// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Check if the user is logged in, if not then redirect him to loginhandle page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginhandle.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta content="IE-edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, intial-scale=1.0" name="viewport">
<title>URBAN KLEID</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<!--using FontAwesome--------------->
<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
<!--fav-icon---------------->
<link rel="shortcut icon" href="img/Transparent.png" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/mystyle.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/login-signup.css">

<style>
.welcometext {
    font-size: 20px;
}
</style>
</head>

<body>

    <!-- ---adding indexpage---- -->

    <?php include 'basic/login_header.php'; ?>
   
    <div class="container mx-auto shadow-sm p-3 mb-5 bg-white rounded ">
        <header class="PageHeader">
            <a href="logout.php" class="PageHeader__Back Heading u-h7">Logout</a>

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
                    <h2 class="Segment__Title Heading u-h7">My orders</h2>

                    <div class="Segment__Content">
                        <p>You haven't placed any orders yet</p>
                    </div>
                </div>
            </div>

            <div class="PageLayout__Section PageLayout__Section--secondary">
                <div class="Segment">
                    <h2 class="Segment__Title Heading u-h7">No addresses</h2>

                    <div class="Segment__Content">
                        <p>No addresses are currently saved</p>

                        <div class="Segment__ButtonWrapper">
                            <a href="#" class="btn btn-primary Button-Login Accbutton">Manage addresses</a>
                        </div>
                    </div>
                </div>
                <div class="PageLayout PageLayout--breakLap">
                    <div class="PageLayout__Section">
                        <div class="Segment">
                            <h2 class="Segment__Title Heading u-h7">Reset Password</h2>
                            <div class="Segment__ButtonWrapper">
                                <a href="reset-password.php" class="btn  Button-Login Accbutton">Reset Here</a>
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
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
            <!--Get your own code at fontawesome.com-->
            <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

            <!--using JQuery--------------->
            <script src="https://code.jquery.com/jquery-3.5.1.js"
                integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
            <script src="js/jquery.js"></script>
            <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</body>

</html>