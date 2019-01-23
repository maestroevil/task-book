<?
	require "application/class/Task.php";
	$Task = new Task;
	$keys = array_keys($_POST);
	$id = $keys[0];

	echo $id;
	$getOneElementTask = $Task->getOneElementTask($id);
	
	if(!empty($_POST['updateTask'])){
		if(!empty($_POST['status'])){
			$status = 1;
		}
		else{
			$status = 0;
		}
		$Task->updateBlockTask($_POST['id-t'],$_POST['name'],$_POST['email'],$status,$_POST['heading'],$_POST['text']);
		var_dump($_POST);
		header('Location: http://task-book/');
	}
?>
<div class="container-fluid">
	<div class="row">
		<?if($_SESSION['autorization'] == 1){ ?>
		<div class="redaktor-task">
			<h2>Редактирование задач </h2>
			
			<form action="http://task-book/task/redaktor" method="POST">
				<table >
					<tr>
						<td>ID записи:</td>
						<td><input type="text" name="id-t" value="<?echo $getOneElementTask['id']; ?>"></td>
					</tr>
					<tr>
						<td> Имя :</td>
						<td><input type="text" name="name" value="<?echo $getOneElementTask['name']; ?>"> </td>
					</tr>
					<tr>
						<td>E-mail: </td>
						<td><input type="text" name="email" value="<?echo $getOneElementTask['e-mail']; ?>"> </td>
					</tr>
					<tr>
						<td>Заглавие</td>
						<td> <input type="text" name="heading" value="<?echo $getOneElementTask['heading']; ?>"></td>
					</tr>
					<tr>
						<td>Статус</td>
						<? echo $getOneElementTask['status']?>
						<td><input type="checkbox" name="status"  <? echo ($getOneElementTask['status'] == 1 ? "checked" : "") ?>> 
						</td>
					</tr>
				</table>
				<textarea name='text'><?echo $getOneElementTask['text']; ?> </textarea><br>
				<input type="submit" name="updateTask">
			</form>
		</div>
		<?}else{ ?>
			<h2>Вы не является администратором</h2>
		<?}	?>
	</div>
</div>