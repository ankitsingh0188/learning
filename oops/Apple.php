<?php

declare (strict_types=1);

require 'Fruit.php';

// Example of inheritance and interface.
class Apple extends Fruit implements Taste {

	public function info() {
		$name = $this->setName('Apple')->getName();
		$color = $this->setColor('Red')->getColor();

		return $name . ' ' . $color;
	}

	public function flavour() {
		return 'Sweet';
	}

}

$apple = new Apple();
print $apple->info();
print '<br />';
print $apple->flavour();
