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
  <!--fav-icon---------------->
  <link rel="shortcut icon" href="../img/Transparent.png" />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/mystyle.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/login-signup.css">
  <link rel="stylesheet" href="../css/contactus.css">
  <link rel="stylesheet" href="../css/product.css">
  <link rel="stylesheet" href="../css/productdetail.css">

</head>

<body onload="submitPayuForm()">



  <?php

  include 'dbconnect.php';
  error_reporting(0);


  $status = $_POST["status"];
  $firstname = $_POST["firstname"];
  $amount = $_POST["amount"];
  $txnid = $_POST["txnid"];
  $posted_hash = $_POST["hash"];
  $key = $_POST["key"];
  $productinfo = $_POST["productinfo"];
  $email = $_POST["email"];
  $image = $_POST['udf1'];
  $myaddress = $_POST['udf2'];
  $salt = "";



  //fetching data by using email
  $sql2 = "SELECT * FROM `users` WHERE username='$email'";
  $result = mysqli_query($conn, $sql2);
  if ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $address = $row['address'];
    $city = $row['city'];
    $postalcode = $row['postal_code'];
    $state = $row['state'];
    $country = $row['country'];

    $fulladdress = $address . ', ' . $city . ', ' .  $state . ', ' .  $country . ', ' .  $postalcode;

    //store variable in session 
    session_start();
    $_SESSION["id"] = $id;
    $_SESSION['fulladress'] = $fulladdress;
    $_SESSION['txnid'] = $txnid;
  }

  $tableprint = '<div class="container mt-4">
  <table class="table table-bordered">
    <thead>
      <tr>
      <header class="Form__Header">
      <h1 class="Form__Title Heading u-h1">Transaction Details</h1>       
      </header>
      <h3 class="text-center">Congratualtions ! Your order successfully done .</h3>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Transcation Id </th>
        <td>' . $txnid . '</td>

      </tr>
      <tr>
        <th scope="row">Order Status</th>
        <td>' . $status . '</td>

      </tr>
      <tr>
      <th scope="row">Order Date</th>
      <td>' . date("Y-m-d") . '</td>

    </tr>
      <tr>
        <th scope="row">Cutomer Name</th>
        <td>' . $firstname . '</td>

      </tr>

    <tr>
    <th scope="row">Email</th>
    <td>' . $email . '</td>

  </tr>
  <tr>
  <th scope="row">Address</th>
  <td>' . $fulladdress . '</td>

</tr>
      <tr>
      <th scope="row">Product </th>
      <td>' . $_POST["productinfo"] . '</td>

    </tr>
   
      <tr>
        <th scope="row">Amount</th>
        <td>' . $amount . '</td>

      </tr>
     
    </tbody>
  </table>

  <h4>We have received a payment of Rs. ' . $amount . '. Your order will  be shipped soon.</h4>
 
  <div class="btn-group mt-2">
  <a href="../index.php"  class="btn Button-Cart productbtnmobile ml-2">Return to Home </a>
  <a href="invoice.php"  class="btn Button-Cart productbtnmobile ml-2">Download  receipt </a>

  </div>

