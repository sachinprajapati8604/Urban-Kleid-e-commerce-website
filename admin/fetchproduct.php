<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="alert alert-info" role="alert">
        Add More Products
        <a href="addproduct.php" class="btn btn-success"> Add Product</a>
    </div>

<!-- ----adding row for product display---------------- -->

    <div class="container my-3 ">
                  <div class="row">
                    
    <?php

  include 'dbconnect.php';
  // Turn off error reporting
  //  error_reporting(0);

  $sql = "SELECT * FROM `products` ORDER BY imageId DESC";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['imageId'];
    $title = $row['p_title'];
    $price = $row['p_price'];
    $bidprice = $row['p_bidprice'];
    $imagetype = $row['imageType'];
    $imagedata = $row['imageData'];
    $image_name=$row['img_name'];  //this is the name of file

    $time=strtotime($row['created']);   //this is a time from database
    $TodayDate=strtotime(date('Y-m-d H:i:s'));  //Today date by date function
    $dateDiff=($TodayDate-$time)/86400;      //taking date difference then converting into days by dividing 86400.


    echo ' 
           <div class="col-md-4 my-2">
                          <div class="card mx-auto" style="width: 18rem;">
                          <img height="300px" src="uploaded images/'.$image_name. '" class="card-img-top catimg" alt="...">
                              <div class="card-body">
                              <p class="card-text">Product 👉#' . $id . ' </p>
                                  <h5 class="card-title">' . $title . '</h5>
								  <p class="card-text">price  &#8377;  ' . $price . ' </p>
								  <p> Bid price <s> &#8377; ' . $bidprice . '</s></br>
                  
    
                              </div>
                          </div>
                      </div>
                      ';
  }
  ?>
  </div></div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>