<?php
//This code provides a simple example of using the SocketLabs Notification API built entirely using PHP (no need for NodeJS!)

$data = file_get_contents('php://input');
$decodeddata = json_decode($data);

//Define the Secret Key (replace with your secret key)
$secretkey = "YOUR-SECRETKEY-HERE";
//
//Check the Secret Key is Correct
if($decodeddata->SecretKey == $secretkey){
    if($decodeddata->Type == "Tracking" && $decodeddata->TrackingType == "0"){
        emailclick($decodeddata);
    }elseif($decodeddata->Type == "Tracking" && $decodeddata->TrackingType == "1"){
        emailopen($decodeddata);
    }elseif($decodeddata->Type == "Complaint"){
        emailcomplaint($decodeddata);
    }elseif($decodeddata->Type == "Failed"){
        emailfailed($decodeddata);
    }elseif($decodeddata->Type == "Delivered"){
        emailsent($decodeddata);
    }elseif($decodeddata->Type == "Tracking" && $decodeddata->TrackingType == "2"){
        emailunsubscribe($decodeddata);
    }
    //Secret Key is Correct (throw 200)
}else{
    //Secret Key is incorrect (throw 404)
    header("HTTP/1.0 404 Not Found");
}

function emailclick($decodeddata){
    header("HTTP/1.1 200 OK");
}

function emailcomplaint($decodeddata){
    header("HTTP/1.1 200 OK");
}

function emailfailed($decodeddata){
    header("HTTP/1.1 200 OK");
}

function emailopen($decodeddata){
    header("HTTP/1.1 200 OK");
}

function emailsent($decodeddata){
    header("HTTP/1.1 200 OK");
}

function emailunsubscribe($decodeddata){
    header("HTTP/1.1 200 OK");
}
?>