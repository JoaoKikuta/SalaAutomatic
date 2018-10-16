<?php
$User = $_POST['user'];
$Senha = $_POST['senha'];

include_once "ConexaoBD.php";
$conexao = new ConexaoBD();
$conexao->verificaLogin($User,$Senha);



?>