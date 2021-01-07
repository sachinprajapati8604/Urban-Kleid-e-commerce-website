<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URBAN KLEID</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

 <!--using FontAwesome--------------->
<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
<!--fav-icon---------------->
<link rel="shortcut icon" href="img/Transparent.png"/>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/mystyle.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/contactus.css">
<link rel="stylesheet" href="css/login-signup.css">
</head>
<body>
   
<?php
include 'basic/header.php';
?>

<div class="jumbotron jumbotron-sm ">
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 col-lg-12 ">
                <h1 class="h1">
                    Contact us <small class="contact_bio"> We are happy to help</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container shadow-sm p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
            <form name="ConatctUs" action="contactinsert.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter Subject" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <button type="button" class="btn Button-Login Accbutton" id="btnsubmit"  onclick="SubmitForm()">Submit</button>
                    <script>
                    function SubmitForm()
                    {
                    document.ConatctUs.submit();
                    document.ConatctUs.reset();

                    }
				</script>   
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 shadow-sm p-3 mb-5 bg-white rounded ">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address class="ml-4">
                <strong>New Delhi</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address class="ml-4">
                <strong>Write to us</strong><br>
                <a href="mailto:#">contact@urbankleid.com</a>
            </address>
            </form>
        </div>
    </div>
</div>




<?php
include 'basic/footer.php';
?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<!--Get your own code at fontawesome.com-->
<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

<!--using JQuery--------------->
<script
src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script> 
</body>
</html>