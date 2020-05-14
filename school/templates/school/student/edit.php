<?php
Helper\Helper::validateSession();
$student = new Model\School\Student();
$student->setStudentId($_SESSION['uid']);
$info = $student->fetchStudentInfoById();
if ($_POST && $_POST['submit'] == 'student_update') {
  unset($_POST['submit']);
  $_POST = array_map('trim', array_filter($_POST));
  $result = $student->update($_POST);
  if (!$result) {
    $msg = 'Student info updated.';
    header('Location:/profile?msg=' . $msg);
    exit();
  }
  $class = 'danger';
}
?>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="alert alert-<?php echo (isset($class)) ? $class : '' ?> ">
      <?php
      echo (isset($result)) ? $result : ''; ?>
    </div>
    <div class="card">
      <div class="card-header alert alert-warning">Update Profile</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">
              Name:
            </label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name"
                value="<?php
                echo $info['name']; ?>" required
                autocomplete="name">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">
              Email Address:
            </label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email"
                value="<?php
                echo $info['email']; ?>" required readonly>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label
              text-md-right">
              Gender:
            </label>
            <div class="col-md-6">
              <select name="gender" class="form-control" id="gender"
                value="" required>
                <option value="">Select</option>
                <option value="male" <?php
                if ($info['gender'] == "male") {
                  echo 'selected="selected"';
                } ?>>Male
                </option>
                <option value="female" <?php
                if ($info['gender'] == "female") {
                  echo 'selected="selected"';
                } ?>>Female
                </option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label
              text-md-right">
              Age:
            </label>
            <div class="col-md-6">
              <input id="age" type="number" class="form-control"
                name="age"
                value="<?php echo $info['age']; ?>" required autocomplete="age">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="mobile" class="col-md-4 col-form-label
              text-md-right">
              Mobile:
            </label>
            <div class="col-md-6">
              <input id="mobile" type="number" class="form-control"
                name="mobile"
                value="<?php echo $info['mobile']; ?>" required
                autocomplete="mobile">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label
              text-md-right">
              Address:
            </label>
            <div class="col-md-6">
              <textarea id="address" rows="4" cols="50"
                name="address" required><?php echo $info['address']; ?></textarea>
              </span>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit"
                name="submit"
                class="btn btn-primary"
                value="student_update">
                Update
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>