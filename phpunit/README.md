### Writing Tests for PHPUnit
* The tests for a class ```Class``` go into a class ```ClassTest```.
* ```ClassTest``` inherits (most of the time) from ```PHPUnit\Framework\TestCase```
* The tests are public methods that are named ```test*```.
* Alternatively, you can use the ```@test``` annotation in a method’s docblock to mark it as a test method.
* Inside the test methods, assertion methods such as assertSame() are used to assert that an actual value matches an expected value.
* Using the ```@depends``` annotation to express dependencies
*
*



