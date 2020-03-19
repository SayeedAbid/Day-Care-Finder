<?php

	$conn = new mysqli('localhost', 'root', '', 'daycaredb');

	if (isset($_POST['log'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$password = md5($password);

		if ($username!="" && $password!="") {

			$sql = "SELECT * FROM parent WHERE user_name = '$username' AND u_password = '$password'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$count = mysqli_num_rows($result);
			if ($count==1) {
				header("Location:userprofile.php");
				//echo "Login Successful";
			}
			else {
				header("Location:index.html");
				//echo "Login Failed";
			}
		}
	}

?>