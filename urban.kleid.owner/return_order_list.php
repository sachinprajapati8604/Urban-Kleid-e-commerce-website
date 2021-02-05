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
        <th scope="col">Address</th>
        <th scope="col">Order Date</th>
        <th scope="col">Replace/Return Date</th>
        <th scope="col">Replace/Return ID </th>
        <th scope="col">Request for </th>
        <th scope="col">Amount</th>
        <th scope="col">Action</th>
       
      </tr>
    </thead>
<?php
include 'dbconnect.php';


                     
$sql = "SELECT * FROM `transcations` where trans_return_status='yes'  ORDER BY `trans_return_created` DESC ";
$result = mysqli_query($conn, $sql);                    
$rowcount=mysqli_num_rows($result);

echo '<h1 class="text-left mb-4">Total '.$rowcount.' return request found</h1>';
$i=0;
while ($row = mysqli_fetch_assoc($result)) {
    $i++;
    $txnid=$row['trans_id'];
    $fullname=$row['trans_cust_name'];
    $email=$row['trans_cust_email'];
    $productinfo=$row['trans_prod_info'];
    $img=$row['trans_image'];
    $amount=$row['trans_amount'];
    $address=$row['trans_address'];
    $order_date=$row['trans_created'];
    $return_date=$row['trans_return_created'];
    $return_replace=$row['trans_return_replace'];

  
   //$new_date = date("d-M-Y",strtotime($created));
   
    echo '
    <tbody>
      <tr>
        <th scope="row">'.$i.'</th>
        <td>'.$fullname.'</td>
        <td>'.$email.'</td>
        <td>'.$address.'</td>
        <td>'.$order_date.'</td>
        <td>'.$return_date.'</td>
        <td>'.$txnid.'</td>
        <td>'.$return_replace.'</td>
        <td>Rs. '.$amount.'</td>
      
        <td> <a href="approve_refund.php?returnid='.$txnid.'" type="button" class="btn btn-danger">Approve</a></td>
      
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