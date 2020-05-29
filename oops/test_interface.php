<?php

// Interface OR fully abstract class.
interface Model {
  // Only function declaration not definition.
  public function name();
}

trait abc {
  public function message() {
    return 'Call trait function message';
  }
}

class Cars {
  
  public static function demoMessage() {
    return 'Call static function.';
  }

  public function intro() {
    return 'Car intro';
  }
}

//Call static methods
print Cars::demoMessage();


// BMW Car
// Normal Inheritance
class BMW extends Cars {
  use abc;
}
$bmw = new BMW();
print $bmw->message();
print '<br />';


// Volvo Car
// Inheritance + Interface
class Volvo extends Cars implements Model {
  
  public function name() {
    return 'Model 2010';
  }
}
$volvo = new Volvo();
print $volvo->name();
print '<br />';


// Normal class + traits
class Audi {
  use abc;
}
$bmw = new Audi();
print '<br />';
print $bmw->message();



// Mercedes Car
// Inheritance + Interface + Traits
class Mercedes extends Cars implements Model {
  use abc;
  public function name() {
    return 'Model 2010';
  }
}
print '<br />';
print 'Mercedes';
print '<br />';
$merc = new Mercedes();
print $merc->name();
die;