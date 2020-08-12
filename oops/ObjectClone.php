<?php
class Animals {

  public function __clone() {
  }

	public $name;
	public $category;
}

// Creating instance of Animals class
$objAnimals = new Animals();
//setting properties
$objAnimals->name = "Lion";
$objAnimals->category = "Wild Animal";

// Copying object
$objCopied = $objAnimals;
$objCopied->name = "Cat";
$objCopied->category = "Pet Animal";

// Cloning the original object
$objCloned = clone $objAnimals;
$objCloned->name = "Elephant";
$objCloned->category = "Wild Animal";

print '<pre>';
print_r($objAnimals); // Cat Pet Animal
print_r($objCopied); // Cat Pet Animal
print_r($objCloned); // Elephant Wild Animal