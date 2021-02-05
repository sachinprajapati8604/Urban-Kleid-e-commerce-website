<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <script>
        //auto close alert
        window.setTimeout(function() {
            $(".size_alert").fadeTo(500, 0).slideUp(500, function() {
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['size']) {

        if (isset($_POST['add_to_cart'])) {
            if (isset($_SESSION['cart'])) {

                //checkimg existing item
                $myitems = array_column($_SESSION['cart'], 'proid');
                if (in_array($_POST['proid'], $myitems)) {
                //     echo '<div class="container">
                // <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                //  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                // <span aria-hidden="true">&times;</span>
                // </button>
                //    <p class="text-center"> Product already added to cart </p>
                // </div>
                // </div>
                // ';
                 $gotocart='
                 <a href="cart.php"  type="submit" class="btn Button-Cart productbtnmobile mr-2">Go to cart</a>
               ';
                } else {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('proid' => $_POST['proid'], 'image' => $_POST['image'], 'item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'bidprice' => $_POST['bidprice'], 'quantity' => $_POST['quantity'], 'size' => $_POST['size']);
                    //     print_r($_SESSION['cart']);

        //             echo '<div class="container">
        //                 <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //                 </button>
        //                     <p class="text-center"> Product added to cart </p>
        //                 </div>
        //                 </div>
        //                 <meta http-equiv="refresh" content="0" />

        // ';
        $gotocart='
        <a href="cart.php"  type="submit" class="btn Button-Cart productbtnmobile mr-2">Go to cart</a>
        <meta http-equiv="refresh" content="0" />
           ';
   
                }
            } else {
                $_SESSION['cart'][0] = array('proid' => $_POST['proid'], 'image' => $_POST['image'], 'item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'bidprice' => $_POST['bidprice'], 'quantity' => $_POST['quantity'], 'size' => $_POST['size']);
                //    print_r($_SESSION['cart']);
            //     echo '<div class="container">
            // <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            //  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            // <span aria-hidden="true">&times;</span>
            // </button>
            //  <p class="text-center"> Product  added to cart </p>
            // </div>
            // </div>
            // <meta http-equiv="refresh" content="0" />

            // ';
            $gotocart='
        <a href="cart.php"  type="submit" class="btn Button-Cart productbtnmobile mr-2">Go to cart</a>
        <meta http-equiv="refresh" content="0" />
     ';
            }
        }
    } else {
        $sizemsg = "Please select your size";
        
    }
    ?>

    <?php


    $id = $_GET['proid'];
    // $sql = "SELECT * FROM `newproducts` WHERE pro_id=$id ";
    $sql = "SELECT * FROM `tshirt` WHERE pro_id=$id
                    UNION SELECT * FROM newproducts WHERE pro_id=$id
                    UNION SELECT * FROM hoodies WHERE pro_id=$id
                    UNION SELECT * FROM sweatshirts WHERE pro_id=$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $proid = $row['pro_id'];
        $proname = $row['pro_name'];
        $image = $row['pro_imagename'];
        $detail = $row['pro_shortdetail'];
        $price = $row['pro_price'];
        $bidprice = $row['pro_bid_price'];

        $percentage = (($bidprice - $price) / $bidprice) * 100;
        $roundper = round($percentage);

        //start
        $low_img = array();

        //end
        if ($row['vp_img2'] != "") {
            array_push($low_img, $row['vp_img2']);
        }

        if ($row['vp_img3'] != "") {
            array_push($low_img, $row['vp_img3']);
        }
        if ($row['vp_img4'] != "") {
            array_push($low_img, $row['vp_img4']);
        }

        echo ' 
                        <div class="container-fluid single-product" id="myrow">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-5 productCol proimgcol">
                              <div class="img1">    <img src="img/' . $image . '"   alt="" id="productImg"> </div>               
                                    <div class="small-img-row">
                                    <div class="small-img-col">
                                            <img src="img/' . $image . '" alt="" width="100%" class="small-img">
                                        </div>
                                    ';

        for ($i = 0; $i < count($low_img); $i++) {
            echo '<div class="small-img-col">
                                            <img src="img/' . $low_img[$i] . '" alt="" width="100%" class="small-img">
                                        </div>';
        }
        echo '
                                    </div>
                                </div>
                                <div class="col-7 productCol">
                                  
                                    <h3>' . $proname . '</h3>
                                    <div class="hidden_pricebox ">
                                    <p class="price">Rs.<span>&#8377;</span><span id="price"> ' . $price . '</span>
                                    <s class="text-muted" id="bidprice">' . $bidprice .  '</s> <small class="percentage"> (' . $roundper . '% off)</small></p>
                                    </div>
                                    <div class="visible_pricebox ">
                                    <p class="price">Rs.<span>&#8377;</span><span > ' . $price . '</span>
                                    <s class="text-muted" >' . $bidprice .  '</s> <small class="percentage"> (' . $roundper . '% off)</small></p>
                                    </div>
                    
                                    <h5>Product Details </i></h5>
                                    <p class="product-description "> ' . $detail  . '
                                    For 3 years we have been sourcing the finest raw materials from around the world and innovating to develop fabrics that are entirely unique. An uncompromising commitment to quality is at the core of our business and this takes us direct to expert growers and farmers.
                                    </p>
                                   
                                    <div class="form-group mt-2">
                                  
                                    <label class="sizemsg   size_alert  mb-0 mt-0"><b >' . $sizemsg . ' </b></label>
                                    <select name="size" id="size">
                                    <option value="">Select Size</option>
                                    <option value="S"> Small</option>
                                    <option value="M"> Medium</option>
                                    <option value="XL"> XL</option>
                                    <option value="XXL"> XXL</option>
                                </select>
                                  </div>
                                    

                                    <div class="qtyinput">
                    
                                        <div class="input-group ">
                    
                                            <span class="input-group-btn">
                                                <button onclick="inputMinusQty()" type="button" class="btn btn-default btn-number"
                                                    data-type="minus" data-field="quant[1]">
                                                    <span class="fa fa-minus"></span>
                                                </button>
                                            </span>
                                            <input id="inputqty" type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">

                                            <span class="input-group-btn">
                                                <button onclick="inputPlusQty()" type="button" class="btn btn-default btn-number" data-type="plus"
                                                    data-field="quant[1]">
                                                    <span class="fa fa-plus"></span>
                                                </button>
                                            </span>
                    
                                        </div>
                    
                                    </div>

                                    <div class="btn-group mt-2">
                                    '.$gotocart.'
                                    <button  type="submit" name="add_to_cart" class="btn Button-Cart productbtnmobile mr-2">Add to cart</button>
                                        <input type="hidden" id="productid" name="proid" value="' . $proid . '">
                                        <input type="hidden" name="image" value="' . $image . '">
                                        <input type="hidden" name="item_name" value="' . $proname . '">
                                        <input type="hidden" id="priceforcart"  name="price" value="' . $price . '">
                                        <input type="hidden" id="bidpriceforcart" name="bidprice" value="' . $bidprice . '">
                                        <input type="hidden" name="quantity" id="sendqty" value="1">
                                   
                                    </div>

                                    <div class="my-4 tabpill">
                                    <nav>
  <div class="nav nav-tabs nav-justified mynavtab" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
    <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Fit</a>
    <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Shipping & returns</a>
    <a class="nav-link" id="nav-size-tab" data-bs-toggle="tab" href="#nav-size" role="tab" aria-controls="nav-contact" aria-selected="false">Size Chart</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active mt-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
 <p> 100% pre-shrunk organic cotton.<br>
Made In India soft and breathable cotton T-shirt with nice drape. </br>
It\'s the staple to any man\'s wardrobe, done better than before. From lightweight fabric to a clean neckline, our high quality touches make all the difference. This durable T-shirt will be your go-to for a long time to come. Plus, it\'s sustainably sourced and made of soft, 100% organic cotton so you can feel good about wearing it.</p>

<ul>
    <li> <b>COLOUR:</b> Black</li>
    <li> <b>COMPOSITION:</b> 100% cotton.</li>
    <li><b>CARE:</b> Hand wash</li>
    <li><b>PLACE OF ORIGIN:</b> IN</li>
    <li>Lightweight cotton jersey.</li>
    <li>Ribbed crew neck.</li>
</ul>

  </div>


  <div class="tab-pane fade mt-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <p> <h5> HOW TO MEASURE?</h5>
  <b>1. CHEST</b>
  Wrap the tape measure around the fullest part of your chest, ensuring the tape remains level. </br>
 <b> 2. COLLAR </b>
  Measure around the base of your neck where the collar would sit. </br>
  <b>3. SLEEVE</b>
  Hold one end of the tape measure at your wrist, and measure up to the tip of your shoulder.
   </p>
  </div>


  <div class="tab-pane fade mt-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <h5>Free shipping and free return on order above Rs. 500</h5>
 <h5> Returns</h5>
URBAN KLEID India, allows for the possibility to cancel your order at no extra cost, if requested while still being processed, before it has been sent to the transportation company for delivery.  you will have ten (10) calendar days from the reception of the order to cancel the contract and return the product you have acquired. You will have to notify URBAN KLEID within this period of your intention to cancel the contract. </br>
for more read our return policy guidelines 
<a href="#" data-toggle="modal" data-target="#exampleModalLong4">Returns Policy.</a>
  </div>


  <div class="tab-pane fade mt-4" id="nav-size" role="tabpanel" aria-labelledby="nav-size-tab"> 
  <div class="chartsize mt-4">
  <a href="img/UK-Size Chart.jpg">      <img src="img/UK-Size Chart.jpg" alt=""> </a>
</div></div>
</div>
                                            </div>

                                    
                                   
                                       
                    
                                </div>
                            </div>
                    </form>
                        </div>';
    }
    ?>


    <!-- script for plus minus quantity price increment -->
    <script>
        function inputPlusQty() {

            var proid = document.getElementById("productid").value;
            const qty = parseInt(document.getElementById("inputqty").value);
            var xhrhttp = new XMLHttpRequest();
            xhrhttp.onreadystatechange = function() {
                if (xhrhttp.readyState == 4 && xhrhttp.status == 200) {

                    document.getElementById("price").innerHTML = eval(xhrhttp.responseText * (qty + 1));

                    document.getElementById("priceforcart").value = eval(xhrhttp.responseText * (qty + 1));

                    document.getElementById("sendqty").value = qty + 1;
                    inputPlusBid();

                }
            };
            xhrhttp.open("GET", "ajax/getprice.php?productid=" + proid, true);
            xhrhttp.send(null);
        }

        function inputMinusQty() {
            const qty = parseInt(document.getElementById("inputqty").value);
            if (qty > 1) {
                var proid = document.getElementById("productid").value;

                var xhrhttp = new XMLHttpRequest();
                xhrhttp.onreadystatechange = function() {
                    if (xhrhttp.readyState == 4 && xhrhttp.status == 200) {
                        document.getElementById("price").innerHTML = eval(xhrhttp.responseText * (qty - 1));

                        document.getElementById("priceforcart").value = eval(xhrhttp.responseText * (qty - 1));
                        document.getElementById("sendqty").value = qty - 1;
                        inputMinusBid();

                    }
                };

                xhrhttp.open("GET", "ajax/getprice.php?productid=" + proid, true);
                xhrhttp.send(null);

            }
        }
    </script>
    <!-- script for bid price -->
    <script>
        function inputPlusBid() {

            var proid = document.getElementById("productid").value;
            const qty = parseInt(document.getElementById("inputqty").value);
            var xhrhttp = new XMLHttpRequest();
            xhrhttp.onreadystatechange = function() {
                if (xhrhttp.readyState == 4 && xhrhttp.status == 200) {

                    document.getElementById("bidprice").innerHTML = eval(xhrhttp.responseText * (qty + 1));

                    document.getElementById("bidpriceforcart").value = eval(xhrhttp.responseText * (qty + 1));


                }
            };
            xhrhttp.open("GET", "ajax/getbidprice.php?productid=" + proid, true);
            xhrhttp.send(null);
        }

        function inputMinusBid() {
            const qty = parseInt(document.getElementById("inputqty").value);
            if (qty > 1) {
                var proid = document.getElementById("productid").value;

                var xhrhttp = new XMLHttpRequest();
                xhrhttp.onreadystatechange = function() {
                    if (xhrhttp.readyState == 4 && xhrhttp.status == 200) {
                        document.getElementById("bidprice").innerHTML = eval(xhrhttp.responseText * (qty - 1));

                        document.getElementById("bidpriceforcart").value = eval(xhrhttp.responseText * (qty - 1));


                    }
                };

                xhrhttp.open("GET", "ajax/getbidprice.php?productid=" + proid, true);
                xhrhttp.send(null);

            }
        }
    </script>


    <!--NEW ARRIVAL-------------------------------->
    <section class="new-arrival my-4">

        <!--heading-------->
        <div class="arrival-heading">
            <strong> You may also like</strong>
            <p> We Provide You New Fasion Design Clothes</p>
        </div>

        <!--products----------------------->
        <div class="product-container">
            <?php
            include 'dbconnect.php';
            //  Turn off error  reporting
            error_reporting(0);

            $sql = "SELECT * FROM `newproducts` where pro_id between 9 and 12";
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

    <?php include 'basic/footer.php'; ?>


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