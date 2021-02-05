<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <title>URBAN KLEID </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'basic/navbar.php'; ?>

    <?php
    include 'dbconnect.php';

    if (($_SERVER["REQUEST_METHOD"] == "POST")) {

        $sql = "SELECT  `sub_gmail`  FROM `subscriber`";

        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $emails = $row['sub_gmail'] . ' ';

            // sending mail to user
            $to_email = $emails;
            $subject = $_POST['title'];
            $htmlContent = '
  <html>
  <body>
      <h2 style="color:green;">Hello sir,  ' . $emails . '   </h2>
      <h3> ' . $_POST['body'] . '</h3>
      <p>Visit our website : <a href="http://aneeshkumar.42web.io" > http://aneeshkumar.42web.io</a>   </p>
      <img src="http://aneeshkumar.42web.io/img/slider1.jpg"/>
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
            $mail = mail($to_email, $subject, $htmlContent, $headers);
        }


        if ($mail > 0) {

            echo '<div class="container alertbox mt-4">
    <div class="alert " role="alert">
     
        <hr>  
        <p> News letter sent  successfully </p>
        <a class="btn  btn-secondary" href="home.php" role="button">BACK</a></div>
     
    </div>';
        } else {
            echo "Email sending failed...";
        }
    }
    ?>

    <div class="container border shadow-sm mt-4 mx-auto" style="max-width: 600px;">
        <h1 class="text-center mt-4">Send mail to your subcriber</h1>
        <hr>
        <form action="" method="POST">
            <div class="form-floating mb-3 mt-4">
                <input type="text" class="form-control" id="floatingInput" placeholder="Urban Kleid" name="title" required>
                <label for="floatingInput">Enter title of mail</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="body" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">Enter Mail Body</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 my-4">SEND</button>
        </form>
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