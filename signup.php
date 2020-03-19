<?php

	error_reporting (E_ALL ^ E_NOTICE); 
	include 'sendEmails.php';


	$email = $_POST['email'];
	$username = $_POST['username'];	
	$password = $_POST['password'];
	$phone = $_POST['phone'];	
	$address = $_POST['address'];
	$token = bin2hex(random_bytes(50));
	


	$conn = new mysqli('localhost', 'root', '', 'daycaredb');
	if ($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	}
	else{
		$sql = "SELECT * FROM parent WHERE user_name = '$username'";
		$result=$conn->query($sql);

		if(!$row = mysqli_fetch_array($result)){

			$password = md5($password);

			$stmt = $conn->prepare("insert into parent(email, user_name, u_password, phone, location, token) values(?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssss", $email, $username, $password, $phone, $address, $token);
			$stmt->execute();
			sendVerificationEmail($email, $token);


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

	function verifyUser($token) {

		$conn = new mysqli('localhost', 'root', '', 'daycaredb');
		$sql_1 = "SELECT * FROM parent WHERE token='$token' LIMIT 1";
		$result_1=$conn->query($sql_1);

		if (mysqli_num_rows($result_1) > 0) {
			
			$user = mysqli_fetch_assoc($result_1);
			$update_query = "UPDATE parent SET verified=1 WHERE token='$token'";

			if(mysqli_query($conn, $update_query)) {
				header("Location:index.html");
			}
		}

	}


?>