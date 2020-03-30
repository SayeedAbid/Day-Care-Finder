<?php

    session_start();
    $conn = new mysqli('localhost', 'root', '', 'daycaredb');

    $userName = $_POST['userName'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $review = $_POST['review'];
    $star = $_POST['star'];
   

    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    }
    else{

        $stmt = $conn->prepare("insert into reviews(parent_Name, location, phone, review, star) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisis", $userName, $location, $phone, $review, $star);
        $stmt->execute();
        header("Location:successReview.html");
            //echo "Review post Successful";
        $stmt->close();
        $conn->close();
        
        /*$sql = "SELECT * FROM reviews WHERE parent = '$userName' AND location = $location'";
        $result=$conn->query($sql);
        if(!$row = mysqli_fetch_array($result)){
            $stmt = $conn->prepare("insert into reviews(parent_Name, location, phone, review, star) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisis",  $userName, $location, $phone, $review, $star);
            $stmt->execute();
            header("Location:successReview.html");
            //echo "Review post Successful";
            $stmt->close();
            $conn->close();
        }
        else
        {
            header("Location:reviewError.html");
        }*/
    
    }


?>