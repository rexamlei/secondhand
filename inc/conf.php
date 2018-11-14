<?php

return array (
	'db' => array (
		'type' => 'pdo_mysql',
		'pdo_mysql' => array (
			'master' => array (
				'host' => 'localhost',
				'user' => 'root',
				'password' => 'root',
				'name' => 'second_hand',
				'tablepre' => '',
				'charset' => 'utf8',
				'engine' => 'myisam',
			),
			'slaves' => array (),
		),
	),
);

?>
