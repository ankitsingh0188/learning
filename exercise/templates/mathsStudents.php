<?php

use Exercise\Student\Student;
// Instantiate the class class.
$student = new Student();
$list_math_students = $student->listMathsStudents();
?>

<div class="container">
	<div class="row">
		<?php foreach ($list_math_students as $list_math_student) { ?>
		<div class="card" style="width:200px; float: left; margin: 10px 10px 10px 10px;">
  		<!-- <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/sanfran.jpg" alt="Card image"> -->
  		<div class="card-body">
    		<h4 class="card-title"><?php echo $list_math_student; ?></h4>
  		</div>
		</div>
	<?php } ?>
	</div>
</div>