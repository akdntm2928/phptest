<?php

$a = $_REQUEST["age"]; 

switch($a)
{
    case 1 : 
        print "$a 학년  급식비 :3만원";
        break;
    case 2 : 
        print "$a 학년 급식비 :3만원 5천원";
        break;
    case 3 : 
        print "$a 학년 급식비 :4만원";
        break;
    case 4 : 
        print "$a 학년 급식비 :4만원 5천원";
        break;
    case 5 : 
        print "$a 학년 급식비 :5만원";
        break;
    case 6 : 
        print "$a 학년 급식비 :5만원 5천원";
        break;
}
?>

