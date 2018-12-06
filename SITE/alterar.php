<?php
$senhaNova = $_POST['novaSenha'];
$token = $_GET['token'];

include_once "ConexaoBD.php";
$conexao = new ConexaoBD();
$conexao->NovaSenha($senhaNova, $token);



?>