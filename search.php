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
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--fav-icon---------------->
    <link rel="shortcut icon" href="img/Transparent.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="stylesheet" href="css/login-signup.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/productdetail.css">

</head>

<body>

    <?php
    include 'dbconnect.php';
    include 'basic/header.php'; 
       //  error_reporting(0);        
    ?>


   
<?php 
		$squery=$_GET['query'];	
         echo '<h3 class="font-italic py-2 text-center"> Search results for "<mark>'.$squery.'</mark>" </h3> <hr>';
        $noresult=true;
        
        $sql=" SELECT * FROM newproducts WHERE (pro_id = '$squery' OR pro_name = '$squery' OR pro_shortdetail = '$squery' OR pro_price = '$squery')   ";
        
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($result)){
					$noresult=false;
					$proid=$row['pro_id'];
                    $proname=$row['pro_name'];
                    $imagename=$row['pro_imagename'];
					$detail=$row['pro_shortdetail'];
					$price=$row['pro_price'];
                 
                    echo '<section class="new-arrival">		
                    <!--products----------------------->
                    <div class="product-container">
                    <form action="manage_cart.php" method="POST" >
                    <!--1------------------------------------>
                    <div class="item-a ">
                        <!--box-slider--------------->
                        <div class="box">
                            <!--img-box---------->
                            <div class="slide-img">
                            <a href="view_products.php?proid='.$proid.'">		  <img alt="1" src="img/'.$imagename.'"> </a>
                                <!--overlayer---------->
                                <div class="overlay">
                                    <!--buy-btn------>
                                    <button type="submit" name="add_to_cart" class="buy-btn">Buy Now</button>
                                   
                                </div>
                            </div>
                            <!--detail-box--------->
                            <div class="detail-box text-center">
                                    <a href=" view_products.php?proid='.$proid.'">' . $proname . '</a>	<br>
                                    <!--price-------->				  					  
                                <a href="view_products.php?proid='.$proid.'" class="price">&#8377; ' . $price . '   <s class="text-muted">' . $bidprice . '</s>	</a> 
                            </div>  
                        </div>						 
                    </div>
                    </form>
                    </div>

</section>'
					  ;	
				}
				
				if($noresult){
                    echo '<div class="container mx-auto"  style="min-height:60vh; ">
					<div class="jumbotron jumbotron-fluid " >
                    <div class="container">
                      <h5 class="text-xl-left">No Result, Word not matched. </h1> </br>
                      <p>Suggetions </p>
                      <ul >
                      <li>Please search with strong keyword related to this website</li>
                     
                      </ul>
                    </div>
					</div >
                  </div>
                  ';
                }
				?>




<?php include 'basic/footer.php'; ?>


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