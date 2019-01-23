<?php
/**
 * 
 */
require "application/class/DataBase.php";

class Task
{	
	protected $DataBase;
	public $logicCreate = 0;
	function __construct()
	{
		$this->DataBase = new DataBase;

	}

	public function insertTask($name,$email,$text,$status,$heading){
		$this->DataBase->query("INSERT INTO `task` (`id`, `name`, `e-mail`, `text`, `status`, `heading`) VALUES (NULL, '$name', '$email', '$text', '$status', '$heading');");
	}
	public function acceptCreate(){
		if($this->logicCreate == 0){
			return " Запись не создана. Откройте редактор и исправьте ошибки.";
		}
		else{
			$this->logicCreate = 0;
			return " Запись успешно создана. ";
		}
	}
	public function selectBlockTask($sort){
		$query = $this->DataBase->query("SELECT * FROM `task` ORDER BY `id` DESC LIMIT 6");		
		$row = mysql_fetch_array($query);
		 while($row = mysql_fetch_array($query)) 
		 {
		 	$arr[$row['id']] = $row;
		 }
		 foreach ($arr as $key => $v) {
		 	$this->createBlockTask($v['id'],$v['name'],$v['e-mail'],$v['status'],$v['heading'],$v['text']);
		 }

	}

	public function createBlockTask($id,$name,$email,$status,$heading,$text){
		echo "<div class='card col-sm-12 col-md-12 col-lg-4'>
			<div class='content'>
				<img class='card-img-top' src='/resource/img/bob.jpg' alt='Card image cap'>
  				<div class='card-body'>
   			 		<p class='card-text'>
   			 			".($_SESSION['autorization'] == true ?
   			 			 "<form action='http://task-book/task/redaktor' method='POST'>
   			 			 	<input type='submit' value='Редактировать' name='redakt-$id'  >
   			 			  </form>" :  "")."
   			 			<i class='fas fa-user'></i> <b>Имя </b>:$name <br>
   			 			<i class='fas fa-envelope-open'></i> <b>Почта:  </b> $email<br>
   			 			<i class='fas fa-users'></i> <b>Статус: </b> $status <br>
   			 			<br>
   			 		</p>
   			 		<p>
   			 			<h4>$heading</h4>
   			 				$text
   			 		</p>
 		 		</div>
			</div>
		</div>";
	}
}
	

?>