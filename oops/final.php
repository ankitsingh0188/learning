<?php

declare(strict_types=1);

class Srijan {

//  final function add(int $a, int $b) {
//    return $a + $b;
//  }

  function add(int $a, int $b) {
    return $a + $b;
  }
}

class Kunal extends Srijan {

  // Method overriding
  public function add(int $a, int $b) {
    return $a * $b;
  }

}

$kunal = new Kunal();
print $kunal->add(1, 5);