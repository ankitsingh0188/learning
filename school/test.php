<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';

use Model\Notifications\Android;
use Model\Notifications\iOS;
use Model\Notifications\Email;

//$aa = new Model\Strategy\Context(new iOS);

//$aa = new Model\Strategy\Context(new Android);

$aa = new Model\Notifications\Context(new Email);

$android = $aa->to('10');
$android = $aa->message('10');
echo '<pre>';
print_r($android);
die;
