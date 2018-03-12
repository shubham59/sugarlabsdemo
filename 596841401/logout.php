<?php

session_start(); // start the session before using it 



session_unset(); // unset the session variables 




// Expire their cookie files

// Destroy the session variables
session_destroy();
// Double check to see if their sessions exists
 
	header("location: ../donut.php");
	exit();

?>