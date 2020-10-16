<?php
require "../vendor/autoload.php";
require "config.php";
use Tiger\TelegramBot;

$telegramBot=new TelegramBot($botToken);
$response=$telegramBot->sendVenue($chat_id,49.279814,-123.125758,"Vancouver","address Vancouver");
dd(json_decode( (string)$response->getBody()));
