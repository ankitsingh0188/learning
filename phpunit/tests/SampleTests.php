<?php
declare(strict_types=1);

use Calculator\Calculator;
use PHPUnit\Framework\TestCase;

class SampleTests extends TestCase {

  private $calculator;

  protected function setUp(): void {
    $this->calculator = new Calculator();
  }

  protected function tearDown(): void {
    $this->calculator = NULL;
  }

  /**
   * Testing operations with PHPUnit.
   *
   * @test testAdd
   */
  public function testAdd(): int {
    $result = $this->calculator->add(1, 2);
    $this->assertSame(3, $result);

    return $result;
  }

  /**
   * Using the depends anotation to express dependencies.
   *
   * @depends testAdd
   */
  public function testMultiply($result): void {
    $output = $result * 2;
    $this->assertEquals(6, $output);
  }

  /**
   * Testing operations with PHPUnit.
   *
   * @test testOne
   */
  public function testOne() {
    $this->assertTrue(TRUE);
  }

  /**
   * Exploiting the dependencies between tests.
   *
   * @depends testOne
   */
  public function testTwo() {
    $this->assertEmpty('', 'Not empty.');
  }

  /**
   * Using a data provider that returns an array of arrays.
   * Using a data provider with named datasets.
   *
   * @dataProvider additionProvider
   */
  public function testAddition($a, $b, $expected) {
    $this->assertSame($expected, $a + $b);
  }

  public function additionProvider() {
    return [
      'adding zeros' => [0, 0, 0],
      'zero plus one' => [0, 1, 1],
      'one plus zero' => [1, 0, 1],
      'one plus one' => [1, 1, 3],
    ];
    //    return [
    //      [0, 0, 0],
    //      [0, 1, 1],
    //      [1, 0, 1],
    //      [1, 1, 3],
    //    ];
  }

  /**
   * Using the expectException() method.
   *
   * @test testException
   */
  public function testException() {
    $this->expectException(InvalidArgumentException::class);
  }

  /**
   * Error output generated when an array comparison fails.
   *
   * @test testEquality
   */
  public function testEquality() {
    $this->assertSame([1, 2, 3, 4, 5, 6], [1, 2, 3, 4, 5, 6]);
  }

  /**
   * Edge case in the diff generation when using weak comparison.
   *
   * @test testEqualityAgain
   */
  public function testEqualityAgain() {
    $this->assertEquals([1, 2, 3, 4, 5, 6], ['1', 2, 33, 4, 5, 6]);
  }

}