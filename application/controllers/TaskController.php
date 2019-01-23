<?php
// Данный класс 
namespace application\controllers;

use application\core\Controller;

class TaskController extends Controller {

	public function redaktAction() {
		$this->view->render('Редактирование задачи');
	}

}
?>