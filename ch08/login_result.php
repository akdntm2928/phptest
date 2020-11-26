<?php
    session_start();    
    
    $userid = $_REQUEST['userid'];    
    $pw =$_REQUEST['pw'];
    
    require_once("MYDB.php"); // 파일 불러오는 함수
    $pdo= db_connect();
         
    try {          
        $sql="select passwd from member where id= ?";
        $stmh=$pdo->prepare($sql);
        $stmh->bindValue(1,$userid);
        $stmh->execute();
        $count= $stmh ->rowCount();                     
    } catch (PDOException $Exception) {            
        print"오류: ".$Exception->getMessage();
    }
    $row=$stmh->fetch(PDO::FETCH_ASSOC);
    if($count<1){
        ?>
        <script>alert('아이디가 틀립니다');
                history.back();
        </script>
    <?php }
    else if($pw != $row['passwd']){ ?>
        <script>alert('비밀번호가 틀립니다');
                history.back();
        </script>   
    <?php
    }else {
        if(isset($_REQUEST['chbox'])){
            $a = setcookie('userid',$userid, time()+60*60*24);
            $b = setcookie('pw',$pw, time()+60*60*24);
             $_SESSION['userid'] =$_REQUEST['chbox'];           
        }else {
             $_SESSION['userid'] =$userid;           
        }       
        print $_SESSION['userid'];
        header('Location:http://localhost/ch08/login_form.php');   
        exit;
    }
       
?>


