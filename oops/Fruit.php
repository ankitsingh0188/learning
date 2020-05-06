<?php

// Class.
class Fruit {

  // Class properties.
  /**
   * Fruit name.
   *
   * @var String
   */
  public $name;

  /**
   * Fruit color.
   *
   * @var String
   */
  public $color;

  /**
   * Set fruit name.
   *
   * @param string $name
   *   Fruit name.
   */
  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  // Get fruit name.
  public function getName() {
    return $this->name;
  }

  /**
   * Set fruit color.
   *
   * @param string $color
   *   Fruit color.
   */
  public function setColor($color) {
    $this->color = $color;

    return $this;
  }

  // Get fruit color.
  public function getColor() {
    return $this->color;
  }

}

// Interface.
interface Taste {

  public function flavour();
}
