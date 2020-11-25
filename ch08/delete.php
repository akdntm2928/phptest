<?php
    $id =$_REQUEST['id'];
    require_once("MYDB.php"); // 파일 불러오는 함수
    $pdo= db_connect();
try {
    $pdo->beginTransaction();
    $sql="delete from member where id=?";
    
    $stmh=$pdo->prepare($sql);
    $stmh->bindValue(1,$id,PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();
    header("Location:http://localhost/ch08/list.php");
    
} catch (PDOException $Exception) {
    print"오류: ".$Exception->getMessage();
}
?>


