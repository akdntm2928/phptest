<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/member.css">
    </head>
    <script>
        function login_check(){
            if(!document.login.form.id.value){
                alert('아이디를 입력하시오');
                document.login_form.id.focus();
                return;                
            }
            if(!document.login.form.pass.value){
                alert('비밀번호를 입력하시오');
                document.login_form.pass.focus();
                return;
            }
            document.login_form_submit();
        }
    </script>
    <body>
        <div id="wrap">
            <div id="header">
                <?php include "../lib/top_login2.php" ?>
            </div>
            
            <div id="menu">
                <?php include "../lib/top_menu2.php" ?>
            </div>
            <div id="content">
                <div id="col1">
                    <div id="left_menu">
                        <?php include '../lib/left_menu.php'; ?>
                    </div>
                </div>
                
                <div id="col2">
                    <form name="login_form" method="post" action="login_result.php">
                        <div id="title">
                            <img src="../img/title_login.gif"/>
                        </div>
                        <div id="login_form"><!-- comment -->
                            <img src="../img/login_msg.gif" alt="alt"/>
                            <div class="clear"></div><!-- comment -->
                            <div id="login1">
                                <img src="../img/login_key.gif" alt="alt"/>
                            </div>
                            <div id="login2">
                                <div id="id_input_button">
                                    <div id="id_pw_title">
                                        <ul>
                                            <li><img src="../img/id_title.gif" alt="alt"/></li>
                                            <li><img src="../img/pw_title.gif" alt="alt"/></li>
                                        </ul>
                                    </div>
                                    <div id="id_pw_input">
                                        <ul>
                                            <li><input type="text" name="id" class="login_input" required=""></li>
                                            <li><input type="password" name="pass" class="login_input" required=""></li>
                                        </ul>
                                    </div>
                                    <div id="login_button">
                                        <input type="image" src="../img/login_button.gif" onclick="document.member_form.submit()">
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div id="login_line"></div>
                                <div id="join_button">
                                    <img src="../img/no_join.gif" alt="alt"/>
                                   <a href="../member/insertForm.php"><img src="../img/join_button.gif" alt="alt"/></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
