<?php
//Класс "View" отвечает за отображение контента.
namespace application\core;

class View {

	public $path;
	public $route;
	//Устанавливаем шаблон (в стандартном случае - default).Шаблоны хранятся в папке views/layots/
	public $layout = 'default';

	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}
	//Задаем страницу контента для контроллера и задаем шаблон.
	public function render($title, $vars = []) {
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			$layout = $this->layout;
			require 'application/views/layouts/'.$this->layout.'.php';
		}
	}

	//Функция "errorCode" отвечает за вывод ошибок.(403,404).
	public static function errorCode($code) {
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}
}	

?>