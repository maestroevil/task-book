<?php
/**
 * 
 Класс "DateBase" отвечает за подключение базы данных, обработки запросов.
 */
class DataBase 
{
	protected $dbValue;
	protected $dbConnect;
	function __construct()
	{
		$this->dbValue = require 'application/config/db.php';
        $this->connect();
	}

	public function connect(){
		$this->dbConnect = @mysql_connect ($this->dbValue['host'],$this->dbValue['user'], $this->dbValue['password']); 
		if (!$this->dbConnect) {
			echo ("Не могу подключиться к серверу базы данных!"); 
		}
		if(@mysql_select_db($this->dbValue['db'])) { 
			
		}
		else {echo "Не могу подключиться к базе данных";}
		
	}

	public function query($line){
		$result = mysql_query($line);
		return $result;
	}
}




?>