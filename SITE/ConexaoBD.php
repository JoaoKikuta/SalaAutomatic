<?php
class ConexaoBD {
    private $conn;
    public function __construct() {
        try{



            $dsn = "mysql:host=localhost;dbname=sge";
            $username = "joao";
            $password = "@Ifms2018";
            $this->conn = new PDO($dsn, $username, $password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
            
        } catch (PDOException $erro){
            
            print "A conexão com o banco deu errado: ".$erro;
        }
    }

    //Login
        public function verificaLogin($User,$Senha){
        try{
            $list = new ArrayObject();
            session_start();
            include_once 'usuario.php';
            $result = $this->conn->query("SELECT * FROM Servidores WHERE siape='$User' and Senha='$Senha'");

             if ($row = $result->fetch(PDO::FETCH_ASSOC)){
                 $usuario = new usuario();
                 $usuario->setUser($row['User']);
                 $_SESSION["logado"] = TRUE;
                 $_SESSION["User"] = $User; 
                 
                 header("Location: index.php");
                 return $list;
                 
                   
             }else{
                 header("Location: loginErrado.php");
            }
        }
        catch (PDOException $usuario){
            print "Erro ao buscar lista de clientes";
        }
    }


    //email
    public function verificaemail($email,$data_envio, $hora_envio, $arquivo){
        try{
            $list = new ArrayObject();
            session_start();
            include_once 'emailServidores.php';
            $result = $this->conn->query("SELECT * FROM Servidores WHERE email='$email'");

             if ($row = $result->fetch(PDO::FETCH_ASSOC)){

                
                $numero = rand();
                $token = md5($numero);
                $siape = $row['siape'];
                $dataAtual = date('Y-m-d h:i:s');

                print("INSERT INTO token (nun_token, siape, criacao) 
                    VALUES ('$token', '$siape','$dataAtual')");
                $salva = $this->conn->prepare("INSERT INTO token (num_token, siape, criacao) 
                    VALUES (:ntoken, :siape,:criacao)");
                $salva->bindParam('ntoken', $token);
                $salva->bindParam('siape', $siape);
                $salva->bindParam('criacao', $dataAtual);

                $salva->execute();





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
                     header('Location: emailEnviado.php');
                }


                 return $list;
                 
                   
             }else{
                 header("Location: semEmail.php");
            }
        }
        catch (PDOException $usuario){
            print $usuario;
            //print "Erro ao buscar lista de clientes";
        }
    }




}

?>