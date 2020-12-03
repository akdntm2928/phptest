<?php
class Person{
    private static $count=0;
    // class 소속된 변수, static propert라고도한다.
    private $name;
    // instance 변수(해당 인스턴스에만 사용하는 변수)
    function __construct($name) {
        $this->name=$name;
        //$this 인스턴스에대한 자기자신ex) new instance 
        self::$count=self::$count+1;
        // self:: 클래스에대한 자기자신
    }
    function enter(){
       echo '<h1>Enter '.$this->name.".".self::$count."th</h1>";
    }
    static function getCount(){
        //static이 붙어있는 getCount는 클래스에 소속이기 때문에 instance를 만들지않고 getCount를 호출할수있다.
        return self::$count;
    }
}
$p1= new Person('egoing');
$p1->enter();
$p2= new Person('leezche');
$p2->enter();
$p3= new Person('duru');
$p3->enter();
$p4= new Person('seowh');
$p4->enter();
echo Person::getCount();
 //static이 붙어있는 getCount는 클래스에 소속이기 때문에 instance를 만들지않고 getCount를 호출할수있다.
?>

