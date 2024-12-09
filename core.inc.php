

<?php

ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
$http_referer = $_SERVER['HTTP_REFERER'];
}

// Function to check if the user is logged in
function loggedin() {
    return (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']));
}


function getuserfield($conn, $field){
	$user_id = $_SESSION['user_id'];
	 // Prepare the query with proper escaping
    $query = "SELECT `$field` FROM `regis` WHERE `id` = ?";
	
	if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'i', $user_id);
        // Execute the query
        mysqli_stmt_execute($stmt);
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
		
		
		if ($row = mysqli_fetch_assoc($result)) {
            return $row[$field]
			;
			
		}
		
		
	}
	 
}


?>











<?php/*
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
$http_referer = $_SERVER['HTTP_REFERER'];
}

function loggedin(){
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		return true;
		
		
	}else{return false;}
	
}


function getuserfield($conn, $field){
	$query="SELECT `$field` FROM `regis` WHERE `id`='".$_SESSION['user_id']."'";
	if($query_run=mysqli_query($conn, $query)){
		if($mysql_result=mysqli_fetch_assoc($query_run)){
			return $mysql_result;
			
		}
		
		
	}
	 
}


*/?>