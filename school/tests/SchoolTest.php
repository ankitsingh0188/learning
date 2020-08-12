<?php

use PHPUnit\Framework\TestCase;
use Model\School\School;

class SchoolTest extends TestCase {

  /**
   * @var object $school
   */
  private $school;

  // Run when test case starts.
  protected function setUp(): void {
    $this->school = new School();
  }

  // Run when test case ends.
  protected function tearDown(): void {
   $this->school = NULL;
  }

  public function testListSchools() {
    $mock_array = [
      'name' => 'Ankit',
      'age' => 31,
      'gender' => 'male'
    ];
    $school_array = $this->school->listSchools();
    $this->assertEquals($mock_array, $school_array, 'Array mismatch.') ;
  }

}