

<!doctype>
<html lang="en">

<head>

<title>SIGN UP</title>

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
	#mes{color:red; font-family:candara; padding-right:400px text-align:center; font-weight:bold; font-size:100px;}
	#forms{padding-right:400px}

</style>

</head>


<body>
<section id="wrapper">
<header>
<h1>SIGN UP.</h1>
</header>




<?php
require 'core.inc.php';
require 'connect.php';

if(!loggedin()){
	if(isset($_POST['username'])&&isset($_POST['password'])&&
	isset($_POST['password_again'])&&isset($_POST['firstname'])&&isset($_POST['surname'])){
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$password_hash=md5($password);
		
		$password_again=$_POST['password_again'];  
		$firstname=$_POST['firstname'];
		$surname=$_POST['surname'];
		
		
if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname)){
	
	if(strlen($username)>20&&strlen($firstname)>30&&strlen($surname)>30){echo'<html><span id = "mes">why u wanna mess around.fool';}else{
	
if(strlen($password)<6){echo '<html><span id = "mes">password should be at least six characters';}else{
	if($password!=$password_again){
	echo '<html><span id="mes">*passwords must be equal*</span></html>';	
		
	}else{
		
		
		$query = "SELECT `username` FROM `register` WHERE `username`='$username'";
		$query_run = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($query_run)==1){
			echo '<html><span id = "mes">username already in use.</html>';
			
		}else{
			
		$query="INSERT INTO `register` VALUES('', '$username', '$password_hash', '$firstname','$surname')";
		if($query_run=mysqli_query($conn, $query)){
			header('Location: registered.php');
			echo 'Registered successfully.Now you can log in by clicking Login/Register';
			
			
		}else{echo 'could not register at the moment';}
			
		}
		
		
	}
	}
}
}else{echo'<html><span id = "mes">All Fields Required</span></html>';}	
	
			
	}
	
?>
	<form action="register.php" method="POST">
	<fieldset>
	<legend >Fill out the forms to register:</legend><hr>

	<span id="e">Username:<br><input type="text" name="username"  placeholder="username" maxlength="20" value="<?php if(isset($username)){echo $username;}?>" ><br><br>
	<span id="e">Password:<br><input type="password" name="password" placeholder="password"  /><br><br>
	<span id="e">Password again:<br><input type="password" name="password_again" placeholder="re-enter password"/><br><br>
	<span id="e">Firstname:<br><input type="text" name="firstname"   placeholder="firstname" maxlength="30" value="<?php if(isset($firstname)){echo $firstname;}?>" /><br><br>
	<span id="e">Surname:<br><input type="text" name="surname"   placeholder="surname" maxlength="30" value="<?php if(isset($surname)){echo $surname;}?>" /><br><br>
	<input type="submit" value="Register"/> 
	

	</form>


or <br>

<form id=forms action="index.php" method='POST'>
<input type= "submit" value="Log in">
</form>
	
	
<?php
}else if(loggedin()){
	echo 'u are already logged n and registered';
	
}


?>
</section>
  </body>
  </html>
  