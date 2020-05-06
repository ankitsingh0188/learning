<?php

// Callback:
$num_array = [1,2,3,4,5];
$new_array = array_map(function($num) {
	return $num*$num;
}, $num_array);

print '<pre>';
print_r($new_array);
print_r($num_array);

// Closure:
$user = 'Peter';

// Create a closure using anonymous function.
$message = function() use ($user) {
	print 'hello'. $user;
};

$message(); //output - hello Peter

$addition = function($arg1, $arg2){
	return $arg1 + $arg2;
};

print '<br />';
print $addition(20, 50);
