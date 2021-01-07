<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<link rel="shortcut icon" href="img/Transparent.png"/>
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
    <div class="container mt-4">
        <h2 class="display-4 carttitle"> Your  cart have  <?php echo $count;  ?> Items </h2>
        <hr />
        <div class="card" style="max-width: 800px;">
            <div class="row">
            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $sr = $key + 1;
                                    $total = $total + $value['price'];

                                    $image=$value['image'];
                                    //  print_r($value);
                                    echo '
                                    <div class="col-sm-6 cartimg">
                                    <img class="card-img" src="img/'.$image.'" alt="Product Image">
                                </div>
                                <div class="col-sm-6 my-2">
                                    <div class="card-body cartbody">
                                        <small>Product : '.$sr.'</small> <br>
                                        <small>Product ID: '.$value['proid'].'</small>
                                        <h5 class="card-title">Product Name : '.$value["item_name"].'</h5>
                                        <small>Color : Red </small> <br>
                                        <small>Size : M </small> <br>
                                        <a href="#" class="price">&#8377; '. $value["price"].'  <s class="text-muted">'.$value['bidprice'].'</s></a>
                                       
                                        <br>
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
                                        
                                        <form class="text-right" action="manage_cart.php" method="POST">
                                        <button class="btn " name="remove_item"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>                                   
                                        <input type="hidden" name="proid" value='.$value["proid"].'>
                                        </form>
                                      
                                    </div>
                                </div>
                                
                           ';
                                }
                            }

                            ?>       
            </div>
            
            <div class="col-8 mb-4  my-4">
                    <h3>Total : </h3>
                    <h3 class="h5"> <span><i class="fa fa-rupee"></i></span> <b class="h5">  <?php echo  $total  ?> </b></h3>
                    <form action="" class="">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label ml-4" for="flexRadioDefault1">
                                Cash On Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label ml-4" for="flexRadioDefault2">
                                Pay Online
                            </label>
                        </div>
                        <button class="btn Button-Login">Buy It Now</button>
                    </form>
                </div>
        </div>
    </div>


   <?php include 'basic/footer.php';  ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
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