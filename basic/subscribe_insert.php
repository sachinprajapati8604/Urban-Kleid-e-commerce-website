<?php
 include '../dbconnect.php';

 $email=$_POST['email'];

if($email !=""){
  $sql2 = "select * from subscriber where sub_gmail='$email'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_num_rows($result2);

   
$sql="INSERT INTO `subscriber`(`sub_gmail`, `created`) VALUES ('$email',current_timestamp())";
if($row2==0){
$result=mysqli_query($conn,$sql);
if($result){
  // sending mail to user
	$to_email = $email;
  $subject = "Urban Kleid Team";
  $htmlContent = '
<html>
<body>
    <h2 style="color:green;">Hello sir  '.$email.'   </h2>
    <p>You have subscibed our News Letter .</p>
    '.$detailformail.'
    <h4>Thank you </h4>
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
          }else {
            echo "Email sending failed...";
          }


	
  echo "<script>
  alert(' You have successfully subscibed our News Letter ');
  
  window.location.href='../index.php';
      </script>" ;
}
else{
  echo 'something went  wrong';
}
}else{
 echo "<script>
  alert(' You have already subscibed our News Letter ');
  
  window.location.href='../index.php';
      </script>" ;
}
 
 
}
 
else{
  echo 'please enter your valid gmail id';
   
}
exit();
?>
 