<?php


/**
 * Holds the registered routes
 *
 * @var array $routes
 */
$routes = [];

/**
 * Register a new route
 *
 * @param $action string
 * @param \Closure $callback Called when current URL matches provided action
 */
function route($action, Closure $callback)
{
    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}

/**
 * Dispatch the router
 *
 * @param $action string
 */
function dispatch($action)
{
    global $routes;
    $action = trim($action, '/');
    $callback = $routes[$action];

    echo call_user_func($callback);
}

// Add routes.
route('/exercise', function () {
    require_once "templates/schoolData.php";
});

route('/exercise/hod', function () {
	require_once "templates/listHod.php";
});

route('/exercise/teachers', function () {
	require_once "templates/listTeachers.php";
});

route('/exercise/physics-hod', function () {
	require_once "templates/physicsHOD.php";
});

route('/exercise/all-schools', function () {
	require_once "templates/listSchools.php";
});

route('/exercise/all-classes', function () {
	require_once "templates/listClasses.php";
});

route('/exercise/all-students', function () {
	require_once "templates/listSchoolStudents.php";
});

route('/exercise/class-students', function () {
	require_once "templates/listClassStudents.php";
});

route('/exercise/maths-students', function () {
	require_once "templates/mathsStudents.php";
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);