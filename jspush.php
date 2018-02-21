<!DOCTYPE html>
<html>
<body>

    <h2> Push Notification Sender</h2>

    <form id="form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            
        To  : <input type="text" id="token" name="token"/><br><br>
        Title Message  : <input type="text" id="title" name="title"/><br><br>
        Body Message  : <input type="text" id="body" name="body"/><br><br>
        Data Message  : <input type="text" id="" name="notifId"/><br><br>
        
        <input type="button" value="Send Notif" onClick="sendNotif()">
        <input type="submit" value="Send Notif PHP" onClick="submit">
        
    </form> 
    
    <p id="result"></p>
    
    <script>
        
        function sendNotif(){
            var obj, dbParam, xmlhttp, myObj, x, txt = "";
            var token = document.getElementById('token').value;
            var title = document.getElementById('title').value;
            var body = document.getElementById('body').value;
            dbParam = JSON.stringify({
                "to" : token, 
                "notification": {
                    "title":title,
                    "body": body
                }
            });
            xmlhttp = new XMLHttpRequest();
            
            xmlhttp.onreadystatechange = function() {
                  document.getElementById("result").innerHTML = this.responseText;
            };

            xmlhttp.open("POST", "https://fcm.googleapis.com/fcm/send", true);
            xmlhttp.setRequestHeader("Content-type", "application/json");
            xmlhttp.setRequestHeader("Authorization", "key=AIzaSyA9YNqx2hWUj7DdQv-VRtvUwW_M13hQdNI");
            xmlhttp.send(dbParam);
        }
        
    </script>

    
</body>
</html>

<?php
    // API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AIzaSyA9YNqx2hWUj7DdQv-VRtvUwW_M13hQdNI' );
    
    if(isset($_POST['token']) && isset($_POST['title'])){
        $msg = array
           (
                'body'  => $_POST['body'],
                'title'     => $_POST['title'],
                'vibrate'   => 1,
                'sound'     => 1,
           );
        $data = array
           (
                'notifId'  => $_POST['notifId']
           );

        $fields = array
            (
                'to'  => $_POST['token'],
                'notification' => $msg,
                'data' => $data
            );

        $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        echo $result;
    }
            
?>