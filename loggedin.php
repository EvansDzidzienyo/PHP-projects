

<?php
require 'core.inc.php';
require 'connect.php';


if(loggedin()){
		
$firstname=getuserfield($conn, 'Firstname');
$surname=getuserfield($conn, 'Surname');
	
	echo 'logged in.'.$firstname.' '.$surname.' <a href="logout.php">logout</a><br>';
	
}else{
include 'loginforms.php';	
}
?>
 
