<?php 
// Inicia sessões 
session_start(); 
 
// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["User"]))
{ 
// Usuário não logado! Redireciona para a página de login 
header("Location: ../index.php"); 
}
?>