<?php
if (!empty($_SESSION)) {
  Helper\Helper::validateSession('/');
}
if ($_POST && $_POST['submit'] == 'forgot_password') {
  $email = $_POST['email'];
  $auth = new Model\Auth\Auth();
  $is_valid_email = $auth->isValidEmail($email);
  if ($is_valid_email) {
    if($auth->updatePassword($email, md5($_POST['password']))) {
     header('Location:/login');
     exit();
    }
  }
  $message = 'Invalid email.';
  $class = 'danger';
}
?>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-<?php echo (isset($class)) ? $class : '' ?> ">
        <?php
        echo (isset($message)) ? $message : ''; ?>
      </div>
      <div class="card">
        <div class="card-header alert alert-dark">Reset Password</div>
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
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit"
                  name="submit"
                  class="btn btn-dark"
                  value="forgot_password">
                  Reset Password
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>