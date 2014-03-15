<div class="navigation">

<div class="navbutton">
<a href="logout.php">Logout</a>
</div>

<div class="navbutton">
<a href="productadmin.php">Product Manager</a>
</div>
</div>
<div class="navigation">
<?php 

$getcat = "select * from category";
	require_once('../connection.php');
	$selcat = mysql_query($getcat) or die(mysql_error());
	while($crow = mysql_fetch_array($selcat))
	{
?>
<div class="navbutton">
<a href="productadmin.php?cat=<?php echo $crow['catid']; ?>"><?php echo $crow['catname']; ?></a>
</div>
<?php 
}
?>
</div>