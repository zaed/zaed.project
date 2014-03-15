<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="style.css" rel="stylesheet" type="text/css" />

<title>STUNNER</title>
<script type="text/javascript">

function change1()
{
	document.getElementById("content").className='newcontent';
}
function change2()
{
	document.getElementById("content").className='content';
}



</script>



</head>

<body>

<div id="container" class="container">    
    
  <?php include('header.php'); ?>

	<?php include('navigation.php'); ?>

<div class="homecontent">





<?php if(isset($_GET['key']) && $_GET['key'] == "login") { ?> 
<?php include('reglogin.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "about") { ?> 
<?php include('about.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "contact") { ?> 
<?php include('contact.php'); ?>
<?php } ?>

<?php if(!isset($_GET['key'])) { ?> 
<?php include('indexcontent.php'); ?>
<?php } ?>

<!-- testing
<?php if(isset($_GET['key']) && $_GET['key'] == "laptop") { ?> 
<?php include('shops/laptop.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "ipad") { ?> 
<?php include('shops/ipads.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "phones") { ?> 
<?php include('shops/phones.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "cams") { ?> 
<?php include('shops/cams.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "access") { ?> 
<?php include('shops/access.php'); ?>
<?php } ?>








</div><!-- clsoe content -->


	<?php include('footer.php'); ?>
    
    
    

	</div><!-- close container -->


</body>
</html>