<?php
$school = new Model\School\School();
$school_info = $school->fetchSchoolInfoByStudentId();
if ($school_info) {
  $students = new Model\School\Student();
  $list_students = $students->ListStudentsBySubject('maths', $school_info['id']);
}
echo '<pre>';
print_r($list_students);
die;
