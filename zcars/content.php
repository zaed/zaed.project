<div class="content" id="content">

<? if(isset($_GET['cartid']))
{
	$cartid = $_GET['cartid'];
}
?>
<div class="top">

<div class="topleft">

<h4>Customer Login</h4>
<form action="customeraccount.php" method="post" enctype="multipart/form-data">
Customerid:&nbsp;<input type="text" maxlength="20" size="20" class="field" name="customer" />
<br />
Password:&nbsp;&nbsp;<input type="password" maxlength="20" size="20" class="field" name="password" />
&nbsp;<input type="submit" maxlength="20" size="20" class="button" name="custlogin" value="LOG IN" />
<br />
</form>


</div><!-- close topleft -->

<div class="topright">
<h4>Mini Cart</h4>
<? include('minicart.php'); ?>
</div><!-- close topright -->

</div><!-- close top -->

<div class="bottom">
<? 
include('connection.php');
$query = "select * from product";
$getproduct = mysql_query($query, $connection) or die(mysql_error());
while ($row = mysql_fetch_array($getproduct))
{
?>
<? //include('productbox.php'); ?>
<?
}
?>
</div><!-- close bottom -->



</div><!-- clsoe content -->