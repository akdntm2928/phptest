<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/board1.css">
    </head>

    <?php
    require_once("../lib/MYDB.php");
    $pdo = db_connect();

    if (isset($_REQUEST["page"])) // $_REQUEST["page"]값이 없을 때에는 1로 지정 
        $page = $_REQUEST["page"];  // 페이지 번호
    else
        $page = 1;

    $scale = 5;       // 한 페이지에 보여질 게시글 수
    $page_scale = 3;  // 한 페이지당 표시될 페이지 수
    $first_num = ($page - 1) * $scale; // 리스트에 표시되는 게시글의 첫 순번.

    if (isset($_REQUEST["mode"]))
        $mode = $_REQUEST["mode"];
    else
        $mode = "";

    if (isset($_REQUEST["search"]))
        $search = $_REQUEST["search"];
    else
        $search = "";

    if (isset($_REQUEST["find"]))
        $find = $_REQUEST["find"];
    else
        $find = "";

    if ($mode == "search") {
        if (!$search) {
            ?>
            <script>
                alert('검색할 단어를 입력해 주세요!');
                history.back();
            </script>
            <?php
        }
        $sql = "select * from phptest.qna where $find like '%$search%' order by num desc";
    } else {
        $sql = "select * from phptest.qna order by group_num desc, ord asc limit $first_num, $scale";
        //limit를 사용해 레코드 개수를 한 페이지당 출력하는 수로 제한
    }
    try {
        $stmh = $pdo->query($sql);

        $sql = "select * from phptest.qna";  //전체 레코드수를 파악하기 위함.
        $stmh1 = $pdo->query($sql);

        $total_row = $stmh1->rowCount();     //전체 글수
        $total_page = ceil($total_row / $scale); // 전체 페이지 블록 수
        $current_page = ceil($page / $page_scale); //현재 페이지 블록 위치계산
        ?>
        <body>
            <div id="wrap">
                <div id="header">
                    <?php include "../lib/top_login2.php"; ?>
                </div> <!-- end of header -->
                <div id="menu">
                    <?php include "../lib/top_menu2.php"; ?>
                </div> <!-- end of menu --> 
                <div id="content">
                    <div id="col1">
                        <div id="left_menu">
                            <?php include "../lib/left_menu.php"; ?>
                        </div> <!-- end of left_menu -->
                    </div> <!-- end of col1 -->

                    <div id="col2">
                        <div id="title"><img src="../img/title_qna.gif"></div>
                        <form name="board_form" method="post" action="list.php?mode=search">
                            <div id="list_search">
                                <div id="list_search1">▷ 총 <?= $total_row ?> 개의 게시물이 있습니다.</div>
                                <div id="list_search2"><img src="../img/select_search.gif"></div>
                                <div id="list_search3">
                                    <select name="find">
                                        <option value='subject'>제목</option>
                                        <option value='content'>내용</option>
                                        <option value='nick'>닉네임</option>
                                        <option value='name'>이름</option>
                                    </select></div> <!-- end of list_search3 -->
                                <div id="list_search4"><input type="text" name="search"></div>
                                <div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
                            </div> <!-- end of list_search -->
                        </form>
                        <div class="clear"></div>
                        <div id="list_top_title">
                            <ul>
                                <li id="list_title1"><img src="../img/list_title1.gif"></li>
                                <li id="list_title2"><img src="../img/list_title2.gif"></li>
                                <li id="list_title3"><img src="../img/list_title3.gif"></li>
                                <li id="list_title4"><img src="../img/list_title4.gif"></li>
                                <li id="list_title5"><img src="../img/list_title5.gif"></li>
                            </ul>
                        </div> <!-- end of list_top_title -->
                        <div id="list_content">
                            <?php
                            // 글 목록 출력
                            if ($page == 1)
                                $start_num = $total_row;    // 페이지당 표시되는 첫번째 글순번
                            else
                                $start_num = $total_row - ($page - 1) * $scale;

                            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {

                                $item_num = $row["num"];
                                $item_id = $row["id"];
                                $item_name = $row["name"];
                                $item_nick = $row["nick"];
                                $item_hit = $row["hit"];
                                $item_date = $row["regist_day"];
                                $item_date = substr($item_date, 0, 10);
                                $item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
                                $item_depth = $row["depth"];
                                $space = "";
                                for ($j = 0; $j < $item_depth; $j++)
                                    $space = "&nbsp;&nbsp;" . $space;
                                ?>
                                <div id="list_item">
                                    <div id="list_item1"><?= $start_num ?></div>
                                    <div id="list_item2"><?= $space ?><a href="view.php?num=<?= $item_num ?>&page=<?= $page ?>"><?= $item_subject ?></a></div>
                                    <div id="list_item3"><?= $item_nick ?></div>
                                    <div id="list_item4"><?= $item_date ?></div>
                                    <div id="list_item5"><?= $item_hit ?></div>
                                </div> 

                                <?php
                                $start_num--;
                            }
                        } catch (PDOException $Exception) {
                            print "오류: " . $Exception->getMessage();
                        }

                        // 페이지 구분 블럭의 첫 페이지 수 계산 ($start_page)
                        $start_page = ($current_page - 1) * $page_scale + 1;
                        // 페이지 구분 블럭의 마지막 페이지 수 계산 ($end_page)
                        $end_page = $start_page + $page_scale - 1;
                        ?>
                        <div id="page_button">
                            <div id="page_num">  
<?php
if ($page != 1 && $page > $page_scale) {
    $prev_page = $page - $page_scale;
    // 이전 페이지값은 해당 페이지 수에서 리스트에 표시될 페이지수 만큼 감소
    if ($prev_page <= 0)
        $prev_page = 1;  // 만약 감소한 값이 0보다 작거나 같으면 1로 고정
    print "<a href=list.php?page=$prev_page>◀ </a>";
}

for ($i = $start_page; $i <= $end_page && $i <= $total_page; $i++) {        // [1][2][3] 페이지 번호 목록 출력
    if ($page == $i) // 현재 위치한 페이지는 링크 출력을 하지 않도록 설정.
        print "<font color=red><b>[$i]</b></font>";
    else
        print "<a href=list.php?page=$i>[$i]</a>";
}

if ($page < $total_page) {
    $next_page = $page + $page_scale;
    if ($next_page > $total_page)
        $next_page = $total_page;
    // netx_page 값이 전체 페이지수 보다 크면 맨 뒤 페이지로 이동시킴
    print "<a href=list.php?page=$next_page> ▶</a><p>";
}
?>			
                            </div>
                        </div>

                        <div id="write_button">
                            <a href="list.php?&page=<?= $page ?>"><img src="../img/list.png"></a>&nbsp;
<?php
if (isset($_SESSION["userid"])) {
    ?>
                                <a href="write_form.php"><img src="../img/write.png"></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div> <!-- end of col2 -->
            </div> <!-- end of content -->
        </div> <!-- end of wrap -->
    </body>
</html>
