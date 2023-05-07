function loadMessages(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loaded-messages").innerHTML=this.responseText;
        }
    };

    xmlhttp.open("POST", "../php/loadMessages.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function loadApplications(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loaded-applications").innerHTML=this.responseText;
        }
    };

    xmlhttp.open("POST", "../php/loadApplications.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function updateMessageCheck(messageID){
    var status = document.getElementById(messageID);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };   
    xmlhttp.open("POST", "../php/updateMessageStatus.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    if(status.checked == true){
        if(confirm("Are sure do you want to mark as read ?")){
            xmlhttp.send(
                "messageID=" + messageID +"&"+ 
                "status=" + 1
            );

        }else{
            status.checked = false;
        }
    }else{
        if(confirm("Are you sure do you want to mark as unread ?")){
            xmlhttp.send(
                "messageID=" + messageID +"&"+ 
                "status=" + 0
            );
        }else{
            status.checked = true;
        }
    }
}

function updateApplicationCheck(applicationID){
    var status = document.getElementById(applicationID);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };   
    xmlhttp.open("POST", "../php/updateApplicationStatus.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    if(status.checked == true){
        if(confirm("Are sure do you want to mark as read ?")){
            xmlhttp.send(
                "applicationID=" + applicationID +"&"+ 
                "status=" + 1
            );
        }else{
            status.checked = false;
        }
    }else{
        if(confirm("Are you sure do you want to mark as unread ?")){
            xmlhttp.send(
                "applicationID=" + applicationID +"&"+ 
                "status=" + 0
            );
        }else{
            status.checked = true;
        }
    }
}