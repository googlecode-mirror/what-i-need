<?php

return CMap::mergeArray(
				// наследуемся от main.php
				require(dirname(__FILE__) . '/main.php'), array(
			'components' => array(
				// переопределяем компонент db
				'db' => array(
				// настройки для конфигурации разработчика
				),
			),
				)
);