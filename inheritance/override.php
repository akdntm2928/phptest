<?php
class parentClass{
    function callMethod($param){
        echo "<h1>parent {$param}</h1>";
    }
}
class ChildClass extends parentClass{
    function callMethod($param){
        parent::callMethod($param);
        // 부모 클래스에 메소드를 사용할수있다
        echo "<h1>Child {$param}</h1>";
    }
}
$obj = new ChildClass();
$obj->callMethod('method');
?>