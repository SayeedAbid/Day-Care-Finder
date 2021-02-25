<?php

	
	error_reporting (E_ALL ^ E_NOTICE); 

	$conn = new mysqli('localhost', 'root', '', 'daycaredb'); 

	session_start();
	$userID=$_SESSION['u_ID'];

	if (isset($_POST['log'])) {

	    $userID = $_POST['userID'];
	    $password = $_POST['password'];

	    $password = md5($password);

        $query = "SELECT * FROM daycare WHERE u_ID=userID AND u_password=password LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $userID, $password);

	        if ($stmt->execute()) {

	        	$result = $stmt->get_result();
		        $user = $result->fetch_assoc();
		 	    //$stmt->close();
		 	    header('location: editprofile.html');

		 	    $stmt->close();
		 	    $conn->close();
		 	}

	}


	if (isset($_POST['update'])) {


		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$username = mysqli_real_escape_string($conn,$_POST['username']);	
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);	
		$current_capacity = mysqli_real_escape_string($conn,$_POST['current_capacity']);
		$fee = mysqli_real_escape_string($conn,$_POST['fee']);
		$location = mysqli_real_escape_string($conn,$_POST['location']);

		$password = md5($password);



		$sql = "UPDATE daycare SET email = $email, user_name = username, u_password = password, phone = $phone, location = $location, current_capacity = $current_capacity, fee = $fee WHERE u_ID = $userID";
		$result=$conn->query($sql); 
		header('location: Daycareprofile.php');

		$sql->close();
		$conn->close();
		
	}
	else {

		$_SESSION['message'] = "Database error. Update failed!";
        $_SESSION['type'] = "alert-danger";	
		
	}

	

?>
