<?php
require_once 'autoload.php';
// Hi호출할떄 Hi대한 정보가 없으면 spl_auto_load_register 함수가 호출되어 해당 함수,클래스를 호출함.
use greeting\en\Hi as HiEn;
use greeting\ko\Hi as HiKo;
new HiEn();
new HiKo();

?>

