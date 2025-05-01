<?php
include "./helpers/index.php";
require_once "./config.php";

error_reporting(E_ALL);

use Jaybizzle\CrawlerDetect\CrawlerDetect; 
$CrawlerDetect = new CrawlerDetect; 
if ($CrawlerDetect->isCrawler() || IsBot($ip)) { 
    http_response_code(403); 
    die(); 
}else {
?>

<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php"; ?>
<?php
 if (isset($_SESSION['sessionKey']) && isset($_GET['session_key']) && isset($_SESSION['op']) && isset($_GET['op']) && $_SESSION['op'] == $_GET['op'] && $_SESSION['sessionKey'] == $_GET['session_key']) {
    include './' . $_GET['op']. ".php";
    
} else {

}
?>

<?php include "include/footer.php"; ?>
</html>

<?php } ?>