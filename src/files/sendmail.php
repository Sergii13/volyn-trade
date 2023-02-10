<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->isSMTP();   
try {
   //Server settings
   $mail->SMTPDebug = 1;                      //Enable verbose debug output
                                           //Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   $mail->Username   = 'sergii.khilchuk13@gmail.com';                     //SMTP username
   $mail->Password   = 'ftpsrivgyndevlxp';                               //SMTP password
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
   $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

   //Recipients
   $mail->setFrom('from@example.com', 'Cana');
   $mail->addAddress('sergii.khilchuk13@gmail.com', 'Admin');     //Add a recipient


   //Content
   $mail->isHTML(true);                                  //Set email format to HTML
   $mail->Subject = 'Заявка з сайту Cana';
   $name = $_POST['name'];
   $email = $_POST['email'];
   $message = $_POST['telefon'];
   $message = $_POST['message'];
       $mail->Body = "
       <html>
       <p>Ім`я:  <b>".$name." </b></p>
       <p>Email <b>".$email." </b></p>
       <p>Телефон  <b>".$telefon." </b></p>
       <p>Повідомлення:  <b>".$message." </b></p>
       </html>";

   $mail->send();
   echo 'Message has been sent';
} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


	//Тіло листа
// 
// 	/*
// 	//Прикріпити файл
// 	if (!empty($_FILES['image']['tmp_name'])) {
// 		//шлях завантаження файлу
// 		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
// 		//грузимо файл
// 		if (copy($_FILES['image']['tmp_name'], $filePath)){
// 			$fileAttach = $filePath;
// 			$body.='<p><strong>Фото у додатку</strong>';
// 			$mail->addAttachment($fileAttach);
// 		}
// 	}
// 	*/

// 	$mail->Body = $body;

// 	//Відправляємо
// 	if (!$mail->send()) {
// 		$message = 'Помилка';
// 	} else {
// 		$message = 'Дані надіслані!';
// 	}

// 	$response = ['message' => $message];

// 	header('Content-type: application/json');
// 	echo json_encode($response);
// 