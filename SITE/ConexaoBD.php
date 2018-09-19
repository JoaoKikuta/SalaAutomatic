<?php
class ConexaoDB {
    private $conn;
    public function __construct() {
        try{
            $dsn = "mysql:host=localhost;dbname=SGU";
            $username = "root";
            $password = "";
            $this->conn = new PDO($dsn, $username, $password);
          
            
        } catch (PDOException $erro){
            print "A conexão com o banco deu errado";
        }
    }

    //Login
        public function verificaLogin($User,$Senha){
        try{
            $list = new ArrayObject();
            session_start();
            include_once 'usuario.php';
            $result = $this->conn->query("SELECT * FROM usuario WHERE User='$User' and Senha='$Senha'");

             if ($row = $result->fetch(PDO::FETCH_ASSOC)){
                 $usuario = new usuario();
                 $usuario->setUser($row['User']);
                 $_SESSION["logado"] = TRUE;
                 $_SESSION["User"] = $User; 
                 
                 header("Location: index.php");
                 return $list;
                 
                   
             }else{
                 print "erro";
            }
        }
        catch (PDOException $usuario){
            print "Erro ao buscar lista de clientes";
        }
    }

?>