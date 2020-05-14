<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <title>School Management!</title>
  <!-- Bootstrap JS -->
  <script src="/assets/js/jquery-3.5.1.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/jquery.dataTables.min.js"></script>
  <script src="/assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/js/custom.js" type="text/javascript"></script>
  <script
<!--    src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"-->
    type="text/javascript"></script>
</head>
<body>
<div id="app">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img
          src="assets/images/image.svg"
          width="30" height="30" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href=""
              id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              School
            </a>
            <div class="dropdown-menu dropleft"
              aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/list-schools">All Schools</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href=""
              id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Classes
            </a>
            <div class="dropdown-menu dropleft"
              aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/list-classes">All Classes</a>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">Teacher</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#"
              id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Student
            </a>
            <div class="dropdown-menu dropleft"
              aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/list-students">All Students</a>
              <a class="dropdown-item" href="/maths-students">Maths Students</a>
            </div>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <?php
          if (isset($_SESSION['uid']) && $_SESSION['uid']) {
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
            <?php
          }
          else { ?>
            <li class="nav-item active">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <?php
          } ?>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#"
              id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Register
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/school-register">School</a>
              <a class="dropdown-item" href="/class-register">Class</a>
              <a class="dropdown-item" href="/student-register">Student</a>
              <a class="dropdown-item" href="/teacher-register">Teacher</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#"
              id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img
                src="assets/images/image.svg"
                width="30" height="30" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/profile">Profile</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="py-4">
    <div class="container">