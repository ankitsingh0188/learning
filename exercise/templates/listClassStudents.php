<?php

use Exercise\Student\Student;
// Instantiate the class class.
$student = new Student();
$list_class_students = $student->listClassStudents();
?>

<div class="container">
	<div class="row">
		<?php foreach ($list_class_students as $key => $list_class_student) { ?>
		<div class="card" style="width:200px; float: left; margin: 10px 10px 10px 10px;">
  		<!-- <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/sanfran.jpg" alt="Card image"> -->
  		<div class="card-body">
    		<h4 class="card-title">Class: <?php echo $key; ?></h4>
    		<h5>Total Students: <?php echo count($list_class_student); ?></h5>
  		</div>
		</div>
	<?php } ?>
	</div>
</div>