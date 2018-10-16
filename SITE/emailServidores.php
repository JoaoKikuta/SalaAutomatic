<?php
class emailServidores{
	private $email;
	private $data_envio;
    private $hora_envio;
    private $arquivo;

	public function __construct(){

	}
	function getEmail(){
		return $this->Email;
	}

	function setEmail($Email){
		$this->Email = $Email;
	}


	function getData_envio(){
		return $this->Data_envio;
	}

	function setData_envio($Data_envio){
		$this->Data_envio = $Data_envio;
	}


	function getHora_envio(){
		return $this->Hora_envio;
	}

	function setHora_envio($Hora_envio){
		$this->Hora_envio = $Hora_envio;
	}
	

	function getArquivo(){
		return $this->Arquivo;
	}

	function setArquivo($Arquivo){
		$this->Arquivo = $Arquivo;
	}


}

?>