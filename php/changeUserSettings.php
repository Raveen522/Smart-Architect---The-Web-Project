<?php
    $userID = $_POST["userID"];
    $currentPW = $_POST["currentPW"];
    $newPW = $_POST["newPW"];

    require 'connection.php';
    $fetchedPW = "";
    $sql = "SELECT password FROM users WHERE userID='$userID'  ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $fetchedPW = $row["password"];
        }
    } else {
        echo "Error";
    }


    if($fetchedPW==$currentPW){
        $sql_query="UPDATE users SET password='$newPW ' WHERE userID='$userID' ";
        
        if ($conn->query($sql_query)==TRUE) {
            echo "Password Updated";
        }else{
            echo "error";
        }
    }else{
        echo "Current password does not match with you entered.";
    }

    $conn->close();
?>