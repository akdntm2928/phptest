<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>게시판 목록 보기</title>
    </head>
    <body>
        <table border="1" width="600">
            <h2>게시판 목록 보기</h1>
            <tr bgcolor="ccccc" align="center">
                <td>번호</td>
                <td>제목</td>
                <td>글쓴이</td>
                <td>날짜</td>
            </tr>
            <?php
                $num  = 1;
                $name = "서원혁";
                $date = "2020/11/23";
                
                for($i=1; $i<10; $i++){
                    $title="게시판 제목".$num;
                    print "<tr><td width='50' align='center'>$num</td><td>$title</td><td width='50'>$name</td><td width='80'>$date</td></tr>";
                    $num++;
                }
            ?>
        </table>
    </body>
</html>
