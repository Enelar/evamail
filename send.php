<?php

function smtp_send($to, $title, $text)
{
  include('PHPMailer/class.phpmailer.php');
  include('PHPMailer/class.smtp.php');
  $mail = new PHPMailer;
  $mail->CharSet = 'UTF-8';

  //$mail->SMTPDebug = 3;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'email';                 // SMTP username
  $mail->Password = 'qwerty';   // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->From = 'email';
  $mail->FromName = 'Name Surname';
  //$mail->addAddress('nurettin@a.com', 'a');     // Add a recipient
  $mail->addAddress($to);               // Name is optional
  $mail->addReplyTo('email', 'Name Surname');

  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = $title;
  $mail->Body    = $text;
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  }
}

function render_template($tmpl)
{
  if ($tmpl != 'default')
  {
    $str = file_get_contents($tmpl);
    $obj = json_decode($str, true);
    if (!isset($obj['template']))
      die("Шаблон поврежден. Неудается прочитать");
    $overload = str_replace(["\r", "\n"], "\n", $obj['template']);

    global $title;
    $title = $obj['title'];
  }

  ob_start();
  include('template.php');
  $rendered = ob_get_contents();
  ob_end_clean();

  return $rendered;
}

$html = render_template($_GET['template']);
if (!isset($title))
  $title = "Посмотрите правде в глаза – ваше производство скоро вымрет.";
smtp_send($_GET['to'], $title, $html);
