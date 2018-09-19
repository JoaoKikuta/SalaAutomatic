
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
		<h3 id="subtitulo2">Esqueceu a Senha?</h3>
		<h5 id="texto">Informe seu e-mail e enviaremos instruções para você mudar sua senha.</h5>
		<br>
		<form action="<?php echo htmlspecialchars("email.php");?>" method="POST">
			<div id="user">
				<input type="text" name="email" class="form-control" class="campoLog" required="" placeholder="E-mail">
				<br>
			</div>
			<br>
			<div>
				<button type="submit" class="btn btn-primary btn-lg btn-block" id="botaoSub">Enviar</button>
			</div>
		</form>
		<a href="index.php"><p>Voltar</p></a>
	</div>
</div>


<?php
?>
</body>
</html> 