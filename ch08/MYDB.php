<?php
// 데이터베이스 접속처리하는 부분
function db_connect(){
    $db_user = 'seowh';
    $db_pass = '123456';
    $db_host = "localhost";
    $db_name = "phptest"; // 데이터베이스명
    $db_type= "mysql"; // 데이터베이스 타입    
    $dsn ="$db_type:host=$db_host; dbname=$db_name; charset=utf8"; //접속시도

    try{
        $pdo = new PDO($dsn, $db_user, $db_pass); // pdo 데이터베이스 접속 클래스
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //에러체크
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false); // 
    } catch (PDOException $Exception) {
        die("오류: ".$Exception->getMessage());
    }
    return $pdo;
}


?>