</div>';



  //escaping products info like apostrophe(')
  $productinfo = mysqli_real_escape_string($conn, $productinfo);
  if ($txnid != "") {
    $sql3 = "select * from transcations where trans_id='$txnid'";
    $result = mysqli_query($conn, $sql3);
    $row3 = mysqli_num_rows($result);

    $sql = "INSERT INTO `transcations`(`trans_id`,`trans_userid`,`trans_cust_name`, `trans_cust_email`, `trans_prod_info`,`trans_image`,`trans_amount`, `trans_status`,`trans_address`, `trans_created`) VALUES ('$txnid','$id','$firstname','$email','$productinfo','$image','$amount','$status','$myaddress',current_timestamp())";
    if ($row3 == 0) {
      if (mysqli_query($conn, $sql)) {
        // Salt should be same Post Request 

        if (isset($_POST["additionalCharges"])) {
          $additionalCharges = $_POST["additionalCharges"];
          $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {
          $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
        $hash = hash("sha512", $retHashSeq);
        if ($hash == $posted_hash) {
          echo "<h1>Invalid Transaction. Please try again</h1>";
        } else {


          //sending mail to user

          $to_email = $email;
          $subject = "Urban Kleid Team";

          // $body = "Hello Mr.  $firstname \n We have recieved your order .\n Transaction ID : $txnid \n Product Details : $productinfo \n Order amount :$amount \n\n,  order will be reach to you soon.
          // \n\n Thank you for shopping with us </strong> \n\n\n Team \n Urban Kleid";



          $htmlContent = '
          <!DOCTYPE html>
          <html>
          <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <style>
          #transtable {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
          }
          
          #transtable td, #transtable th {
            border: 1px solid #ddd;
            padding: 8px;
          }
          
          #transtable tr:nth-child(even){background-color: #f2f2f2;}
          
          #transtable tr:hover {background-color: #ddd;}
          
          #transtable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
          }
          #transtable td{
              font-weight: bold;
          }
          .heading{
              padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
          }
          </style>
          </head>
          <body>
    <h3 style="color:green;">Congratulation ' . $firstname . '</h3>
    <p>Your order has been successfully placed.</p>
    <h1 class="heading">Transaction Details</h1>

    <table id="transtable">
      <tr>
      <td scope="row">Transcation Id </td>
      <td>' . $txnid . '</td>
      
    </tr>
      <tr>
        <td>Order Status</td>
        <td>' . $status . '</td>
        
      </tr>
      <tr>
      <td scope="row">Order Date</td>
      <td>' . date("Y-m-d") . '</td>
        
      </tr>
      <tr>
      <td scope="row">Cutomer Name</td>
      <td>' . $firstname . '</td>
       
      </tr>
      <tr>
      <td scope="row">Email</td>
    <td>' . $email . '</td>
       
      </tr>
      <tr>
    <td scope="row">Address</td>
    <td>' . $fulladdress . '</td>
    
    </tr>
      <tr>
      <td scope="row">Product </td>
      <td>' . $_POST["productinfo"] . '</td>
    
    </tr>
    
      <tr>
        <td scope="row">Amount</td>
        <td>' . $amount . '</td>
    
      </tr>
    
      
    </table>

<h4>We have received a payment of Rs. ' . $amount . '. Your order will  be shipped soon.</h4>

    <h5>Thank You</h5>
     <i>Urban Kleid</i>  
     
   
</body>
</html>';



          // Set content-type header for sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          // Additional headers
          // $headers .= 'From: sachinp8604@gmail.com.com>' . "\r\n";
          //$headers .= 'Cc: welcome@example.com' . "\r\n";
          $headers .= 'Bcc: sachinp8604@gmail.com' . "\r\n";


          // Send email
          if (mail($to_email, $subject, $htmlContent, $headers)) {
            echo 'Email has sent  successfully.';
          }


          echo $tableprint;
          //  header('Location:'.$_SERVER['PHP_SELF']);
        }
      } else {
        echo 'something went wrong \n';
        //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo $tableprint;
    }
  } else {
    echo '<h1 class="text-center">You can not enter this page without payment ,Now you have to login again ,  then go  to product and  simply buy it.</h1>';
    echo "<script>
        alert('You can not enter this page without payment ,Now you have to login again ,  then go  to product and  simply buy it. ');
        window.location.href='../products.php';
            </script>";
  }

  ?>

  <!-- redireting to another page after 2 minutes -->
  <script>
    setTimeout(function() {
      window.location.href = '../index.php';
    }, 1000 * 60 * 2);
  </script>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <!--Get your own code at fontawesome.com-->
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

  <!--using JQuery--------------->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="../js/jquery.js"></script>
  <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</body>

</html>