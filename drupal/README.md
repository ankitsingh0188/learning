# Drupal

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
1. New Theme Engine: Drupal 8 comes with a new theme engine –Twig.
2. Text Editor: Unlike Drupal 7, Drupal 8 comes with a new text editor — CKEditor.
3. Field Types: Drupal 8 supports several new field types — date, email, telephone, link and reference.
4. Quick Edit Module: While using Drupal 7, developers lack the option to edit content directly from the website’s frontend. But Drupal 8 comes with a new module — quick edit. The module allows users to make changes to the content directly from the website’s frontend.
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
By default, Drupal 8 comes with 2 modules for implementing caching-
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
