<?php

require_once 'autoload.php';
require_once 'config.php';


$postFields = $_POST;
$remoteIp = $_SERVER['REMOTE_ADDR'];

$dbLogger = new MysqlLoggerService();
$fileLogger = new FileLoggerService();

if (isset($postFields['id']) && !is_null($remoteIp)) {

    $dbLogResult = $dbLogger->log($postFields['id'], $remoteIp);
    $fileLogResult = $fileLogger->log($postFields['id'], $remoteIp);
}

echo json_encode(['dbLog' => $dbLogResult, 'fileLog' => $fileLogResult], true);
