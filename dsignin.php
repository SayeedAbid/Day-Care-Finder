<?php

	$conn = new mysqli('localhost', 'root', '', 'daycaredb');

	if (isset($_POST['log'])) {
		$userId = mysqli_real_escape_string($conn, $_POST['userId']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$password = md5($password);

		if ($userId!="" && $password!="") {

			$sql = "SELECT * FROM daycare WHERE user_id = '$userId' AND user_password = '$password'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$count = mysqli_num_rows($result);
			if ($count==1) {
				header("Location:Daycareprofile.html");
				//echo "Login Successful";
			}
			else {
				header("Location:index.html");
				//echo "Login Failed";
			}
		}
	}

?>