    <div id="logo"><a href="./index.php"><img src="./img/logo.gif" border="0"></a></div>
	<div id="moto"><img src="./img/moto.gif"></div>
	<div id="top_login">
<?php
    if(!isset($_SESSION["userid"]))
	{
?>
            <a href="../ch09/login/login_form.php">로그인</a> | <a href="../ch09/member/insertForm.php">회원가입</a>
<?php
	}
	else
	{
?>
		<?=$_SESSION["nick"]?> (level:<?=$_SESSION["level"]?>) | 
		<a href="../ch09/login/logout.php">로그아웃</a> | <a href="../ch09/member/updateForm.php?id=<?=$_SESSION["userid"]?>">정보수정</a>
<?php
	}
?>
	 </div>
