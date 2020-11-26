<?php
 $id= $_REQUEST['id'];
 $pass= $_REQUEST['pass'];
 $pass_confirm= $_REQUEST['pass_confirm'];
 $name= $_REQUEST['name'];
 $nick= $_REQUEST['nick'];
 $hp1= $_REQUEST['hp1'];
 $hp2= $_REQUEST['hp2'];
 $hp3= $_REQUEST['hp3'];
 $hp =$hp1."-".$hp2."-".$hp3;
 $email1= $_REQUEST['email1'];
 $email2= $_REQUEST['email2']; 
 $email=$email1."@".$email2;

 require_once '../lib/MYDB.php';
 $pdo= db_connect();
 
 try{
     $pdo->beginTransaction();
     $sql="update phptest.member set pass = ?, name =?, nick = ?, hp = ?, email = ? where id =?";
     $stmh= $pdo->prepare($sql);
     $stmh->bindValue(1, $pass,PDO::PARAM_STR);
     $stmh->bindValue(2, $name,PDO::PARAM_STR);
     $stmh->bindValue(3, $nick,PDO::PARAM_STR);
     $stmh->bindValue(4, $hp,PDO::PARAM_STR);
     $stmh->bindValue(5, $email,PDO::PARAM_STR);
     $stmh->bindValue(6, $id,PDO::PARAM_STR);
     
     $stmh->execute();
     $pdo->commit();
     header("Location:http://localhost/ch09/index.php");
     
 } catch (PDOException $Exception) {
    $pdo->rollBack();
    print "오류: ".$Exception->getMessage();
 }
?>

