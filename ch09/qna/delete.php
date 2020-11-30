 <?php   
  session_start();
  $num=$_REQUEST["num"];
  $page=$_REQUEST['page'];
        
  require_once("../lib/MYDB.php");
  $pdo = db_connect();

  $upload_dir = 'C:\xampp\htdocs\ch09\data\\';   //물리적 저장위치   

 try{
   $pdo->beginTransaction();
   $sql = "delete from phptest.qna where num = ?";  
   $stmh = $pdo->prepare($sql);
   $stmh->bindValue(1,$num,PDO::PARAM_STR);      
   $stmh->execute();   
   $pdo->commit();
  header("Location:http://localhost/ch09/qna/list.php?page=$page");
                      
  } catch (Exception $ex) {
     $pdo->rollBack();
     print "오류: ".$Exception->getMessage();
}
