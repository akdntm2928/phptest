<?php
print "--------------------------<br>";

for($i=1; $i<=9; $i++){
    print "<h2>$i 단</h1><br>";
    for($j=1; $j<=9; $j++){
        $num = $i * $j;
        print "$i X $j =$num <br>";
    }
    print "--------------------------<br>";
}
?>

