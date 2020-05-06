<?php

function bubble_Sort($my_array) {
	$check = true;
	$c = sizeof($my_array) - 1;

	while ($check) {
		$check = false;
		for( $i = 0; $i < $c; $i++) {
			if( $my_array[$i] > $my_array[$i + 1] ) {
				list($my_array[$i + 1], $my_array[$i]) = [$my_array[$i], $my_array[$i + 1]];
				$check = true;
			}
		}
	}

	return $my_array;
}

$test_array = array(3, 0, 2, 5, -1, 4, 1);
$result = bubble_Sort($test_array);
echo '<pre>';
print_r($result);
die;
