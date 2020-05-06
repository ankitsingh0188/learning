<?php

function interpolationSearch($array, $k) {
	$low = 0;
	$high = sizeof($array) - 1;
	while ($low <= $high and $k >= $array[$low] and $k <= $array[$high]) {
		if ($l == $h) {
			if ($arr[$l] == $x) {
				return 1; 
			}

       return -1; 
    }
		$mid = $low + (($high - $low)/($array[$high] - $array[$low])) * ($k - $array[$low]);
		if ($array[$mid] == $k) {
			return 1;
		}
		elseif ($mid < $k) {
			$low = $mid + 1;
		}
		elseif ($mid > $k) {
			$high = $mid - 1;
		}
	}

	return -1;
}


$arr = [10, 12, 13, 16, 18, 19, 20, 21,  22, 23, 24, 33, 35, 42, 47];
$x = 18;
print interpolationSearch($arr, $x);
