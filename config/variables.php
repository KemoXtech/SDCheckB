<?php

$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chat_id = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
$id = $update["message"]["from"]["id"];
$username = $update["message"]["from"]["username"];
$firstname = $update["message"]["from"]["first_name"];
$start_msg = $_ENV['START_MSG']; 

$replytomessageis = $update->message->reply_to_message->text;

$data = $update->callback_query->data;

$callbackfname = $update->callback_query->from->first_name;

$callbacklname = $update->callback_query->from->last_name;

$callbackusername = $update->callback_query->from->username;

$callbackchatid = $update->callback_query->message->chat->id;

$callbackuserid = $update->callback_query->message->reply_to_message->from->id;

$callbackmessageid = $update->callback_query->message->message_id;


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
