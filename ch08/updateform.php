<!DOCTYPE html>
<?php
require_once('MYDB.php');
$pdo= db_connect();

$id = $_REQUEST['id'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>회원정보수정</title>
    </head>
    <body>
        <?php       
        try {          
            $sql="select * from member where id= ?";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(1,$id);
            $stmh->execute();
            
            $count= $stmh ->rowCount();                     
        } catch (PDOException $Exception) {            
            print"오류: ".$Exception->getMessage();
        }
        if($count<1){
            print"가입자가 없습니다";
        }else{
            $row=$stmh->fetch(PDO::FETCH_ASSOC);
        ?>
    <body>
        <form method="post" action="updatePro.php">
            <table border='1'>
                <tr>
                    <td>이메일</td>
                    <td><?=$row['id']?></td>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="password" name="passwd" size='20' value=<?=$row['passwd']?> required></td>
                </tr>
                <tr>
                    <td>이름</td>
                    <td><input type="text"name='name' size='20' value=<?=$row['name']?> required></td>
                </tr>
                <tr>
                    <td>전화번호</td>
                    <td><input type="text" name="tel" size='20' value=<?=$row['tel']?>></td>
                </tr>
                <tr align="center">                
                    <td colspan="2"><input type="submit" value="수정하기"></td>
                </tr>
            </table>
            <input type='hidden' name='id' value=<?=$id?> >
        </form>
        <?php } ?>
    </body>
</html>
