<?php 
 session_start();
 // print_r($_SESSION['cart']);
?>

<nav>
<!--social-links-and-phone-number----------------->
<div class="social-call ">
    <!--social-links--->
    <div class="social">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
    <!--phone-number------>
    <div class="phone">
        <span>Call: +123456789</span>
    </div>
</div>
<!--menu-bar----------------------------------------->
<div class="navigation">
    <!--logo------------>
    <a href="#" class="logo hideformobile"><img src="img/new1.png"></a>
    <!--menu-icon------------->
    <div class="toggle"></div>
    <!--logo------------>
    <a href="#" class="logo hideforlatop"><img src="img/new1.png"></a>
    <!--menu----------------->
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li class="shop"><a href="products.php">Products</a></li>
        <li><a href="about.php">About Us</a>
        </li>

        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <!--right-menu----------->
    <div class="right-menu">
        <a href="javascript:void(0);" class="search">
            <i class="fas fa-search"></i>
        </a>
        <a href="userprofile.php" class="user">
            <i class="far fa-user"></i>
        </a>
                        <?php

        $count=0;
        if(isset($_SESSION['cart']))
        {
            $count=count($_SESSION['cart']);
        }
        ?>
        <a href="cart.php">
            <i class="fas fa-shopping-cart">
                <span class="num-cart-product"><?php echo $count; ?></span>
            </i>
        </a>
    </div>
</div>
</nav>
<!--search-bar----------------------------------->
<div class="search-bar">

<!--search-input------->
<div class="search-input">
    <input type="text" placeholder="Search For Product" name="search" />
    <!--cancel-btn--->
    <a href="javascript:void(0);" class="search-cancel">
        <i class="fas fa-times"></i>
    </a>
</div>
</div>

