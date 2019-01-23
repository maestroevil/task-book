<?php
	if(isset($_POST['login']) && isset($_POST['password'])){
	 	$Autorization = new	Autorization;
	 	$Autorization->setUser($_POST['login'],$_POST['password']);
	 	$Autorization->checkUser();
	}
?>
<div class="container-fluid">
	<!-- container -->
	<div class="row">
		<!-- row -->
		<?php if($_SESSION['autorization'] == false){ ?>
		<div class="form-login">
			<form action="http://task-book/account/login" method="POST" >
			  <div class="form-group">
			    <label for="exampleInputEmail1">Логин</label>
			    <input type="text" name='login' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите логин"  maxlength="20">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Пароль</label>
			    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" maxlength="20">
			  </div>
			  <button type="submit" class="btn btn-primary">Войти</button>
			</form>
		</div>
		<?php } else{ ?>
		<h2> Вы авторизовались : <?php echo $_SESSION["nameUser"]; ?></h2>
		<?php } ?>
	<!-- /row -->
	</div>
	<!-- /container -->
</div>
