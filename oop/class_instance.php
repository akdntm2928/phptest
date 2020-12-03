<?php
class MyFileObject{
 function __construct($fname){
     // construct(생성자)
     // $fname 생성자 인자를 받을수있다
     $this->filename =$fname;
     //$this-filename에다가 생성자 인자값 셋팅
 }
    //class 내용
 function isFile(){
     //메소드
     return is_file($this->filename);
     // $this는 인스터스 가리킨는 변수다
 }   
}
$file = new MyFileObject('data.txt');
// $file->filename='data.txt';
//인스터스를 생성후 $file변수에 담는다.
var_dump($file->isFile());
var_dump($file->filename);
// 메소드를 호출하는함수
print "<br>";
//$file2 = new MyFileObject();
//$file2->filename='data2.txt';
////인스터스를 생성후 $file변수에 담는다.
//var_dump($file2->isFile());
//var_dump($file2->filename);
/*
 * MYFileObject :Class
 * $file,$file2,:instance
 * isFile:method,behavior
 * $this->filname:
 *      instance variable, instance field, instance property 
 *      status
 *  
 */
?>
