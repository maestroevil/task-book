<?php
/**
 * Данный класс отвечает за манипуляцию над обьектами Task(задачи). Создание, редактирование, сортировка
 */
require "application/class/DataBase.php";
class Task
{	
	protected $DataBase;
	public $logicCreate = 0;
	public $arr_id_sort;
	function __construct()
	{
		//Создаем обьект БД + подключение к ней.
		$this->DataBase = new DataBase;

	}
	// Создаем запись задачи в БД.
	public function insertTask($name,$email,$text,$status,$heading){
		$this->DataBase->query("INSERT INTO `task` (`id`, `name`, `e-mail`, `text`, `status`, `heading`) VALUES (NULL, '$name', '$email', '$text', '$status', '$heading');");
	}
	//Проверяем, создалась запись или нет.
	public function acceptCreate(){
		if($this->logicCreate == 0){
			return " Запись не создана. Откройте редактор и исправьте ошибки.";
		}
		else{
			$this->logicCreate = 0;
			return " Запись успешно создана. ";
		}
	}
	//Проверяем, что выбрал пользователь для сортировки.
	public function getSortValue($nameSort){
		$arr_sort["sort"] = "all";
		if($nameSort == "nameUp"){
			$arr_sort["sort"] = "name";
			$arr_sort["cource"] = "ASC";
		}
		if($nameSort == "nameDown"){
			$arr_sort["sort"] = "name";
			$arr_sort["cource"] = "DESC";
		}
		if($nameSort == "emailUp"){
			$arr_sort["sort"] = "e-mail";
			$arr_sort["cource"] = "ASC";
		}
		if($nameSort == "emailDown"){
			$arr_sort["sort"] = "e-mail";
			$arr_sort["cource"] = "DESC";
		}
		if($nameSort == "statusUp"){
			$arr_sort["sort"] = "status";
			$arr_sort["cource"] = "ASC";
		}
		if($nameSort == "statusDown"){
			$arr_sort["sort"] = "status";
			$arr_sort["cource"] = "DESC";
		}

		return $arr_sort;
	}
	//Создаем массив с id 3 элементов для сортировки
	public function sortArrayBlockTask(){
		$query = $this->DataBase->query("SELECT * FROM `task` ORDER BY `id` DESC LIMIT 3");
		$i= 0;
		while($row = mysql_fetch_row($query)) 
			 {
			 	$this->arr_id_sort[$i++] = $row[0];
			 }
	}
	//Выбираем из БД послдение три записи и сортируем их по заданным значениям.
	public function selectBlockTask($sort,$cource){
		if($sort == "all" && $cource == "all")
			$query = $this->DataBase->query("SELECT * FROM `task` ORDER BY `id` DESC LIMIT 3");
		else{
			$this->sortArrayBlockTask();
			$sort_line = implode(",", $this->arr_id_sort);
			$query = $this->DataBase->query("SELECT * FROM `task` WHERE `id`IN($sort_line) ORDER BY `$sort` $cource  LIMIT 3");
		}
		if(!empty($query))
			 while($row = mysql_fetch_row($query)) 
			 {
			 	$this->createBlockTask($row[0],$row[1],$row[2],$row[4],$row[5],$row[3]);
			 }
		else
			echo "Данных не существует.";
	}
	//функция для получения одного єлемента Task  с  БД
	public function getOneElementTask($id){
		$query = $this->DataBase->query("SELECT * FROM `task` WHERE `id` = '$id'");		
		$row = mysql_fetch_array($query);
		return $row;
		
	}
	//функция  для редактирования  записи Task в бд
	public function updateBlockTask($id,$name,$email,$status,$heading,$text){
		$query = $this->DataBase->query("UPDATE `task` SET `name` = '$name', `e-mail` = '$email', `text` = '$text', `status` = '$status', `heading` = '$heading' WHERE `id` ='$id' ;");
	}
	//Создание графической оболчки обьекта Task
	public function createBlockTask($id,$name,$email,$status,$heading,$text){
		$status_arr = array('0' => "Не выполнено" ,'1' => "Выполнено" );
		echo "<div class='card col-sm-12 col-md-12 col-lg-4'>
			<div class='content'>
				<img class='card-img-top' src='/resource/img/bob.jpg' alt='Card image cap'>
  				<div class='card-body'>
   			 		<p class='card-text'>
   			 			".($_SESSION['autorization'] == true ?
   			 			 "<form action='http://task-book/task/redaktor' method='POST'>
   			 			 	<input type='submit' value='Редактировать' name='$id'>
   			 			  </form>" :  "")."
   			 			<i class='fas fa-user'></i> <b>Имя </b>:$name <br>
   			 			<i class='fas fa-envelope-open'></i> <b>Почта:  </b> $email<br>
   			 			<i class='fas fa-users'></i> <b>Статус: </b>". $status_arr[$status] ."<br>
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