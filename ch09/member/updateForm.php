<!DOCTYPE html>
<?php
session_start();
require_once('../lib/MYDB.php');
$pdo= db_connect();

$id = $_REQUEST['id'];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/member.css">
            <script>
        function check_id(){
            window.open("check_id.php?id="+document.member_form.id.value,"IDcheck","left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
        }
        function check_nick(){
            window.open("check_nick.php?nick="+document.member_form.nick.value,"NICKcheck","left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
        }
        function check_input(){
            if(!document.member_form.hp2.value || !document.member_form.hp3.value){
                alert('휴대폰 번호를 입력하세요');
                document.member_form.hp2.focus();
                return;
            }
             if(document.member_form.pass.value != document.member_form.pass_confirm.value){
                 alert("비밀번호가 일치하지 않습니다. \n다시 입력해주세요");;
                 document.member_form.pass.focus();
                 document.member_form.pass.select();
                 return;
             }
             document.member_form.submit();
        }
        function reset_form(){
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.nick.value = "";
            document.member_form.hp2.value = "";
            document.member_form.hp3.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";
            
            document.member_form.id.focus();
            return;
        }
    </script>
    </head>
    <body>
        <?php       
        try {          
            $sql="select * from phptest.member where id= ?";
            $stmh=$pdo->prepare($sql);
            $stmh->bindValue(1,$id);
            $stmh->execute();
            
            $count= $stmh ->rowCount(); 
         
        } catch (PDOException $Exception) {            
            print"오류: ".$Exception->getMessage();
        }
        if($count<1){
            print "가입자가 없습니다";
        }else{
            $row=$stmh->fetch(PDO::FETCH_ASSOC);
        ?>
                <div id="wrap">
            <div id="header">
                <?php include '../lib/top_login2.php'; ?>
            </div>
            
            <div id="menu">
                <?php include '../lib/top_menu2.php'; ?>
            </div>
            
            <div id="content">
                <div id="col1">
                    <div id="left_menu">
                        <?php include '../lib/left_menu.php'; ?>
                    </div>
                </div>
                <div id="col2">
                    <form method="post" action="updatePro.php?id=<?=$row['id'] ?>" name="member_form">
                        <div id="title"> 
                            <img src="../img/title_join.gif">
                        </div>
                        
                        <div id="form_join">
                            <div id="join1"> 
                                <ul>
                                    <li>* 아이디</li>
                                    <li>* 비밀번호</li>
                                    <li>* 비밀번호 확인</li><!-- comment -->
                                    <li>* 이름</li>
                                    <li>* 닉네임</li>
                                    <li>* 휴대폰</li>
                                    <li>&nbs;&nbsp;&nbsp; 이메일</li>
                                </ul>
                            </div>
                            
                            <div id="join2"> 
                                <ul>
                                    <li>
                                        <div id="id1">
                                            <?=$row['id'] ?>
                                        </div>                                        
                                    </li>
                                    
                                    <li><input  type="password" name="pass" required="" value='<?=$row['pass'] ?>'></li>
                                    <li><input  type="password" name="pass_confirm" value='<?=$row['pass'] ?>' required=""></li>
                                    <li><input  type="text" name="name" value='<?=$row['name'] ?>' required=""></li>
                                    <li>
                                        <div id="nick1">
                                            <input  type="text" name="nick" value='<?=$row['nick'] ?>' required="">
                                        </div>
                                        <div id="nick2">
                                            <a href="#"><img src="../img/check_id.gif" onclick="check_nick()"></a>                                            
                                        </div>                                    
                                    </li>
                                    <?php $hp = explode('-',$row['hp']) ?>
                                    <li>
                                        <input type=“text" class="hp" name="hp1" value="010"> -
                                        <input type="text" class="hp" name="hp2" value='<?=$hp[1] ?>'> -
                                        <input type="text" class="hp" name="hp3" value='<?=$hp[2] ?>'>
                                    </li>
                                    <?php $email = explode('@',$row['email']) ?>
                                    <li>
                                        <input type="text" id="email1" name="email1" value="<?=$email[0] ?>"> @
                                        <input type="text" name="email2" value="<?=$email[1] ?>">
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                                <div id="must"> * 는 필수 입력항목입니다.^^</div>
                            </div>
                                <div id="button"><a href="#"><img src="../img/button_save.gif" onclick="check_input()"></a>&nbsp;&nbsp;
                                 <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
                            </div>

                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <?php } ?>
    <body>

</html>
