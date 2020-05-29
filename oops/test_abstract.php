<?php

// prefix abstract should be use before class keyword.
// one method must be abstract.
// we will declare as well as define the methods.
// we cannot create the object of abstract class.


abstract class Cars {

  //  function declaration.
  abstract public function intro();
  
  public function message() {
    return 'Car is good';
  }
}

class Audi extends Cars {
  
  //  function definition.
  public function intro() {
    return 'Hello, I am Audi';
  }
}

class Volvo extends Cars {
  
  //  function definition.
  public function intro() {
    return 'Hello, I am Volvo';
  }
}

$audi = new Audi();
print $audi->intro();
print '<br />';
print $audi->message();

print '<br />';
print '<br />';

$volvo = new Volvo();
print $volvo->intro();
print '<br />';
print $volvo->message();