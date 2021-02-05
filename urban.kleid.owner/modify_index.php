<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>URBAN KLEID</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    session_start();
    // Check if the user is logged in, if not then redirect him to loginhandle page
    if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
        header("location: index.php");
        exit;
    }
    ?>

    <?php include 'basic/navbar.php'; ?>

    <div class="container my-3 ">
        <div class="row">
            <h2>Update your Carousel
                Content</h2>
            <?php
            include 'dbconnect.php';

            $sql = "SELECT * FROM `index_page`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['index_id'];
                $img = $row['index_img'];
                $title = $row['index_title'];
                $desc = $row['index_desc'];
                $created = $row['index_created'];

                if($id==12){
                    echo '<div class="alert alert-dark  m-0 text-center" role="alert">
                   '.$desc.' <strong>'.$title.'</strong> 
                   <button type="button" class="close"  >
                      
                   </button>
                   <a href="update_coupon_code.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
               </div>';
                }

                if ($id == 1 || $id == 2) {
                    echo ' 
                <div class="col-md-6 my-2 card-deck">
                <div class="card mx-auto"  min-height:500px">
                    <img height="300px" src="../img/' . $img . '" class="card-img-top catimg" alt="...">
                    <div class="card-body">
                        <p class="card-text">Carousel
                            Image👉#' . $id . ' </p>
                        <h5 class="card-title">' . $title . '</h5>
                        <p class="card-title">' . $desc . '</p>
                      
                        <div class="text-center" role="group" aria-label="Basic example">
                            <a href="update_index.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
                           
                        </div>
                    </div>
            
                </div>
            </div>
             ';
                }


                if ($id == 3) {
                    echo '<h2 class="mt-4">Update your  Banner 1</h2>';
                    echo ' 
                    <div class="col-md-12 my-2 card-deck">
                    <div class="card mx-auto"  min-height:500px">
                        <img height="300px" src="../img/' . $img . '" class="card-img-top catimg" alt="...">
                        <div class="card-body">
                            <p class="card-text">Banner  👉#1 </p>
                            <h4 class="card-title">' . $title . '</h4>
                            <h5 class="card-title">' . $desc . '</h5>
                          <div class="text-center" role="group" aria-label="Basic example">
                                <a href="update_index.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
                              
                            </div>
                        </div>
                
                    </div>
                </div>
                 ';
                }

                if ($id == 4 || $id == 5) {

                    echo ' 
                    
                <div class="col-md-6 my-2 card-deck">
                <h2 class="mt-4">Update your two Image section</h2>
                <div class="card mx-auto"  min-height:500px">
                    <img height="300px" src="../img/' . $img . '" class="card-img-top catimg" alt="...">
                    <div class="card-body">
                        <p class="card-text">content  👉#' . $id . ' </p>
                        <h5 class="card-title">' . $title . '</h5>
                        <p class="card-title">' . $desc . '</p>
                      
                        <div class="text-center" role="group" aria-label="Basic example">
                            <a href="update_index.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
                            
                        </div>
                    </div>
            
                </div>
            </div>
             ';
                }
                if ($id == 6) {

                    echo ' 
                
            <div class="col-md-12 my-2 card-deck">
            <h2 class="mt-4">Update your one image text section </h2>
            <div class="card mx-auto"  min-height:500px">
                <img height="300px" src="../img/' . $img . '" class="card-img-top catimg" alt="...">
                <div class="card-body">
                    <p class="card-text">Content  👉#' . $id . ' </p>
                    <h5 class="card-title">' . $title . '</h5>
                    <p class="card-title">' . $desc . '</p>
                  
                    <div class="text-center" role="group" aria-label="Basic example">
                        <a href="update_index.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
        
                    </div>
                </div>
        
            </div>
        </div>
         ';
                }
                if ($id == 7 || $id == 8 || $id == 9) {

                    echo ' 
                
            <div class="col-md-4 my-2 card-deck">
            <h2 class="mt-4">Update your 3 Image section </h2>
            <div class="card mx-auto"  min-height:500px">
                <img height="300px" src="../img/' . $img . '" class="card-img-top catimg" alt="...">
                <div class="card-body">
                    <p class="card-text">Content  👉#' . $id . ' </p>
                    <h5 class="card-title">' . $title . '</h5>
                    <p class="card-title">' . $desc . '</p>
                  
                    <div class="text-center" role="group" aria-label="Basic example">
                        <a href="update_index.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
        
                    </div>
                </div>
        
            </div>
        </div>
         ';
                }
                if ($id == 10) {
                    $id1 = $id;
                    $topprotitle = $title;
                    $topprodesc = $desc;
                }
                if ($id == 11) {
                    $id2 = $id;
                    $topprotitle2 = $title;
                    $topprodesc2 = $desc;
                }
            }
            ?>

        </div>
    </div>


    <div class="container my-3 ">
        <div class="row">
            <div class="heading">
                <?php echo ' <h3 > ' . $topprotitle . '</h3>
                  <h5 > ' . $topprodesc . '</h5>
                  <a href="update_title.php?proid=' . $id1 . '" type="button" class="btn btn-outline-success ">Update Title </a>'
                ?>
            </div>

            <?php

            include 'dbconnect.php';
            // Turn off error reporting
            //  error_reporting(0);

            $sql = "SELECT * FROM `newproducts` where pro_id between 1 and 4";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['pro_id'];
                $title = $row['pro_name'];
                $detail = $row['pro_shortdetail'];
                $price = $row['pro_price'];
                $bidprice = $row['pro_bid_price'];

                $image_name = $row['pro_imagename'];  //this is the name of file

                $time = strtotime($row['created']);   //this is a time from database
                $TodayDate = strtotime(date('Y-m-d H:i:s'));  //Today date by date function
                $dateDiff = ($TodayDate - $time) / 86400;      //taking date difference then converting into days by dividing 86400.


                echo ' 
           <div class="col-md-3 my-2 card-deck">
                          <div class="card mx-auto" style="width: 18rem; min-height:500px">
                          <img height="300px" src="../img/' . $image_name . '" class="card-img-top catimg" alt="...">
                              <div class="card-body">
                              <p class="card-text">Product ID 👉#' . $id . ' </p>
                                  <h5 class="card-title">' . $title . '</h5>
                                  <p class="card-title">' . $detail . '</p>
								  <p class="card-text">Price  &#8377;  ' . $price . ' <s> &#8377; ' . $bidprice . '</s></p>
								   
                  <div class="text-center" role="group" aria-label="Basic example">
                  <a href="update_newtop_prod.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
                  
                 
                </div>
                              </div>
                    
                          </div>
                      </div>
                      ';
            }
            ?>

        </div>
    </div>


    <div class="container my-3 ">
        <div class="row">
            <div class="heading">
                <?php echo ' <h3 > ' . $topprotitle2 . '</h3>
                  <h5 > ' . $topprodesc2 . '</h5>
                  <a href="update_title.php?proid=' . $id2 . '" type="button" class="btn btn-outline-success ">Update Title </a>'
                ?>
            </div>
            <?php

            include 'dbconnect.php';
            // Turn off error reporting
            //  error_reporting(0);

            $sql = "SELECT * FROM `newproducts` where pro_id between 5 and 8";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['pro_id'];
                $title = $row['pro_name'];
                $detail = $row['pro_shortdetail'];
                $price = $row['pro_price'];
                $bidprice = $row['pro_bid_price'];

                $image_name = $row['pro_imagename'];  //this is the name of file

                $time = strtotime($row['created']);   //this is a time from database
                $TodayDate = strtotime(date('Y-m-d H:i:s'));  //Today date by date function
                $dateDiff = ($TodayDate - $time) / 86400;      //taking date difference then converting into days by dividing 86400.


                echo ' 
           <div class="col-md-3 my-2 card-deck">
                          <div class="card mx-auto" style="width: 18rem; min-height:500px">
                          <img height="300px" src="../img/' . $image_name . '" class="card-img-top catimg" alt="...">
                              <div class="card-body">
                              <p class="card-text">Product ID 👉#' . $id . ' </p>
                                  <h5 class="card-title">' . $title . '</h5>
                                  <p class="card-title">' . $detail . '</p>
								  <p class="card-text">Price  &#8377;  ' . $price . ' <s> &#8377; ' . $bidprice . '</s></p>
								   
                  <div class="text-center" role="group" aria-label="Basic example">
                  <a href="update_newtop_prod.php?proid=' . $id . '" type="button" class="btn btn-outline-success ">Update</a>
                  
                 
                </div>
                              </div>
                    
                          </div>
                      </div>
                      ';
            }
            ?>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <!--Get your own code at fontawesome.com-->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
</body>

</html>