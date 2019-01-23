<?
	require "application/class/Task.php";
	$Task = new Task;
	if(isset($_POST['name']) && $_POST['email'] && $_POST['text'] && $_POST['heading']){
		$Task->insertTask($_POST['name'],$_POST['email'],$_POST['text'],'0',$_POST['heading']);
		unset($_POST);
		$Task->logicCreate = 1;
	}
?>

<div class="container-fluid">
	<div class="row">
		<div class="bg-dark panel">
				<span class="color-dark text-white">Сортировать: </span>
				<button type="button" class="btn btn-primary">Имя</button>
				<button type="button" class="btn btn-secondary">Почта</button>
				<button type="button" class="btn btn-success">Статус</button>
				<button type="button" class="btn btn-success" id='btn-create-task'>Создать задание</button>
		</div>
		<div class="row">
			 <h2> <?php $Task->acceptCreate(); ?> </h2>
			 
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
					<?php echo (!empty($_POST['text']) && !empty($_POST['create-task']) ? ""  : "<span class='text-danger'>  Заполните поле</span>")  ?>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<!-- row -->
		<div class="card col-sm-12 col-md-12 col-lg-4  ">
			<div class="content">
				<img class="card-img-top " src="/resource/img/bob.jpg" alt="Card image cap">
  				<div class="card-body ">
   			 		<p class="card-text ">
   			 			<i class="fas fa-user"></i> <b>Имя </b>:Евгений <br>
   			 			<i class="fas fa-envelope-open"></i> <b>Почта:  </b> libertydremastudia@gmail.com<br>
   			 			<i class="fas fa-users""></i> <b>Статус: </b> Директор|Рабочий|Стажер <br>
   			 			<br>
   			 			<h4>Задание </h4>
   			 			Разнообразный и богатый опыт рамки и место обучения кадров позволяет оценить значение позиций, занимаемых участниками в отношении поставленных задач. Дорогие друзья, новая модель организационной деятельности позволяет оценить значение системы масштабного изменения ряда параметров.
   			 		</p>
 		 		</div>
			</div>
		</div>
		
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
