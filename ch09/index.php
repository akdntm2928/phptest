<!DOCTYPE html>
<?php 
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/common.css">
    </head>
    <body>
        <div id="wrap">
             
           <div id="header">
            <?php include "./lib/top_login1.php"; ?>
            </div>

            <div id="menu">
                <?php include './lib/top_menu1.php'; ?>
            </div>

            <div id="content">
                 <div id="main_img"><img src="./img/main_img.jpg"></div>
                <?php include './lib/func.php'; ?>
                <!--최근글 불러오기-->
                <div id="latest">
                    <div id="latest1">
                        <div id="title_latest1">
                            <img src="./img/title_latest1.gif">
                        </div>
                        <div class="latest_box">
                            <?php latest_article("greet",10, 30) ?>
                        </div>
                    </div>
                    <div id="latest2">
                        <div id="title_latest2">
                            <img src="./img/title_latest2.gif">
                        </div>
                        <div class="latest_box">
                            <?php latest_article("concert",10, 30) ?>
                        </div>
                    </div>
                </div>

            
         </div>
    </body>
</html>
