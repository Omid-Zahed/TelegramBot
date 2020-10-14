<?php
require "../vendor/autoload.php";
require "config.php";
use Tiger\TelegramBot;

$telegramBot=new TelegramBot($botToken);
$response=$telegramBot->sendDocument("files/a.txt",$chat_id);
dump ($response);
echo (string)$response->getBody();