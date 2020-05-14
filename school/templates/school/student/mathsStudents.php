<?php
$students = new Model\School\Student();
$school_info = $students->fetchSchoolInfo();
if ($school_info) {
  // Set school id.
  $list_students = $students->setSchoolId($school_info['id'])
    ->studentsSubjectWise(['maths']);
  // Set school name.
  $students->setSchoolName($school_info['name']);
}
echo '<pre>';
print_r($list_students);
die;
