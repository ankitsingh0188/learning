# Drupal
* Drupal is a Content Management System (CMS).
* It’s an open source content and free CMS framework written in PHP.
* It enables us to organize, manage and publish content with ease and comes 
  with a variety of customization option.

## Table of contents
- [Bootsrap Process](#bootsrap-process)
- [Differentiate Drupal 8 from Drupal 7](#differentiate-drupal-8-from-drupal-7)
- [HOOK boot vs init](#hook-boot-vs-init)
- [Services](#services)
- [Caching](#caching)
- [Events](#events)
- [Bash](#bash)
- [Dependency Injection (DI)](#dependency-injection-di)

## Bootsrap Process
1. Bootstrap configuration:
    * Read the settings.php file, generate some other settings dynamically, and store them both in global variables and the Drupal\Component\Utility\Settings singleton object.
    * Start the class loader, that takes care of loading classes.
    * Set the Drupal error handler.
    * Detect if Drupal is actually installed. If it is not, redirect to the installer script.
2. Create the Drupal kernel.
3. Initialize the service container (either from cache or from rebuild).
4. Add the container to the Drupal static class.
5. Attempt to serve page from static page cache (just like Drupal 7).
6. Load all variables (variable_get).
7. Load other necessary (procedural) include files.
8. Register stream wrappers (public://, private://, temp:// and custom wrappers).
9. Create the HTTP Request object (using the Symfony HttpFoundation component).
10. Let the DrupalKernel handle it and return a response.
11. Send the response.
12. Terminate the request (modules can act upon this event).

## Differentiate Drupal 8 from Drupal 7
1. New Theme Engine: Drupal 8 comes with a new theme engine - Twig.
2. Text Editor: Unlike Drupal 7, Drupal 8 comes with a new text editor - CKEditor.
3. Field Types: Drupal 8 supports several new field types - date, email, telephone, link and reference.
4. Quick Edit Module: While using Drupal 7, developers lack the option to edit content directly from the website’s frontend. But Drupal 8 comes with a new module - quick edit. The module allows users to make changes to the content directly from the website’s frontend.
5. Built-in Configuration Management: Drupal 8 comes with built-in configuration management. As the configuration management is implemented at the file-system level, it becomes easier for developers to move fields, views, content type, and similar configuration elements from the local development environment to the web server.
6. Enhanced Website Accessibility: Unlike Drupal 7, Drupal 8 allows developers to use HTML5 natively. Hence, it becomes easier for developers to build responsive websites accessible on both computers and mobile devices. 
7. Framework: Drupal 8 has Symfony framework, which makes it powerful.
8. Some built in core modules: Multilingual Modules, Views & Built-in Web Services.

## HOOK boot vs init
1. hook_boot() will executes even on cached pages whereas hook_init() will not executes on cached pages.
2. hook_boot() is called before modules or most include files are loaded into memory (i.e., This hook will called while Drupal is still in bootstrap mode) whereas hook_init(),is called After all modules are loaded into memory.
3. It happens while Drupal is still in bootstrap mode whereas it happens after bootstrap mode.

## Services
In Drupal 8 speak, a service is any object managed by the services container. Drupal 8 introduces the concept of services to **_decouple_** reusable functionality and makes these services pluggable and replaceable by registering them with a service container. 
* As a developer, it is best practice to access any of the services provided by Drupal via the service container to ensure the decoupled nature of these systems is respected.

* As a developer, services are used to perform operations like accessing the database or sending an e-mail. Rather than use PHP's native MySQL functions, we use the core-provided service via the service container to perform this operation so that our code can simply access the database without having to worry about whether the database is MySQL or SQLlite, or if the mechanism for sending e-mail is SMTP or something else.

* Services are defined in a file example.services.yml (assuming the module is named 'example'). 

    ```
    services:
    
      # Defines a simple service which requires no parameter for its constructor.
      example.simple:
        class: Drupal\Example\Simple
        tags:
          - {name: event_subscriber}
    
      # Defines a service which requires the module_handler for its constructor.
      example.with_module_handler:
        class: Drupal\Example\WithModuleHandler
        arguments: ['@module_handler', '%example.parameter%']
    parameters:
      example.parameter: TRUE

    ```
* A '@' indicates another service, and then what is put in here is the name of the service, as defined in its services.yml file. An argument wrapped in '%' characters represents a parameter, which can be defined in the 'parameters' section of the file.
* tags: A name to identify groups of services.

## Caching
* **Internal Page Caching:** Stores the complete page information even if the user visiting the site hasn’t logged in.
* **Internal Dynamic Page Cache:** Cache small sections of each page for all users whether they are logged in or not. Whenever the page content is requested by the same or different user, the module can pull in those individual parts to speed up the building of the page on the fly.

* **Cacheability Metadata:** All things that either are directly renderable or are used to determine what to render provide cacheability metadata. Cacheability metadata consists of 3 properties:
    * **Cache Tags:** Tags are used to nullify cache entries when something on the site undergoes modification. For example, the cache tag ‘node:5’ gets invalidated any time the Drupal content node with ID 5 gets modified. This implies that any time you save something in Drupal, a relevant tag gets invalidated.
    
        ```
        Syntax : "node:5"
        node_list: List cache tags for node entities
        ```
      
    * **Cache Contexts:** Contexts are quite different from tags. Cache contexts are stored alongside cache entries and are designed to let content vary depending on what circumstances or situation it is showcased in.
    
        ```
        Syntax: return [
              '#theme' => 'theme',
              '#data' => $data,
              '#cache' => [
                'contexts' => ['url.path', 'url.query_args']
              ],
            ];
        ```
    
    * **Cache Max-age:** Cache max-age = time dependencies. It is the last step to handle cache invalidation. You have to simply set the time on how long the content should be cached for. This can vary from 0 seconds (to not cache content at all) to as long as you want. However, if you set a max-age of 3600 on the page, then it will cache its content for up to one hour before automatically invalidating.
        * Examples:
            * 60 means cacheable for 60 seconds
            * 100 means cacheable for 100 seconds
            * 0 means cacheable for zero seconds, i.e. not cacheable
            * \Drupal\Core\Cache\Cache::PERMANENT means cacheable forever, i.e. this will only ever be invalidated due to cache tags.
        * Example for most render arrays:
            * ```<?$build['#cache']['max-age'] = 0;```
        * Example in a function:
            * ```\Drupal::cache()->set('my_cache_item', $school_list, REQUEST_TIME + (86400));```

## Events
   * **Events Subscriber:** Sometimes called "Listeners", are callable methods or functions that react to an event being propagated throughout the Event Registry.
    
   * **Event Registry:** Where event subscribers are collected and sorted.
    
   * **Event Dispatcher:** The mechanism in which an event is triggered, or "dispatched", throughout the system.
    
   * **Event Context:** Many events require specific set of data that is important to the subscribers to an event. This can be as simple as a value passed to the Event Subscriber, or as complex as a specially created class that contains the relevant data.

## Bash
   * **Drush:** The name Drush stands for DRUpal SHell. Drush is a command line utility you can use to communicate to your Drupal CMS.

   * **Drupal Console:** The Drupal CLI. A tool to generate boilerplate code, interact with and debug Drupal.

## Dependency Injection (DI)
* Dependency or dependent means relying on something for support. Like if I say we are relying too much on mobile phones than it means we are dependent on them.
* You can think of DI as the middleman in our code who does all the preferred work.
* **Types of dependency injection**
    * **Constructor injection:** The dependencies are provided through a class constructor.
    * **Setter injection:** The client exposes a setter method that the injector uses to inject the dependency.
    * **Interface injection:** The dependency provides an injector method that will inject the dependency into any client passed to it. Clients must implement an interface that exposes a setter method that accepts the dependency.
* **Dependency injection’s responsibility**
    * Create the objects.
    * Know which classes require those objects.
    * And provide them all those objects.
* **Concept behind DI**
    * This states that a class should not configure its dependencies statically but should be configured by some other class from outside.
    * It is the fifth principle of S.O.L.I.D

* **Benefits of using DI**
    * Helps in Unit testing.
    * Extending the application becomes easier.
    * Helps to enable loose coupling, which is important in application programming.

* **Disadvantages of DI**
    * Complex to learn.
    * If overused can lead to management issues other problems.
    * Many compile time errors are pushed to run-time.

## OPcache
OPcache is a type of caching system that saves precompiled script bytecode in a server’s memory called a cache, so each time a user visits a web page, it loads faster.

## Varnish
Varnish Cache is a web application accelerator also known as a caching HTTP reverse proxy. Can speed up page load performance by a factor of 10-1000x

## Memcache
* Drupal doesn’t support Memcache by default, and for this, we need to install it on the server.
* Developers often come across a situation where they are required to reduce database load by caching DB objects in RAM.
* Here Memcache improves Drupal application performance by moving standard caches out of the database and by caching the results of other expensive database operations.

## CDN
A content delivery network (CDN) refers to a geographically distributed group of servers which work together to provide fast delivery of Internet content.

## Drush
* DRUSH is a shell interface for managing Drupal.
* Drush core ships with lots of useful commands for interacting with code like modules/themes/profiles. 
* Similarly, it runs update.php, executes sql queries and DB migrations, and misc utilities like run cron or clear cache.

## Entity
* Entity Type: Way of grouping like Entities together. They share some properties but in case they differ as well. Like only nodes have title and user have username. All of them have unique id.
    * Node
    * User
    * File
    
* Bundle: Are implementations of an entity type to which fields can be attached. Eg: Content types (Node Types). 
    * Some entity type have single bundle like User and some of them do not have bundle like File. 
    * Bundles are subtype of an entity and without bundle you cannot attached fields.
    * Bundles are like collection of fields applied to an entity.

* Property: Are pieces of information, that are the same for all entities of a given entity type regardless of bundle. Eg: Title

* Field: Bits of information and configurable according to the bundles. Without bundles we cannot create fields.

* Entity: Is like discrete piece of data of a specied entity type with a set of common properties and type specific properties if you have bundles.

## Blocks
* Blocks are individual & configurable pieces of code that can be rendered anywhere on your Drupal website.
* Block that require a Drupal service or a custom service should access the service using dependency injection.
* Dependency Injection(DI):
    * Implement the ContainerFactoryPluginInterface interface
    * Implement ContainerFactoryPluginInterface::create()
    * Override __construct():
        * making sure to call parent::__construct(), then store the service          in a property of the class  

## Multilingual guide
* Locale (Interface Translation) module: Translates the built-in user interface, your added modules and themes.
                                         
* Content Translation module:
    * Allow users to translate content entities.
    * Allows you to translate your site content, including pages, taxonomy terms, blocks, etc., into different languages.
    
## Field Formatter
* The field formatter formats the field data to be viewed by the end user.
Field formatters are defined as plugins.

* Field formatter class: src/Plugin/Field/FieldFormatter/RandomDefaultFormatter.php extends Drupal\Core\Field\FormatterBase

... settingsSummary

... viewElements

* Formatter Settings: If your formatter needs custom display settings, there are three steps required to achieve this:
    * Override PluginSettingsBase::defaultSettings() in order to set the defaults.
    * Create the configuration schema for the settings you've created: ```[MODULE ROOT]/config/schema/[MODULE_NAME].schema.yml```
    * Create a form to allow users to change the settings.

* Dependency Injection(DI): Dependency Injection in Field Formatters requires three steps
    * Implement the ContainerFactoryPluginInterface interface
    * Implement ContainerFactoryPluginInterface::create()
    * Override FormatterBase::__construct(): 
        * Override __construct() on FormatterBase
        * making sure to call parent::__construct(), then store the service          in a property of the class
          
## Patch
A patch is a file that contains a list of differences between one set of files, and another.  Through patches, all the changes in code like additions or deletions to Drupal core can be made.

## PDO
* PDO means PHP Data Object; it is a lean and consistent way to access databases.
* It helps the developers to write code in the easier way. It is like a data access layer that uses a unified API. 
* Drupal provides a database abstraction layer, which helps the developer to work easily with multi-database servers. 
* It is used to preserve the syntax and power of SQL and to work with complex functionality. 
* It provides a defined interface for dynamic queries with using security
  checks and good practices.

## Hooks
Hooks allow modules to alter and extend the behavior of Drupal core, or another module.

## Clean URLs
* In Drupal 8, 'Clean URLs' are enabled by default and can't be disabled.
* ```domain.com?q=node/1``` => ```domain.com/node/1```

## Which Design Pattern used in Drupal?
Singleton Design pattern is used in Drupal.
   
## What is a taxonomy in Drupal?
* Taxonomy, a powerful core module, gives your sites use of the organizational keywords known in other systems as categories, tags, or metadata.
* It is used to classify the content of the website.

## Drupal 8 VS 9
* CKEDITOR 5 in 9.x
* Layout Builder
* Big Pipe (rendering main content)
* Twig 1 => 2
* Symphony 3 => 4
* PHP(7.3)
* Mysql (5.7.8), Postgre SQL(10.0), SQLite(3.6.8), MariaDB(10.3+)
* DRUSH 10

## Design Patterns
Design patterns are typical solutions to commonly occurring problems in software design. They are like pre-made blueprints that you can customize to solve a recurring design problem in your code.
* Creational Design Patterns: Creational patterns provide various object creation mechanisms, which increase flexibility and reuse of existing code.

* Structural Design Patterns: Structural patterns explain how to assemble objects and classes into larger structures while keeping these structures flexible and efficient.

* Behavioral Design Patterns: Behavioral design patterns are concerned with algorithms and the assignment of responsibilities between objects.
  

## Mysql
##### Engines
* MyIsam: Allowed Index Types -> BTREE
* InnoDB (default) -> supports transaction, row level locking and foreign key concept. Allowed Index Types -> BTREE

##### Primary vs Unique vs Foreign key
* Primary key
    * can have only 1 primary key
    * supports auto increment value
    * cannnot accept NULL values
    * primary key behave as foreign key into another table
    * By default, Primary key is clustered index
    
* Unique key
    * can have more than 1 unique key
    * does not supports auto increment value
    * can accept only ONE NULL value
    * unique key does not behave as foreign key into another table
    * By default, Unique key is non-clustered index

* Foreign key
    * Foreign key is a field in the table that is Primary key in another table.
    * Foreign key can accept multiple null value.
    * Foreign key do not automatically create an index.
    * We can have more than one foreign key in a table..
    * Having a null foreign key is usually a bad idea instead of NULL  referred to as "orphan record".

##### Indexes
* A database index is a data structure that improves the speed of operations in a table.
* Indexes can be created using one or more columns.
* Default 16 indexes per table.

```mysql based
INDEX(column_name)

CREATE INDEX index_id ON table_name(column_name);

SHOW INDEXES FROM table_name;

DROP INDEX `index_id` ON `table_name`;

EXPLAIN SELECT query
```

* Default select statement will scan the whole table, while if we add EXPLAIN in the select statement then it will only scan the required keys.


##### Procedure
* A procedure (often called a stored procedure) is a subroutine like a subprogram in a regular computing language, stored in database. A procedure has a name, a parameter list, and SQL statement(s). Almost all relational database system supports stored procedure, MySQL 5 introduce stored procedure.
* Stored procedures are fast. MySQL server takes some advantage of caching
* The main speed gain comes from reduction of network traffic.
* Stored procedures are portable.
* By definition, a stored procedure is a segment of declarative SQL statements

```mysql based
CREATE PROCEDURE customProcedure()
BEGIN
SQL STATEMENT

CALL customProcedure();
```

##### Views
* By definition, a view is a named query stored in the database catalog.

```mysql based
CREATE VIEW customView AS  SQL Statement
SELECT FROM customView
```
* You can reference the view as a table in SQL statements
* Note that a view does not physically store the data.

##### Difference b/w Views & Procedure
* View is used when only a SELECT statement is needed
* Stored procedures hold the more complex logic, such as INSERT, DELETE, and UPDATE

##### MYSQL vs MYSQLI
* MySQL extension added in PHP version 2.0. and deprecated as of PHP 5.5.0
* MySQLi extension added in PHP 5.5.0

* MySQLi supports prepared statements.

* MySQL provides the procedural interface.	
* MySQLi provides both procedural and object-oriented interface.

* MySQLi supports store procedure.

* MySQLi extension is with enhanced security and improved debugging.

* MySQLi supports transactions through API.
* Transactions are handled by SQL queries only.

* MySQLi function mysqli_query() allows to enforce error prone queries and prevents bugs like SQL injection
* MySQLi API allows executing multiple queries with single expression using multi_query() function.

```
A deadlock in MySQL happens when two or more transactions mutually hold 
and request for locks, creating a cycle of dependencies. InnoDB
automatically detects transaction deadlocks, rollbacks a transaction
immediately and returns an error. 
```

##### Transaction (aliases: BEGIN or  BEGIN WORK), Rollback, Commit
* Enable autocommit: SET autocommit
    * SET autocommit = 0; SET autocommit = OFF
    * SET autocommit = 1; SET autocommit = ON

```mysql based
-- 1. start a new transaction
START TRANSACTION;

-- 2. Get the latest order number
SELECT 
    @orderNumber:=MAX(orderNUmber)+1
FROM
    orders;

-- 3. insert a new order for customer 145
INSERT INTO orders(orderNumber,
                   orderDate,
                   requiredDate,
                   shippedDate,
                   status,
                   customerNumber)
VALUES(@orderNumber,
       '2005-05-31',
       '2005-06-10',
       '2005-06-11',
       'In Process',
        145);
        
-- 4. Insert order line items
INSERT INTO orderdetails(orderNumber,
                         productCode,
                         quantityOrdered,
                         priceEach,
                         orderLineNumber)
VALUES(@orderNumber,'S18_1749', 30, '136', 1),
      (@orderNumber,'S18_2248', 50, '55.09', 2); 
      
-- 5. commit changes    
COMMIT;
```

##### GIT PULL
* git pull fetches the latest changes of the current branch from a remote and applies those changes to your local copy of the branch.
* Generally this is done by merging, i.e. the local changes are merged into the remote changes. So git pull is similar to git fetch & git merge.

##### GIT REBASE
* Rebasing is an alternative to merging.
* The local changes you made will be rebased on top of the remote changes, instead of being merged with the remote changes.


##### Composer
* Composer is a tool for dependency management in PHP.

* Composer is not a package manager, it will install the packages/libraries on the basis of project in a directory called vendor.

* Composer requires PHP 5.3.2+ to run

    ```text
      Composer json vs lock
    ```
    * composer. json file is a rough guide to the dependency versions that
     Composer should install, while he composer. lock file is an exact record
      of the dependency versions that have been installed.

    ```text
      Composer install vs update
   ```
    * Running the composer install uses the composer. lock file, which now
     has the “lock” on all packages you have installed on the project. ... In
      the case of composer update , it does not use the lock file, instead it
       uses the composer. json file and updates the packages(if updates have
        been released in the last 3 months).

    ```text
      Composer tild vs caret
    ```
    * ~1.2 is equivalent to >=1.2 <2.0.0, while ~1.2.3 is 
      equivalent to >=1.2.3 <1.3.0
    * ^1.2.3 is equivalent to >=1.2.3 <2.0.0

##### Plugins
* Plugins are small pieces of functionality that are swappable. Plugins that perform similar functionality are of the same plugin type.

##### Constraints
* MySQL CONSTRAINT is used to define rules to allow or restrict what values
  can be stored in columns. The purpose of inducing constraints is to enforce
  the integrity of a database.
* MySQL CONSTRAINT are used to limit the type of data that can be inserted
  into a table.
* MySQL CONSTRAINTs are: NOT NULL, UNIQUE KEY, PRIMARY KEY, FORIEGN KEY etc...

##### ElasticSearch
* Stable version : 7.5.0
* Latest JDK 8 or Java version 1.8.0 is recommended
* A node is an instance of Elasticsearch
* Elasticsearch cluster: It is a group of one or more node instances
* Elasticsearch cluster can contain multiple indices,
    * these indices contain multiple Types (Tables)
    * these types contain multiple Documents (records/rows)
    * these documents contain Properties (columns)

##### Redis
* Redis is an advanced key-value data store and cache.
* It has is also referred to as a data structure server as such the keys not
  only contains strings, but also hashes, sets, lists, and sorted sets. 
* It provides high speed
* It supports a server-side locking
* It has got lots of client lib

##### REST API (Representational state transfer)
* An API is an application programming interface. It is a set of rules that
  allow programs to talk to each other. The developer creates the API on the
  server and allows the client to talk to it.
* REST determines how the API looks like. It stands for “Representational
  State Transfer”. It is a set of rules that developers follow when they
  create their API. One of these rules states that you should be able to get
  a piece of data (called a resource) when you link to a specific URL.
* Each URL is called a request while the data sent back to you is called a
  response.
  * The Anatomy Of A Request
    1. The endpoint
    2. The method
    3. The headers
    4. The data (or body)
* SOAP (Simple Object Access Protocol) VS REST
    * Style: Protocol => Architectural Style
    * Data Format: XML => JSON, CSV, XML, HTML, Plain Text
    * Security: SSL => SSL & HTTPS 
    * Bandwith: Requires more resources and bandwidth => fewer resources and
      light weight
    * Data Cache: Cannot be cached => can be cached
    
##### Layouts Builder Vs Panels
Panels is about choosing a layout and working with that specific layout,
 where layout builder gives you an option to add layout in forms of section
 on various parts of the page. 