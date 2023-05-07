<?php
    $messageID = $_POST["messageID"];
    $status = $_POST["status"];
    require 'connection.php';


    $sql_query="UPDATE customermessages SET checked=$status WHERE messageID='$messageID'";

    if ($conn->query($sql_query)==TRUE) {
      echo "Done";
    }else{
        echo "Error:".$sql_query."</br>".$conn->error;
    }
    
    $conn->close();
?>