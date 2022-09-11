<?php 
session_start();

if(!isset($_SESSION['email'])){
	
	echo "<a href='login.php'>Login</a>";
}
else{
	
	echo "<a href='logout.php'>Logout</a>
			";
}


?>