<?php

    session_start();
    $conn = new mysqli('localhost', 'root', '', 'daycaredb');

    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $capacity = $_POST['capacity'];
    $age = $_POST['age'];
    $fee = $_POST['fee'];


    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    }
    else{

        $stmt = $conn->prepare("insert into offers(dayCareName, phone, location, capacity, email, fee, ageSpecification) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisis", $userName, $phone, $location, $capacity, $email, $fee, $age);
        $stmt->execute();
        header("Location:success_Post.html");
            //echo "Registration Successful";
        $stmt->close();
        $conn->close();
        
        /*$sql = "SELECT * FROM offers WHERE dayCareName = '$userName' AND location = $location'";
        $result=$conn->query($sql);

        if(!$row = mysqli_fetch_array($result)){


            $stmt = $conn->prepare("insert into offers(dayCareName, phone, location, capacity, email, fee, ageSpecification) values(?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisis", $userName, $phone, $location, $capacity, $email, $fee, $age);
            $stmt->execute();

            header("Location:success_Post.html");
            //echo "Registration Successful";
            $stmt->close();
            $conn->close();

        }
        else
        {
            header("Location:offerPost_error.html");
        }*/
    
    }


?>

