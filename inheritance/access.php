<?php
class ParentClass{
    public $_public ="<h1>public</h1>";
    protected $_protected ="<h1>protected</h1>";
    private $_private ="<h1>private</h1>";
}

class ChildClass extends ParentClass{
    function callpubilc() {
        echo $this->_public;
    }
    function callprotected(){
        echo $this->_protected;
    }
    function callprivate() {
        echo $this->_private;
        // 자식 클래스에서 부모클래식에있는 protected변수에는 접근이 가능하다.
    }

}

$obj = new ChildClass();
echo $obj->_public;
// echo $obj->_protected;
// protected는 obj통해서 직접 접근이 불가능하다
// echo $obj->_private;
$obj->callpubilc();
$obj->callprotected();
$obj->callprivate();
?>