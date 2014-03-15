

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

	<?php include('adminnavigation.php'); ?>
    

	<div class="content">
<div id="message"><?php 
if(isset($_POST['createproduct'])) { 

$getimage = $_POST['getimage'];
$pname = $_POST['pname'];
$description = $_POST['description'];
$getcat = $_POST['getcat'];
$unitprice = $_POST['unitprice'];
$ptype = $_POST['ptype'];
$querycreate = "insert into product values (NULL, '$pname', '$getimage', '$unitprice', '$description', '$ptype', '$getcat')";
require_once('../connection.php');
mysql_query($querycreate) or die(mysql_error());
echo "Product Created</div>";

}

if(isset($_POST['updateproduct'])) { 

$pid = $_POST['pid'];
$pimage = $_POST['pimage'];
$pname = $_POST['pname'];
$description = $_POST['description'];
$category = $_POST['category'];
$unitprice = $_POST['unitprice'];
$ptype = $_POST['ptype'];

$queryupdate = "update product set pimage = '$pimage', pname = '$pname', description = '$description', ptype = '$ptype', catid = '$category', unitprice = '$unitprice' where productid = '$pid'";
require_once('../connection.php');
mysql_query($queryupdate) or die(mysql_error());
echo "Product Updated</div>";

}
if(isset($_POST['deleteproduct'])) { 

$pid = $_POST['pid'];

$querydelete = "delete from product where productid = '$pid'";
require_once('../connection.php');
mysql_query($querydelete) or die(mysql_error());
echo "Product Deleted</div>";
}


if(isset($_POST['newproduct']))
{
?>
<div class="productbox1" id="addproduct">
<h4>Add New Product</h4>
<form action="productadmin.php" method="post">
<table>
<tr><th>Image URL</th>
<td>
<div>
<select class="formselect" name="getimage" id="getimage">

<option value="">Please select:</option>
<?php
	$gim = "select * from images";
	require_once('../connection.php');
	$selectimg = mysql_query($gim) or die(mysql_error());
	while($imgrow = mysql_fetch_array($selectimg))
	{
?>
<option value="<?php echo $imgrow['imageid']; ?>"><?php echo $imgrow['iurl']; ?></option>
<?php
	}
?>
</select>
</div><!-- close productimage -->
</td>
</tr>


<tr>
<th>Name:</th>
<td>
<div class="productname">
<input type="text" class="formfield" name="pname" value="" />
</div><!-- close productname -->
</td>
</tr>

<tr>
<th>Description:</th>
<td>
<div class="description">
<input type="text" class="formfield" name="description" value="" />
</div><!-- close description -->
</td>
</tr>

<tr>
<th>Part type:</th>
<td>
<div class="description">
<input type="text" class="formfield" name="ptype" value="" />
</div><!-- close description -->
</td>
</tr>

<tr>
<th>Category:</th>
<td>
<div class="description">
<select class="formselect" name="getcat" id="getcat">

<option value="">Please select:</option>

<?php
	$gcat = "select * from category";
	require_once('../connection.php');
	$selectcat = mysql_query($gcat) or die(mysql_error());
	while($catrow = mysql_fetch_array($selectcat))
	{
?>
<option value="<?php echo $catrow['catid']; ?>"><?php echo $catrow['catname']; ?></option>
<?php
	}
?>

</select>
</div><!-- close description -->
</td>
</tr>

<tr>
<th>Price:</th>
<td>
<div class="price">
&pound;<input type="text" class="pricefield" name="unitprice" value="" />
</div><!-- close price -->
</td>
</tr>

<tr><td colspan="2">
<div class="addtocart">


<input type="submit" class="button" name="createproduct" value="CREATE" />

 </div><!-- close addtocart -->
</td>
</tr>
 </table>
</form>
</div><!-- close product box -->
<?php
}
?>
<?php
if(isset($_GET['cat'])) { 

$catid = $_GET['cat']; 
$queryproduct = "select * from product where catid = '$catid'"; 
} else { $queryproduct = "select * from product";  }
require_once('../connection.php');

$getproduct = mysql_query($queryproduct) or die(mysql_error());
while ($row = mysql_fetch_array($getproduct))
{
?>
<div class="productbox1">
<form action="productadmin.php" method="post" enctype="multipart/form-data">
<table>
<tr><th>Image URL</th>
<td>
<div>
<input type="text" class="formfield" name="pimage" value="<?php echo $row['pimage']; ?>" />
<input type="hidden" class="formfield" name="pid" value="<?php echo $row['productid']; ?>" />
</div><!-- close productimage -->
</td>
</tr>
<tr>
<td colspan="2">
<img src="../<?php echo $row['pimage']; ?>" alt="<?php echo $row['pname']; ?>" class="pimageadmin" />
</td>
</tr>

<tr>
<th>Name:</th>
<td>
<div class="productname">
<input type="text" class="formfield" name="pname" value="<?php echo $row['pname']; ?>" />
</div><!-- close productname -->
</td>
</tr>

<tr>
<th>Description:</th>
<td>
<div class="description">
<input type="text" class="formfield" name="description" value="<?php echo $row['description']; ?>" />
</div><!-- close description -->
</td>
</tr>

<tr>
<th>Product Type:</th>
<td>
<div class="description">
<input type="text" class="formfield" name="ptype" value="<?php echo $row['ptype']; ?>" />
</div><!-- close description -->
</td>
</tr>

<tr>
<th>Category:</th>
<td>
<div class="description">
<input type="text" class="formfield" name="category" value="<?php echo $row['catid']; ?>" />
</div><!-- close description -->
</td>
</tr>

<tr>
<th>Price:</th>
<td>
<div class="price">
&pound;<input type="text" class="pricefield" name="unitprice" value="<?php echo $row['unitprice']; ?>" />
</div><!-- close price -->
</td>
</tr>

<tr><td colspan="2">
<div class="addtocart">
<input type="submit" class="button" name="updateproduct" value="UPDATE" />

<input type="submit" class="button" name="deleteproduct" value="DELETE" />

<input type="submit" class="button" name="newproduct" value="CREATE" />

 </div><!-- close addtocart -->
</td>
</tr>
 </table>
</form>
</div><!-- close product box -->
<?php
}

?>

</div><!-- clsoe content -->


	<?php include('../footer.php'); ?>
    
    

	</div><!-- close container -->


</body>
</html>
