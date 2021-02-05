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
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: loginhandle.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="stylesheet" href="css/login-signup.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/productdetail.css">

    <script type="text/javascript">
    setTimeout(function() {

        // Closing the alert 
        $('#alert').alert('close');
    }, 5000);
</script>
</head>

<body>

    <?php
    include 'basic/login_header.php';
    include 'dbconnect.php';
    ?>

<?php
$sql = "SELECT * FROM `index_page`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
$id = $row['index_id'];
$img = $row['index_img'];
$title = $row['index_title'];
$desc = $row['index_desc'];
$created = $row['index_created'];
if ($id == 1) {
    $carousel1 = $img;
    $title1 = $title;
} elseif ($id == 2) {
    $carousel2 = $img;
    $title2 = $title;
} elseif ($id == 3) {
    $carousel3 = $img;
    $title3 = $title;
    $desc3 = $desc;
} elseif ($id == 4) {
    $carousel4 = $img;
    $title4 = $title;
    $desc4 = $desc;
} elseif ($id == 5) {
    $carousel5 = $img;
    $title5 = $title;
    $desc5 = $desc;
} elseif ($id == 6) {
    $carousel6 = $img;
    $title6 = $title;
    $desc6 = $desc;
} elseif ($id == 7) {
    $carousel7 = $img;
    $title7 = $title;
    $desc7 = $desc;
} elseif ($id == 8) {
    $carousel8 = $img;
    $title8 = $title;
    $desc8 = $desc;
} elseif ($id == 9) {
    $carousel9 = $img;
    $title9 = $title;
    $desc9 = $desc;
} elseif ($id == 10) {
    $carousel10 = $img;
    $title10 = $title;
    $desc10 = $desc;
} elseif ($id == 11) {
    $carousel11 = $img;
    $title11 = $title;
    $desc11 = $desc;
}elseif ($id == 12) {
    $carousel12 = $img;
    $title12 = $title;
    $desc12 = $desc;
    $_SESSION['carousel12']=$carousel12;
    $_SESSION['title12']=$title12;
    $_SESSION['desc12']=$desc12;
   
} 
else {
    exit();
}
}

?>

<!-- carausel -->

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
<ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>

</ol>
<div class="carousel-inner">
    <div class="carousel-item active sliderimg">
        <img src="img/<?php echo $carousel1 ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block">
            <h5><?php echo $title1 ?></h5>
            <a href="products.php" class="btn Button-Cart text-center">Shop Now</a>
        </div>
    </div>
    <div class="carousel-item sliderimg">
        <img src="img/<?php echo $carousel2 ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption  d-md-block">
            <h5><?php echo $title2 ?></h5>
            <a href="products.php" class="btn Button-Cart text-center">Shop Now</a>
        </div>
    </div>

</div>
<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</a>
</div>



<!--NEW ARRIVAL-------------------------------->
<section class="new-arrival">

<!--heading-------->
<div class="arrival-heading">
    <strong> <?php echo $title10; ?> </strong>
    <p class="lead mt-4"> <?php echo $desc10; ?></p>
</div>

<!--products----------------------->
<div class="product-container">
    <?php
    include 'dbconnect.php';
    // Turn off error reporting
    error_reporting(0);

    $sql = "SELECT * FROM `newproducts` where pro_id between 1 and 4";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $proid = $row['pro_id'];
        $proname = $row['pro_name'];
        $prodesc = $row['pro_shortdetail'];
        $price = $row['pro_price'];
        $bidprice = $row['pro_bid_price'];
        $imagename = $row['pro_imagename'];

        echo '  
         
              <!--1------------------------------------>
              <div class="item-a">
                  <!--box-slider--------------->
                  <div class="box">
                      <!--img-box---------->
                      <div class="slide-img">
                      <a href="view_products.php?proid=' . $proid . '">			  <img alt="1" src="img/' . $imagename . '">  </a>
                          <!--overlayer---------->
                          <div class="overlay">
                              <!--buy-btn------>
                              <a href="view_products.php?proid=' . $proid . '" type="submit" name="add_to_cart" class="buy-btn">Buy Now</a>   
                          </div>
                      </div>
                      <!--detail-box--------->
                      <div class="detail-box text-center">
                      <a href="view_products.php?proid=' . $proid . '" class="product-title">' . $proname . '</a> <br>	
                      
                      <!--price-------->				  					  
                      <a href="view_products.php?proid=' . $proid . '" class="price">&#8377; ' . $price . '   <s class="text-muted">' . $bidprice . '</s>	</a> 
                      </div>   
                  </div>						 
              </div>
              ';
    }

    ?>

</div>
<div class=" text-center">
    <a href="products.php" type="submit" class="btn Button-Cart productbtnmobile text-center">View All Products </a>
</section>


<!-- ------------2nd Banner Image------------ -->
<div class="container-fluid topmargindiv m-0 my-4">
<div class="row ">
    <div class="col-sm-8  topmargindiv">
        <div class="simgdiv">
            <img src="img/<?php echo $carousel3 ?>" class="d-block w-100 " alt="...">
        </div>
    </div>
    <div class="col-sm-4 text-center " style="margin: auto;">
        <h1 class="h1_heading"><?php echo $title3 ?></h1>
        <h5 class="h5-heading"><?php echo $desc3 ?></h5>
        <a href="products.php" class="btn Button-Cart text-center ">Shop Now</a>
    </div>
</div>
</div>

<!-- two  images with text overlay -->

