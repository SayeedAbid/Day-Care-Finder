<?php

	error_reporting (E_ALL ^ E_NOTICE); 

$username = $_POST['username'];	
	$password = $_POST['password'];

	$conn = new mysqli('localhost', 'root', '', 'daycaredb');
	if ($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	}
	else{
		$sql="SELECT * FROM daycare WHERE username='$username' AND password ='$password'";
$result=$conn->query($sql);

if(!$row=$result->fetch_array()){
	header("Location:login_error.html");
	//echo '<script type="text/javascript"> alert("Error : Username or password incorrect.") </script>';
}
else{
	$_SESSION['username']=$_POST['username'];
	header("Location:daycareprofile.php");
}
}
?>