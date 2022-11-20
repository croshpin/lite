<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'kopysov07@gmail.com';
  $mail->Password   = 'Komps0809';
  $mail->Port = 587;
  $mail->setFrom("kopysov07@gmail.com","Имя от кого отправлять");
  $mail->addAddress("wakorab902@lance7.com","");//Кому отправляем
//$mail->addReplyTo("kudaotvetit@yandex.ru","Имя кому писать при ответе");
  $mail->SMTPSecure = 'tls';
  $mail->isHTML(true);//HTML формат
  $mail->Subject = "Тема сообщения";
  $mail->Body    = "Содержание сообщения";
  $mail->AltBody = "Альтернативное содержание сообщения";

  $mail->send();
  echo "Сообщение отправлено";
} catch (Exception $e) {
  echo "Ошибка отправки: {$mail->ErrorInfo}";
// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);