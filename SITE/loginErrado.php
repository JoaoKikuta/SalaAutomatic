<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<title>SGE: Sistema de Gerenciamento Energético</title>
</head>
<body>
<div id="base">
	<div class="login">
		<a href="index.php" class="linkLogo">
			<div class="logo">
				<h1 id="titulo">SGE</h1>
				<h5 id="subtitulo">Sistema de Gerenciamento Energético</h5>
			</div>
		</a>
		<br>
		<p id="erro">Dados Incorretos! </p>
		<form action="<?php echo htmlspecialchars("verificaLog.php");?>" method="POST">
			<div id="user">
				<label class="labelLog">Siape:</label>
				<br>
				<input type="text" name="user" class="form-control" class="campoLog" required="">
				<br>
			</div>
			<div id="senha">
				<label class="labelLog">Senha:</label>
				<br>
				<input type="password" name="senha" class="form-control" class="campoLog" required="">
			</div>
			<br>
			<div>
				<button type="submit" class="btn btn-primary btn-lg btn-block" id="botaoSub">Acessar</button>
				<a href="esqueceuSenha.php"> <p>Esqueceu a Senha?</p></a>
			</div>
		</form>
	</div>
</div>




<?php
?>
</body>
</html> 