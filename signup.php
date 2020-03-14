<?php

	error_reporting (E_ALL ^ E_NOTICE); 


	$email = $_POST['email'];
	$username = $_POST['username'];	
	$password = $_POST['password'];
	$phone = $_POST['phone'];	
	$address = $_POST['address'];
	


	$conn = new mysqli('localhost', 'root', '', 'daycaredb');
	if ($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	}
	else{
		$sql = "SELECT * FROM parent WHERE user_name = '$username'";
		$result=$conn->query($sql);

		if(!$row = mysqli_fetch_array($result)){

			$password = md5($password);

			$stmt = $conn->prepare("insert into parent(email, user_name, u_password, contact, location) values(?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $email, $username, $password, $phone, $address);
			$stmt->execute();
			header("Location:success.html");
			//echo "Registration Successful";
			$stmt->close();
			$conn->close();

		}
		else
		{
			header("Location:error_parent.html");
		}

		


		
	}


?>