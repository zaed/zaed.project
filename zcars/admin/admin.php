<?php 
 session_start(); 
// Check if we have established an authenticated 
if (!isset($_SESSION["loginuser"])) 
{ 
     
     header("Location: ../index.php?key=login"); //Go back and login 
} 
//If this page hasn't been redirected (we are allowed in) then we can display 
?> 




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Home page</title>

<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />


</head>





<div id="wrap">

	<div id="header">

		<h1>Administration</h1>

	</div><!--close header -->

		<div id="navigation">
		
            <a href="admin.php?key=product"><img src="../images/admin/padmin.jpg" class="navimg" alt="productadmin button" /></a>
            <a href="logout.php"><img src="../images/admin/logout.jpg" class="navimg" alt="productadmin button" /></a>
            
            
		</div><!-- close nav -->
        
       
        
        <div id="content" style="height:200px;">
            
         <h2 style="text-align:center;">You are now Logged In</h2>    

     
     
<?php if(isset($_GET['key']) && $_GET['key'] == "product") { ?> 
<?php include('productadmin.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "admin") { ?> 
<?php include('adminadmin.php'); ?>
<?php } ?>

<?php if(isset($_GET['key']) && $_GET['key'] == "orders") { ?> 
<?php include('ordersadmin.php'); ?>
<?php } ?>

<?php if(!isset($_GET['key'])) { ?> 
<?php include('admincontent.php'); ?>
<?php } ?>  
            
       </div><!-- close content -->
       
<div id="footer">
     <p>
    <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px"
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" /></a>
 
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:88px;height:31px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="Valid CSS!" />
</a>
</p>

	</div><!--close footer -->

</div><!--close wrap-->

</body>

</html>
