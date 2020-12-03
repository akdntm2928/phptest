<?php
class Person{
    private $name;

    function sayHi(){
        print ("hi, i'm {$this->name}");
    }
    function  setName($_name){
        $this->ifEmptyDie($_name);
        $this->name=$_name;
    }
    function getName() {
        return $this->name;
    }
    private function ifEmptyDie($value){
        // 메소드 추출 기법
        if(empty($value)){
            die('i need name');
        }
    }
}
$egoing= new Person();
$egoing->setName('aaa');
$egoing->sayHi();
//$egoing->ifEmptyDie('aaaaaaaaaa');
print($egoing->getName());
?>

