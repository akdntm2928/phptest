<?php
interface ConcreateInterface
{
    public function compare(string $str1, string $str2): bool;
}
class Dummy implements ConcreateInterface
{
    public function compare(string1 $str1,string $str2){
        return true;
    }
}

$obj = new ConcreateClass();
$obj->promiseMethod([1,2]);
?>