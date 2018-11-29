<?php
$email = $_POST['email'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');




// Compo E-mail
  


include_once "ConexaoBD.php";
$conexao = new ConexaoBD();
$conexao->verificaEmail($email,$data_envio,$hora_envio,$arquivo);

?>