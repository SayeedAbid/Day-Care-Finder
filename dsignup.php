<?php

	error_reporting (E_ALL ^ E_NOTICE); 


	
	$username = $_POST['username'];	
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$capacity = $_POST['capacity'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$fee = $_POST['fee'];
	


	$conn = new mysqli('localhost', 'root', '', 'daycaredb');
	if ($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	}
	else{
		
		$sql = "SELECT * FROM daycare WHERE name = '$username' AND location = '$address'";
		$result=$conn->query($sql);

		if(!$row = mysqli_fetch_array($result)){

			$password = md5($password);

			$stmt = $conn->prepare("insert into daycare(name, phone, location, current_capacity, email, user_password, fee) values(?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssissi", $username, $phone, $address, $capacity, $email, $password, $fee);
			$stmt->execute();
			header("Location:success.html");
			//echo "Registration Successful";
			$stmt->close();
			$conn->close();

		}
		else
		{
			header("Location:error_daycare.html");
		}

		


		
	}


?>