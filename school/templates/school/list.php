<?php
Helper\Helper::validateSession();
$school = new Model\School\School();
$list_schools = $school->listSchools();
?>
<div class="row">
  <div class="col-md-12">
    <div class="card alert-info">
      <div class="card-header">List of Schools</div>
    </div>
    &nbsp;
    <table class="table table-bordered" id="school-table">
      <thead class="table-secondary">
      <tr>
        <th>Name</th>
        <th>Board</th>
        <th>Medium</th>
        <th>City</th>
        <th>State</th>
        <th>Country</th>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($list_schools as $list_school) {
        ?>
        <tr>
          <td><?php echo $list_school['name']; ?></td>
          <td><?php echo strtoupper($list_school['board']); ?></td>
          <td><?php echo ucfirst($list_school['medium']); ?></td>
          <td><?php echo $list_school['city']; ?></td>
          <td><?php echo $list_school['state']; ?></td>
          <td><?php echo $list_school['country']; ?></td>
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