<?php
function latest_article($table, $loop, $char_limit){
    require_once './lib/MYDB.php';
    $pdo= db_connect();
    
    try{
        $sql="select *from phptest.$table order by num desc limit $loop";
        $stmh =$pdo-> query($sql);
        
        while($row =$stmh->fetch(PDO::FETCH_ASSOC)){
            
            $num = $row['num'];
            $len_subject= strlen($row['subject']);
            $subject=$row['subject'];
            
            if($len_subject > $char_limit){                
                $subject= mb_substr($row['subject'],0,$char_limit,'utf-8');
                $subject =$subject."...";

            }
            $regist_day= substr($row['regist_day'],0,10);
            echo("
                <div class='col1'>
                <a href='./$table/view.php?num=$num'>$subject</a>
                </div><div class='col2'>$regist_day</div>
                <div class='clear'></div>
             ");
        }
    } catch (PDOException $ex) {
        print "오류: ".$ex->getMessage();
    }
}
?>

