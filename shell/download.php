<?php
session_start();
$email = $_SESSION["email"];
$message = file_get_contents("shell.html");
  require_once "phpmailer/class.phpmailer.php";
$mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 465;                   // set the SMTP port for the GMAIL server

        $mail->Username = 'xxx@xxx.com';  //add email address
        $mail->Password = 'xxxx'; //add account password

        $mail->SetFrom('xxx@xxx.com', 'xxxx'); //add FROM email and sender name

        $mail->AddAddress($email);

        $mail->Subject = "E Mailer"; // add subject line
        $mail->MsgHTML($message);

        try {
          $mail->send();
          echo "Success! Your message has been sent to ".$email."<a href='../index.php'>Index Page</a>"; // modify success message
        } catch (Exception $ex) {
          $msg = $ex->getMessage();
          $msgType = "warning";
        }
?>