<?php
require "../vendor/autoload.php";
require "config.php";
use Tiger\TelegramBot;

$telegramBot=new TelegramBot($botToken);
$response=$telegramBot->getMe();
dump ($response);
dd(json_decode( (string)$response->getBody()));