<?php
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email = $_POST["email"];
    $tp = $_POST["tp"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $nextMessageID = 0;
    $currentDate = date("Y-m-d");
    $currentTime = date("h:i:s");

    require 'connection.php';

    $sql = "SELECT MAX(message_Index) FROM customermessages";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nextMessageIndex = $row["MAX(message_Index)"]+1;
            $MessageID = "SA-M-0".$nextMessageIndex;
        }
    } else {
        echo "0";
    }

    $sql_query="INSERT INTO customermessages VALUES ($nextMessageIndex,'$MessageID',false,'$f_name','$l_name','$email',$tp,'$subject','$message','$currentDate','$currentTime') ";

    if ($conn->query($sql_query)==TRUE) {
      echo "We Received your message. Our team will contact you. Thank you!";
    }else{
        echo "Error:".$sql_query."</br>".$conn->error;
    }

    $conn->close();
?>