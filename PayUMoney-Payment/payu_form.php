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
    <!--fav-icon---------------->
    <link rel="shortcut icon" href="../img/Transparent.png" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login-signup.css">
    <link rel="stylesheet" href="../css/contactus.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/productdetail.css">

</head>

<body  onload="submitPayuForm()">

    <?php include '../basic/login_header.php'; ?>

    
    <?php
// session_start();
  $id=$_SESSION["id"];

$MERCHANT_KEY = "XVtS73ki";
$SALT = "4BCkXI1L0X";

// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

$info_pro="";


foreach ($_SESSION['cart'] as $key => $value) {
    $x='['. $value["item_name"].', Size-'.$value["size"].',Quantity-'.$value["quantity"].']';
    $info_pro=$info_pro .$x ;

}

$posted['productinfo']=$info_pro;
$posted['image']=$_SESSION['image'];
$posted['address']=$_SESSION['fulladdress'];
$posted['amount']=$_SESSION['total'];
$posted['firstname']=$_SESSION["fullname"];
$posted['email']=$_SESSION["username"];
$posted['phone']=$_SESSION["mob_no"];
//$posted['productinfo']=$_SESSION["product_info"];



if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
    
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl']="http://localhost/urban%20kleid/PayUMoney-Payment/success.php")
          || empty($posted['furl']="http://localhost/urban%20kleid/PayUMoney-Payment/failure.php")
    		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  
 
    <h2 class="text-center mt-4">PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <h4 class="text-center" style="color:red">Please do not refresh this page , It automatically redirect to payment gateway.</h4>
      <br/>
      <br/>
    <?php } ?>
    <div class="container">
    <form id="form1" class="" action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      
      <table class="table table-borderless">
  <tbody>
   
    <tr>
      <td>Amount: </td>
          <td><input id="myamount" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" readonly/></td>
    </tr>
    <tr>
 <td> Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" contenteditable="false" readonly/></td>
    </tr>
    <tr>
<td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>"contenteditable="false" readonly/></td>
    </tr>
       <tr>
  <td>Phone: </td>
          <td><input  name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"contenteditable="false" readonly/></td>
    </tr>
       <tr>
  <td>Product Info: </td>
          <td colspan="3"><input  name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" readonly/> </td>
    </tr>
    <tr>
    <td>Image: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['image'])) ? '' : $posted['image']; ?>" /></td>
          <td>Address: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['address'])) ? '' : $posted['address']; ?>" /></td>
        </tr>

     <!-- <td>Success URI: </td> -->
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
    </tr>
      <!-- <td>Failure URI: </td> -->
          <td colspan="3"><input type="hidden"   name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64"  /></td>
    </tr>
       <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
    </tr>
    </tr>
        <?php if(!$hash) { ?>
            <!-- <td colspan="4"><input type="hidden" class="btn Button-Cart" type="submit" value="Submit" /></td>-->
          <?php } ?>
    </tr>
    
  </tbody>
</table>
           
    </form>
    </div>
  

    <script type="text/javascript">
    window.onload=function(){
    setInterval("submitform();", 1000);
    
    }
    function submitform(){ document.getElementById('form1').submit(); }

</script>


    <?php include '../basic/footer.php';  ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <!--Get your own code at fontawesome.com-->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

    <!--using JQuery--------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/jquery.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</body>

</html>