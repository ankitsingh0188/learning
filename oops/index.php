<?php

declare (strict_types=1);

require 'Fruit.php';

// Example of inheritance.
class Test extends Fruit {

	public function info() {
		$name = $this->setName('Apple')->getName();
		$color = $this->setColor('Red')->getColor();

		return $name . ' ' . $color;
	}

}

$apple = new Test();
print $apple->info();
