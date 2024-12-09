

<?php
$error = 'cant connect';
$host='Localhost';
$user='root';
$password='';
$database='mydatabase';

$conn = mysqli_connect($host, $user, $password, $database);

if(!@$conn){
	die($error);
	
} 
?>
