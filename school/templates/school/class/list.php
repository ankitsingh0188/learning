<?php
Helper\Helper::validateSession();
$classes = new Model\School\Classes();
$school_info = $classes->fetchSchoolInfo();
if ($school_info) {
  // Set school id.
  $list_classes = $classes->setSchoolId($school_info['id'])
    ->listClassesBySchool();
  // Set school name.
  $classes->setSchoolName($school_info['name']);
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="card alert-info">
      <div class="card-header"><?php echo $classes->getSchoolName();?> - List
        of Classes
      </div>
    </div>
    &nbsp;
    <table class="table table-bordered" id="school-table">
      <thead class="table-secondary">
      <tr>
        <th>Classes</th>
        <th>Subjects</th>
      </tr>
      </thead>
      <tbody>
      <?php
      $output = [];
      foreach ($list_classes as $key => $list_class) {
        ?>
        <tr>
          <td><?php echo $list_class['name'] . ' - ' . $list_classes[$key]['section']; ?></td>
          <td><?php echo $list_class['subjects']; ?></td>
        </tr>
        <?php
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
<script>
  // $(document).ready(function() {
  //   $('#school-table').DataTable();
  // });
</script>