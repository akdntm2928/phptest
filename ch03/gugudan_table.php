<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>구구단 테이블</title>
    </head>
    <body>
        <table border="1" width="600">
            <tr>
            <?php 
               for($i= 2; $i<=9; $i++){
                   print "<td border='1' width='100' color ='#ccccc'>$i 단</td>";
               }
            ?>
            </tr>        
            <?php                
                for($a= 2; $a<=9; $a++){
                    print "<tr align=center>";
                    for($b= 2; $b<=9; $b++){
                        $c =$a*$b;
                        print "<td>$b  x $a = $c</td>";
                    }
                    print "</tr>";
                }
            ?>
        </table>

    </body>
</html>
