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


include_once "ConexaoBD.php";
$conexao = new ConexaoBD();
$conexao->verificaEmail($email,$data_envio,$hora_envio,$arquivo);

?>