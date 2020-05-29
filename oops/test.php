<?php

// traits or interface

// Interface fully abstract class.

interface Demo {
  public function test();
}

interface Demo1 extends Demo {

}

trait Demos {
  abstract public function testing();

  public function test1() {
    return 'TEST1';
  }
}


abstract class Srijan {

  // Definition
  public function companyName() {
    return 'Srijan';
  }

  // Declaration
  abstract public function employeeName();
}


class Kunal extends Srijan implements Demo {

  public function employeeName() {
    return 'Kunal';
  }

  public function test() {
    return 'test kunal';
  }

  public static function abc() {
    return 'ABC';
  }
}

class Sukanta extends Srijan {
  use Demos;

  public function employeeName() {
    return 'Sukanta';
  }

  public function testing() {
    return 'test Sukanta';
  }
}

class Kundan extends Srijan {
  use Demos;

  public function employeeName() {
    return 'Kundan';
  }

  public function testing() {
    return 'test Kundan';
  }
}

print Kunal::abc();

//$kunal = new Kunal();
//print $kunal->employeeName();
//print '<br/>';
//print $kunal->test();
////print '<br/>';
////print $kunal->test1();
//
//print '<br/>';
//print '<br/>';
//print '<br/>';
//
//$sukanta = new Sukanta();
//print $sukanta->employeeName();
//print '<br/>';
//print $sukanta->testing();
//
//print '<br/>';
//print '<br/>';
//print '<br/>';
//
//$kundan = new Kundan();
//print $kundan->employeeName();
//print '<br/>';
//print $kundan->testing();
