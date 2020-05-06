<?php

use Exercise\School\School;

// Instantiate the school class.
$school = new School();
$list_schools = $school->listSchools();

?>

<div class="container">
	<div class="row">
		<?php foreach ($list_schools as $list_school) { ?>
		<div class="card" style="width:200px; float: left; margin: 10px 10px 10px 10px;">
  		<!-- <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/sanfran.jpg" alt="Card image"> -->
  		<div class="card-body">
    		<h4 class="card-title"><?php echo $list_school; ?></h4>
  		</div>
		</div>
	<?php } ?>
	</div>
</div>