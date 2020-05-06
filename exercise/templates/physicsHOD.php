<?php

use Exercise\Teacher\Teacher;

// Instantiate the teacher class.
$teacher = new Teacher();
$hods = $teacher->departmentHOD();

?>

<div class="container">
	<div class="row">
		<?php foreach ($hods as $hod) { ?>
		<div class="card" style="width:200px; float: left; margin: 10px 10px 10px 10px;">
  		<!-- <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image"> -->
  		<div class="card-body">
    		<h4 class="card-title"><?php echo $hod; ?></h4>
  		</div>
		</div>
	<?php } ?>
	</div>
</div>