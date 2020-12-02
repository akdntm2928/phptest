<h1>Function</h1>
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
<h1>object</h1>
<?php
// 객체에 담겨있는 함수들을 이용해서 함수들을 사용한다.
$file = new SplFileObject('data.txt',"rw+");// 객체로 만들시 해당 파일 명만수정해서 밑에 함수들은 그파일명에 맞춰서 동작함
// new splfileobject에 권한을 설정해줘야된다 r read권한 w write 권한
var_dump($file->isFile());
var_dump($file->isDir());
var_dump($file->fread($file->getSize()));
$file->fwrite(rand(1,100));

//SplFileObject : class (설계도)
// $file =instance(설계도를 바탕으로 만들어진 구체적인 제품들)
// $isfile, $isDir,$fread: method(function)이라고 불른다.
// data.txt : state
//

?>