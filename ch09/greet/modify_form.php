<!DOCTYPE html>
<?php 
    session_start();
   
    $num= $_REQUEST['num'];
    
    require_once '../lib/MYDB.php';
    $pdo= db_connect();
    
    try {
        $sql="select * from phptest.greet where num = ?";
        $stmh =$pdo->prepare($sql);
        $stmh ->bindValue(1,$num,PDO::PARAM_STR);
        $stmh->execute();
        $count= $stmh->rowCount();
    
        if($count <1){
            print"검색 결과가 없습니다";
        }else{
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                $item_subject = $row["subject"];
                $item_content = $row["content"];
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/greet.css">
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <?php include"../lib/top_login2.php" ?>
            </div>
            <div id="menu">
                <?php include"../lib/top_menu2.php" ?>
            </div>
            
            <div id="content">
                <div id="col1">
                    <div id="left_menu">
                        <?php include '../lib/left_menu.php'; ?>
                    </div>
                </div>
                
                <div id="col2">
                    <div id="title">
                        <img src="../img/title_greet.gif">
                    </div>
                    <div id="clear"></div>
                    
                    <div id="write_form_title">
                        <img src="../img/write_form_title.gif"><!-- comment -->
                    </div>
                    
                    <div id="clear"></div><!-- comment -->
                    <form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>">
                        <div id="write_form">
                            <div id="write_line"></div>
                            <div id="write_row1">
                                <div class="col1">닉네임</div> 
                                <div class="col2"><?=$_SESSION['nick']?></div>
                                <div class="col3"><input type="checkbox" name="html_ok" value="y">HTML 쓰기</div>
                            </div>
                            <div class="write_line"></div>
                            <div id="write_row2">
                                <div class="col1">제목</div>
                                <div class="col2"><input type="text" name="subject" value="<?= $item_subject?>" required=""><!-- comment --></div>
                            </div>
                            <div class="write_line"></div>
                                <div id="write_row3">
                                    <div class="col1"> 내용 </div>
                                    <div class="col2">
                                        <textarea rows="15" cols="79" name="content" required style="resize: none;"><?=$item_content?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="write_line"></div>
                            <div id="write_button"><input type="image" src="../img/ok.png">&nbsp;
                                <a href="list.php"><img src="../img/list.png"></a>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        <?php
                    }    
                }
            }
            catch (Exception $ex) {

            }
        ?>
    </body>
</html>
