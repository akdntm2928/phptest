<?php
    $a = 59 ;
    $b = 20 ;
    $c = 60;
     
    if($a > $b){
        if($a > $c){
            $max1 = $a ;
        }
        if($b > $c){
            $max2 = $b;
            $max3 = $c;
        }else {
            $max2 =$c;
            $max3 =$b;
        }        
    }else {
        if($b > $c){
            $max1 = $b;
        }
        if($a > $c){
            $max2 = $a;
            $max3 = $c;           
        }else {
            $max2 = $c;
            $max3 = $a;
        }
    }
    print "입력된 세정수 $a, $b, $c<br>";
    print " 입력된 정수를 큰 순서대로 정렬: $max1, $max2, $max3";
      
?>

