<?php

use PHPUnit\Framework\TestCase;
use Model\School\School;

class SchoolTest extends TestCase {

  /**
   * @var object $school
   */
  private $school;

  //  Run when test case starts.
  protected function setUp(): void {
    $this->school = new School();
  }

  //  Run when test case ends.
  protected function tearDown(): void {
   $this->school = NULL;
  }

  public function testListSchools() {
    $test_array = $this->school->listSchools();
    foreach ($test_array as $item) {
      $this->assertArrayHasKey('name', $item, 'Key does not exist.') ;
    }
  }

}