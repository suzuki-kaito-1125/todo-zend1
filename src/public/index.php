<?php
// Composer のオートローダーを読み込む
require_once __DIR__ . '/../../vendor/autoload.php';

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

$application = new Zend_Application(
    'development',
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()->run();
