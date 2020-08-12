<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';

/* ------------------------ Notifications Starts ------------------------ */

//use Model\InterfaceStrategy\Android;
//use Model\InterfaceStrategy\iOS;
//use Model\InterfaceStrategy\Email;
//
//$aa = new Model\InterfaceStrategy\Context(new iOS);
//
//$aa = new Model\InterfaceStrategy\Context(new Android);
//
//$aa = new Model\InterfaceStrategy\Context(new Email);
//
//$android = $aa->message('10');
//echo '<pre>';
//print_r($android);
//die;

/* ------------------------ Notifications Ends ------------------------ */






/* ------------------------ Factory Method Starts ------------------------ */

//use wModel\FactoryMethod\AnimalFactory;
//use Model\FactoryMethod\Duck;
//use Model\FactoryMethod\Dog;
//
//// Duck Class
//$factory = AnimalFactory::duck('Duck', 'Quack Quack');
////$factory = AnimalFactory::create(new Duck('Duck', 'Quack Quack'));
//
//// Dog Class
//$factory1 = AnimalFactory::dog();
////$factory1 = AnimalFactory::create(new Dog);
//
//echo '<pre>';
//print_r($factory);
//print_r($factory1);
//die;
//
///* ------------------------ Factory Method Ends -------------------------- */



/* Create a prepared statement */

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
  trigger_error("Problem with connecting to database.");
}
$stmt = $conn->prepare("SELECT id FROM users WHERE email=? AND password=?");

$stmt->bind_param("ss", $email = 'student5@demo.com', $password = 'admin'); //Two
// "ss" is

//used for two string variables user and pass.

/* Execute it */

$result = $stmt->execute();

/* Bind results */

$aa = $stmt->bind_result('id');

/* Fetch the value */

//$ab = $stmt->fetch();

echo '<pre>';
print_r($aa);
die;