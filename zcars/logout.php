<?php 

  session_start(); 

  $_SESSION["loginuser"]; 
  
  
  unset ($_SESSION["loginuser"]); 
  unset ($loginuser);

  // Relocate back to the login page 
  header("Location: ../index.php?key=login"); 
  //session_destroy();    
?>   