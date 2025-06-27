<?php
//Parameters getting from config file  
//$SVR_URL = constant('https://www.sampathvishwa.com/SVRClientWeb/ActionController?Action.S MPayments.Init='); 
//SVR_PID = constant('1000000014'); 
//$SVR_RURL = constant('http%3A%2F%2Flocalhost/unified%20payment%20gateway/vishwa/index.php');
$key = md5(microtime().rand());
echo $key;

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
                      
$SVR_URL = 'https://www.sampathvishwa.com/SVRClientWeb/ActionController?Action.SMPayments.Init=Y'; 
$SVR_PID = '1000000014'; 
$SVR_RURL = 'http://www.ngslanka.com/upg/vishwa/index.php?session=vishwa';

//Set request mode 
$sbUrl = $SVR_URL."&MD=P"; 
//Set payee id 
$sbUrl .= "&PID=".$SVR_PID;
//Set transaction reference number 
$sbUrl .= "&PRN=".$tranID; //Merchant transaction reference 
//Set amount 
$sbUrl .= "&AMT=".$trAmt; //Payment amount 
//Set currency 
$sbUrl .= "&CRN=LKR&RU="; 
//Set return URL 
$sbUrl .= $SVR_RURL;  

//Redirect to URL 
header('Location: '.$sbUrl);  
