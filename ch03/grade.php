<?php
// $_REQUEST를 통해서 form 태그에 값에서 name를 통해서 값을 전달 받는다
$score =$_REQUEST["score"];

if($score >= 90){
    $grade = "A등급";
}else if($score >= 80){
    $grade = "B등급";
}else if($score >= 70){
    $grade = "C등급";
}else {
    $grade = "불합격";
}


print "취득점수 $score 등급: $grade";
?>

