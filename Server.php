<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["UserId"])) {
        $UserId = $_GET["UserId"];
        $FINEIllUseCURL = curl_init("https://discord.com/api/v6/users/{$UserId}");
        curl_setopt_array($FINEIllUseCURL,[
            CURLOPT_RETURNTRANSFER => 1,CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => ["Authorization: bottokenhere"]
        ]);
        $Data = curl_exec($FINEIllUseCURL);
        curl_close($FINEIllUseCURL);
        $DecodedData = json_decode($Data,true);
        if (array_key_exists("message",$DecodedData) == null){
            if (isset($_GET["Json"]) && $_GET["Json"] == "true"){
                header("Content-Type: application/json");
                echo $Data;
            } else {
                echo $DecodedData["username"]."#".$DecodedData["discriminator"];
            }
        } else {
            echo "Not a User ID";
        }
    }
?>