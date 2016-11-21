<?php
    /*Send SMS using PHP*/    
    
    //Your authentication key
    $authKey = "111799A1wHmgjukQ5725ba10";
    
    //Multiple mobiles numbers separated by comma
    $mobileNumber = "8446832266,9936860043,8149801649";
    
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "TBSCND";
    
    //Your message to send, Add URL encoding here.
    $message = urlencode("3Bs are happy to inform you that SIMAR heights is ready for posession :)");
    
    //Define route 
    $route = "4";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    
    //API URL
    $url="https://control.msg91.com/api/sendhttp.php";
    
    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    

    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    
    //get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    
    curl_close($ch);
    
    echo $output;
?>