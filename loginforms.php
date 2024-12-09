<!doctype>
<html lang="en">

<head>

<title>LOGIN</title>

<link rel="stylesheet" type="text/css" href="page.css"/>
<link rel="stylesheet" type="text/css" href="inputs.css">

<style type="text/css">
#n{color:red; font-size:30px;}
#a{color:orange; font-size:30px;}
#m{color:green; font-size:30px;}
#e{color:black; font-size:30px; font-weight:bold font-family:}

fieldset{background-color:rgba(247, 236, 236, 1);}
body  {background:url("pb.jpg");}
header{background-color:#000033; color:white;}
footer{background-color:#000033;color:white;}

legend{ color:#330000; font-size:22px; font-family:ravie;}
    #p{font-weight:bold; color:deeppink; background:white; font-size:17.3px; padding-top:9px; font-family:segoe print; border-radius:7px;}
	h3{color:salmon; font-weight:bold; text-align:center; font-family: }
	#mess{color:red; font-family:candara; font-weight:bold; font-size:122px; padding-left:10px; }
	#forms{padding-right:400px}

</style>

</head>



<body>
<section id="wrapper">
<header>
<h1>WELCOME TO USER LOGIN FORMS.</h1>
</header>

<?php
if(isset($_POST['username'])&&isset($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$password_hash=md5($password);
if(!empty($username)&&!empty($password)){
	
	$query="SELECT `id` FROM `register` WHERE `username`='".mysqli_real_escape_string($conn, $username)."' && `password`='".mysqli_real_escape_string($conn, $password_hash)."'";
   if($query_run=mysqli_query($conn, $query)){
	   $mysql_num_rows=mysqli_num_rows($query_run);
	   
	if($mysql_num_rows==0){
		echo '<html><span id="mess">**Invalid username/password combination</span></html>';
		
	}else if($mysql_num_rows==1){
		$user_data = mysqli_fetch_assoc($query_run);
        $user_id = $user_data['id'];
		$_SESSION['user_id']=$user_id;
		header('Location: index.php');
		
		
	}
	
}
	
	
	
}else{echo'<html><span id="mess">***Please fill in all fields </span></html>';}	
	
	
	
}

?>



<form  action="<?php echo $current_file ?>"  method="POST">
<fieldset>

<legend >USER LOGIN FORMS:</legend><hr>

<span id="e">Username:</span></br>
     <input type="text" name="username" maxlength="20" required pattern="[A-Za-z]{3,}" 
	 title="Name should contain only alphabets and a minimum of three letters." placeholder="Username"  
	 value="<?php if(isset($input)){echo $input;}?>"  > </br> </br></br>


<span id="e"> Password:</br>
<input type="password" name="password" /> </br>
<input type="submit" value="log in"/>

or <br>



</form>

<form id=forms action="register.php" method='POST'>
<input type= "submit" value="Sign Up">
</form>

</section>
</body>
</html>