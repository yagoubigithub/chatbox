<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat Box</title>
    <link rel="stylesheet" href="style.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <script>
    function submitChat() {
        if (form1.uname.value == '' || form1.msg.value == '') {
            alert('ALL Field Are require');
            return;
        }
        form1.uname.readOnly = true;
        form1.uname.style.border ='none';
        var uname =form1.uname.value;
        var msg = form1.msg.value;
       
        var xmlhttp  =new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById('chatlogs').innerHTML=xmlhttp.responseText;

            }
        }
        xmlhttp.open('GET','insertMesg.php?uname='+uname +'&msg='+msg,true);
        xmlhttp.send();

    }
    $(document).ready(function(e){
$.ajaxSetup({cache:false});
setInterval(function(){
    $('#chatlogs').load('selectMesg.php');
},2000)
    });

        </script>
</head>
<body>
    <form  name="form1">
    Enter Your Chat Name <input type="text" name="uname" /> <br>
    Your Message : <br>
    <textarea name="msg" ></textarea>
    <a href="#" onclick="submitChat()">Send</a><br><br>
    <div id="chatlogs">
    LODING CHATLOG.. 
    </div>

    
    </form>
</body>
</html>