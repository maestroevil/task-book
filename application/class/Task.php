<?php
/**
 * 
 */
require "application/class/DataBase.php";

class Task
{	
	protected $DataBase;
	protected $logicCreate = 0;
	function __construct()
	{
		$this->DataBase = new DataBase;

	}

	public function insertTask($name,$email,$text,$status,$heading){
		$this->DataBase->query("INSERT INTO `task` (`id`, `name`, `e-mail`, `text`, `status`, `heading`) VALUES (NULL, '$name', '$email', '$text', '$status', '$heading');");
	}
	public function acceptCreate(){
		if($this->$logicCreate == 0){
			return " Запись не создана. Откройте редактор и исправьте ошибки.";
		}
		else{
			$this->$logicCreate = 0;
			return " Запись успешно создана. ";
		}
		
	}
}
	

?>