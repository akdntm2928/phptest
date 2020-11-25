<!DOCTYPE html>
<?php
require_once('MYDB.php');
$pdo= db_connect();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>회원관리</title>
    </head>
    <body>
        <?php       
        try {          
            $sql="select * from member";
            $stmh=$pdo->query($sql);                         
            $count= $stmh ->rowCount();
            print "검색 결과는 $count 건입니다<br>";                        
        } catch (PDOException $Exception) {            
            print"오류: ".$Exception->getMessage();
        }
        if($count<1){
            print"가입자가 없습니다";
        }else{        
        ?>
        <table border='1' width='800'>
            <tr align="center">
                <th>이메일</th>
                <th>비밀번호</th>
                <th>이름</th>
                <th>전화번호</th>
                <th>가입일시</th>
                <th>수정</th>
                <th>삭제</th>                
            </tr>
            <?php 
            while($row=$stmh->fetch(PDO::FETCH_ASSOC)){                            
            ?>
            <tr align="center">
                <td><?=$row["id"]?></td>
                <td><?=$row["passwd"]?></td>
                <td><?=$row["name"]?></td><!-- comment -->
                <td><?=$row["tel"]?></td><!-- comment -->
                <td><?=$row["reg_date"]?></td><!-- comment -->
                <td><a href="updateForm.php?id=<?=$row["id"]?>">수정</a></td><!-- comment -->
                <td><a href="delete.php?id=<?=$row["id"]?>">삭제</a></td><!-- comment -->
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </body>
</html>
