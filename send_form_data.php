<?php
include("phpmailer/Send_Mail.php");

if(isset($_POST['submit'])){
    //Email information
    $to = "info@bigxpressgloballogistics.com";
    $subject = "Boarding Form Submission";
    $message = "Departure Location: Zone 5 Abuja Copper House\n" .
        "Destination: " . htmlspecialchars($_POST['destination'], ENT_QUOTES) . "\n" .
        "Vehicle Type: " . htmlspecialchars($_POST['vehicle'], ENT_QUOTES) . "\n" .
        "Price: " . htmlspecialchars($_POST['price'], ENT_QUOTES) . "\n" .
        "Passenger Name: " . htmlspecialchars($_POST['name'], ENT_QUOTES) . "\n" .
        "No. of Seats: " . htmlspecialchars($_POST['seats'], ENT_QUOTES) . "\n" .
        "Account Number: 2089214365\n" .
        "Bank: UBA BANK\n" .
        "Name:Kalu Vincent\n" .
        "Email: " . htmlspecialchars($_POST['email'], ENT_QUOTES) . "\n" .
        "Phone: " . htmlspecialchars($_POST['phone'], ENT_QUOTES) . "\n";
		
	$from_email = htmlspecialchars($_POST['email'], ENT_QUOTES);
//print_r($_FILES);
    //Attachment information
	if(count($_FILES) > 0){
		$file = $_FILES['proof-of-payment']['tmp_name'];
		$file_name = $_FILES['proof-of-payment']['name'];
		$file_size = $_FILES['proof-of-payment']['size'];
		$file_type = $_FILES['proof-of-payment']['type'];
		$file_error = $_FILES['proof-of-payment']['error'];

		if($file && $file_size > 0 && $file_error == 0) {
			// Read the file content and encode it as base64
		/*	$content = chunk_split(base64_encode(file_get_contents($file)));
			$boundary = md5(time());

			// Set the email header
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "From: " . $_POST['email'] . "\r\n";
			$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";

			// Set the email body
			$message = "--" . $boundary . "\r\n";
			$message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
			$message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$message .= $message . "\r\n";

			// Add the attachment
			$message .= "--" . $boundary . "\r\n";
			$message .= "Content-Type: " . $file_type . "; name=\"" . $file_name . "\"\r\n";
			$message .= "Content-Transfer-Encoding: base64\r\n";
			$message .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n\r\n";
			$message .= $content . "\r\n\r\n";*/
		} else {
			// Set the email header
	//		$headers = "From: " . $_POST['email'] . "\r\n";
		}

		// Send the email
	/*    if(mail($to, $subject, $message, $headers)){
			echo "Your message was sent successfully.";
		} else {
			echo "There was a problem sending the email.";
		}	*/
		Send_Mail($to, $subject, $message, array("jedhppc@gmail.com", "kchigozie9@gmail.com"), $from_email);
		echo "Email Sent";
		//Send_Mail($to, $subject, $body, $bcc = "", $from)
		
	}
}
?>
