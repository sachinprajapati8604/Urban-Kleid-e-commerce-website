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
<script type="text/javascript"> 

        setTimeout(function () { 
  
            // Closing the alert 
            $('#alert').alert('close'); 
        }, 5000); 
    </script> 
</head>

<body>


    <?php include 'basic/login_header.php'; ?>
   

    <!-- -------------alert-------------- -->
    <div class="container-fluied mt-3 m-2">

        <div class="alert  alert-dismissible fade show my-auto text-center" data-auto-dismiss="2000">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Welcome <strong> <?php  echo htmlspecialchars($_SESSION["fullname"]); ?></strong> 
        </div>

    </div>

     <!-- ------------ 1st Banner Image------------ -->
    <div class="container-fluid mt-1 m-0">
        <div class="row">
            <div class="col  ">
                <div class="simgdiv">
                    <img src="img/banner1.jpg" class="d-block w-100 " alt="...">
                </div>

                <div class="carousel-caption d-block textcontent">
                    <h5 class="h5">Urban Kleid Fashion</h5>
                    <p class="font-weight-  text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>

                    <div class="text-center myshopbtndiv ">
                        <a href="products.php" class="myshopbtn text-center">Shop Now</a>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--NEW ARRIVAL-------------------------------->
    <section class="new-arrival">

        <!--heading-------->
        <div class="arrival-heading">
            <strong>New Arrivals</strong>
            <p class="lead mt-4">We Provide You New Fasion Design Clothes</p>
        </div>

        <!--products----------------------->
        <div class="product-container">
        <?php
			include 'dbconnect.php';
			// Turn off error reporting
			error_reporting(0);

			$sql = "SELECT * FROM `newproducts` where pro_id between 13 and 15";
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
                              <a href="view_products.php?proid='.$proid.'">			  <img alt="1" src="img/' . $imagename . '">  </a>
								  <!--overlayer---------->
								  <div class="overlay">
									  <!--buy-btn------>
                                      <button type="submit" name="add_to_cart" class="buy-btn">Buy Now</button>
                                     
								  </div>
							  </div>
							  <!--detail-box--------->
                              <div class="detail-box text-center">
                              <a href="view_products.php?proid='.$proid.'">' . $proname . '</a> <br>	
                              
                              <!--price-------->				  					  
                              <a href="view_products.php?proid='.$proid.'" class="price">&#8377; ' . $price . '   <s class="text-muted">' . $bidprice . '</s>	</a> 
                              </div>   
						  </div>						 
					  </div>
					  ';
			}

            ?>
            
        </div>
        <div class="text-center myshopbtndiv topmargindiv ">
            <a href="#" class="myshopbtn text-center">View All Products</a>
        </div>
    </section>

    <!-- ------------2nd Banner Image------------ -->
    <div class="container-fluid topmargindiv m-0">
        <div class="row ">
            <div class="col  topmargindiv">
            <div class="simgdiv">
            <img src="img/banner2.jpg" class="d-block w-100 " alt="...">
                </div>
              
                <div class="carousel-caption d-block textcontent bottom-margin">
                    <h5 class="font-weight-bolder  bootom">Urban Kleid </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- ---two images -----  -->

    <div class="container topmargindiv mx-auto">
        <h2 class="text-center h2heading">Biggest Brand In Fashion</h2>

        <div class="row  d-flex mx-auto mt-4">
            <div class="col-sm-5   mx-auto">
            <div class="simgdiv">
            <img src="img/NEWPOST.jpg" class="d-block w-100 " alt="...">
                </div>
             
                <div class="carousel-caption d-block textcontent">
                    <h5 class="h5">Urban's Top Shirts</h5>
                    <div class="text-center myshopbtndiv ">
                        <a href="#" class="myshopbtn text-center">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5   mx-auto">
            <div class="simgdiv">
            <img src="img/photo-1501043176681-43fdbf075ef9.jpg" class="d-block w-100 ">
                </div>
               
                <div class="carousel-caption d-block textcontent">
                    <h5 class=" h5">Urban's Top Jeans</h5>
                    <div class="text-center myshopbtndiv ">
                        <a href="#" class="myshopbtn text-center ">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ------------one image and one text--------------- -->

    <div class="container mydiv3d mycont topmargindiv">
        <div class="row ">
            <div class="col-sm-6  myimages">
                <img src="img/IMG_1107.jpg" class="rounded float-start w-100 p-2" alt="...">
            </div>
            <div class="col-md-6 mt-4 mytext ">
                <h2 class="card-title text-center mt-2 font-weight-bold">Drop It like It's Hot</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nesciunt, vitae officiis facilis
                    reprehenderit ipsa ratione quis id laudantium unde saepe placeat officia ea fugiat dolores neque sit
                    ipsam deleniti?</p>
                <div class="text-center myshopbtndiv ">
                    <a href="#" class="myshopbtn text-center">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <!--NEW ARRIVAL-------------------------------->
    <section class="new-arrival">

        <!--heading-------->
        <div class="arrival-heading">
            <strong>Top Products</strong>
            <p>We Provide You New Fasion Design Clothes</p>
        </div>

        <!--products----------------------->
        <div class="product-container">
        <?php
			include 'dbconnect.php';
			//  Turn off error  reporting
			error_reporting(0);

			$sql = "SELECT * FROM `newproducts` where pro_id between 16 and 18";
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
                              <a href="view_products.php?proid='.$proid.'">		  <img alt="1" src="img/' . $imagename . '">  </a>
								  <!--overlayer---------->
								  <div class="overlay">
									  <!--buy-btn------>
                                      <button type="submit" name="add_to_cart" class="buy-btn">Buy Now</button>
                                      
								  </div>
							  </div>
							  <!--detail-box--------->
                              <div class="detail-box text-center">
                              <a href="view_products.php?proid='.$proid.'">' . $proname . '</a> <br>	
                              <!--price-------->				  					  
                              <a href="view_products.php?proid='.$proid.'" class="price">&#8377; ' . $price . '   <s class="text-muted">' . $bidprice . '</s>	</a> 
                              </div>  
						  </div>						 
					  </div>
					 ';
			}

			?>
         
        </div>
        <div class="text-center myshopbtndiv topmargindiv ">
            <a href="products.php" class="myshopbtn text-center">View All Products</a>
        </div>
    </section>


    <!-- 1------------two image and two text--------------- -->

    <div class="container   mydiv3d mycont topmargindiv">
        <div class="row ">
            <div class="col-sm-6 myimages">
                <img src="img/IMG_1194.jpg" class="rounded float-start w-100" alt="...">

            </div>
            <div class="col-md-6 mt-4 mytext ">
                <h2 class="card-title text-center mt-2 font-weight-bold">Collection</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nesciunt, vitae officiis facilis
                    reprehenderit ipsa ratione quis id laudantium unde saepe placeat officia ea fugiat dolores neque sit
                    ipsam deleniti?</p>
                <div class="text-center myshopbtndiv ">
                    <a href="#" class="myshopbtn text-center">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6 mt-4 mytext ">
                <h2 class="card-title text-center mt-2 font-weight-bold">Collection</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nesciunt, vitae officiis facilis
                    reprehenderit ipsa ratione quis id laudantium unde saepe placeat officia ea fugiat dolores neque sit
                    ipsam deleniti?</p>
                <div class="text-center myshopbtndiv ">
                    <a href="#" class="myshopbtn text-center">Shop Now</a>
                </div>
            </div>
            <div class="col-sm-6 myimages ">
                <img src="img/IMG_1202.jpg" class="rounded float-start w-100" alt="...">
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

    
 <?php
include 'basic/footer.php';
?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
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