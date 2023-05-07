<?php
    require 'connection.php';

    $sql = "SELECT MAX(applicationIndex) FROM jobapplications";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nextApplicationIndex = $row["MAX(applicationIndex)"]+1;
            $applicationID = "SA-A-0".$nextApplicationIndex;
        }
    } else {
        echo "0";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nameWithInitials = $_POST['name-with-initials'];
      $fullName = $_POST['full-name'];
      $address = $_POST['address'];
      $zip_code = $_POST['zip-code'];
      $country = $_POST['country'];
      $tp = $_POST['tp-num'];
      $homeTp = $_POST['home-tp-num'];
      $email = $_POST['email'];
      $description = $_POST['candidate-description'];
      $qualifications = $_POST['candidate-qualifications'];
      $currentDate = date("Y-m-d");
      $currentTime = date("h:i:s");
      
      if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $filename = $applicationID."-".$file['name'];
        $tmp_name = $file['tmp_name'];
        $destination =  '../super-user/job-application-images/' . $filename;
        move_uploaded_file($tmp_name, $destination);
        }
    }


    $sql_query="INSERT INTO jobapplications VALUES ($nextApplicationIndex,'$applicationID',false,'$filename','$nameWithInitials','$fullName','$address','$zip_code','$country','$tp','$homeTp','$email','$description','$qualifications','$currentDate','$currentTime') ";

    if ($conn->query($sql_query)==TRUE) {
      echo "We Received your application. Our team will contact you. Thank you!";
    }else{
        echo "Error:".$sql_query."</br>".$conn->error;
    }

    $conn->close();
?>