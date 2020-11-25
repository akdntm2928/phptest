<?php
$a = 3;

print "<html>"
        . "<body>"
        . "<h3>$a 구구단표 만들기</h3>";
        $b= 1;
        while ($b <= 9){
            $c =  $a * $b;
            print"<tr><td align ='center'>$a x $b =$c</td></tr><br>";
            $b++; 
        }
print       "</table>"
        . "</body>"
        . "</html>"
?>


