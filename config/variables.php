<?php

$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chat_id = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
$userId = $update["message"]["from"]["id"];
$username = $update["message"]["from"]["username"];
$firstname = $update["message"]["from"]["first_name"];
$start_msg = $_ENV['START_MSG']; 

$live_array = array(
    'incorrect_cvc', 
    '"cvc_check": "fail"', 
    '"cvc_check": "pass"', 
    'insufficient_funds',
    'lost_card',
    'stolen_card',
    "pickup_card",
    'Your card does not support this type of purchase',
    'transaction_not_allowed',
    'CVV INVALID'
);

?>
