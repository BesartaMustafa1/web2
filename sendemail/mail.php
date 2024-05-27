<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

  $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'brineta.ukaa@gmail.com';   //SMTP write your email
    $mail->Password   = 'jjly zlej dvom dmej';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->addAddress( $_POST["email"]); // Sender Email and name
    $mail->setFrom('townlibrary2024@gmail.com');     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $_POST["subject"];   // email subject headings
    $mail->Body    = $_POST["message"]; //email message

    // Success sent message alert
    $mail->send();
    echo
    " 
    <script> 
     alert('Message was sent successfully!');
     document.location.href = 'index.php';
    </script>
    ";

    if (isset($_POST['submit'])) {
      if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
          $response = "All fields are required";
      } else {
          $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
      }
  }
}
?>