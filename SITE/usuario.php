<?php
class usuario{
	private $User;
	private $Senha;

	public function __construct(){

	}
	function getUser(){
		return $this->User;
	}
	function getSenha(){
		return $this->Senha;
	}

	function setUser($User){
		$this->User = $User;
	}
	function setSenha($Senha){
		$this->Senha = $Senha;
	}
}

?>