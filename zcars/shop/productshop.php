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

	<?php include('productnavigation.php'); ?>
    
    <?php include('../r8_nav.php'); ?>
    
    <?php include('../minicart.php'); ?>
    

	<div class="content">



<div class="bottom">
<?php 
if(isset($_GET['catid'])) { 

$catid = $_GET['catid']; 
$queryproduct = "select * from product where catid = '$catid'"; 
}

if(isset($_GET['catid']) && isset($_GET['part'])) { 

$catid = $_GET['catid']; 
$part = $_GET['part']; 
$queryproduct = "select * from product where ptype = '$part' and catid = '$catid'"; 
}

if(!isset($_GET['catid']) && !isset($_GET['part'])) { $queryproduct = "select * from product"; }
// select all products


// select all where category

require_once('../connection.php');
$getproduct = mysql_query($queryproduct) or die(mysql_error());
while ($row = mysql_fetch_array($getproduct))
{
?>
<?php include('productbox.php'); ?>
<?php
}
?>
</div><!-- close bottom -->



</div><!-- clsoe content -->


	<?php include('../footer.php'); ?>
    
    

	</div><!-- close container -->


</body>
</html>
