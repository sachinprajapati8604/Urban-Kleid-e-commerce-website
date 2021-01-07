<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="alert alert-info" role="alert">
        View Uploaded Products
        <a href="fetchproduct.php" class="btn btn-success"> View Product</a>
    </div>

    <?php
    
 require_once 'dbconnect.php';

 if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        
        require_once "dbconnect.php";
        //variable for storing the images in folder and database
        $filename = $_FILES["userImage"]["name"]; 
        $tempname = $_FILES["userImage"]["tmp_name"];     
        $folder = "uploaded images/".$filename; 

        //variable to store image data and type in database
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        //getting variable data from form by post method
        $p_title=$_POST['title'];
        $p_price=$_POST['price'];
        $p_bidprice=$_POST['bidprice'];
    
      
        $sql = "INSERT INTO `products` ( `imageType`, `imageData`,`img_name`, `p_title`, `p_price`, `p_bidprice`, `created`)
		VALUES('{$imageProperties['mime']}', '{$imgData}','{$filename}','$p_title','$p_price','$p_bidprice',current_timestamp())";
        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        $showalert=true;

          // Now let's move the uploaded image into the folder: image 
          if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
        } 
        

                if($showalert){
                
                    echo '<div class="alert alert-info" role="alert">
                   Product has been inserted 
                   <a href="fetchproduct.php" class="btn btn-success"> View Product</a>
                  </div>';
                }
                else{
                    $showalert="Somthing went wrong";
                }
    }
}

?>

    <div class="container my-4 ">
        <form action="" method="post" enctype="multipart/form-data">
            <img class="mb-4 rounded mx-auto d-block" src="..\img\new1.png" alt="" width="100" height="60">
            <h5 class="h3 mb-3 font-weight-normal text-center">Upload your product here</h5>
            <hr>
            <div class="form-group">
                <label for="title"> Product Title<sup class="font-weight-bold" style="color: red;">*</sup></label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" required />
                <small id="title" class="form-text text-muted">please use as short as possible.</small>
            </div>
            <div class="form-group">
                <label for="price">price<sup class="font-weight-bold" style="color: red;">*</sup></label>
                <input type="text" class="form-control" id="price" name="price" required />
            </div>
            <div class="form-group">
                <label for="bidprice">Bid price<sup class="font-weight-bold" style="color: red;">*</sup></label>
                <input type="text" class="form-control" id="bidprice" name="bidprice" aria-describedby="title"
                    required />

            </div>

            <div class="form-group mt-4">
                <label for="exampleFormControlFile1">Upload Product Image<sup class="font-weight-bold"
                        style="color: red;">*</sup></label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="userImage" required />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>