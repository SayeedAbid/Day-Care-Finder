<?php

	error_reporting (E_ALL ^ E_NOTICE); 
	include 'd_sendEmails.php';


	
	$username = $_POST['username'];	
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$capacity = $_POST['capacity'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$fee = $_POST['fee'];
	$token = bin2hex(random_bytes(50));
	


	$conn = new mysqli('localhost', 'root', '', 'daycaredb');
	if ($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	}
	else{
		
		$sql = "SELECT * FROM daycare WHERE name = '$username' AND location = '$address'";
		$result=$conn->query($sql);

		if(!$row = mysqli_fetch_array($result)){

			$password = md5($password);

			$stmt = $conn->prepare("insert into daycare(name, phone, location, current_capacity, email, user_password, fee, token) values(?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssissis", $username, $phone, $address, $capacity, $email, $password, $fee, $token);
			$stmt->execute();
			sendVerificationEmail($email, $token);

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

	function verifyUser($token) {

		$conn = new mysqli('localhost', 'root', '', 'daycaredb');
		$sql_1 = "SELECT * FROM daycare WHERE token='$token' LIMIT 1";
		$result_1=$conn->query($sql_1);

		if (mysqli_num_rows($result_1) > 0) {
			
			$user = mysqli_fetch_assoc($result_1);
			$update_query = "UPDATE daycare SET verified=1 WHERE token='$token'";

			if(mysqli_query($conn, $update_query)) {
				header("Location:index.html");
			}
		}

	}


?>