<?php
include '../dbconnect.php';
$id = $_GET['productid'];
  
    $sql = "SELECT pro_price FROM `tshirt` WHERE pro_id=$id
                    UNION SELECT pro_price FROM newproducts WHERE pro_id=$id
                    UNION SELECT pro_price FROM hoodies WHERE pro_id=$id
                    UNION SELECT pro_price FROM sweatshirts WHERE pro_id=$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $price = $row['pro_price'];

    }
    echo $price;

?>