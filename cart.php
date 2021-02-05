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
    <link rel="stylesheet" href="css/addtocart.css">

</head>

<body>

    <?php include 'basic/header.php'; ?>

    <?php


    //the php code for remove item from cart

    // session_start();
    // session_destroy();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['remove_item'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['proid'] == $_POST['proid']) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo '<div class="container">
                <div class="alert alert-secondary" id="success-alert">
                   <button type="button" class="close" data-dismiss="alert">x</button>
                   <p> Product removed from cart </p>
                </div>
                </div>
                <meta http-equiv="refresh" content="0" />
                ';
                }
            }
        }
    }
    ?>

    <div class="container  mt-4">
        <h2 class="display-4 text-center carttitle"> Your cart have <?php echo $count;  ?> Items </h2>
        <hr />
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="row">
                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $sr = $key + 1;
                        $total = $total + $value['price'];

                        session_start();
                       
                        $_SESSION["product_info"] = $value["item_name"];
                        $_SESSION["size"] = $value["size"];
                        $_SESSION["quantity"] = $value["quantity"];

                        $image = $value['image'];
                        $_SESSION['image'] = $image;

                        $bidprice = $value['bidprice'];
                        //  print_r($value);
                        $percentage = (($value["bidprice"] - $value["price"]) / $value["bidprice"]) * 100;
                        $roundper = round($percentage);
                        $perunit = $value['price'] / $value['quantity'];
                        echo '
                                    <div class="col-sm-6 cartcolumn cartimg ">
                                    <img class="card-img" src="img/' . $image . '" alt="Product Image">
                                </div>
                                <div class="col-sm-6 cartcolumn my-2 cartbody">                                  
                                        <small>Product : ' . $sr . '</small> <br>
                                    
                                        <h5 class="mb-1">Product Name : ' . $value["item_name"] . '</h5>
                                       
                                        <p class="mb-1">Size :<b> ' . $value['size'] . ' </b></p> 
                                        <p  class="price mb-1">&#8377; ' . $value["price"] . '   <s class="text-muted" id="bidprice">' . $value['bidprice'] .  '</s> <small class="percentage"> (' . $roundper . '% off)</small></p>
                                       
                                        <p class="mb-1">Qty : <b>' . $value['quantity'] . '</b></p>
                                        <form class="text-right" action="" method="POST">
                                        <button  class="btn " name="remove_item"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>                                   
                                        <input type="hidden" name="proid" value=' . $value["proid"] . '>
                                        </form>
                                      
                                    </div>              
                                
                           ';
                    }
                }

                ?>
            </div>

            <div class="col-12 mb-4  my-4">

                <h3 class="h3">Total : <span><i class="fa fa-rupee"></i></span> <b class="h5"> <?php echo  $total  ?> </b></h3> <br>

                <form class="form-inline" method="POST" action="">
                    <div class="form-group mx-sm-3 mb-2">
                       <label for="text " class="mr-4">USE CODE</label>
                        <input type="text" name="couponcode" class="form-control" id="text" placeholder="e.g.    <?php echo         $_SESSION['title12'] ?>">
                    </div>
                    <button  type="submit" name="apply_code" class="btn btn-success mb-2 btn-sm">APPLY </button>
                </form>

                <?php
                 if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['apply_code']) && $total>0){

                $usercode=$_POST['couponcode'];
                require_once 'dbconnect.php';
                $sql = "SELECT * FROM `index_page` where index_id='12'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  $id = $row['index_id'];
                  $discount = $row['index_img'];
                  $webcode = $row['index_title'];
                  $detail = $row['index_desc'];

                }                
               
                 if($usercode==$webcode){
                 $saved=round($total*($discount)/100);
                  $total=$total-$saved;
                  
                   $_SESSION['total'] = $total;
                echo'  <h5 class="couponcode">Wohoo !!! Coupon code applied successfully</h>
                 <h3 class="h3">Payable Amount : <span><i class="fa fa-rupee"></i></span> <b class="h5"> '.$total.' </b></h3>  <h5>You are saving Rs.'.$saved.'<h5></br>';
                 }
                 else{
                     echo '<h5 class="alert alert-warning">Invalid Code</h5> </br>';
                     $total=$total;
                     $_SESSION['total'] = $total;
                 }
                }
            } else{
                $total=$total;
                $_SESSION['total'] = $total;
            }
                ?>

                    <?php

                    session_start();
                    if ($total > 0) {
                        echo' <form action="" class="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="Codcheck()">
                            <label class="form-check-label ml-4" for="flexRadioDefault1">
                                Cash On Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label ml-4" for="flexRadioDefault2">
                                Pay Online
                            </label>
                        </div>';
                        echo '
                        <form action="checkout.php" method="POST">
                        <div class="btn-group mt-2">
                            <a href="edit_detail.php' . $id . '" type="submit" name="buy_it_now" class="btn Button-Cart productbtnmobile mr-2">Buy  now </a>
                            <a href="products.php" type="submit"  class="btn Button-Cart productbtnmobile ml-2">Add more</a>
                        </div>
                        </form>';
                    } else {
                        echo '<br> <p class="lead">Kindly add to cart atleast one product.</p>
    <a href="products.php" class="btn Button-Cart productbtnmobile ml-2">Shop Now</a>';
                    }


                    ?>
                </form>
            </div>
        </div>
    </div>

    <script>
function Codcheck() {
    swal("Sorry!", "...cash on delivery is not availabe for your area !");
}
</script>

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