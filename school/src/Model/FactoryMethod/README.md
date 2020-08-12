## Factory Method is a creational design pattern
* Also known as: Virtual Constructor
### Provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created.

### This pattern is a “real” Design Pattern because it achieves the Dependency Inversion principle a.k.a the “D” in SOLID principles. FactoryMethod class depends on abstractions, not concrete classes
* For simple cases, this abstract class could be just an interface.

There are two possible benefits to building your code this way;
the first is that if you need to change, rename, or replace the Automobile class
later on you can do so and you will only have to modify the code in the factory,
instead of every place in your project that uses the Automobile class.