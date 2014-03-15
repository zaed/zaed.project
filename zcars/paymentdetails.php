<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="style.css" rel="stylesheet" type="text/css" />

<title>Home Page</title>
</head>

<body>

<div class="container">    
    
  <? include('header.php'); ?>
<? include ('cartpage2.php') ?>
 
<div class="checkout">

<div class="addcutomerdetails">
<h4> ADD CUSTOMER DETAILS </h4>

NAME:&nbsp;&nbsp;<input type="name" maxlength="20" size="20" class="field" name="name" />

<br />
EMAIL:&nbsp;&nbsp;<input type="email" maxlength="20" size="20" class="field" name="email" />

<br />
TELEPHONE:&nbsp;&nbsp;<input type="telephone" maxlength="20" size="20" class="field" name="telephone" />

<br />
POSTCODE:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="postcode" />

ADDRESS:&nbsp;&nbsp;<input type="address" maxlength="20" size="20" class="field" name="address" />
&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="custlogin" value="ADD/UPDATE" />
<br />



</div><!--coles add customer details -->

<div class="checkoutmenu">
 <div class="adddeliverydetails"><a href="deliverydetails.php">Add Delivery Details</a>
 </div><!-- close add delivery details -->
 
 <div class="addpaymentdetails"><a href="paymentdetails.php">Add Payment Details</a>
 </div><!--close add payment details -->
 
 <div class="checkout"><a href="thankyou.php">Check Out</a>
 </div><!-- close check out -->
 
</div><!-- close check out menu -->

<div class="paymentdetails"><h4> ADD PAYMENT DETAILS </h4>

Name as shown on card:&nbsp;&nbsp;<input type="name" maxlength="20" size="20" class="field" name="name" />

<br />
sort code:&nbsp;&nbsp;<input type="number" maxlength="20" size="20" class="field" name="sortcode" />
<br />
sequrity code:&nbsp;&nbsp;<input type="number" maxlength="20" size="20" class="field" name="sequritycode" />
<br />
expiry date:&nbsp;&nbsp;<input type="number" maxlength="20" size="20" class="field" name="expirydate" />
<br />
&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="custlogin" value="ADD/UPDATE" />
<br />

</div><!-- close paymentdetails -->


</div><!-- close paymentdetails -->
 


</div><!-- close check out box -->

<? include('footer.php'); ?>
    
    

	</div><!-- close container -->


</body>
</html>