<?php
    $pilgi = 95;
    $silgi = 79;
    $result = "합격";
    
    if($pilgi < 70 || $silgi < 80){
        $result = "불합격";        
    }
    
    print "필기 점수 : $pilgi, 실기점수:$silgi<br>";
    print "결과 : $result";
?>
