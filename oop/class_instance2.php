<?php
class MyFileObject{

    private $filename; // 외부에서 직접 접극을 막는다.
//    public $filename; // 외부에서 직접 접근할수있게한다./
                function __construct($fname){
     $this->filename =$fname;
     if(!file_exists($this->filename)){
         //file_exists 파일이 존재하는지 체크하는 함수
         die('There is no file '.$this->filename);
         // 해당파일이 exit와 같이기능 인자값 해당파일 명과 메세지를 입력
     }
 }
 function isFile(){
     return is_file($this->filename);
 }   
}
$file = new MyFileObject('data.txt');
$file->filename ='asdasdas';//filename을 직접 지정할려고하는 행위
var_dump($file->isFile());
var_dump($file->filename);
?>
