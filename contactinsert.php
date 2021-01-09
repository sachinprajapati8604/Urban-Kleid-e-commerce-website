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
</head>
<body>


<?php
// including function file of connection which is stored as Connection.php in same folder

include 'dbconnect.php';
include 'basic/header.php';
 
 // creating variable to get data
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];


$query="INSERT INTO `contactus`(`cu_name`, `cu_email`, `cu_subject`,`cu_message`, `cu_created`) VALUES ('$name','$email','$subject','$message',current_timestamp())";

$data=mysqli_query($conn,$query);

if($data)
{
    // sending mail to user
	$to_email = $email;
	$subject = "Urban Kleid Team";
	$body = "Hello Mr.  $name \n We have recieved your request , our team will responce you soon. \n\n\n Team \n Urban Kleid";
	$headers = "From: Urban Kleid";

	if (mail($to_email, $subject, $body, $headers)) {
    echo '<div class="container alertbox mt-4">
    <div class="alert " role="alert">
        <h4 class="alert-heading">Thank you !' .$name .'</h4>
        <p> Your request has been recorded successfully , our team will response you soon.</p>
		<hr>  
		<p> you will recieve mail of your request at '.$to_email.' </p>
        <a class="btn  backbtn" href="index.php" role="button">RETURN TO HOME</a></div>
     
	</div>';
	} else {
    echo "Email sending failed...";
	}

	
}
else
{
	echo "<br>"."<br>"."<br>";
	
	echo "Something went wrong ...please try again later";
}

?>
<br> <br> <br> <br> 
<?php  include 'basic/footer.php'; ?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

