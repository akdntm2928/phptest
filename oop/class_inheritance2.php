<?php
$file = new SplFileObject('data.txt','rw+');
//var_dump($file->fread($file->getSize()));
//$file->rewind();// fread는 data에 위치를 한번더뽑을려면 다시 초기화시킨다음 사용해야된다.
//var_dump($file->fread($file->getSize()));

class MyFileObject extends SplFileObject{    
    function getContents(){
        $content = $this->fread($this->getSize());
        $this->rewind();
        return $content;
    }
}
$file = new MyFileObject('data.txt','rw+');
//var_dump($file->fread($file->getSize()));
//$file->rewind();
//var_dump($file->fread($file->getSize()));

var_dump($file->getContents());
var_dump($file->getContents());
?>