<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Find Day Care</title>
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/png" href="img/icons/favicon.png"/>

</head>

<link rel="stylesheet" href="offerStyle.css">

<body>
	<header>
		<div class="container">
			<div id="branding">
				<a href="userprofile.html"><h1>Kid Care!</h1></a>
			</div>
			<nav>
				<ul>
					<li><a href="editAuth.html"><button class="button">Edit Profile</button></a></li>
					<li><a href="findDayCare.php"><button class="button">Find DayCare</button></a></li>
					<li><a href="postReview.html"><button class="button">Post Review</button></a></li>
					<li><a href="Message.html"><button class="button">Message</button></a></li>
                    <li><a href="index.html"><button class="button">Sing Out</button></a></li>
                    
				</ul>
			</nav>
		</div>
	</header>

	<div class="searchstudentbutton">
		<br><br>
		<a href="searchDayCare.php">Search</a>
		<br><br>
	</div>

	<div class="tables">
		<center><p style="font-weight: bold;">Day Care Offers</p></center>
		<table>
			<tr>
				<th>Day Care Name</th>
				<th>Email</th>
				<th>Location</th>
				<th>Phone</th>
				<th>Current Capacity</th>
				<th>Age Limit(Years)</th>
				<th>Fee(Tk.)/month</th>
			</tr>
			<?php 
			session_start();
    		$conn = new mysqli('localhost', 'root', '', 'daycaredb');
			$sql="SELECT * FROM offers";
			$result=$conn->query($sql);
			while($row = mysqli_fetch_assoc($result))
			{
				echo 
				"<tr>
					<td>" .$row['dayCareName']. "</td>
					<td>" .$row['email']. "</td>
					<td>" .$row['location']. "</td>
					<td>" .$row['phone']. "</td>
					<td>" .$row['capacity']."</td>
					<td>" .$row['ageSpecification']."</td>
					<td>" .$row['fee']."</td>
				</tr>";
			}
			 ?>
		</table>
	</div>

</body>
</html>