<?php

function binarySearch($array, $k, $low = 0, $high = -1) {
    if ($high == -1) {
        $high = count($array) - 1;
    }
    while ($low <= $high) {
        $mid = $low + ($high - $low) / 2;
        if ($array[$mid] == $k) {
            return 1;
        }
        elseif ($mid < $k) {
            $low = $mid + 1;
            return binarySearch($array, $k, $low);
        }
        elseif ($mid > $k) {
            $high = $mid - 1;
            return binarySearch($array, $k, $low, $high);
        }
    }

    return -1;
}

$array = [11, 20, 44, 23, 5, 45, 3, 65];
$k = 45;
print binarySearch($array, $k);