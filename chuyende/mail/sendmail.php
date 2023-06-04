<?php 
include  "PHPMailer-master/src/PHPMailer.php";
include  "PHPMailer-master/src/Exception.php";
include  "PHPMailer-master/src/OAuth.php";
include  "PHPMailer-master/src/POP3.php";
include  "PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{


// print_r($mail);

	public function dathangmail($tieude,$noidung,$maildathang){
		$mail = new PHPMailer(true);
		$mail->CharSet= 'UTF-8';
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'trungadcvn@gmail.com';                 // SMTP username
		    $mail->Password = 'qhnfarsvixirhouf';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to
		 
		    //Recipients
		  	$mail->setFrom('trungadcvn@gmail.com', 'TTSHOP');
		    // $mail->addAddress('trungdangyeu3k@gmail.com', '');
		    $mail->addAddress($maildathang, 'Khách hàng');     //Add a recipient
		    // $mail->addAddress('ellen@example.com');               //Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    $mail->addCC('trungadcvn@gmail.com');
		    // $mail->addBCC('bcc@example.com');

		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
		    $mail->AddEmbeddedImage('image/logo10.png', 'logo_2u');
		    $mail->AddEmbeddedImage('image/thanks.gif', 'thanks');
		    $mail->AddEmbeddedImage('image/thanks2.gif', 'thanks2');
		    $mail->AddEmbeddedImage('../image/logo10.png', 'logo_2u2');
		    $mail->AddEmbeddedImage('../image/thanks3.gif', 'thanks3');
		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
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