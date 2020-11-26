<?php
$id =$_REQUEST['id'];
$passwd =$_REQUEST['passwd'];
$name =$_REQUEST['name'];
$tel =$_REQUEST['tel'];
require_once("MYDB.php"); // 파일 불러오는 함수
$pdo= db_connect();

try {
    $pdo->beginTransaction();
    $sql="insert into member(id,passwd,name,tel,reg_date) values(?,?,?,?,now())";
    
    $stmh=$pdo->prepare($sql);
    $stmh->bindValue(1,$id,PDO::PARAM_STR);
    $stmh->bindValue(2,$passwd,PDO::PARAM_STR);
    $stmh->bindValue(3,$name,PDO::PARAM_STR);
    $stmh->bindValue(4,$tel,PDO::PARAM_STR);    
    $stmh->execute();
    $pdo->commit();   
    print "데이터가 추가가 되었습니다.";
    header('Location:http://localhost/ch08/list.php');
} catch (PDOException $Exception) {
    print"오류: ".$Exception->getMessage();
}
?>

