<?php 

echo $_GET['conf']."<br>";


if($_REQUEST['PAID']=="Y"){
    $vishwaTranID  = $_REQUEST['BID'];  
    $merchantTranID = $_REQUEST['PRN'];  
    echo "success";
  echo'  
    <td class="content">
<h1>
<!--WEBBOT bot="Navigation" S-Type="banner" S-Orientation="horizontal" S-Rendering="text" startspan -->Successful Payment<!--webbot bot="Navigation" i-checksum="53988" endspan --></h1>
<p style="text-align: center">&nbsp;</p>
              <p align="center"><b>Thank
              you for your purchase! </b></p>
<p align="center"><b>Your report 
order will be sent by email <i>usually within 24 hours</i>, as long as we have received all of 
the requested information. If you have not received your report after 24 hours, 
please send us an email. (The Astro Signature Graph Forecast is emailed within 48 hours). </b></p>
<p align="center"><b>Be sure to check any spam or junk mail folders for an 
email from us. Reports arrive as attachments to the email - you receive the 
file, not a link to a web page. </b></p>
<p align="center"><b>Please note that your report(s) will be delivered to the 
email address registered with Paypal, unless otherwise specified. </b></p>
<p align="center"><b>If you omitted birth information during the ordering 
process, or if youd like to use 
an alternate email address for your report delivery, send
</b>
<a href="mailto:reports@ngslanka.com?subject=Additional Information About My Report Order">
kaushalya</a><b> an email with this information. If your order is missing 
information, we will contact you as well.</b></p>
<p align="center"><b>You might want to add
</b><a href="mailto:kristen@cafeastrology.com">reports</a><b><a href="mailto:reports@ngslanka.com">@ngslanka.com</a> to your 
email address book or white/allow list.</b></p>
<span lang="en-ca"><b><font face="Verdana" size="2">
<hr>
</font></b></span><p></p>
<p align="center"><b>Return to 
the <a href="astrologyreports.html">Astrology 
Reports page</a>.</b></p>
  
            <p align="left">
            </p><center>
              Any questions? Send
              Kristen an email for more information or help:
				<a href="mailto:reports@cafeastrology.com">reports@ngslanka.com</a>&nbsp;
              </center>
            </td>';
    //****STEP 3****************    
  //  $SVR_VERIFY_URL = constant('VERIFY_URL');     
  //  $url = $SVR_VERIFY_URL."&MD=V"; //Mode 
  //  $url .= "&PID=".$SVR_PID; //PID 
  //  $url .= "&PRN=".$merchantTranID; 
  //  $url .= "&TRN=".$vishwaTranID; 
  //  $url .= "&AMT=".unserialize($_SESSION['trAmt']);//Amount from session  
    
    //Create connection through CURL  
  //  $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); 
  //  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
  //  curl_setopt($ch, CURLOPT_HEADER, false); 
  //  $data = curl_exec($ch);  
    
    
} else if($_REQUEST['PAID'] == "N"){
    //Payment not completed on Vishwa  
    echo 'Payment failed';
    
}
?>