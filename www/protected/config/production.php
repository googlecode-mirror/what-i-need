<?php

return CMap::mergeArray(
		// наследуемся от main.php
		require(dirname(__FILE__) . '/main.php'), array(
	    'components' => array(
		// переопределяем компонент db
		'db' => array(
		    'connectionString' => 'mysql:host=nd10281.netdepot.com;dbname=win',
		    'emulatePrepare' => true,
		    'username' => 'win',
		    'password' => 'EgeXLonz',
		    'charset' => 'utf8',
		),
	    ),
		)
);