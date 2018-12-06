<?php
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d H:i');
	$tokenNet = $_GET['token'] ;

	 $conn;
        
        try{
            $dsn = "mysql:host=localhost;dbname=sge";
            $username = "joao";
            $password = "BAZINGA";

            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try{
                    $list = new ArrayObject();
                    $result = $conn->query("SELECT * FROM token WHERE num_token='$tokenNet'");
                     if (!$row = $result->fetch(PDO::FETCH_ASSOC)){
		      
                 		header("Location: index.php");
                   
             		}else{
             			$dia = $row["criacao"];
             			$diaMax = strtotime("+1 days",strtotime($dia));
             			//echo ($diaMax);

                 		if(strtotime($date) > $diaMax){
                 			$apaga = $conn->query("DELETE FROM token WHERE num_token='$tokenNet'");
                 			header("Location: index.php");
                 		}else{
                 			
                 		}

            		}

           

                }catch (PDOException $usuario){
                        print "Erro ao buscar lista de clientes";

                   		header("Location: index.php");
                        }
        }catch (PDOException $erro){
            
        print "A conexão com o banco deu errado: ".$erro;
        }
        




	

?>



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
		<h3 id="subtitulo2">Alterar Senha</h3>
		<h5 id="texto">Digite uma senha de no minimo 6 digitos.</h5>
		<br>
		<form action="<?php echo htmlspecialchars("alterar.php?token=$tokenNet");?>" method="POST" onsubmit="return checkEmail(this);">
			
			<div id="user">
				<input type="password" id="novaSenha" name="novaSenha" class="form-control" class="campoLog" required="" placeholder="Senha" minlength="6">
				<br>
			</div>
			<div id="user">
				<input oninput="validarSenha(this)" type="password" name="confirmarSenha" class="form-control" class="campoLog" required="" placeholder="Confirmar senha" id="confirmarSenha">
				<br>
			</div>
			<br>
			<div>
				<script type="text/javascript">
					function checkEmail(theForm) {
    				if (theForm.novaSenha.value != theForm.confirmarSenha.value)
    				{
					     alert('Senhas não conferem');
					        return false;
					    } else {
					        return true;
					    }
					}
				</script>
				<button type="submit" class="btn btn-primary btn-lg btn-block" id="botaoSub">Enviar</button>
			</div>
		</form>
		<a href="index.php"><p>Voltar</p></a>
	</div>
</div>



</body>
</html> 