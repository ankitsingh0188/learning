<?php

use Exercise\Classroom\Classroom;
// Instantiate the class class.
$class = new Classroom();
$list_classes = $class->listClasses();
?>

<div class="container">
	<div class="row">
		<?php foreach ($list_classes as $list_class) { ?>
		<div class="card" style="width:200px; float: left; margin: 10px 10px 10px 10px;">
  		<!-- <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/sanfran.jpg" alt="Card image"> -->
  		<div class="card-body">
    		<h4 class="card-title"><?php echo $list_class; ?></h4>
  		</div>
		</div>
	<?php } ?>
	</div>
</div>