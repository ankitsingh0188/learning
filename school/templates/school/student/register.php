<?php

$student = new Model\School\Student();
$list_schools = $student->listSchools();

if ($_POST && $_POST['submit'] == 'student_register') {
  unset($_POST['submit']);
  unset($_POST['subjects']);
  $_POST = array_map('trim', array_filter($_POST));
  $_POST['password'] = md5($_POST['password']);
  $class = 'danger';
  $register = $student->register($_POST);
  if ($register == 1) {
    $_POST = [];
    list($register, $class) = Helper\Helper::successMsg('student_register');
  }
  elseif (empty($register)) {
    list($register, $class) = Helper\Helper::errorMsg('student_register');
  }
}
?>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="alert alert-<?php
    echo ($class) ? $class : ''; ?>">
      <?php
      echo (isset($register)) ? $register : ''; ?>
    </div>
    <div class="card">
      <div class="card-header alert alert-warning">Student Registration</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">
              Name
            </label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name"
                value="" required autocomplete="off">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">
              Email Address
            </label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email"
                value="" required autocomplete="email">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label
              text-md-right">
              Password
            </label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control"
                name="password"
                value="admin" required autocomplete="password">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label
              text-md-right">
              Gender
            </label>
            <div class="col-md-6">
              <select name="gender" class="form-control" id="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label
              text-md-right">
              Age
            </label>
            <div class="col-md-6">
              <input id="age" type="number" class="form-control"
                name="age"
                value="12" required autocomplete="age">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="mobile" class="col-md-4 col-form-label
              text-md-right">
              Mobile
            </label>
            <div class="col-md-6">
              <input id="mobile" type="number" class="form-control"
                name="mobile"
                value="12345" required autocomplete="mobile">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="school" class="col-md-4 col-form-label
              text-md-right">
              School
            </label>
            <div class="col-md-6">
              <select name="school_id" class="form-control"
                id="school" required onchange="listClasses(this.value)" >
                <option value="">Select School</option>
                <?php
                foreach ($list_schools as $key => $school) {
                  ?>
                  <option value="<?php
                  echo $school['id']; ?>"><?php
                    echo $school['name']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row d-none" id="class-div">
            <label for="class_id" class="col-md-4 col-form-label
              text-md-right">
              Classes
            </label>
            <div class="col-md-6">
              <select name="class_id" class="form-control"
                id="class-list" onchange="listSubjects(this.value)" required>
                <option value="">Select Class</option>
              </select>
            </div>
          </div>
          <div class="form-group row d-none" id="subjects-div">
            <label for="subjects" class="col-md-4 col-form-label
              text-md-right">
              Subjects
            </label>
            <div class="col-md-6">
              <textarea
                id="subjects-list" rows="4" cols="50" name="subjects"
                readonly></textarea>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label
              text-md-right">
              Address
            </label>
            <div class="col-md-6">
              <textarea id="address" rows="4" cols="50"
                name="address" required>New Delhi, India
              </textarea>
              </span>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit"
                name="submit"
                class="btn btn-warning"
                value="student_register">
                Register
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>