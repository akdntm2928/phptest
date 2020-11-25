<?php
/*
 * 데이터를 메모리에 저장
 * php 코드가 실행되는 도중 값이 변함
 * 반드시 $기호 입력후 영문이나 숫자사용
 * 변수명에는 숫자가 가장 앞에 올수 없음
 */

    $kor = 85;
    $eng = 90;
    $math = 98;
    $soc = 80;
    $sci =90;
    
    $sum = $kor + $eng + $math +$soc+ $sci;
    $avg = $sum/5;
    
    print "다섯 과목 점수의 합계: ". $sum."<p>";
    print "다섯 과목의 평균". $avg;


?>

