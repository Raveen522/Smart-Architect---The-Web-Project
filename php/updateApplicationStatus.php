<?php
    $applicationID = $_POST["applicationID"];
    $status = $_POST["status"];
    require 'connection.php';


    $sql_query="UPDATE jobapplications SET checked=$status WHERE applicationID='$applicationID'";

    if ($conn->query($sql_query)==TRUE) {
      echo "Done";
    }else{
        echo "Error:".$sql_query."</br>".$conn->error;
    }
    
    $conn->close();
?>