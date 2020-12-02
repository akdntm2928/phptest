<?php
//var_dump 변수의 정보를 출력할수있는함수
var_dump(is_file('data.txt'));
// file이 존재하거나 일반적인 파일이면 true를 리턴
var_dump(is_dir('data.text'));
// 디렉토리가 존재하거나 일반적인 디렉토리면 true를 리턴
var_dump(file_get_contents('data.txt'));
file_put_contents('data.txt',rand(1,100));
//파일에 정보를 문자열을 넣는 함수 파라미터(파일,문자);

?>