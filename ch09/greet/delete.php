<?php
    session_start();
    require_once '../lib/MYDB.php';
    $pdo= db_connect();
    $num = $_REQUEST['num'];
    
    $pdo->beginTransaction();
    $sql = "delete from phptest.greet where num = $num";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(1, $num, PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();
    header("Location:http://localhost/ch09/greet/list.php");
    
?>


