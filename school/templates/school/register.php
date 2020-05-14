<?php
$country = new Model\Misc\Country();
$countries = $country->listCountries();

if ($_POST && $_POST['submit'] == 'school_register') {
  unset($_POST['submit']);
  $_POST = array_map('trim', array_filter($_POST));
  $school = new Model\School\School();
  $register = $school->register($_POST);
  $class = 'danger';
  if ($register == 1) {
    $_POST = [];
    list($register, $class) = Helper\Helper::successMsg('school_register');
  }
  elseif (empty($register)) {
    list($register, $class) = Helper\Helper::errorMsg('school_register');
  }
}
?>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="alert alert-<?php
    echo $class; ?>">
      <?php
      echo (isset($register)) ? $register : ''; ?>
    </div>
    <div class="card">
      <div class="card-header alert alert-info">School Registration</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">
              Name:
            </label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name"
                value="" required autocomplete="off">
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label for="board" class="col-md-4 col-form-label text-md-right">
              Board:
            </label>
            <div class="col-md-6">
              <select name="board" class="form-control" id="board" required>
                <option value="">Select</option>
                <option value="cbse" selected>CBSE</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label
              text-md-right">
              Medium:
            </label>
            <div class="col-md-6">
              <select name="medium" class="form-control" id="medium" required>
                <option value="">Select</option>
                <option value="english" selected>English</option>
                <option value="hindi">Hindi</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label
              text-md-right">
              Country:
            </label>
            <div class="col-md-6">
              <select name="country" class="form-control" id="country"
                onchange="listState(this.value)" required>
                <option value="">Select Country</option>
                <?php
                foreach ($countries as $key => $country) {
                  ?>
                  <option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
                <?php }

                ?>
              </select>
            </div>
          </div>
          <div class="form-group row d-none" id="state-div">
            <label for="state" class="col-md-4 col-form-label
              text-md-right">
              State:
            </label>
            <div class="col-md-6">
              <select name="state" class="form-control" id="state-list"
                required onChange="listCity(this.value)">
              <option value="">Select State</option>
              </select>
            </div>
          </div>
          <div class="form-group row d-none" id="city-div">
            <label for="state" class="col-md-4 col-form-label
              text-md-right">
              City:
            </label>
            <div class="col-md-6">
              <select name="city" class="form-control" id="city-list"
                required>
                <option value="">Select City</option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit"
                name="submit"
                class="btn btn-info"
                value="school_register">
                Register
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
