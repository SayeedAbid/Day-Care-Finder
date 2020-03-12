<!DOCTYPE html>
<html>
<head>
	<title>Parent Register</title>
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
	
	<div class="registrationbox">
		<h1>Parent Register</h1>
		<form action="signup.php" method="post">
			<p>Email</p>
			<input type="text" name="email" placeholder="Email" required="">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required="">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter Password" required="">
			<p>Phone</p>
			<input type="tel" name="phone" placeholder="Enter 11 digit phone number. Eg:01XXXXXXXXX" pattern="[01]{2}[0-9]{9}" required="">
            <p>Region</p>
            <br>
            <select name="Region">
                <option value="">Select</option>
                <option value="Dhanmondi">Dhanmondi</option>
                <option value="Gulshan">Gulshan</option>
                <option value="Farmgate">Farmgate</option>
                <option value="Lalmatia">Lalmatia</option>
                <option value="Mohammadpur">Mohammadpur</option>
                <option value="Moghbazar">Moghbazar</option>
            </select>
            <br>
            <p>Location</p>
			<input type="text" name="address" placeholder="Address" required="">
			<br>
			<input type="submit" name="" value="Sign Up"><br>
			
			<p>Already have an account ?     </p>
			<a href="signin.html">Sign In</a>

		</form>
	</div>

</body>
</html>


<?php 
if (isset($_POST["submit"])){

include 'dbh.php';

$email=mysqli_real_escape_string($conn,$_POST['email']);
$username=mysqli_real_escape_string($conn,$_POST['user_name']);
$password=mysqli_real_escape_string($conn,$_POST['u_password']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$region=mysqli_real_escape_string($conn,$_POST['region']);
$address=mysqli_real_escape_string($conn,$_POST['address']);



$sql = "SELECT * FROM parent WHERE username='$user_name'";
$result=$conn->query($sql);


if(!$row = mysqli_fetch_array($result))
{
	$sql= "INSERT INTO `parent` ('email', `user_name`, `u_password`, `contact`, `region`, `location`) VALUES ('$email', $user_name','$u_password', '$phone','$region','$address')";

	$result=$conn->query($sql);

	header("Location:signin.php");
}
else
{
	echo '<script type="text/javascript"> alert("Error : Username already exists") </script>';

	// header("Location:signup.html");
}

}

 ?>