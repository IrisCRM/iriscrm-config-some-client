<?php

use Iris\Iris;

$translations = require Iris::$app->getRootDir() . 'vendor/iriscrm/config-crm/language/en/en.php';

return array_replace_recursive($translations, [
	'common' => [
		'Телефон 1' => 'Phone 1 customized',
	],
]);
