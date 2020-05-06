<?php

function selection_sort($data) {
	$n = count($data) - 1;
	for($i=0; $i < $n; $i++) {
		$min = $i;
		for($j = $i + 1; $j < count($data); $j++) {
			if ($data[$j] < $data[$min]) {
				$min = $j;
			}
		}
  	$data = swap_positions($data, $i, $min);
	}
	return $data;
}

function swap_positions($data1, $left, $right) {
	$backup_old_data_right_value = $data1[$right];
	$data1[$right] = $data1[$left];
	$data1[$left] = $backup_old_data_right_value;
	return $data1;
}

$my_array = array(3, 0, 2, 5, -1, 4, 1);
echo '<pre>';
print_r(selection_sort($my_array));