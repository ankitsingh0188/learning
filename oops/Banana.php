<?php

declare (strict_types=1);

require 'index.php';

// Example of inheritance.
class Banana extends Fruit {

	public function info() {
		$name = $this->setName('Banana')->getName();
		$color = $this->setColor('Yellow')->getColor();


		return $name . ' ' . $color;
	}

}

$apple = new Banana();
print $apple->info();
