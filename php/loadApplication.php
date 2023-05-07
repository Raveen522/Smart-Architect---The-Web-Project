<?php
    $applicationID = $_POST["applicationID"];
    require 'connection.php';


    $sqlQuery = "SELECT * FROM jobapplications WHERE applicationID='$applicationID'";

    $result = $conn->query($sqlQuery);


    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<div class='col-photo'>
                <img src='../super-user/job-application-images/".$row["photo"]."' alt=''>                    
            </div>";
            echo "<div class='col-form'>";
                echo "  <label id='name-with-initials'>Name with initials : ".$row["name_withInitials"]."</label> <br>
                        <label id='full-name'>Full name : ".$row["fullName"]."</label> <br>
                        <label id='address'>Address : ".$row["address"]."</label> <br>

                        <div class='input-group'>
                            <label id='zip-code'>Zip Code : ".$row["zip_code"]."</label>
                            <label id='country'>Country : ".$row["country"]."</label>
                            <label id='tp-num'>Telephone : ".$row["tp"]."</label>
                            <label id='home-tp-num'>Home Telephone : ".$row["homeTp"]."</label>
                        </div>
                    
                        <label id='email'>Email : ".$row["email"]."</label>

                        <br>
                        <br>
                        <label id=''>Description :</label> <br>
                        <textarea name='candidate-description' id='candidate-description' disabled>".$row["description"]."</textarea>
                        
                        <br>
                        <label id=''>Qualifications :</label> <br>
                        <textarea name='candidate-qualifications' id='candidate-qualifications' disabled>".$row["qualifications"]."</textarea>

                        <button onclick='sendApplicationRespond()'>Send Response</button>
                ";

            echo "</div";
        } 
    } else {
        echo "0";
    }
    
    $conn->close();
?>
