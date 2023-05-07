<?php
    require 'connection.php';

    $sqlQuery = "SELECT applicationID,name_withInitials,fullName,tp,checked FROM jobapplications WHERE NOT applicationIndex=0";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<tr id='".$row["applicationID"]."' onclick='loadApplication(this.id)'>";
            echo "<td>".$row["applicationID"]."</td>";
            echo "<td>".$row["name_withInitials"]."</td>";
            echo "<td>".$row["fullName"]."</td>";
            echo "<td>".$row["tp"]."</td>";
            if($row["checked"]==0){
                echo "<td>";
                    echo "<input type='checkbox' name='application-check' id='".$row["applicationID"]."' class='table-check' onchange='updateApplicationCheck(this.id)' >";
                echo "</td>";
            }else{
                echo "<td>";
                    echo "<input type='checkbox' name='application-check' id='".$row["applicationID"]."' class='table-check' onchange='updateApplicationCheck(this.id)' checked >";
                echo "</td>";
            }
        echo "</tr>";
    }
    } else {
        echo "<td colspan=6>0 Results</td>";
    }
    
    $conn->close();
?>