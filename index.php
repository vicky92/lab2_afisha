<?php
	ob_start();
	session_start();
    // Подключаем Yii Framework
    require_once (dirname(__FILE__) . '/../framework/yii.php');
    
    // Подключаем конфигурационный файл
    $config = dirname(__FILE__) . '/protected/config/main.php';
    
    // Запускаем сайт
    Yii::createWebApplication( $config )->run();
?>
