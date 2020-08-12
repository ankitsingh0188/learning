<?php

function linearSearch($array, $k) {
    // With foreach loop.
    foreach ($array as $key => $value) {
        if ($value == $k) {
            return 1;
        }
    }

    return -1;

    // With for loop.
    $len = sizeof($array);
    for ($i=0; $i <= $array ; $i++) { 
        if ($array[$i] == $k) {
            return 1;
        }
    }

    return -1;
}

$array = [11, 20, 44, 23, 5, 45, 3, 65];
$k = 45;
print linearSearch($array, $k);