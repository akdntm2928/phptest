<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\NativeMailerHandler;

require_once __DIR__.'/vendor/autoload.php';
// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__.'/app.log', Logger::ERROR));
$log->pushHandler(new NativeMailerHandler(
    $to:'swh9870@naver.com',
    $subject:'swh9870@naver.com',
    $from:'out@system.com',
    Logger:Logger::EMERGENCY));

// add records to the log
$log->warning('EGO');
$log->error('ING');
$log->emergency(message:'emergency');
?>