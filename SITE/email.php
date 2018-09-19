<?php
$email = $_POST['email'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');




// Compo E-mail
  $arquivo = 
  "<Body>

        <h1>SGE: Sistema de Gerenciamento Energético </h1>
        <br>
        <h3>Não responda esse E-mail</h3>
        <p>para alterar a senha, acesse esse link:</p>
        <br>
        <br>
        <br>
        <br>
        <p>Se você não solicitou essa alteração de senha, desconsidere esse E-mail.
        <p>$data_envio
        $hora_envio</p>
        
  </body>";


require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
    
    $mail = new PHPMailer;
     
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'testeifms@gmail.com';
    $mail->Password = 'ifmsnvtcc';
    $mail->Port = 587;
     
    $mail->setFrom('alterar_senha@sge.com.br', 'SGE: Sistema de Gerenciamento de email');
    $mail->addAddress($email);
    
    $mail->isHTML(true);
     
    $mail->Subject = "Alterar Senha";
    $mail->Body    = nl2br($arquivo);
    $mail->AltBody = nl2br(strip_tags($arquivo));     
    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
         header('Location: index.php?enviado');
    }
?>