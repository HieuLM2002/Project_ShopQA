<?php
include  "PHPMailer-master/src/PHPMailer.php";
include  "PHPMailer-master/src/Exception.php";
include  "PHPMailer-master/src/SMTP.php";
// include  "PHPMailer-master/src/OAuth.php";
include  "PHPMailer-master/src/POP3.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailer{
 public function dathangmail($tieude,$noidung,$maildathang){
    $mail = new PHPMailer(true); 
    $mail->CharSet = 'UTF-8'; 
        try {
            //Server settings
            $mail->SMTPDebug = 0;              // Enable verbose debug output // bật tính năg gửi thành công hay thất bại vẫn show ra thông tin của mail  
            $mail->isSMTP();                                    // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; //thực hiện smtp sever // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'hieu.lm.2283@aptechlearning.edu.vn';                 // SMTP username
            $mail->Password = 'wgvkemxrrvuobbku';     // pw của app mail và gửi thông qua app mail                      // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('hieu.lm.2283@aptechlearning.edu.vn', 'Website BOUTIQUE'); //Website BOUTIQUE là tiêu đề  mail

            // $mail->addAddress là gửi cho nhiều người
            $mail->addAddress($maildathang, 'Hiếu');      // Add a recipient
                        // Name is optional


            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('hieu.lm.2283@aptechlearning.edu.vn');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>