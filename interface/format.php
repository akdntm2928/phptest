<?php
interface ConcreateInterface
{
    public function promiseMethod(array $param): int ;
}
interface ConcreateInterface2
{
    public function promiseMethod(array $param): int ;
}

class ConcreateClass implements ConcreateInterface, ConcreateInterface2
{
    public function promiseMethod(array $param):int{
        return 1;
    }
    public function promiseMethod2(array $param):int{
        return 1;
    }
}
$obj = new ConcreateClass();
$obj->promiseMethod([1,2]);
?>