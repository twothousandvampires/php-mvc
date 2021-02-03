<?php
set_include_path(get_include_path()
					.PATH_SEPARATOR.'applications/controllers'
					.PATH_SEPARATOR.'applications/models'
					.PATH_SEPARATOR.'applications/views');

spl_autoload_register(function ($class_name) {
	include $class_name . '.php';
});

// получение экземпляра главного контроллера

$mainController = MainController::getInstance();

// роутинг

$mainController->route();

// вывод

echo $mainController->getBody();
