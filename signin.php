<!DOCTYPE html>
<html>
<head>
	<title>Parent Login</title>
	<link rel="shortcut icon" type="image/png" href="img/icons/favicon.png"/>
</head>
<link rel="stylesheet" href="signin.css">
<body>
	<header>
		<div class="container">
			<div id="branding">
				<a href="index.html"><h1>KID CARE!</h1></a>
			</div>
			<nav>
				<ul>
					<li><a href="about.html"><button class="button">About Us</button></a></li>
					<li><a href="FAQ.html"><button class="button">FAQ</button></a></li>
					<li><a href="signinas.html"><button class="button">Sing In</button></a></li>
					<li><a href="registeras.html"><button class="button">Sing Up</button></a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="loginbox">
		<h1>Parent Login</h1>
		<form action="signin.php" method="post">
			<p>Username</p>
			<input type="text" email="email" placeholder="Enter Email" required="">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter Password" required="">
			<input type="submit" name="" value="Login"><br>
			<a href="signup.html">Create new account</a><br>
			<a href="index.html">Home</a>
		</form>
	</div>

</body>
</html>

<?php
if (isset($_POST["submit"])){
session_start();
include 'dbh.php';

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$sql="SELECT * FROM parent WHERE username='$user_name' AND password ='$u_password'";
$result=$conn->query($sql);

if(!$row=$result->fetch_array()){
	// header("Location:error.php");
	echo '<script type="text/javascript"> alert("Error : Username or password incorrect.") </script>';
}
else{
	$_SESSION['username']=$_POST['username'];
	header("Location:home.php");
}
}
?>