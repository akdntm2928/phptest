<?php
    session_start();
    unset($_SESSION["userid"]);
    unset($_SESSION["name"]);
    unset($_SESSION["nick"]);
    unset($_SESSION["level"]);
    header("Location:http://localhost/ch09/index.php");
?>


