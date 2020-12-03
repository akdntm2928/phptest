<?php
 class ParentClass{
        function a(){
            echo 'Parent';
        }
        final  function b(){
            echo "Parent B";
        }
    }
    class ChildClass extends ParentClass{
        function a(){
            echo 'Child';
        }
        function b(){
            echo 'Child';
        }
        // final로 지정되있는 메소드는 override로 지정될수없다
    }

    $obj = new ChildClass();
    $obj->a();
    // 상속을 원하지 않는경우 final을 사용한다.
?>