<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';

// List states via country.
if (isset($_POST) && !empty($_POST['country_id'])) {
  $country = new Model\Misc\Country();
  $country->setCountryId($_POST['country_id']);
  $list_states = $country->listStatesByCountry();
  ?>
   <option value="">Select State</option>
  <?php
  foreach ($list_states as $state) {
    ?>
    <option value="<?php
    echo $state["id"]; ?>"><?php
      echo $state["name"]; ?></option>
    <?php
  }
}

// List cities via states.
elseif (isset($_POST) && !empty($_POST['state_id'])) {
  $state = new Model\Misc\State();
  $state->setStateId($_POST['state_id']);
  $list_states = $state->listCitiesByStates();
  ?>
  <option value="">Select City</option>
  <?php
  foreach ($list_states as $state) {
    ?>
    <option value="<?php
    echo $state["id"]; ?>"><?php
      echo $state["name"]; ?></option>
    <?php
  }
}

// List classes via school.
elseif (isset($_POST) && !empty($_POST['school_id'])) {
  $school = new Model\School\School();
  $school->setSchoolId($_POST['school_id']);
  $classes = new Model\School\Classes();
  $list_classes = $classes->listClassesBySchool($school->getSchoolId());

  ?>
  <option value="">Select Class</option>
  <?php
  foreach ($list_classes as $list_class) {
    ?>
    <option value="<?php
    echo $list_class["id"]; ?>"><?php
      echo $list_class["name"] . ' - ' . $list_class["section"]; ?></option>
    <?php
  }
}

// List subjects via classes.
elseif (isset($_POST) && !empty($_POST['class_id'])) {
  $classes = new Model\School\Classes();
  $classes->setClassId($_POST['class_id']);
  $list_subjects = $classes->listSubjectsByClass();
  echo $list_subjects[0]["subjects"];
}