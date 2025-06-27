<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

//if (is_file('../PHPMailer/PHPMailerAutoload.php')) {
//    require_once '../PHPMailer/PHPMailerAutoload.php';
//} else {
//    require_once 'PHPMailer/PHPMailerAutoload.php';
//}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
include_once 'vendor/autoload.php';

class ngs_mail {

    var $subject = "";
    var $body = "";
    var $obj_mail;
    var $address = array();
    var $names = array();
    var $ccMails = array();
    var $fromName = 'Test Mail';

    function sendmail($name, $email, $phone, $message) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.zoho.com';
            $mail->SMTPSecure = 'tls ';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            //$mail->SMTPDebug = 1;   
            $mail->Username = 'systems@i3cubes.com';
            $mail->Password = 'oagj7W?m';
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            ;
            $mail->SetFrom('systems@i3cubes.com', 'i3cubes Contact us form');
            $mail->FromName = $this->fromName;
//        $mail->Mailer   = "smtp";
           // $mail->addReplyTo('alswhportalweb@gmail.com', 'ALSWH-PORTAL');
//        $mail->addBCC('c.pathigodaarcharige@uq.edu.au', 'Chandramali');
//            $mail->addBCC('alswhwebportal@gmail.com', 'ALSWH');
            $mail->WordWrap = 50;
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->Body = $this->body;
            $mail->MsgHTML("Name: $name <br /> Email: $email <br /> Telephone: $phone <br /> Message: $message <br />");
            $i = 0;
            
//            $this->address = array('maleeshpamuditha@gmail.com');
//        $this->names = array('Kumara','Maleesh');
           // foreach ($this->address as $email) {
                //$mail->addAddress($email, $this->names[$i]);
                //$i++;
               
            //}
             $mail->AddAddress('info@i3cubes.com','i3cubes Info');
            if (count($this->ccMails) > 0) {
                foreach ($this->ccMails as $email) {
                    $mail->addBCC($email['email'], $email['name']);
                }
            }
//        print_r($mail->addAddress);
           // $this->setLog();
            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function setLog() {
        $log_file = 'alswh_mail' . date("Y-m") . '.txt';
        $str = date("Y-m-d H:i:s") . "||" . implode(",", $this->address) . "||CC:" . $this->ccMails . " -->" . $this->subject;
        if ($file = fopen($log_file, "a+")) {
            fputs($file, "$str \n");
            fclose($file);
        }
    }

}

?>
