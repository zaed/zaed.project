<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="style.css" rel="stylesheet" type="text/css" />

<title>Home Page</title>
</head>

<body>

<div class="container">    
    
  <?php include('header.php'); ?>



       <div class="content">

<?php
if(isset($_POST['paynow']))
{
	$paymethod = $_POST['paymethod'];
	$paytype = $_POST['paytype'];
	$amount = $_POST['amount']; 
	
	
	require_once('connection.php');
	mysql_query("insert into payment values (NULL, '$paymethod', '$paytype', '$amount')") or die(mysql_error());
	
?>
		<div class="thankyou">
			<p>THANK YOU FOR SHOPPING WITH US.</p>
			<br />
			<p>YOU HAVE BEEN AUTOMATICALLY REGISTERED WITH US</p>
			<br />
			<p>PLEASE CREATE A PASSWORD TO ACCESS YOUR ACCOUNT</p>
			<br />
		</div><!-- close thank you -->
<?php
$name = $_POST['name'];

require_once('connection.php');
$getcustomer = mysql_query("select * from customer where name = '$name'") or die(mysql_error());
while($row = mysql_fetch_array($getcustomer))
{
	?>
		<div class="createcustomer">
        
        <h4> ADD CUSTOMER DETAILS </h4>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			CUSTOMER ID:&nbsp;&nbsp;<input type="customerid" maxlength="20" size="20" class="field" name="customerid" value="<?php echo $row['custid']; ?>" />

            <br />
            Creat Password:&nbsp;&nbsp;<input type="password" maxlength="20" size="20" class="field" name="password" />
            
            <br />
            RE-Type password:&nbsp;&nbsp;<input type="password" maxlength="20" size="20" class="field" name="password2" />
            
            &nbsp;<input type="submit" maxlength="20" size="20" class="button" name="register" value="ADD/UPDATE" />
            <br />
            
            </form>

</div><!-- close create cusomer -->

<?php
}
}
?>
<?php
if(isset($_POST['register']))
{
	$password = $_POST['password']; 
	$password2 = $_POST['password2']; 
	$custid = $_POST['customerid']; 
	
	if($password != $password2) { echo "passwords don't match. please try again."; }
	if($password == $password2) {
	require_once('connection.php');
	mysql_query("update customer set password = '$password' where custid = '$custid'") or die(mysql_error());
	
	echo "Your Account has been created.";
	}
}
?>
<a href="index.php=<?php echo $_SERVER['REMOTE_ADDR']; ?>">Log In to your Account</a>
</div><!-- close content -->




	<?php include('footer.php'); ?>
    
    

	</div><!-- close container -->


</body>
</html>