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

    <!-- sweetalert -->
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

</head>

<body>

    <?php include 'basic/header.php'; ?>


    <?php


    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  //      echo "Welcome to the Checkout Page of Urban Kleid, " . $_SESSION['username'] . "!";

        include 'dbconnect.php';
        //  Turn off error  reporting
        //      error_reporting(0);
        session_start(); 
       $id= $_SESSION["id"];

        $sql = "SELECT * FROM users where id=$id";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            session_start();
            $_SESSION['id']=$id;
            $mobile = $row['mob_no'];
            $address = $row['address'];
            $city = $row['city'];
            $postalcode = $row['postal_code'];
            $state = $row['state'];
            $country = $row['country'];

            $fullname = $row['fullname'];
            $email = $row['username'];

            echo '  <div class="container mt-4">
            <form action="update_data.php" method="POST" name="editForm">
            <header class="Form__Header">
            <h1 class="Form__Title Heading u-h1">Add Your Delivery Address</h1>
            <p class="Form__Legend">Please fill all in the information below:</p>
            </header>
            <div class="form-group row" >
            <label for="name" class="col-sm-2 col-form-label">Name <sup>*</sup></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullname" id="name" value="' . $fullname . '"  readonly>
            </div>
          </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email <sup>*</sup></label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail3" value="' . $email . '"  readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="mobile" class="col-sm-2 col-form-label">Mobile No. <sup>*</sup></label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="mobile" id="mobile" value="' . $mobile . '" required>
              </div>
            </div>
            <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address <sup>*</sup></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="address" value="' . $address . '" required>
            </div>
          </div>
          <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">City <sup>*</sup></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="city" value="' . $city . '" required>
          </div>
        </div>
        <div class="form-group row">
        <label for="mobile" class="col-sm-2 col-form-label">Postal Code <sup>*</sup></label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="mobile" name="postalcode" value="' . $postalcode . '" required>
        </div>
      </div>
      <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">State <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="state" value="' . $state . '" required>
      </div>
    </div>
      <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Country <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="country" value="' . $country . '" required>
      </div>
    </div>
           
            <div class="form-group btn-group row">
              <div class="col-sm-12">
              <button type="button" class="btn Button-Login Accbutton" id="btnsubmit"  onclick="SubmitForm()">Save Changes</button>
              <script>
              function SubmitForm()
              {
              document.editForm.submit();
              document.editForm.reset();

              }
          </script>   
              
              </div>
            </div>
          </form>                   
        </div> 
        ';
        }
    } else {
      
        // echo "<script>
        // alert('You must be logged in ');
        // window.location.href='loginhandle.php';
        //     </script>
        //     ";  
            echo '
            <script>
          swal({
            title: "You must be logged in",
            icon: "warning",
        }).then(function() {
            window.location = "loginhandle.php";
        }); </script>';
    }


    ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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