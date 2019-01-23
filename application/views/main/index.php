<div class="container-fluid">
	<div class="row">
		<div class="bg-dark panel">
				<span class="color-dark text-white">Сортировать: </span>
				<button type="button" class="btn btn-primary">Имя</button>
				<button type="button" class="btn btn-secondary">Почта</button>
				<button type="button" class="btn btn-success">Статус</button>
				<button type="button" class="btn btn-success" id='btn-create-task'>Создать задание</button>
		</div>
		<div class="bg-dark panel n-block" id='panel-create-task'>
			<div class="form-create-task">
				<form action="http://task-book/" method="POST">
					<span class="text-white"> Имя: </span> <input type="text" name="name">
					<span class="text-white"> E-mail: </span> <input type="text" name="e-mail">
					<span class="text-white"> Название задания: </span> <input type="text" name="e-mail">
					<input  class="btn btn-success" type="submit" name="create-task" value="Создать задание" >
					<br>
					<textarea class="input-text-task" name='text-task'></textarea>
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
