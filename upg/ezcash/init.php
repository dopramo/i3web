<?php   

$product_id = $_POST['product_id'];
$product_Name = $_POST['product_Name'];
$unit_price = $_POST['unit_price'];
$quantity = $_POST['quantity'];
$service_charges = $_POST['service_charges'];
$Service_Taxes = $_POST['Service_Taxes'];
$Government_Taxes = $_POST['Government_Taxes'];
$Shipping_Charges = $_POST['Shipping_Charges'];
$Subtotal = $_POST['Subtotal'];
$Total = $_POST['Total'];
$tranID = $_POST['tr_id'];
$trAmt = $Total;


$mcode = 'TESTMERCHANT'; //merchant code 
$tid = $_POST['tr_id']; // transaction id 
//$tid = 'As123456'; // transaction id 
$tamount = $_POST['Total']; //transaction amount 
//$tamount = '100.00'; //transaction amount 
$rurl = 'http://www.ngslanka.com/upg/ezcash/index.php';
$sensitiveData = $mcode.'|'.$tid.'|'.$tamount.'|'.$rurl; // query string  
//echo $sensitiveData;
 
$publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCW8KV72IMdhEuuEks4FXTiLU2o
bIpTNIpqhjgiUhtjW4Si8cKLoT7RThyOvUadsgYWejLg2i0BVz+QC6F7pilEfaVS
L/UgGNeNd/m5o/VoX9+caAIyu/n8gBL5JX6asxhjH3FtvCRkT+AgtTY1Kpjb1Btp
1m3mtqHh6+fsIlpH/wIDAQAB
-----END PUBLIC KEY-----
EOD;


//$publicKey = "file://publicKey.key";

//echo $publicKey;
$encrypted = '';
if (!openssl_public_encrypt($sensitiveData, $encrypted, $publicKey)) die('Failed to encrypt data');
$invoice = base64_encode($encrypted); // encoded encrypted query string   
$plaintext = "String to encrypt";

//openssl_public_encrypt($plaintext, $encrypted, $publicKey);

//echo $encrypted;   //encrypted string

?>
<form action="https://ipg.dialog.lk/ezCashIPGExtranet/servlet_sentinal" method="post">
    <input type="hidden" value="<?php echo $invoice; ?>" name="merchantInvoice">
    <input type="submit" name="Submit">
</form>