<?php
//Файл "Dev" служит для помощи разработчику - записи функций, проверки и тд.
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str) {
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
	exit;
}