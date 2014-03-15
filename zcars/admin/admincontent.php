            <div style="float:left; clear:both; margin-bottom:20px;">
            <h2>Edit Your Registration Details</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<?php 
            $getuser = "select * from adminuser";
            require_once('../connection.php');
			$sqluser = mysql_query($getuser) or die(mysql_error());
            while($row = mysql_fetch_array($sqluser))
            {
            $userid = $row['userid'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            }
            ?>
<table style="padding-left:50px;">
  <tr>
    <td colspan="2">
    </label><input name="userid" type="hidden" size="50" maxlength="100" value="<?php print "$userid"; ?>" /></td>
  
  </tr>
    <tr>
    <td>Usrname</td>
    <td><input name="username" type="text" id="username" size="50" maxlength="100" class="field" value="<?php print "$username"; ?>" /></td>
    </tr>
  
  </tr>
    <tr>
    <td>Email</td>
    <td><input name="useremail" type="text" id="useremail" size="50" maxlength="100" class="field" value="<?php print "$email"; ?>" /></td>
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
$username = stripslashes(htmlspecialchars($_POST['username']));
$useremail = stripslashes(htmlspecialchars($_POST['useremail']));
$userid = stripslashes(htmlspecialchars($_POST['userid']));
$password = $_POST['password'];

require_once('../connection.php');

// update user table
mysql_query("update adminuser set username = '$username' email = '$useremail', password = '$password' where userid = '$userid'") or die(mysql_error());

echo "Account updated";

}

?>