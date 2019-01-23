<!-- Данная страница отображает визуальную часть "Приложения задачник"-->

<?
	// Подключение класса Task и создание обьекта Task.
	require "application/class/Task.php";
	var_dump($_POST);
	$Task = new Task;
	//Запись в БД.
	if(isset($_POST['name']) && $_POST['email'] && $_POST['text'] && $_POST['heading']){
		$Task->insertTask($_POST['name'],$_POST['email'],$_POST['text'],'0',$_POST['heading']);
		$Task->logicCreate= 1;
		header('Location: http://task-book/');
	}
?>

<div class="container-fluid">
	<div class="row">
		<div class="bg-dark panel">
				<span class="color-dark text-white">Сортировать: </span>
				<form action="http://task-book/" method="POST">
					<table>
						<tr>
							<th class="text-white text-center">Имя</th>
							<th class="text-white text-center">Почта </th>
							<th class="text-white text-center">Статус </th>
							<td></td>
						</tr>
						<tr>
							<td>
								<button type="submit" name="nameUp"><i class='fas fa-arrow-up'></i></button>
								<button type="submit" name="nameDown"><i class='fas fa-arrow-down'></i></button>
							</td>
							<td>
								<button type="submit" name="emailUp"><i class='fas fa-arrow-up'></i></button>
								<button type="submit" name="emailDown"><i class='fas fa-arrow-down'></i></button>
							</td>
							<td>
								<button type="submit" name="statusUp"><i class='fas fa-arrow-up'></i></button>
								<button type="submit" name="statusDown"><i class='fas fa-arrow-down'></i></button>
							</td>
						</tr>
					</table>	
				</form>
				
				<button type="button" class="btn btn-primary">Имя</button>
				<button type="button" class="btn btn-secondary">Почта</button>
				<button type="button" class="btn btn-success">Статус</button>
				<button type="button" class="btn btn-success" id='btn-create-task'>Создать задание</button>
		</div>
		<div class="bg-dark panel n-block" id='panel-create-task'>
			<div class="form-create-task">
				<form action="http://task-book/" method="POST">
					<table>
						<tr>

							<td><span class="text-white"> Имя: </span></td>
							<td>
								<input type="text" name="name" 
								<?php echo (!empty($_POST['name']) &&  !empty($_POST['create-task']) ? "value='$_POST[name]'" : "" )?>>
							</td>
							<td> 
								<?php echo (!empty($_POST['name']) && !empty($_POST['create-task']) ? ""  : "<span class='text-danger'>  Заполните поле</span>")  ?>
							</td>
						</tr>
						<tr>
							<td><span class="text-white"> E-mail: </span></td>
							<td>
								<input type="text" name="email" <?php echo (!empty($_POST['name']) &&  !empty($_POST['create-task']) ? "value='$_POST[email]'" : "" )?>>
							</td>
							<td> 
								<?php echo (!empty($_POST['email']) && !empty($_POST['create-task']) ? ""  : "<span class='text-danger'>  Заполните поле</span>")  ?>
							</td>
						</tr>
						<tr>
							<td><span class="text-white"> Название задания: </span>  </span></td>
							<td>
								<input type="text" name="heading" <?php echo (!empty($_POST['heading']) &&  !empty($_POST['create-task']) ? "value='$_POST[heading]'" : "" )?>> 
							</td>
							<td> <?php echo (!empty($_POST['heading']) && !empty($_POST['create-task']) ? ""  : "<span class='text-danger'>  Заполните поле</span>")  ?></td>
						</tr>
					</table>
					 
					<input  class="btn btn-success" type="submit" name="create-task" value="Создать задание" >
					<br>
					<textarea class="input-text-task" name='text'><?php echo (!empty($_POST['text']) &&  !empty($_POST['create-task']) ? "$_POST[text]" : "" )?></textarea>
					<?php echo (!empty($_POST['text']) && !empty($_POST['create-task']) ? ""  : "<span class='text-danger'>  Заполните поле</span>") ?>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="status-create-task">
			<h2 class="text-dark"> <?php if(!empty($_POST['create-task']) || $Task->logicCreate == 1) echo $Task->acceptCreate(); ?> </h2>
		</div>			
	</div>
	<div class="row">
		<!-- row -->
		 <?php
		 	
		 		$keys = array_keys($_POST);
		 		if(!empty($keys)){
					$sort_type = $keys[0];
					$arr_sort = $Task->getSortValue($sort_type);
		 		}
		 		else{
		 			$arr_sort['sort'] = "all";
		 			$arr_sort['cource'] = "all";
		 		}
		 	
		 	$Task->selectBlockTask($arr_sort["sort"],$arr_sort["cource"]);
		  ?>
	</div>
	<div class="row">
		<nav aria-label="...">
 			<ul class="pagination">
    			<li class="page-item disabled">
      				<a class="page-link" href="#" tabindex="-1">Previous</a>
    			</li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item active">
			      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#">Next</a>
			    </li>
		  	</ul>
		</nav>
	</div>
	<!-- /container -->
</div>
