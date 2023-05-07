<?php
    $messageID = $_POST["messageID"];
    require 'connection.php';


    $sqlQuery = "SELECT * FROM customermessages WHERE messageID='$messageID'";

    $result = $conn->query($sqlQuery);


    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<label id='f-name'>First name :".$row["first_name"]."</label> <br>";
            echo "<label id='l-name'>Last name :".$row["last_name"]."</label> <br>";
            echo "<label id='msgEmail'>Email :".$row["email"]."</label> <br>";
            echo "<label id='tp'>Telephone :".$row["telephone"]."</label> <br>";
            echo "<label id='subject'>Subject :".$row["subject"]."</label> <br>";
            echo "<label id='message'>Message : <br>".$row["message"]."</label> <br>";
        } 
    } else {
        echo "0";
    }

    echo 
    "
        <br>
        <br>
        <button onclick='sendRespondMessage()'>Send reply</button>
    ";
    
    $conn->close();
?>

