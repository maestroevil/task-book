<?php
//  
namespace application\controllers;

use application\core\Controller;

class TaskController extends Controller {

	public function redaktorAction() {
		$this->view->render('Редактирование задачи');
	}

}
?>