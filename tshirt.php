<!DOCTYPE html>
<html lang="en">

<head>

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
	<link rel="stylesheet" href="css/contactus.css">
	<link rel="stylesheet" href="css/login-signup.css">
	<link rel="stylesheet" href="css/product.css">
   

</head>

<body>

    <?php
    include 'basic/header.php';
    ?>

   
    <!--NEW ARRIVAL-------------------------------->
    <section class="new-arrival my-4">

        <!--heading-------->
        <div class="arrival-heading">
            <strong>T-shirts</strong>
            <p>We Provide You New Fasion Design Clothes</p>
        </div>

        <!--products----------------------->
        <div class="product-container">
        <?php
			include 'dbconnect.php';
			//  Turn off error  reporting
			error_reporting(0);

			$sql = "SELECT * FROM `tshirt` ORDER BY pro_id DESC";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$proid =$row['pro_id'];
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
                                      <a href="view_products.php?proid='.$proid.'" type="submit" name="add_to_cart" class="buy-btn">Buy Now</a>   
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
        
    </section>





   



    <!-- -----------footer------------------------- -->

    <?php
    include 'basic/footer.php';
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
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