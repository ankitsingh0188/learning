<?php

use Exercise\Teacher\Teacher;

// Instantiate the teacher class.
$teacher = new Teacher();
$list_teachers = $teacher->listTeachers();

?>

<div class="container">
	<div class="row">
		<?php foreach ($list_teachers as $list_teacher) { ?>
		<div class="card" style="width:200px; float: left; margin: 10px 10px 10px 10px;">
  		<!-- <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar5.png" alt="Card image"> -->
  		<div class="card-body">
    		<h4 class="card-title"><a href="/exercise/hello"><?php echo $list_teacher; ?></a></h4>
  		</div>
		</div>
	<?php } ?>
	</div>
</div>
