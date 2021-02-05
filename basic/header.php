<?php
session_start();
// print_r($_SESSION['cart']);
?>
<?php
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

?>
<?php
require_once 'dbconnect.php';
$sql = "SELECT * FROM `index_page` where index_id='12'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $id = $row['index_id'];
  $img = $row['index_img'];
  $title = $row['index_title'];
  $detail = $row['index_desc'];
  echo '<div class="alert   alert-dismissible fade show m-0 text-center codealert" role="alert">
  '.$detail.' <strong>'.$title.' </strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

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
               
                <li class="nav-item dropdown">
      <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            COLLECTIONS
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="tshirt.php">T-shirts</a>
        <a class="dropdown-item" href="sweatshirts.php">Sweatshirts </a>
        <a class="dropdown-item" href="hoodies.php">Hoodies </a>

    </li>
            <li><a href="about.php">About Us</a>
            </li>

            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="javascript:void(0);" class="search">
                <i class="fas fa-search"></i>
            </a>
            <a href="loginhandle.php" class="user">
                <i class="far fa-user"></i>
            </a>
            <?php

            $count = 0;
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
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
<form method="get" action="search.php?">
    <div class="search-bar">

        <!--search-input------->
        <div class="search-input">

            <input type="text" placeholder="Search " name="query" />

            <!--cancel-btn--->
            <a href="javascript:void(0);" class="search-cancel">
                <i class="fas fa-times"></i>
            </a>

        </div>
    </div>
</form>
<hr class="line">