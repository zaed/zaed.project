<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="../style.css" rel="stylesheet" type="text/css" />

<title>Home Page</title>
</head>

<body>

<div class="container">    
    
  <?php include('../header.php'); ?>



       
 
<div class="content">

<?php 
	$cartid = $_SERVER['REMOTE_ADDR'];
	require_once('../connection.php');
	$getcart = mysql_query("select productid from cart where ipaddress = '$cartid'") or die(mysql_error());
    while($row = mysql_fetch_array($getcart))
	{	$productid = $row['productid'];	
		$cartid = $_SERVER['REMOTE_ADDR'];
		
		$getqty = mysql_query("select quantity, unitsubtotal from cart where productid = '$productid' and ipaddress = '$cartid'") or die(mysql_error());
		while($row = mysql_fetch_array($getqty)) { $quantity = $row['quantity']; $pst = $row['unitsubtotal']; }
					
		require_once('../connection.php');
		$getitem = mysql_query("select * from product where productid = '$productid'") or die(mysql_error());
    	while($row = mysql_fetch_array($getitem))
		{
			 ?>
    	
        <div class="cartrow">		
				<div class="name">
					<?php echo $row['pname']; ?> <?php echo $row['description']; ?>
		</div><!-- close name -->

		<div class="unitprice">
			&pound;<?php echo $row['unitprice']; ?>
		</div><!-- close price -->
        
        <div class="quantity">
        	<?php echo $quantity; ?>
        </div><!-- close quantity -->
        
        <div class="subtotal">
        	&pound;<?php echo $pst; ?>
        </div><!-- close subtotal -->


	</div><!-- close cartrow -->
<?php 
} 
}
?>


	<div class="totalcart">
<?php  
require_once('../connection.php');
$getfinal = "SELECT sum(unitsubtotal) FROM cart where ipaddress = '$cartid'";	
$resfinal = mysql_query ($getfinal) or die(mysql_error());
while ($row = mysql_fetch_array($resfinal)) 
   	{
$final = $row['sum(unitsubtotal)'];
	}
?>
Total<br />
&pound;<?php echo "$final"; ?>
	</div><!--close totalcart -->


<?php
if(isset($_POST['checkout']))
{
	?>
<div class="adddetails">   
<h4> ADD CUSTOMER DETAILS </h4>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="addcustomerdetails">
NAME:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="name" required="required" />
</div>
<div class="addcustomerdetails">
EMAIL:&nbsp;&nbsp;<input type="email" maxlength="20" size="10" class="field" name="email" required="required" />
</div>
<div class="addcustomerdetails">

TELEPHONE:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="telephone" required="required" />
</div>
<div class="addcustomerdetails">

POSTCODE:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="postcode" required="required" />
</div>
<div class="addcustomerdetails">

ADDRESS:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="address" required="required" />
</div>

<div class="addcustomerdetails">

&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="setcustomer" value="ADD/UPDATE" />
</div>
</form>
</div><!-- close adddetails -->

<?php
}
?>


<?php
if(isset($_POST['setcustomer']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$telephone = $_POST['telephone']; 
	$postcode = $_POST['postcode']; 
	
	$date = date('l jS \of F Y h:i:s A');
	$status = "in process";
	require_once('../connection.php');
	mysql_query("insert into customer values (NULL, '$name', '$email', '$address', '$telephone', '$postcode', NULL)") or die(mysql_error());

	?>
<div class="adddetails">
<h4> ADD DELIVERY DETAILS </h4>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="addcustomerdetails">
NAME:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="name" required="required" />
</div>

<div class="addcustomerdetails">

TELEPHONE:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="telephone" required="required" />
</div>
<div class="addcustomerdetails">

POSTCODE:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="postcode" required="required" />
</div>
<div class="addcustomerdetails">

ADDRESS:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="address" required="required" />
</div>

<div class="addcustomerdetails">

&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="setdelivery" value="ADD/UPDATE" />
</div>
</form>
</div><!-- close adddelivery -->

<?php
}
?>

<?php
if(isset($_POST['setdelivery']))
{
	$name = $_POST['name'];

	$address = $_POST['address'];
	$telephone = $_POST['telephone']; 
	$postcode = $_POST['postcode']; 
	
	
	require_once('../connection.php');
	mysql_query("insert into delivery values (NULL, '$address', '$name', '$postcode', '$telephone')") or die(mysql_error());
	
	
?>

<div class="adddetails">

<h4> ADD PAYMENT DETAILS </h4>
<form action="../thankyou.php" method="post" enctype="multipart/form-data">
<div class="addcustomerdetails">
AMOUNT TO PAY:&nbsp;&nbsp;<input type="hidden" class="field" name="amount" value="<?php echo "$final"; ?>" />
&pound;<?php echo "$final"; ?>
</div>
<input type="hidden" class="field" name="name" value="<?php echo "$name"; ?>" />
<div class="addcustomerdetails">
<select name="paymethod" class="field">

	<option value="visa">VISA</option>
    <option value="MC">MASTERCARD</option>
    <option value="amex">AMEX</option>

</select>
</div>

<div class="addcustomerdetails">
<input type="hidden" name="paytype" value="Sales Order" />
</div>

<div class="addcustomerdetails">
Name as shown on card:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="name" required="required" />

</div>
<div class="addcustomerdetails">
sort code:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="sortcode" required="required" />
</div>
<div class="addcustomerdetails">
sequrity code:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="sequritycode" required="required" />
</div>
<div class="addcustomerdetails">
expiry date:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="expirydate" required="required" />
</div>
<div class="addcustomerdetails">

&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="paynow" value="PAY NOW" />
</div>
</form>
</div><!-- close paymentdetails -->

<?php
}
?>

</div><!-- close check out box -->




	<?php include('../footer.php'); ?>
    
    

	</div><!-- close container -->


</body>
</html>