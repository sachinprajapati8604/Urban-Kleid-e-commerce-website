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
session_start();
// session_destroy();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(isset($_POST['add_to_cart'])){
        if(isset($_SESSION['cart'])){
            //checkimg existing item
            $myitems=array_column($_SESSION['cart'],'proid');  
            if(in_array($_POST['proid'],$myitems)){
                echo "<script>
                alert('Item already added to cart');
                window.location.href='products.php';
                     </script>";
            }
else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('proid'=>$_POST['proid'],'image'=>$_POST['image'],'item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'bidprice'=>$_POST['bidprice'],'quantity'=>1);
       //     print_r($_SESSION['cart']);
                echo "<script>
                alert('Item  added to cart');
                window.location.href='products.php';
                        </script>";
}
        }
        else{
                $_SESSION['cart'][0]=array('proid'=>$_POST['proid'], 'image'=>$_POST['image'],'item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'bidprice'=>$_POST['bidprice'],'quantity'=>1);
            //    print_r($_SESSION['cart']);
                    echo "<script>
                    alert('Item  added to cart');
                    window.location.href='products.php';
                        </script>";
        }
    }
    
    if(isset($_POST['remove_item'])){
        foreach($_SESSION['cart'] as $key=> $value){
            if($value['proid']==$_POST['proid']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('Item  removed from cart');
                window.location.href='cart.php';
                    </script>";

            }
        }
    }
}
?>





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