<?php

	$conn = new mysqli('localhost', 'root', '', 'daycaredb');

	if (isset($_POST['log'])) {

	    $userID = $_POST['userID'];
	    $password = $_POST['password'];

	    $password = md5($password);

        $query = "SELECT * FROM parent WHERE u_ID=? AND u_password=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $userID, $password);

	        if ($stmt->execute()) {

	        	$result = $stmt->get_result();
		        $user = $result->fetch_assoc();
		 	    //$stmt->close();

	        	if ($user['verified'] == 1) {
	        		
		            $_SESSION['userID'] = $user['userID'];
	                $_SESSION['message'] = 'You are logged in!';
	                $_SESSION['type'] = 'alert-success';
	                header('location: userprofile.php');
	                exit(0);	
	        	}
	        	else
	        		echo "Email is not verified";
	            
            }

	        else { // if password does not match
	                $errors['login_fail'] = "Wrong userID / password";
	        }
	}

    else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }


?>