<?php
    session_start();    
?>
<meta charset="utf-8">
<?php
    if(!isset($_SESSION['userid'])){
?>
<script>
    alert('로그인 후 이용해 주세요');
    history.back();
</script>
<?php }
$content=$_REQUEST['content'];
require_once '../lib/MYDB.php';
$pdo= db_connect();

$pdo->beginTransaction();
try{
$sql = "insert into phptest.memo(id, name, nick, content, regist_day)";
$sql.= "values(?, ?, ?, ?,now())";
$stmh = $pdo->prepare($sql);
$stmh->bindValue(1, $_SESSION["userid"], PDO::PARAM_STR);
$stmh->bindValue(2, $_SESSION["name"], PDO::PARAM_STR);
$stmh->bindValue(3, $_SESSION["nick"], PDO::PARAM_STR);
$stmh->bindValue(4, $content, PDO::PARAM_STR);
$stmh->execute();
$pdo->commit();
header("Location:http://localhost/ch09/memo/memo.php");

} catch (PDOException $Exception) {

$pdo->rollBack();

print "오류: ".$Exception->getMessage();
 }
 ?>