<div class="container my-4 mt-4">
<h1 class="text-center bannertitle my-4"><?php echo $title4 ?></h1>
<div class="row my-4">
    <div class="col-sm-6 mt-2">
        <div class="image_text_overlay">
            <img src="img/<?php echo $carousel4 ?>" alt="Avatar" class="image">
            <div class="text_overlay">
                <div class="text">
                    <h5 class="h1 bannertitle"><?php echo $desc4 ?></h5>
                    <a href="tshirt.php" class="btn Button-Cart text-center">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mt-2">
        <div class="image_text_overlay">
            <img src="img/<?php echo $carousel5 ?>" alt="Avatar" class="image">
            <div class="text_overlay">
                <div class="text">
                    <h5 class="h1 bannertitle"><?php echo $desc5 ?>
                    </h5>
                    <a href="sweatshirts.php" class="btn Button-Cart text-center">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<!-- ------------one image and one text--------------- -->

<div class="container  mycont topmargindiv my-4">
<div class="row ">
    <div class="col-sm-6  myimages">
        <img src="img/IMG_1107.jpg" class="rounded float-start w-100 p-2" alt="...">
    </div>
    <div class="col-md-6 mt-4  ">
        <h2 class="card-title text-center mt-2  mycard-title"><?php echo $title6 ?></h2>
        <hr>
        <p class="lead text-justify"><?php echo $desc6 ?></p>
        <div class="text-center ">
            <a href="products.php" class="btn Button-Cart text-center">Shop Now</a>
        </div>
    </div>
</div>
</div>

<!--NEW ARRIVAL-------------------------------->
<section class="new-arrival my-4">

<!--heading-------->
<div class="arrival-heading">
    <strong> <?php echo $title11; ?></strong>
    <p> <?php echo $desc11; ?></p>
</div>

<!--products----------------------->
<div class="product-container">
    <?php
    include 'dbconnect.php';
    //  Turn off error  reporting
    error_reporting(0);

    $sql = "SELECT * FROM `newproducts` where pro_id between 5 and 8";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $proid = $row['pro_id'];
        $proname = $row['pro_name'];
        $prodesc = $row['pro_shortdetail'];
        $price = $row['pro_price'];
        $bidprice = $row['pro_bid_price'];
        $imagename = $row['pro_imagename'];

        echo '  
        
              <!--1------------------------------------>
              <div class="item-a">
                  <!--box-slider--------------->
                  <div class="box">
                      <!--img-box---------->
                      <div class="slide-img">
                      <a href="view_products.php?proid=' . $proid . '">		  <img alt="1" src="img/' . $imagename . '">  </a>
                          <!--overlayer---------->
                          <div class="overlay">
                              <!--buy-btn------>
                              <a href="view_products.php?proid=' . $proid . '" type="submit" name="add_to_cart" class="buy-btn">Buy Now</a>   
                          </div>
                      </div>
                      <!--detail-box--------->
                      <div class="detail-box text-center">
                      <a href="view_products.php?proid=' . $proid . '">' . $proname . '</a> <br>	
                      <!--price-------->				  					  
                      <a href="view_products.php?proid=' . $proid . '" class="price">&#8377; ' . $price . '   <s class="text-muted">' . $bidprice . '</s>	</a> 
                      </div>  
                  </div>						 
              </div>
             ';
    }

    ?>

</div>
<div class="text-center  my-4 ">
    <a href="products.php" class="btn Button-Cart text-center">View All Products</a>
</div>
</section>


<div class="container my-4">
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col-sm-4">
        <div class="card h-100">
            <div class="cardimgdiv">
                <img src="img/<?php echo $carousel7 ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title  mycard-title"><?php echo $title7 ?></h5>
                <p class="card-text text-justify"><?php echo $desc7 ?></p>
            </div>

        </div>
    </div>
    <div class="col-sm-4">
        <div class="card h-100">
            <div class="cardimgdiv">
                <img src="img/<?php echo $carousel8 ?>" class="card-img-top" alt="...">
            </div>

            <div class="card-body">
                <h5 class="card-title mycard-title"><?php echo $title8 ?></h5>
                <p class="card-text text-justify"><?php echo $desc8 ?></p>
            </div>

        </div>
    </div>

    <div class="col-sm-4">
        <div class="card h-100">
            <div class="cardimgdiv">
                <img src="img/<?php echo $carousel9 ?>" class="card-img-top" alt="...">
            </div>

            <div class="card-body">
                <h5 class="card-title mycard-title"><?php echo $title9 ?></h5>
                <p class="card-text text-justify"><?php echo addslashes($desc9) ?></p>
            </div>
        </div>
    </div>
</div>
</div>



<!--services------------------------->
<section class="services">
<!--services-box---------->
<div class="services-box">
    <i class="fas fa-shipping-fast"></i>
    <span>Free Shipping</span>
    <p>Free Shipping order above ₹599</p>
</div>
<!--services-box---------->
<div class="services-box">
    <i class="fas fa-headphones-alt"></i>
    <span>Support 24/7</span>
    <p>We support 24h a day</p>
</div>
<!--services-box---------->
<div class="services-box">
    <i class="fas fa-sync"></i>
    <span>100% Money Back</span>
    <p>You have 30 days to Return</p>
</div>

</section>



<!-- -----------footer------------------------- -->

<?php
include 'basic/footer.php';
?>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<!--using JQuery--------------->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


<script src="js/jquery.js"></script>


<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</body>

</html>

