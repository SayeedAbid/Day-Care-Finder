<?php
	session_start(); 

	include 'signin.php';

	$conn = new mysqli('localhost', 'root', '', 'daycaredb');

	$sql = "SELECT * FROM daycare WHERE user_id=? LIMIT 1";
	$result = $conn->prepare($sql);
	$result->bind_param('i', $userID);
	

	if ($result->execute()) {
		$retrieve = $result->get_result();
		$data = $retrieve->fetch_assoc();

		$email = $data['email'];
		$username = $data['user_name'];	
		$phone = $data['phone'];	
		$address = $data['address'];

		$_SESSION['$user_id']=$data['userID'];
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
    <body style="background-image: url(uploads/daycareprofile.jpg)">
	<header>
		<div class="container">
			<div id="branding">
				<a href="Daycareprofile.html"><h1>Kid Care!</h1></a>
			</div>
			<nav>
				<ul>
					<li><a href="postOffer.html"><button class="button">Post Offer</button></a></li>
					<li><a href="deditprofile.html"><button class="button">Edit Profile</button></a></li>
					<li><a href="message.php"><button class="button">Message</button></a></li>
                    <li><a href="index.html"><button class="button">Sing Out</button></a></li>
                    
				</ul>
			</nav>
		</div>
	</header>
	   
<div class="card">
  
  <img src="uploads/userpic.png" alt="Rusafa" style="width:35%">
     <body style=" background-color: #000000">
    
  <h1>Day Care Name</h1>
  <p class="title">Location</p>
  <p>Current Capacity</p>
    <p>Monthly Fee</p>
    <p>Phone Number</p>
  <a href="#"><i class="fa fa-Email"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-facebook"></i></a>
  <p><button>Contact</button></p>
</div>
       
    

</body>
</html>