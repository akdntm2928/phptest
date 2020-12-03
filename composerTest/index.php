<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
require_once __DIR__.'/vendor/autoload.php';
// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__.'/app.log', Logger::WARNING));

// add records to the log
$log->warning('EGO');
$log->error('ING');
?>