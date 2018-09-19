<?php
$User = $_POST['user'];
$Senha = $_POST['senha'];

include_once "ConexaoDB.php";
$conexao = new ConexaoDB();
$conexao->verificaLogin($User,$Senha);





?>