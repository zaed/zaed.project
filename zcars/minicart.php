<?php 
// button to remove	any item
	if(isset($_REQUEST['remove']) && $_REQUEST['remove'] == "yes")
	{
			$cartid = $_SERVER['REMOTE_ADDR'];
			$productid = $_REQUEST['productid'];
			require_once('connection.php');
			mysql_query("delete from cart where ipaddress = '$cartid' and productid = '$productid'") or die(mysql_error());	
	}



?>
<div class="minicart">
<div class="cartheader">

		<div class="name">
			Name / Description
		</div><!-- close cart name -->
        
        <div class="unitprice">
			Unit Price
		</div><!-- close unitprice -->
        
        <div class="quantity">
			Quantity
		</div><!-- close quantity -->
        
        <div class="subtotal">
			Sub Total
		</div><!-- close subtotal -->
        
        <div class="remove">
			<span>X</span>
		</div><!-- close remove -->

</div><!-- close cartheader -->

<div class="cartbody">
	
    <?php 
	$cartid = $_SERVER['REMOTE_ADDR'];
	require_once('connection.php');
	$getcart = mysql_query("select productid from cart where ipaddress = '$cartid'") or die(mysql_error());
    while($row = mysql_fetch_array($getcart))
	{	$productid = $row['productid'];	
		$cartid = $_SERVER['REMOTE_ADDR'];
		
		$getqty = mysql_query("select quantity, unitsubtotal from cart where productid = '$productid' and ipaddress = '$cartid'") or die(mysql_error());
		while($row = mysql_fetch_array($getqty)) { $quantity = $row['quantity']; $pst = $row['unitsubtotal']; }
					
		require_once('connection.php');
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
				
		<div class="remove">
        	<a href="<?php $_SERVER['PHP_SELF']; ?>?remove=yes&productid=<?php echo $row['productid']; ?>"><span>X</span></a>
        </div><!-- close cancel button-->

	</div><!-- close cartrow -->
<?php 
} 
}
?>

</div><!-- close cartbody -->

<div class="cartfooter">

	<div class="continueshopping">

		
        

	</div><!-- close continue shopping -->

	<div class="totalcart">
<?php   
require_once('connection.php');
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

	<div class="checkout">
<form action="checkout.php?cartid=<?php print $_SERVER['REMOTE_ADDR']; ?>" method="post" enctype="multipart/form-data" >
      <div><input type="submit" name="checkout" value="CHECK OUT" /></div>
    </form>
	</div><!-- close chechout -->
</div>
</div><!-- close cartfooter -->