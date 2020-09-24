<?php

namespace Acme\Helpers;

class SendEmail{
	/**
	 * [sendEmail description]
	 * @param array  $to 	  Reciver of message ['receiver@domain.org', 'other@domain.org' => 'A name']
	 * @param string $subject Subject of message
	 * @param string $message Body of message
	 * @param array  $from    ['john@doe.com' => 'John Doe']
	 * @return Void       Sends Email
	 */
	public static function sendEmail($to, $subject, $message, $from = ""){
		if (strlen($from) == 0) {
			$from = [$_ENV['SMTP_FROM_EMAIL'] => $_ENV['SMTP_FROM_NAME']];
		}

		// Create the Transport
		$transport = (new \Swift_SmtpTransport($_ENV['SMTP_HOST'], $_ENV['SMTP_PORT']))
		  ->setUsername($_ENV['SMTP_USER'])
		  ->setPassword($_ENV['SMTP_PASS']);

		// Create the Mailer using your created Transport
		$mailer = new \Swift_Mailer($transport);

		// Create a message
		$email = (new \Swift_Message($subject))
		  ->setFrom($from)
		  ->setTo($to)
		  ->setBody($message)
		  ->addPart($message, 'text/html');

		// Send the message
		$result = $mailer->send($email);

	}
}