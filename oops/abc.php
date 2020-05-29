<?php

class ABC {

  protected $name;

  public function __construct() {
    $this->name = '';
  }

  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  public function getName() {
    return $this->name;
  }
}

class Demo extends ABC {


}


// method name.
$demo = new Demo();
print $demo->setName('Kunal')->getName();