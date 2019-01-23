<?php
//Класс Controller запускает в себе "Router" и "View".
namespace application\core;

use application\core\View;

abstract class Controller {

	public $route;
	public $view;

	public function __construct($route) {
		$this->route = $route;
		$this->view = new View($route);
		
	}
}
?>