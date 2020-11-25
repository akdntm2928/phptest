<?php
    $a =$_REQUEST["num"]
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$a?>단 구구단표</title>
    </head>
    <body>
        <div>            
            <table border="1">
                <h1><?=$a ?> 구구단 표시하기</h1>
                <?php                
                if($a >0){                
                    for($b = 1; $b< 9; $b++){            
                        $c = $a * $b;
                        print "<tr>"
                                . "<td align='center'>$a x $b = $c"
                                . "</td>"
                            . "</tr><br>";                    
                    }
                }else {
                    print "정수를 입력해주세요";
                }
                ?>
            </table>
        </div>    
    </body>
</html>
