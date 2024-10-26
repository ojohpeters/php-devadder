<?php
$num_1k = [];
function iseven($i) {
    if ($i%2 == 0) {
        return true;
    }
    else{
        return false;
    }
}
function loopeven($num_1k){
    echo "Here are the even numbers ";
    foreach ($num_1k as $k){
        if (iseven($k)) {
            echo $k. "<br>";
            
    }
}
}
function loopodd($num_1k){
    echo "Here are the odd numbers ";
    foreach ($num_1k as $k){
        if (! iseven($k)) {
            echo $k. "<br>";
            
    }
}
}
for ($i = 0; $i<1001; $i++){
    $num_1k[] = $i;
}
loopeven($num_1k);
loopodd($num_1k);