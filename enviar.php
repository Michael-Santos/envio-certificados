<?php

function enviarCertificado($nome, $email, $arquivo) {
  include 'env.php';

  require 'vendor/autoload.php';

  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = $host;
  $mail->SMTPAuth = true;
  $mail->Username = $user;
  $mail->Password = $pass;
  $mail->SMTPSecure = 'tls';
  $mail->Port = $port;
  $mail->CharSet = "UTF-8";

  $mail->setFrom('contato@secot.com.br', $from);
  $mail->addAddress($email, $nome);
  $mail->isHTML(true);
  $mail->addAttachment($arquivo, "Certificado.pdf", "base64", "application/pdf");

  $mail->Subject = 'IX SeCoT - Seu certificado chegou!';
  $mail->Body    = '
  <h1>' . $nome . ', demorou, mas chegou!</h1>
  <p>Segue em anexo o certificado da IX SeCoT!</p>

  <p>Devido às mudanças no horário de algumas palestras e problemas de internet durante o evento, pode ser que tenham ocorrido erros em algumas presenças. Além disso, o certificado foi gerado com o nome cadastrado em nosso sistema, o que pode gerar nomes incompletos ou estranhos.</p>

  <p>Qualquer problema, responda este e-mail ou envie uma mensagem para nossa página no Facebook!</p>

  <p>Att,<p>
  <p>Equipe da IX SeCoT</p>
  ';
  $mail->AltBody = 'Demorou, mas chegou! Segue em anexo o certificado da IX SeCoT!

  Devido às mudanças no horário de algumas palestras e problemas de internet durante o evento, pode ser que tenham ocorrido erros em algumas presenças. Além disso, o certificado foi gerado com o nome cadastrado em nosso sistema, o que pode gerar nomes incompletos ou estranhos.

  Qualquer problema, responda este e-mail ou envie uma mensagem para nossa página no Facebook!

  Att,
  Equipe da IX SeCoT';

  sleep(3);

  if(!$mail->send()) {
       return '<b>Erro</b> ao enviar (' . $nome . '): ' . $mail->ErrorInfo . "<br/>";
  } else {
       return 'enviado: ' . $nome . "<br/>";
  }
  return "Erro desconhecido";

}
