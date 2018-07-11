<?php

use Iris\Iris;

$translations = require Iris::$app->getRootDir() . 'vendor/iriscrm/config-crm/language/ru/ru.php';

return array_replace_recursive($translations, [
	// Меню "Создать"
	'common&Create' => array(
		'Компании' => 'Компанию кастом',
	),
]);
