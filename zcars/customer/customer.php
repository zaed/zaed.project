<link href="../style.css" rel="stylesheet" type="text/css" />

<div class="content">   
<div class="customerbox">
<?php 
 session_start(); 
// Check if we have established an authenticated 
if (!isset($_SESSION["loginuser"])) 
{ 
     
     header("Location: ../index.php?key=login"); //Go back and login 
} 
//If this page hasn't been redirected (we are allowed in) then we can display 
?> 
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Customer Account</title>
</head>

<body>

<h1>Customer Accounts</h1>
<a href="logout.php">Logout</a>
<?php include('customercontent.php'); ?>
</body>
</html>
</div>
</div>