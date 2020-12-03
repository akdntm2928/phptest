<?php
class Animal{
   function run(){
       print('running..<br>');
   } 
   function breathe(){
       print('breatjing...<br>');
   }
}
class Human extends Animal{
    // human이라는 클래스가 Animal이라는 클래스를 inheritance 한다.(human이라는 클래스가 Animal이라는 클래스에 기능를 사용할수있음.)
   function thing(){
       print('thinking...<br>');
   }
   function talk(){
       print('talking...<br>');
   }
}

$human = new Human();
$human-> run();
?>

