<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

// Create a new router instance.
$router = new Routes\Routes($_SERVER);
// Prepare routes array.
$routes = [
  '' => 'templates/home.html',
  'login' => 'templates/auth/login.php',
  'logout' => 'templates/auth/logout.php',
  'forgot-password' => 'templates/auth/forgotPassword.php',
  'school-register' => 'templates/school/register.php',
  'class-register' => 'templates/school/class/register.php',
  'teacher-register' => 'templates/school/teacher/register.php',
  'student-register' => 'templates/school/student/register.php',
  'list-schools' => 'templates/school/list.php',
  'list-classes' => 'templates/school/class/list.php',
  'list-students' => 'templates/school/student/list.php',
  'maths-students' => 'templates/school/student/mathsStudents.php',
  'profile' => 'templates/school/student/dashboard.php',
  'student-update' => 'templates/school/student/edit.php',
];
$router->prepareRoutes($routes);

include __DIR__ . '/templates/footer.php';
