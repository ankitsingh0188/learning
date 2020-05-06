<?php

use Exercise\School\School;

$school = new School();
$school->setSchoolName('Methacton High School');
$school->setSchoolId(1);
$school->setSchoolMedium('English');
$school->setSchoolBoard('CBSE');

?>
<div class="container">
		<div class="row">
			<div class="card" style="width: 50rem;">
  			<!-- <img src="https://www.methacton.org/cms/lib/PA01000176/Centricity/ModuleInstance/18991/large/Methacton%20High%20School-cropped-cropped.jpg" class="card-img-top" alt="..."> -->
  			<div class="card-body">
    			<h5 class="card-title"><b>Name:</b> <?php echo $school->getSchoolName(); ?></h5>
    			<h5 class="card-text"><b>Board:</b> <?php echo $school->getSchoolBoard(); ?></h5>
    			<h5 class="card-text"><b>Medium:</b> <?php echo $school->getSchoolMedium(); ?></h5>
  			</div>
		</div>
	</div>
</div>