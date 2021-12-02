<?php


require __DIR__."/config/config.php";
require __DIR__."/config/variables.php";
require __DIR__."/functions/bot.php";
require __DIR__."/functions/functions.php";
require __DIR__."/functions/db.php";


date_default_timezone_set($config['timeZone']);


////Modules
require __DIR__."/modules/admin.php";
require __DIR__."/modules/skcheck.php";
require __DIR__."/modules/binlookup.php";
require __DIR__."/modules/iban.php";
require __DIR__."/modules/stats.php";
require __DIR__."/modules/me.php";
require __DIR__."/modules/apikey.php";


require __DIR__."/modules/checker/ss.php";
require __DIR__."/modules/checker/schk.php";
require __DIR__."/modules/checker/sm.php";



//////////////===[START]===//////////////

if(strpos($message, "/start") === 0){
if(!isBanned($userId) && !isMuted($userId)){

  if($userId == $config['adminID']){
    $messagesec = "<b>Type /admin to know admin commands</b>";
  }

    addUser($userId);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<b>Hello @$username,

Type /cmds to know all my commands!</b>

$messagesec",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
    'reply_markup'=>json_encode(['inline_keyboard' => [
        [
          ['text' => "💠 Created By 💠", 'url' => "t.me/ninjanaveen"]
        ],
        [
          ['text' => "💎 Source Code 💎", 'url' => "t.me/IndianBotsChat"]
        ],
      ], 'resize_keyboard' => true])
        
    ]);
  }
}

//////////////===[CMDS]===//////////////

if(strpos($message, "/cmds") === 0 || strpos($message, "!cmds") === 0){

  if(!isBanned($userId) && !isMuted($userId)){
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>Which commands would you like to check?</b>",
    'parse_mode'=>'html',
    'reply_to_message_id'=> $message_id,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>"💳 CC Checker Gates",'callback_data'=>"checkergates"]],[['text'=>"🛠 Other Commands",'callback_data'=>"othercmds"]],
    ],'resize_keyboard'=>true])
    ]);
  }
  
  }
  
  if($data == "back"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>Which commands would you like to check?</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>"💳 CC Checker Gates",'callback_data'=>"checkergates"]],[['text'=>"🛠 Other Commands",'callback_data'=>"othercmds"]],
    ],'resize_keyboard'=>true])
    ]);
  }
  
  if($data == "checkergates"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>━━CC Checker Gates━━</b>
  
<b>/ss | !ss - Stripe [Auth]</b>
<b>/sm | !sm - Stripe [Merchant]</b>
<b>/schk | !schk - User Stripe Merchant [Needs SK]</b>

<b>/apikey sk_live_xxx - Add SK Key for /schk gate</b>
<b>/myapikey | !myapikey - View the added SK Key for /schk gate</b>

<b>ϟ Join <a href='t.me/IndianBots'>IndianBots</a></b>",
    'parse_mode'=>'html',
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>"Return",'callback_data'=>"back"]]
  ],'resize_keyboard'=>true])
  ]);
  }
  
  
  if($data == "othercmds"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>━━Other Commands━━</b>
  
<b>/me | !me</b> - Your Info
<b>/stats | !stats</b> - Checker Stats
<b>/key | !key</b> - SK Key Checker
<b>/bin | !bin</b> - Bin Lookup
<b>/iban | !iban</b> - IBAN Checker
  
  <b>ϟ Join <a href='t.me/IndianBots'>IndianBots</a></b>",
    'parse_mode'=>'html',
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>"Return",'callback_data'=>"back"]]
  ],'resize_keyboard'=>true])
  ]);
  }

?>
