# Object Oriented Programming! 

## Table of Contents
- [What is OOP?](#what-is-oop)
- [Advantages of OOP](#advantages-of-oop)
- [Class](#class)
- [Rules for creating a class](#rules-for-creating-a-class)
- [Objects](#objects)
- [Constructor](#constructor)
- [Access Modifiers](#access-modifiers)
- [Inheritance](#inheritance)
- [Class Constants](#class-constants)
- [Abstract Class](#abstract-class)
- [Traits](#traits)
- [Traits vs. Interfaces](#traits-vs-interfaces)
- [Static Keyword](#static-keyword)
- [When to define static methods?](#when-to-define-static-methods)
- [Object Cloning](#object-cloning)
- [Final Methods](#final-methods)
- [Final Classes](#final-classes)
- [Typecasting](#typecasting)
- [PHP Autoloader](#php-autoloader)
- [PHP Anonymous Functions [WHAT and WHY]](#php-anonymous-functions-what-and-why)

### What is OOP?
1. OOP - Object Oriented Programming.
2. Procedural programming is about writing procedures or functions that perform operations on the data, while object-oriented programming is about creating objects that contain both data and functions.

### Advantages of OOP
1. Faster and easier to execute.
2. Provides a clear structure for the programs.
3. Helps to keep the code **_DRY_** (Don't Repeat Yourself).
4. Possible to create reusable applications with less code and shorter development time.

### Class
A class is a blueprint or prototype of the object that defines the variables and the methods (functions).

### Rules for creating a class.
1. Starts with letter.
2. No reserved word.
3. No spaces in class name.

### Objects
Instance of class.

### Constructor
A constructor allows you to initialize an object's properties upon creation of the object.

### Access Modifiers 
1. **Public** - the property or method can be accessed from everywhere. This is default.
2. **Protected** - the property or method can be accessed within the class and by classes derived from that class.
3. **Private** - the property or method can ONLY be accessed within the class.

### Inheritance
1. When a class derives from another class.
2. The child class will inherit all the public and protected properties and methods from the parent class. In addition, it can have its own properties and methods.
3. An inherited class is defined by using the **_extends_** keyword.

### Class Constants
1. Constants cannot be changed once it is declared.
2. A class constant is declared inside a class with the **_const_** keyword.
3. We can access a constant from outside the class by using the class name followed by the scope resolution operator (::) followed by the constant name.

### Abstract Class
1. Abstract class must contain atleast one abstract method.
2. An abstract method is a method that is declared.
3. We cannnot create the object of the abstract class.

### Traits
1. PHP only supports single inheritance a child class can inherit only from one single parent.
2. Traits are used to declare/define methods that can be used in multiple classes. Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).
3. Traits are declared with the **_trait_** keyword.
4. To use a trait in a class, use the **_use_** keyword.

### Traits vs. Interfaces
The main difference between the Traits and Interfaces in PHP is that the Traits define the actual implementation of each method within each class,
so many classes implement the same interface but having different behavior, while traits are just chunks of code injected in a class in PHP.
The traits are used when multiple classes share the same functionality.

### Static Keyword
1. In certain cases, it is very handy to access methods and properties in terms of a class rather than an object. This can be done with the help of static keyword. Any method declared as static is accessible without the creation of an object.
2. Static functions are associated with the class, not an instance of the class.
3. To add a static method to the class, **_Static_** keyword is used.

### When to define static methods?
1. The static keyword is used in the context of variables and methods that are common to all the objects of the class.
2. Therefore, any logic which can be shared among multiple instances of a class should be extracted and put inside the static method.
3. However, a static method doesn’t let you define explicit dependencies and includes global variables in the code that can be accessed
from anywhere. This can affect the scalability of an application. Moreover, you will have a tough time performing automated testing on
classes containing static methods. Therefore, they should be used for **_Utilities_** and not for convenience reasons.

	* **_Utility is a small collection of useful functions._**

### Object Cloning
1. An object copy is created by using the **_Clone_** keyword (which calls the object’s __clone() method if possible).
2. An object’s __clone() method cannot be called directly. When an object is cloned, PHP will perform a shallow copy of all of the object’s properties. 
4. Any properties that are references to other variables will remain references.

### Final Methods
1. When a method is declared as final then overriding on that method can not be performed.
2. Methods are declared as final due to some design reasons. Method should not be overridden due to security or any other reasons.

### Final Classes 
1. A class declared as final can not be extended in future.
2. Classes are declared as final due to some design level issue.
3. Creator of class declare that class as final if he want that class should not be inherited due to some security or other reasons.
4. A final class can contain final as well as non final methods.
5. But there is no use of final methods in class when class is itself declared as final because inheritance is not possible.

### Typecasting
1. The meaning of type casting is to use the value of a variable with different data type.
2. PHP does not require or support type definition of the variable. In PHP we never define data type while declaring the variable. In PHP variables automatically decide the data type on the basis of the value assignment or context.
	* (int), (integer) - cast to integer
	* (bool), (boolean) - cast to boolean
	* (float), (double), (real) - cast to float
	* (string) - cast to string
	* (array) - cast to array
	* (object) - cast to object
	* (unset) - cast to NULL (PHP 5)

### PHP Autoloader
1. Autoloading allows you to automatically include the class files.
2. When you are working in a quite large PHP project, you will have a large number of class files. In each PHP file, you will need to have a bunch of include or require statements at the beginning to use those classes.
3. This is not the way we need it to be done. It would be great if we could let PHP to automatically load (autoload) the class files for us.

### PHP Anonymous Functions [WHAT and WHY]
1. Anonymous functions are useful when using functions that require a callback function like array_filter or array_map do
2. If you have noticed there are two key difference between a regular function and an anonymous function.
3. There is no function name(between function keyword and the opening parenthesis() which tells PHP that we are creating an anonymous function.
There is a semicolon(;) after the function definition. This is because anonymous functions definitions are expressions whereas regular function 
definition is code constructs.
4. You can assign it to a variable and can call it using the variable name.
5. You can pass this function to another function as a parameter. This is known as **_Callback_**.
6. Return it from within an outer function so that it can access the outer function’s variables. This is known as a **_Closure_**.