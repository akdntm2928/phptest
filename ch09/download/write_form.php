<!DOCTYPE html>
<?php
session_start();
if (isset($_REQUEST['mode'])) { // 수정 버튼을 클릭해서 호출했는지 체크
    $mode = $_REQUEST['mode'];
} else {
    $mode = "";
}

if (isset($_REQUEST['num'])) { //수정 버튼을 클릭해서 호출했는지 체크
    $num = $_REQUEST['num'];
} else {
    $num = "";
};

require_once '../lib/MYDB.php';

$pdo = db_connect();

if ($mode == "modify") {
    try {
        $sql = "select * from phptest.download where num = ?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1, $num, PDO::PARAM_STR);
        $stmh->execute();
        $count = $stmh->rowCount();
        if ($count < 1) {
            print "검색 결과가 없습니다<br>";
        } else {
            $row = $stmh->fetch(PDO::FETCH_ASSOC);
            $item_subject = $row['subject'];
            $item_content = $row['content'];
            $item_file_0 = $row['file_name_0'];
            $item_file_1 = $row['file_name_1'];
            $item_file_2 = $row['file_name_2'];
            $copied_file_0 = $row['file_copied_0'];
            $copied_file_1 = $row['file_copied_1'];
            $copied_file_2 = $row['file_copied_2'];
        }
    } catch (PDOException $ex) {
        print '오류:' . $ex->getMessage();
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/concert.css">
    </head>
    <body>
        <div id="wrap">
            <div id="header"><?php include "../lib/top_login2.php"; ?></div>
            <div id="menu"><?php include "../lib/top_menu2.php"; ?></div>
            <div id="content">
                <div id="col1">
                    <div id="left_menu">
                        <?php include '../lib/left_menu.php'; ?>
                    </div>
                </div>
                                    <div id="col2">
                        <div id="title"><img src="../img/title_download.gif"></div>
                        <div class="clear"></div>
                        <div id="write_form_title">
                            <img src="../img/write_form_title.gif">
                        </div>
                        <div class="clear"></div>
                        <?php
                        if ($mode == "modify") {
                            ?>
                            <form name="board_form" method="post"
                                  action="insert.php?mode=modify&num=<?= $num ?>" enctype="multipart/form-data">
                                  <?php } else {
                                      ?>
                                <form name="board_form" method="post" action="insert.php" enctype="multipart/form-data">
                                    <?php
                                }
                                ?>
                                <div id="write_form">
                                    <div class="write_line"></div>
                                    <div id="write_row1">
                                        <div class="col1"> 별명 </div>
                                        <div class="col2"><?= $_SESSION["nick"] ?></div>
                                        <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
                                    </div>
                                    <div class="write_line"></div>
                                    <div id="write_row2">
                                        <div class="col1"> 제목 </div>
                                        <div class="col2"><input type="text" name="subject"
                                                                 <?php if ($mode == "modify") { ?>value="<?= $item_subject ?>" <?php } ?> required></div>
                                    </div>
                                    <div class="write_line"></div>
                                    <div id="write_row3">
                                        <div class="col1"> 내용 </div>
                                        <div class="col2"><textarea rows="15" cols="79" name="content"
                                                                    required><?php if ($mode == "modify") print $item_content ?></textarea></div>
                                    </div>
                                    <div class="write_line"></div>
                                    <div id="write_row4">
                                        <div class="col1"> 파일첨부1 </div>
                                        <div class="col2"><input type="file" name="upfile[]"></div>
                                    </div>
                                    <div class="clear"></div>
                                    <?php
                                    if ($mode == "modify" && $item_file_0) {
                                        ?>
                                        <div class="delete_ok">
                                            <?= $item_file_0 ?> 파일이 등록되어 있습니다.
                                            <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
                                        <div class="clear"></div>
                                        <?php }
                                    ?>
                                    <div class="write_line"></div>
                                    <div id="write_row5"><div class="col1"> 파일첨부2 </div>
                                        <div class="col2"><input type="file" name="upfile[]"></div>
                                    </div>
                                    <?php
                                    if ($mode == "modify" && $item_file_1) {
                                        ?>
                                        <div class="delete_ok">
                                        <?= $item_file_1 ?> 파일이 등록되어 있습니다.
                                            <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
                                        <div class="clear"></div>
                                        <?php }
                                    ?>
                                    <div class="write_line"></div>
                                    <div class="clear"></div>
                                    <div id="write_row6"><div class="col1"> 파일첨부3 </div>
                                        <div class="col2"><input type="file" name="upfile[]"></div>
                                    </div>
                                    <?php
                                    if ($mode == "modify" && $item_file_2) {
                                        ?>
                                        <div class="delete_ok">
                                        <?= $item_file_2 ?> 파일이 등록되어 있습니다.
                                            <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
                                        <div class="clear"></div>
                                        <?php }
                                    ?>
                                    <div class="write_line"></div>
                                    <div class="clear"></div>
                                </div>
                                <div id="write_button"><input type="image" src="../img/ok.png">&nbsp;
                                    <a href="list.php"><img src="../img/list.png"></a>
                                </div>
                            </form>
                    </div>
        </div>
    </body>
</html>