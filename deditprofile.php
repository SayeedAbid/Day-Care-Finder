<?php

	error_reporting (E_ALL ^ E_NOTICE); 

	$conn = new mysqli('localhost', 'root', '', 'daycaredb'); 


	if (isset($_POST['log'])) {

	    $userID = $_POST['userID'];
	    $password = $_POST['password'];

	    $password = md5($password);

        $query = "SELECT * FROM daycare WHERE u_ID=? AND u_password=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $userID, $password);

	        if ($stmt->execute()) {

	        	$result = $stmt->get_result();
		        $user = $result->fetch_assoc();
		 	    //$stmt->close();
		 	    header('location: deditprofile.html');

		 	    $stmt->close();
		 	    $conn->close();
		 	}

		 	/*else { // if password does not match
	                $errors['login_fail'] = "Wrong userID / password";
	        }*/
	}


	if (isset($_POST['update'])) {  


		$email = $_POST['email'];
		$username = $_POST['username'];	
		$password = $_POST['password'];
		$phone = $_POST['phone'];	
		$address = $_POST['address'];
        $current_capacity = $_POST['current_capacity'];
        $fee = $_POST['fee'];
        $img_id = $_POST['img_id'];
        
        

		$password = md5($password);



		$sql = "UPDATE parent SET email = $email, user_name = username, u_password = password, phone = $phone, location = $address, current_capacity=$current_capacity, fee=$fee, img_id=$img_id WHERE u_ID = $userID";
		$result=$conn->query($sql); 
		header('location: daycareprofile.php');

		$sql->close();
		$conn->close();
		
	}
	else {

		$_SESSION['message'] = "Database error. Update failed!";
        $_SESSION['type'] = "alert-danger";	
		
	}

	

?>

<!DOCTYPE html>

  <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>
        
        
        </form>  
	
    </html>
    