$(document).ready(function () {
    var sender = $("#sendFrom").val();
    var receiver = $("#sendTo").val();
    $("#sendFrom").on("change",function(){
        sender = $("#sendFrom").val();
         $("#chat_text").SelectMesg(sender,receiver);
    });
    $("#sendTo").on("change",function(){
        receiver = $("#sendTo").val();
        $("#chat_text").SelectMesg(sender,receiver);

    });
    $("#chat_text").SelectMesg(sender,receiver);
    $("#send").click(function () {
        var mesg = $("#mesg").val();
        $.post('insertMesg.php', {
            sender: sender,
            mesg: mesg,
            receiver: receiver
        }, function (data) {
            var obj = JSON.parse(data);
            var txt="";
            for(var i=0;i<obj.length;i++){
                txt+=obj[i].sender+" : "+obj[i].mesg+"</br>";
                
            }
            $("#chat_text").html(txt);
                $("#mesg").val("");
        });
    });



    /***********************************/ 
    var t=setInterval(function() {
        $("#chat_text").SelectMesg(sender,receiver);
    },33);
     
});

(function( $ ){
    $.fn.SelectMesg = function(sender,receiver) {
        $.post('selectMesg.php', {
            sender: sender,
            receiver: receiver
        }, function (data) {
            $("#chat_text").html("");
            var obj = JSON.parse(data);
            var txt="";
            for(var i=0;i<obj.length;i++){
                txt+=obj[i].sender+" : "+obj[i].mesg+"</br>";
                
            }
            $("#chat_text").html(txt);
               
        });
       return this;
    }; 
 })( jQuery );