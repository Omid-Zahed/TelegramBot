<?php
require "../vendor/autoload.php";
require "config.php";
use Tiger\TelegramBot;

$telegramBot=new TelegramBot($botToken);
$response=$telegramBot->sendSticker($chat_id,$sticker_id);
dump ($response);
echo (string)$response->getBody();