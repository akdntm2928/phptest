<?php
session_start();
if (isset($_REQUEST["page"]))  // 페이지 번호
    $page = $_REQUEST["page"];
else
    $page = 1;
if (isset($_REQUEST["mode"]))  // 새로 쓰기, 수정, 답변 구분 
    $mode = $_REQUEST["mode"];
else
    $mode = "";

if (isset($_REQUEST["num"]))
    $num = $_REQUEST["num"];
else
    $num = "";

if ($mode == "modify" || $mode == "response") {
    require_once("../lib/MYDB.php");
    $pdo = db_connect();

    try {
        $sql = "select * from phptest.qna where num = ? ";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $num, PDO::PARAM_STR);
        $stmh->execute();
        $count = $stmh->rowCount();
        if ($count < 1) {
            print "검색결과가 없습니다.<br>";
        } else {
            $row = $stmh->fetch(PDO::FETCH_ASSOC);
            $item_subject = $row["subject"];
            $item_content = $row["content"];
        }

        if ($mode == "response") {
            $item_subject = "[re]" . $item_subject;
            $item_content = ">" . $item_content;
            $item_content = str_replace("\n", "\n>", $item_content);
            $item_content = "\n\n" . $item_content;
        }
    } catch (PDOException $Exception) {
        print "오류: " . $Exception->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head> 
        <meta charset="utf-8">
        <link  rel="stylesheet" type="text/css" href="../css/common.css">
        <link  rel="stylesheet" type="text/css" href="../css/board1.css">
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <?php include "../lib/top_login2.php"; ?>
            </div>  
            <div id="menu">
                <?php include "../lib/top_menu2.php"; ?>
            </div>  
            <div id="content">
                <div id="col1">
                    <div id="left_menu">
                        <?php include "../lib/left_menu.php"; ?>
                    </div>
                </div> 
                <div id="col2">        
                    <div id="title">
                        <img src="../img/title_qna.gif">
                    </div>
                    <div class="clear"></div>
                    <div id="write_form_title">
                        <img src="../img/write_form_title.gif">
                    </div>
                    <div class="clear"></div>
                    <?php
                    if ($mode == "modify") {
                        ?>
                        <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?= $num ?>&page=<?= $page ?>"> 
                            <?php
                        } elseif ($mode == "response") {
                            ?>
                            <form  name="board_form" method="post" action="insert.php?mode=response&num=<?= $num ?>&page=<?= $page ?>"> 
                                <?php
                            } else {
                                ?>
                                <form  name="board_form" method="post" action="insert.php"> 
                                    <?php
                                }
                                ?>
                                <div id="write_form">
                                    <div class="write_line"></div>
                                    <div id="write_row1">
                                        <div class="col1"> 닉네임 </div>
                                        <div class="col2"><?= $_SESSION["nick"] ?></div>
                                        <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기 </div>
                                    </div>
                                    <div class="write_line"></div>
                                    <div id="write_row2"><div class="col1"> 제목   </div>
                                        <div class="col2"><input type="text" name="subject" 
                                            <?php if ($mode == "modify" || $mode == "response") { ?>
                                                                     value="<?= $item_subject ?>" <?php } ?> required></div>
                                    </div>
                                    <div class="write_line"></div>
                                    <div id="write_row3"><div class="col1"> 내용   </div>
                                        <div class="col2"><textarea rows="15" cols="79" name="content" required><?php if ($mode == "modify" || $mode == "response") { ?><?= $item_content ?> <?php } ?></textarea></div>
                                    </div>
                                    <div class="write_line"></div>
                                </div>
                                <div id="write_button"><input type="image" src="../img/ok.png">&nbsp;
                                    <a href="list.php?page=<?= $page ?>"><img src="../img/list.png"></a>
                                </div>
                            </form>
                            </div> 
                            </div> 
                            </div> <!-- end of wrap -->
                            </body>
                            </html>
