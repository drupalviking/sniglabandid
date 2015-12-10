<html>

<head><title></title>TestForm Korta</title></head>
<body>
<?php
/*
This is a page that shows you how the code behind a payment instruction to the KORTA Webpayment system may look
The way that the example works is that when you have an agreement you can assign your values and try it out
This is a base-example, of-course it will be much cooler when it's in your system.
*/
// Data received from Korta, you get them when you have applied with KORTA !
$merchant = '8181249';
$terminal= '11706';
$secretcode = 'cd7szEnP9P5MDPQT9E3Z899E48SP9sv6iw3f93FT';

// Information from your system ! Lines in description are separated by <br>
$amount = '2965';
$cur = 'ISK';
$description = 'A';

// Electronic signature used so that KORTA can confirm that the payment was received from you un-altered !
$checkvaluemd5 = md5(htmlentities($amount . $cur . $merchant . $terminal . $description . $secretcode. 'TEST')) ;

$your_downloadurl = 'http://eirberg.is.kosmosogkaos.is/korta/sample_korta_success.php';

?>

<form action='https://netgreidslur.korta.is/testing/' method='post'>
    <input type='hidden' name='amount' value='<?php echo $amount; ?>' />
    <input type='hidden' name='currency' value='<?php echo $cur; ?>' />
    <input type='hidden' name='merchant' value='<?php echo $merchant; ?>' />
    <input type='hidden' name='terminal' value='<?php echo $terminal; ?>' />
    <input name='description' type='hidden' value='<?php echo $description; ?>'>
    <input type='hidden' name='checkvaluemd5' value='<?php echo $checkvaluemd5; ?>' />

    <!-- Send a buyer automatically to my page once payment is done ! -->
    <!-- More options can be found here https://netgreidslur.korta.is/testing/en_usage.html -->
    <input type='hidden' name='refermethod' value='POST' />
    <input type='hidden' name='refertarget' value='_top' />

    <input type='hidden' name='downloadurl' value='<?php echo $your_downloadurl; ?>' />
    <!-- Pay button ! -->
    <input type="submit" value="Pay at KORTA" />
</form>
</body>
</html>