
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="15" />
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
   
    <script>
 //auto close alert
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            
        }, 4000);
    </script>
    
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
    $id = $_GET['proid'];

    ?>

    <?php
    error_reporting(0);
//thi php code for manage item into cart

// session_start();
// session_destroy();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(isset($_POST['add_to_cart'])){
        if(isset($_SESSION['cart'])){
           
            //checkimg existing item
            $myitems=array_column($_SESSION['cart'],'proid');  
            if(in_array($_POST['proid'],$myitems)){
                echo '<div class="container">
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                   <p class="text-center"> Product already added to cart </p>
                </div>
                </div>

                ';

              
             
            }
else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('proid'=>$_POST['proid'],'image'=>$_POST['image'],'item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'bidprice'=>$_POST['bidprice'],'quantity'=>1);
       //     print_r($_SESSION['cart']);
      
       echo '<div class="container">
       <div class="alert alert-secondary alert-dismissible fade show" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
       </button>
        <p class="text-center"> Product added to cart </p>
       </div>
       </div>

       ';
      
                
}
        }
        else{
                $_SESSION['cart'][0]=array('proid'=>$_POST['proid'], 'image'=>$_POST['image'],'item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'bidprice'=>$_POST['bidprice'],'quantity'=>1);
            //    print_r($_SESSION['cart']);
            echo '<div class="container">
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <p class="text-center"> Product  added to cart </p>
            </div>
            </div>

            ';
                  
        }
    }
    
    if(isset($_POST['remove_item'])){
        foreach($_SESSION['cart'] as $key=> $value){
            if($value['proid']==$_POST['proid']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo '<div class="container">
                <div class="alert alert-success" id="success-alert">
                   <button type="button" class="close" data-dismiss="alert">x</button>
                   <p> Product removed from cart </p>
                </div>
                </div>
                ';
              

            }
        }
    }
}
?>


    <div class="container ">
        <div class="card imgcarddiv">
            <div class="container-fliud">
                <div class=" row">

                    <?php
                    $id = $_GET['proid'];
                    $sql = "SELECT * FROM `newproducts` WHERE pro_id=$id ";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $proid = $row['pro_id'];
                        $proname = $row['pro_name'];
                        $image = $row['pro_imagename'];
                        $detail = $row['pro_shortdetail'];
                        $price = $row['pro_price'];
                        $bidprice = $row['pro_bid_price'];

                        $sql2 = "SELECT * FROM `viewproducts` WHERE vp_imgid=$id ";
                        $result2 = mysqli_query($conn, $sql2);
                        $row = mysqli_fetch_assoc($result2);

                        $imgid = $row['vp_imgid'];
                        $prev_img = $row['vp_imgname'];
                        $img2 = $row['vp_img2'];
                        $img3 = $row['vp_img3'];
                        $img4 = $row['vp_img4'];



                        echo ' <div class="preview col-md-6">
                <form action="" method="POST">
                <div class="preview-pic tab-content">
                  <div class="tab-pane active" id="pic-1"><img src="img/' . $image . '" /></div>
                  <div class="tab-pane" id="pic-2"><img src="img/' . $img2 . '" /></div>
                  <div class="tab-pane" id="pic-3"><img src="img/' . $img3 . '" /></div>
                  <div class="tab-pane" id="pic-4"><img src="img/' . $img4 . '" /></div>
                 
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="img/' . $image . '" /></a></li>
                  <li><a data-target="#pic-2" data-toggle="tab"><img src="img/' . $img2 . '" /></a></li>
                  <li><a data-target="#pic-3" data-toggle="tab"><img src="img/' . $img3 . '" /></a></li>
                  <li><a data-target="#pic-4" data-toggle="tab"><img src="img/' . $img4 . '" /></a></li>

                </ul>
                
            </div>
            <div class="details col-md-6">
                <h3 class="product-title">' . $proname . '</h3>
                <p>Product ID : ' . $proid . '</p>
                <div class="rating">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <span class="review-no">41 reviews</span>
                </div>
                <p class="product-description "><b class="price">Product Detail </b><br>' . $detail . ' </p>
                <h4 class="price"> price: <span>&#8377;</span> ' . $price . ' <s class="text-muted">' . $bidprice . '</s></h4>
                

                <p class="sizes">sizes: <a href="img/UK-Size Chart.jpg"> Size Chart</a><br>   </p>
                
            
                <div class="form-check form-check-inline ">
                <input class="form-check-input m-2" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label " for="inlineRadio1">S</label>
                <input class="form-check-input m-2" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label " for="inlineRadio1">M</label>
                <input class="form-check-input m-2" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">L</label>
                <input class="form-check-input m-2" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">XL</label>
              </div>
            
             
               
               
                <div class="qtyinput">
                  
                    <div class="input-group ">
                       
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                data-type="minus" data-field="quant[1]">
                                <span class="fa fa-minus"></span>
                            </button>
                        </span>
                        <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1"
                            max="10">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                data-field="quant[1]">
                                <span class="fa fa-plus"></span>
                            </button>
                        </span>
                   
                    </div>
              
                </div>


              
                <div class="action">
                    <div class="form-group ">
                    <button  type="submit" name="add_to_cart" class="btn Button-Login productbtnmobile">Add to cart</button>
                        <input type="hidden" name="proid" value="' . $proid . '">
						<input type="hidden" name="image" value="' . $image . '">
						<input type="hidden" name="item_name" value="' . $proname . '">
                        <input type="hidden" name="price" value="' . $price . '">
                        <input type="hidden" name="bidprice" value="' . $bidprice . '">
                        
                        <a href="#" type="submit" name="buy_it_now" class="btn Button-Login productbtnmobile">Buy it now </a>
                    </div>
                </div>
                </form>
            </div>';
                    }
                    ?>




                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">

        <section class="new-arrival">

            <!--heading-------->
           
            <div class="arrival-heading">
			<strong>Suggested Products</strong>
			<p class="lead mt-4">We Provide You New Fasion Design Clothes</p>	
            </div>

            <!--products----------------------->
            <div class="product-container">
                <?php
                include 'dbconnect.php';
                // Turn off error reporting
                error_reporting(0);

                $sql = "SELECT * FROM `newproducts` where pro_id between 9 and 11";

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
									<a href="view_products.php?proid=' . $proid . '">		<img alt="1" src="img/' . $imagename . '"> </a>
										<!--overlayer---------->
										<div class="overlay">
											<!--buy-btn------>
                                            <a href="view_products.php?proid='.$proid.'" type="submit" name="add_to_cart" class="buy-btn">Buy Now</a>   
											<input type="hidden" name="proid" value="' . $proid . '">
											<input type="hidden" name="image" value="' . $imagename . '">
											<input type="hidden" name="item_name" value="' . $proname . '">
											<input type="hidden" name="price" value="' . $price . '">
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
                <div class="form-group  ">
                    <a href="products.php" class="btn  Button-Login">View All Products </a>
                </div>
            </div>
        </section>
    </div>

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