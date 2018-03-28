<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'bartenderscott@gmail.com';                 // SMTP username
    $mail->Password = 'Vince$ybur4en$ik3027';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bartenderscott@gmail.com', 'bartenderscott@gmail.com');
    $mail->addAddress('bartenderscott@gmail.com');     // Add a recipient

//	$body = "<p><strong>Hello World!</strong>This is my first email with phpmailer</p>";
    
	$firstname = $_POST['firstname'] ;
  	$lastname = $_POST['lastname'] ;
	$email = $_POST['email'] ;
  	$phone = $_POST['phone'] ;
  	$message = $_POST['message'] ;
	
	$webform = "$firstname <br> $lastname <br> $email <br> $phone <br> $message";
	
  
	
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Estimate Request';
    $mail->Body    = $webform;
    $mail->AltBody = $webform;
	
    $mail->send();
    echo 'Message has been sent';
	echo "<script>$('#thankyouModal').modal('show')</script>";

	
	sleep(5);
	header("Location: index.html");
	
	
	
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	sleep(5);
	header("Location: index.html");
}


