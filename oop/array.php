<h1>function styple</h1>
<?php
//$adata = ['a','b','c']; 밑에 구분과 같다
$adata =array("a","b","c");
array_push($adata,'d');
count($adata);
foreach ($adata as $item){
    echo $item."<br>";
}
var_dump(count($adata));

?>

<h1>object styple</h1>
<?php
$odata =new ArrayObject(array("a","b","c"));
$odata->append('d');
foreach ($odata as $item){
    echo $item."<br>";
}
var_dump($odata->count());
//function 해당배열에 함수를 사용할떄 해당배열에 인자값을 넘겨줘야된다.
//object 해당뱅엘 함수를 사용할때 해당하는 메소드만 호출시키면되어서 해당배열 함수에 인자값을 안넘겨줘도된다.
?>
