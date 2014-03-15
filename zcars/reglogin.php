<?php

if(isset($_POST['login'])) 
{ 
		
		session_start(); 
		
		if(!isset($_POST['username']) || empty($_POST['username'])) { echo "Username is required"; }
		
		if(!isset($_POST['password']) || empty($_POST['password'])) { echo "password is required"; }
		
		if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			// check the database for user existing
			if($username == "admin" && $password == "admin") { $_SESSION["loginuser"] = $username; header ("location: admin/admin.php"); }
			
			// customer login
			$query = "SELECT * FROM customer WHERE name = '$username' AND  password = '$password' "; 
			require_once('connection.php'); 
			$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
			if ($row = mysql_fetch_array($result)) {   
			
			// start a secure session
			$_SESSION["loginuser"] = $username;
			$custid = $row['custid'];
			// direct user to the correct page
			header("Location: customer/customer.php?custid=".$custid);  }
		} else { echo "Sorry Username and Password error"; }
 }

    
?>

<h2>Customer Login</h2>


<form method="post" action="index.php?key=login" enctype="multipart/form-data">

<table>

<tr>
<th>
username:
</th>
<td>
<input type="text" maxlength="20" size="20" class="field" name="username" />
</td>
</tr>
<tr>
<th>
Password:
</th>
<td>
<input type="password" maxlength="20" size="20" class="field" name="password" />
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" class="button" name="login" value="LOG IN" />
</td>
</tr>
</table>

</form>
