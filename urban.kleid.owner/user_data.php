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

<div class="container-fluid table-responsive mt-2">
<table class="table table-bordered align-middle">
    <thead class="table-dark ">
      <tr>
        <th scope="col">Sr.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile No.</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Country</th>
        <th scope="col">Zip Code</th>
        <th scope="col">Creation Date</th>
      </tr>
    </thead>
<?php
include 'dbconnect.php';

// this is sum  of all transaction done  by the all users

// $sql2 = "SELECT SUM(trans_amount) AS value_sum FROM transcations";
// $result2 = mysqli_query($conn, $sql2);                    
// while($row2=mysqli_fetch_assoc($result2)){
//  echo $price=$row2['value_sum'];
// }
                     
$sql = "SELECT * FROM `users`  ORDER BY `id` DESC ";
$result = mysqli_query($conn, $sql);                    
$rowcount=mysqli_num_rows($result);

echo '<h1 class="text-left mb-4">Total '.$rowcount.' users found</h1>';
$i=0;
while ($row = mysqli_fetch_assoc($result)) {
    $i++;
    $name=$row['fullname'];
    $email=$row['username'];
    $mobile=$row['mob_no'];
    $address=$row['address'];
    $city=$row['city'];
    $postalcode=$row['postal_code'];
    $state=$row['state'];
    $country=$row['country'];
    $created=$row['created_at'];

   // $created = "11-Dec-13 8:05:44 AM";
   $new_date = date("d-M-Y",strtotime($created));
   
  
    echo '
    <tbody>
      <tr>
        <th scope="row">'.$i.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$address.'</td>
        <td>'.$city.'</td>
        <td>'.$state.'</td>
        <td>'.$country.'</td>
        <td>'.$postalcode.'</td>
        <td>'.$new_date.'</td>
      </tr>
     
    </tbody>
   ';
   

}





?>
 </table>

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