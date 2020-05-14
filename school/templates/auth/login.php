<?php
if ($_POST && $_POST['submit'] == 'login') {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $role = $_POST['role'];
  $auth = new Model\Auth\Auth();
  if (!$auth->authenticate($email, $password, $role)) {
    $message = 'Invalid email or password.';
    $class = 'danger';
  }
}
if (!empty($_SESSION)) {
  Helper\Helper::validateSession('/');
}
?>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="alert alert-<?php
    echo (isset($class)) ? $class : '' ?> ">
      <?php
      echo (isset($message)) ? $message : ''; ?>
    </div>
    <div class="card">
      <div class="card-header alert alert-dark">Login</div>
      <div class="card-body">
        <form method="POST" action="" autocomplete="on">
          <div class="form-group row">
            <label for="email"
              class="col-md-4 col-form-label text-md-right">
              Email Address
            </label>
            <div class="col-md-6">
              <input id="email" type="email"
                class="form-control"
                name="email"
                value=""
                required
              >
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="password"
              class="col-md-4 col-form-label text-md-right">
              Password
            </label>
            <div class="col-md-6">
              <input id="password" type="password"
                class="form-control"
                name="password" value=""
                required
                autocomplete="current-password">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label
              text-md-right">
              Role
            </label>
            <div class="col-md-6">
              <select name="role" class="form-control" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit"
                name="submit"
                class="btn btn-dark"
                value="login">
                Login
              </button>
              <a class="btn btn-link"
                href="forgot-password">
                Forgot Your Password?
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>