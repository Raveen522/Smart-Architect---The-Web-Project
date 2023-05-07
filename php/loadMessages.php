<?php
    require 'connection.php';


    $sqlQuery = "SELECT messageID,first_name,message,email,checked FROM customermessages WHERE NOT message_Index=0";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<tr id='".$row["messageID"]."' onclick='loadMessage(this.id)'>";
                echo "<td>".$row["messageID"]."</td>";
                echo "<td>".$row["first_name"]."</td>";
                echo "<td>".$row["message"]."</td>";
                echo "<td>".$row["email"]."</td>";
                if($row["checked"]==0){
                    echo "<td>";
                        echo "<input type='checkbox' name='message-check' id='".$row["messageID"]."' class='table-check' onchange='updateMessageCheck(this.id)' >";
                    echo "</td>";
                }else{
                    echo "<td>";
                        echo "<input type='checkbox' name='message-check' id='".$row["messageID"]."' class='table-check' onchange='updateMessageCheck(this.id)' checked >";
                    echo "</td>";
                }
            echo "</tr>";
        }
    } else {
        echo "<td colspan=6>0 Results</td>";
    }
    
    $conn->close();
?>