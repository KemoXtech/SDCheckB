<?php

/*

///==[Checker Stats Commands]==///

/stats - Returns the Checker Stats

*/


require dirname(__FILE__)."/../config/config.php";
require dirname(__FILE__)."/../config/variables.php";
require_once dirname(__FILE__)."/../functions/bot.php";
require_once dirname(__FILE__)."/../functions/db.php";
require_once dirname(__FILE__)."/../functions/functions.php";

////////////====[MUTE]====////////////
if(strpos($message, "/stats") === 0 || strpos($message, "!stats") === 0){   
    $antispam = antispamCheck($userId);
    addUser($userId);
    
    if($antispam != False){
      bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"[<u>ANTI SPAM</u>] Try again after <b>$antispam</b>s.",
        'parse_mode'=>'html',
        'reply_to_message_id'=> $message_id
      ]);
      return;

    }else{
        $gStats = fetchGlobalStats();
        $uStats = fetchUserStats($userId);
        bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"≡ <b>User Stats</b>

- <ins>Total Cards Checked:</ins> ".$uStats['total_checked']."
- <ins>Total CVV Cards:</ins> ".$uStats['total_cvv']."
- <ins>Total CCN Cards:</ins> ".$uStats['total_ccn']."
          
≡ <b>Global Checker Stats</b>

- <ins>Total Cards Checked:</ins> ".$gStats['total_checked']."
- <ins>Total CVV Cards:</ins> ".$gStats['total_cvv']."
- <ins>Total CCN Cards:</ins> ".$gStats['total_ccn']."",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id

        ]);          
            
}

}


?>
