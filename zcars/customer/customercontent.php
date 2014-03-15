            <div style="float:left; clear:both; margin-bottom:20px;">
            <h2>Edit Your Registration Details</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<?php 
if(isset($_GET['custid'])) { $custid = $_GET['custid']; }
$getuser = "select * from customer where custid = '$custid'";
require_once('connection.php');
$sqluser = mysql_query($getuser) or die(mysql_error());
while($row = mysql_fetch_array($sqluser))
{
	
	$name = $row['name'];
	$email = $row['email'];
	$address = $row['address'];
	$telephone = $row['telephone'];
	$postcode = $row['postcode'];
	$password = $row['password'];

}
?>
<table style="padding-left:50px;">
  <tr>
    <td colspan="2">
    <input name="userid" type="hidden" size="50" maxlength="100" value="<?php print "$custid"; ?>" /></td>
  
  </tr>
    <tr>
    <td>Name</td>
    <td><input name="username" type="text" id="username" size="50" maxlength="100" class="field" value="<?php print "$name"; ?>" /></td>
    </tr>
  
  </tr>
    <tr>
    <td>Email</td>
    <td><input name="useremail" type="text" id="useremail" size="50" maxlength="100" class="field" value="<?php print "$email"; ?>" /></td>
    </tr>
  
   <tr>
    <td>address</td>
    <td><input name="address" type="text" id="address" size="50" maxlength="100" class="field" value="<?php print "$address"; ?>" /></td>
    </tr>
    
     <tr>
    <td>telephone</td>
    <td><input name="telephone" type="text" id="telephone" size="50" maxlength="100" class="field" value="<?php print "$telephone"; ?>" /></td>
    </tr>
    
     <tr>
    <td>Postcode</td>
    <td><input name="postcode" type="text" id="postcode" size="50" maxlength="100" class="field" value="<?php print "$postcode"; ?>" /></td>
    </tr>
  
  <tr>
    <td>Password</td>
    <td><input name="password" type="password" id="password" size="50" maxlength="100" value="<?php print "$password"; ?>" /></td>
    </tr>
  
  <tr>
    	<!-- new customer button -->
    	<td><input name="updateuser" type="submit" value="Update Details" class="button" /></td>
      	<td>&nbsp;</td>
    </tr>
    
</table>
</form>

<?php
if (isset($_POST['updateuser'])) 
{
	
//receive form submission and create sanitised variables
$name = stripslashes(htmlspecialchars($_POST['name']));
$email = stripslashes(htmlspecialchars($_POST['email']));
$address = stripslashes(htmlspecialchars($_POST['address']));
$telephone = stripslashes(htmlspecialchars($_POST['telephone']));
$postcode = stripslashes(htmlspecialchars($_POST['postcode']));
$custid = stripslashes(htmlspecialchars($_POST['custid']));
$password = $_POST['password'];

require_once('connection.php');

// update user table
mysql_query("update customer 
set name = '$name', email = '$email', password = '$password', address = '$address', telephone = '$telephone', postcode = '$postcode' where custid = '$custid'") or die(mysql_error());

echo "Account updated";

}

?>