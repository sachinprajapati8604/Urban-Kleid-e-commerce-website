<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <style>
body {

    color: #6610f2;
   
    
}
</style>

</head>

<body>


<?php
$showalert=false;
include("dbconnect.php");
 
 // creating variable to get data

$email=$_POST['email'];
$pass=$_POST['pass'];

if($email=='' && $pass =='')
{
    
 //   header("Location: addproduct.php"); /* Redirect browser */
   
}
$adminemail='admin123@gmail.com';
$adminpass='1234';
if($email=$adminemail && $pass==$adminpass)
{
    header("Location:addproduct.php"); /* Redirect browser */
  
}
else{
    echo'Invalid login';
}
       
?>
 

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>


