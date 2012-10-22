<?php

$webRoot = dirname(__FILE__);

// Если хост равен localhost, то включаем режим отладки и подключаем отладочную
// конфигурацию
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
    require_once($webRoot . '/yii/framework/yii.php');
    $configFile = $webRoot . '/protected/config/dev.php';
}
// Иначе выключаем режим отладки и подключаем рабочую конфигурацию
else {
	error_reporting(E_ALL&~E_NOTICE);
	define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
    require_once($webRoot . '/yii/framework/yiilite.php');
    $configFile = $webRoot . '/protected/config/production.php';
}

$app = Yii::createWebApplication($configFile)->run();
