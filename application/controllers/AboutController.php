<?php
// Данный класс 
namespace application\controllers;

use application\core\Controller;

class AboutController extends Controller {

	public function devAction() {
		$this->view->render('Разработчик');
	}

	public function taskAction() {
		$this->view->render('Задание');
	}

}