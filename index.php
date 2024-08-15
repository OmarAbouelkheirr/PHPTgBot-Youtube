
<?php
$Tok = '7152436744:AAHqJtzny330Yb2FHK4Nv5R96_WhDoo6S7Y'; // Telegram Bot Token ( From @botfather )
define('API_KEY', $Tok);
function bot($method, $datas = [])
{
  $function = http_build_query($datas);
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method . "?$function";
  $function1 = file_get_contents($url);
  return json_decode($function1);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$message_id =  $message->message_id;
$name = $message->from->first_name;
$user = $message->from->username;
$id = $message->from->id;
$admin =  1372188096; // Admin ID

if ($text == "/start" and $id != $admin) {
  bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "Hello..",
  ]);
  bot('sendMessage', [
    'chat_id' => $admin,
    'text' => "Someone send /start in your bot.",
  ]);
}

if ($text == "hi" and $id == $admin) {
  bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "Hi...",
    'reply_to_message_id' => $message->message_id,
  ]);
}
