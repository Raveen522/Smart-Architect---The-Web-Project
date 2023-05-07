<?php
    require 'connection.php';
    $userID = "";
    $user_name = "";

    $sql = "SELECT * FROM users WHERE status=1 ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $userID = $row["userID"];
            $user_name = $row["userName"];
        }
    } else {
        echo "error";
    }

    echo $userID." ".$user_name;
    
    $conn->close();
?>