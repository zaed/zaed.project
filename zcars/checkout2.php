
 
<div class="content">

<? 
	$cartid = $_SERVER['REMOTE_ADDR'];
	require_once('connection.php');
	$getcart = mysql_query("select productid from cart where cartid = '$cartid'") or die(mysql_error());
    while($row = mysql_fetch_array($getcart))
	{	$productid = $row['productid'];	
		$cartid = $_SERVER['REMOTE_ADDR'];
		
		$getqty = mysql_query("select quantity, unitsubtotal from cart where productid = '$productid' and cartid = '$cartid'") or die(mysql_error());
		while($row = mysql_fetch_array($getqty)) { $quantity = $row['quantity']; $pst = $row['unitsubtotal']; }
					
		require_once('connection.php');
		$getitem = mysql_query("select * from product where productid = '$productid'") or die(mysql_error());
    	while($row = mysql_fetch_array($getitem))
		{
			 ?>
    	
        <div class="cartrow">		
				<div class="name">
					<? echo $row['name']; ?> <? echo $row['description']; ?>
		</div><!-- close name -->

		<div class="unitprice">
			&pound;<? echo $row['unitprice']; ?>
		</div><!-- close price -->
        
        <div class="quantity">
        	<? echo $quantity; ?>
        </div><!-- close quantity -->
        
        <div class="subtotal">
        	&pound;<? echo $pst; ?>
        </div><!-- close subtotal -->


	</div><!-- close cartrow -->
<? 
} 
}
?>


	<div class="totalcart">
<?php   
require_once('connection.php');
$getfinal = "SELECT sum(unitsubtotal) FROM cart where cartid = '$cartid'";	
$resfinal = mysql_query ($getfinal) or die(mysql_error());
while ($row = mysql_fetch_array($resfinal)) 
   	{
$final = $row['sum(unitsubtotal)'];
	}
?>
Total<br />
&pound;<? echo "$final"; ?>
	</div><!--close totalcart -->


<?
if(isset($_POST['checkout']))
{
	?>
<div class="adddetails">   
<h4> ADD CUSTOMER DETAILS </h4>
<form action="<? $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="addcustomerdetails">
NAME:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="name" />
</div>
<div class="addcustomerdetails">
EMAIL:&nbsp;&nbsp;<input type="email" maxlength="20" size="10" class="field" name="email" />
</div>
<div class="addcustomerdetails">

TELEPHONE:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="telephone" />
</div>
<div class="addcustomerdetails">

POSTCODE:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="postcode" />
</div>
<div class="addcustomerdetails">

ADDRESS:&nbsp;&nbsp;<input type="text" maxlength="20" size="10" class="field" name="address" />
</div>

<div class="addcustomerdetails">

&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="setcustomer" value="ADD/UPDATE" />
</div>
</form>
</div><!-- close adddetails -->

<?
}
?>


<?
if(isset($_POST['setcustomer']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$telephone = $_POST['telephone']; 
	$postcode = $_POST['postcode']; 
	$password = $_SERVER['REMOTE_ADDR'];
	$date = date('l jS \of F Y h:i:s A');
	$status = "in process";
	require_once('connection.php');
	mysql_query("insert into customer values (NULL, '$password', '$name', '$email', '$address', '$telephone', '$postcode', '$password')") or die(mysql_error());
	
	mysql_query("insert into saleorder values (NULL, '$password', '$password', '$password', '$password', '$date', '$status')") or die(mysql_error());
	
	?>
<div class="adddetails">
<h4> ADD DELIVERY DETAILS </h4>
<form action="<? $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="addcustomerdetails">
NAME:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="name" />
</div>

<div class="addcustomerdetails">

TELEPHONE:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="telephone" />
</div>
<div class="addcustomerdetails">

POSTCODE:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="postcode" />
</div>
<div class="addcustomerdetails">

ADDRESS:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="address" />
</div>

<div class="addcustomerdetails">

&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="setdelivery" value="ADD/UPDATE" />
</div>
</form>
</div><!-- close adddelivery -->

<?
}
?>

<?
if(isset($_POST['setdelivery']))
{
	$name = $_POST['name'];

	$address = $_POST['address'];
	$telephone = $_POST['telephone']; 
	$postcode = $_POST['postcode']; 
	$password = $_SERVER['REMOTE_ADDR'];
	
	require_once('connection.php');
	mysql_query("insert into delivery values (NULL, '$password', '$address', '$name', '$postcode', '$telephone')") or die(mysql_error());
	
	
?>

<div class="adddetails">

<h4> ADD PAYMENT DETAILS </h4>
<form action="thankyou.php" method="post" enctype="multipart/form-data">
<div class="addcustomerdetails">
AMOUNT TO PAY:&nbsp;&nbsp;<input type="hidden" class="field" name="amount" value="<? echo "$final"; ?>" />
&pound;<? echo "$final"; ?>
</div>

<div class="addcustomerdetails">
<input type="hidden" class="field" name="method" value="card" />

<input type="hidden" class="field" name="type" value="sales" />

Name as shown on card:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="name" />

</div>
<div class="addcustomerdetails">
sort code:&nbsp;&nbsp;<input type="number" maxlength="20" size="20" class="field" name="sortcode" />
</div>
<div class="addcustomerdetails">
sequrity code:&nbsp;&nbsp;<input type="number" maxlength="20" size="20" class="field" name="sequritycode" />
</div>
<div class="addcustomerdetails">
expiry date:&nbsp;&nbsp;<input type="text" maxlength="20" size="20" class="field" name="expirydate" />
</div>
<div class="addcustomerdetails">

&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="paynow" value="PAY NOW" />
</div>
</form>
</div><!-- close paymentdetails -->

<?
}
?>

</div><!-- close check out box -->

