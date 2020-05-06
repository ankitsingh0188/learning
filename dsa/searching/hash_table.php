<?php

// php arrays ARE basically hash tables.

$array = [78, 45, 98, 58, 3, 13, 98, 98, 98, 98];
// $chaining = chainingMethod($array, 10);
$linear = linearMethod($array, 10);
// $quadratic = quadraticMethod($array, 10);
echo '<pre>';
// print_r($chaining);
print_r($linear);
// print_r($quadratic);
die;


function chainingMethod($array, $size) {
	$blank_array = array_fill(0, 10, '');
	foreach ($array as $value) {
		$key = calculateModByChainingMethod($value, $size);
		if (empty($blank_array[$key])) {
			$blank_array[$key] = $value;
		}
		elseif (!empty($blank_array[$key])) {
			if (!is_array($blank_array[$key])) {
				$blank_array[$key] = [$blank_array[$key]];
			}
			$blank_array[$key] = array_merge($blank_array[$key], [$value]);
		}
	}

		return $blank_array;
}

function linearMethod($array, $size) {
	$blank_array = array_fill(0, 10, '');	
	$i = 1;
	foreach ($array as $k => $value) {
		$key = calculateModByChainingMethod($value, $size);
		if (empty($blank_array[$key])) {
			$blank_array[$key] = $value;
			unset($array[$k]);
		}
		while (!empty($blank_array[$key])) {
			$key = calculateModByLinearProbingMethod($value, $size, $blank_array, $i);
			$i++;
		}
		
		$blank_array[$key] = $value;
	}

	return $blank_array;
}


function calculateModByChainingMethod($number, $size) {
	$result = $number % $size;

	return $result;
}



function calculateModByLinearProbingMethod($number, $size, $blank_array, $i, $aa = '') {
	// echo '<pre>';
	$result = ($number + $i) % $size;
	// if (!empty($blank_array[$result])) {
	// 	return calculateModByLinearProbingMethod($number, $size, $blank_array, $i++, 1);
	// }

	return $result;
}
