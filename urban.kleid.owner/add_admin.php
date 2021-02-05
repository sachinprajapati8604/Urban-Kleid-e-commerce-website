
<?php

// Include config file
require_once "dbconnect.php";
 
// Define variables and initialize with empty values
$fullname=$username =$mobile = $password = $confirm_password = "";
$fullname_err=$username_err=$mobile_err = $password_err = $confirm_password_err = "";
 

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

      // Validate fullname
      if(empty(trim($_POST["fullname"]))){
        $username_err = "Please enter a username.";
    } else{
    
            // Set parameters
            $fullname = trim($_POST["fullname"]);

        }
    
        
     // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM admin WHERE admin_email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This user  Already exist try another one.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

      // Validate mobile
      if(empty(trim($_POST["mobile"]))){
        $mobile_err = "Please enter 10 digit mobile number.";     
    } elseif(strlen(trim($_POST["mobile"])) < 10){
        $mobile_err = "please enter your 10 digit mobile number.";
    } else{
        $mobile = trim($_POST["mobile"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($fullname_err) && empty($username_err) &&empty($mobile_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO admin (admin_name,admin_email,admin_mob,admin_pass) VALUES (?,?,?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss",$param_fullname, $param_username,$param_mobile, $param_password);
            
            // Set parameters
            $param_fullname=$fullname;
            $param_username = $username;
            $param_mobile = $mobile;
          //  $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_password=$password;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to loginhandle page

                echo '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                
                <script>
              swal({
                title: "Admin added successfully",
                icon: "success"
            }).then(function() {
                window.location = "home.php";
            }); </script>';
              
                
             //   header("location: home.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="IE-edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, intial-scale=1.0" name="viewport">
<title>URBAN KLEID</title>

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
 <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'basic/navbar.php'; ?>


<div class="container mt-4 " style="max-width: 600px;" >
<div class="wrapper mx-auto shadow p-3 mb-5 bg-white rounded">
<header class="Form__Header">
          <h1 class="Form__Title Heading u-h1">Register as a Admin</h1>
          <p class="Form__Legend">Please fill in the information below:</p>
        </header>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
               
                <input placeholder="Full Name" type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                <span class="help-block"><?php echo $fullname_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              
                <input placeholder="Gmail" type="gmail" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
              
              <input placeholder="Mobile Number" type="number" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
              <span class="help-block"><?php echo $mobile_err; ?></span>
          </div> 
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              
                <input placeholder="Password" type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

                <input placeholder="Confirm Password" type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Add Admin" >
                <!-- <input type="reset" class="btn btn-default Button-Login" value="Reset"> -->
            </div>
            <p class="Form_hint">Click here to  <a href="home.php">Go Back</a></p>
        </form>
    </div>    
</div>
  


<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <!--Get your own code at fontawesome.com-->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
</body>
 </html>