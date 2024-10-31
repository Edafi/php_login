<?php
function get_api_data(){
    $curl = curl_init();
    $api = rand(0, 1);
    if($api){
        $url = "https://catfact.ninja/fact";
    }else{
        $url = "https://dog.ceo/api/breeds/image/random";
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if($e = curl_error($curl)) {
        echo $e;
    } 
    else{ 
        $decodedData = json_decode($response, true); 
    }
    if($api){
        $decodedData = $decodedData["fact"];
    }
    else {
        $decodedData = $decodedData["message"];
    }
    curl_close($curl);
    return $decodedData;
}
?>