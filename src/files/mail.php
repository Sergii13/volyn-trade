<?php
$to = "sergii.khilchuk13@gmail.com"; // addresses to email pdf to
$from = "name_site@domain.com"; // address message is sent from
$subject = "НАЗВА ЛИСТА"; // email subject

$headers = "From: $from";

$body = "Ваше ім’я: ".$_POST['name']."<br>";
$body .= "E-mail: ".$_POST['email']."<br>";
$body .= "Повідомлення: ".$_POST['message']."<br><br>";


// File
$eol = PHP_EOL;
// add html message body
$message = "--$mime_boundary$eol" .
	"Content-Type: text/html; charset=\"iso-8859-1\"$eol" .
	"Content-Transfer-Encoding: 7bit$eol$eol" .
	$body . $eol;

// fetch pdf

// attach pdf to email

// Send the email
if(mail($to, $subject, $message, $headers)) {
	echo "The email was sent.";
}
else {
	echo "There was an error sending the mail.";
}
?>