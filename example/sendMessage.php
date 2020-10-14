<?php
require "../vendor/autoload.php";
require "config.php";
use Tiger\TelegramBot;

$telegramBot=new TelegramBot($botToken);
$response=$telegramBot->sendMessage($chat_id,"hi");
dump ($response);
echo (string)$response->getBody();