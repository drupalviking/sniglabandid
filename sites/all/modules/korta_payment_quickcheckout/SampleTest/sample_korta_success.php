<html>

<head>
    <title>Callback from Korta</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: samueljon
 * Date: 2.12.14
 * Time: 16:20


This is a demo code that shows how to receive the postback from the Webpayment system and how the downloadmd5 value is used to confirm that the payment was complated !<br/>
This will be your page and willl contain better code and a cooler look !<br/><br/>
 */
// secretcode gotten from KORTA
$secretcode = "cd7szEnP9P5MDPQT9E3Z899E48SP9sv6iw3f93FT";

// Values that are posted by KORTA Webpayment system
$korta_reference = $_POST['reference'];
$korta_checkvaluemd5 = $_POST['checkvaluemd5'];
$korta_downloadmd5 = $_POST['downloadmd5'];
$korta_time = $_POST['time'];
$korta_cardbrand = $_POST['cardbrand'];
$korta_card4 =  $_POST['card4'];

$my_downloadmd5 = md5(htmlentities( '2' . $korta_checkvaluemd5  . $korta_reference . $secretcode . 'TEST'));

if ($my_downloadmd5 == $korta_downloadmd5)
{
    echo 'Electronic signature correct!<br/>';
    echo '<strong>Payment accepted!</strong>' . '<br/>';
    echo 'Order           : ' . $korta_reference . '<br/>';
  echo 'Time of payment : ' . $korta_time . '<br/>';
  echo 'Card type       : ' . $korta_cardbrand . '<br/>';
  echo 'Last 4 in cardnumber : ' . $korta_card4 . '<br/>';
}
else
{
  echo 'Electronic signature does not match, is someone hacking ? <br/>';
  echo 'Signature = [' . my_downloadmd5 . ']<br/>';
}
?>

</body>
</html>