<?php
	session_start(); 

	include 'signin.php';

	$conn = new mysqli('localhost', 'root', '', 'daycaredb');

	$sql = "SELECT * FROM parent WHERE u_ID=? LIMIT 1";
	$result = $conn->prepare($sql);
	$result->bind_param('i', $userID);
	

	if ($result->execute()) {
		$retrieve = $result->get_result();
		$data = $retrieve->fetch_assoc();

		$email = $data['email'];
		$username = $data['user_name'];	
		$phone = $data['phone'];	
		$address = $data['address'];

		$_SESSION['$userID']=$data['userID'];
	}
	else
		echo "Query couldn't get executed";

	

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/png" href="img/icons/favicon.png"/>

</head> 
<link rel="stylesheet" href="profiles.css">
<body>
	<header>
		<div class="container">
			<div id="branding">
				<a href="userprofile.php"><h1>Kid Care!</h1></a>
			</div>
			<nav>
				<ul>
					<li><a href="editprofile.html"><button class="button">Edit Profile</button></a></li>
					<li><a href="findDayCare.php"><button class="button">DayCare Info</button></a></li>
					<li><a href="postReview.html"><button class="button">Post Review</button></a></li>
					<li><a href="Message.html"><button class="button">Message</button></a></li>
                    <li><a href="index.html"><button class="button">Sing Out</button></a></li>
                    
				</ul>
			</nav>
		</div>
	</header>
	
 <div class="row">
  <div class="column">     
	<div class="card">
	  <img src="uploads/userpic.png" alt="Rusafa" style="width:35%">
	    <body style=" background-color: #E3D7BB">
    
  <h1><?php echo $username; ?></h1>
  <p class="title">Parent</p>
  <p><?php echo $address ?></p>
    <p><?php echo $phone; ?></p>
    <p><?php echo $email; ?></p>
  <a href="#"><i class="fa fa-Email"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-facebook"></i></a>
  <p><button>Contact</button></p>
</div>
       
    

</body>
</html>