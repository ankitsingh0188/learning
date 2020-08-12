<?php
Helper\Helper::validateSession();
$list_students = [];
$school = new Model\School\School();
if ($school_info = $school->fetchSchoolInfoByStudentId()) {
  $student = Model\School\StudentFactory::create();
  $list_students = $student->listStudentsBySchool($school_info['id']);
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="card alert-warning">
      <div class="card-header"><?php echo $school_info['name'];?> - List of
        Students</div>
    </div>
    &nbsp;
    <table class="table table-bordered" id="student-table">
      <thead class="table-secondary">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Class</th>
        <th>Subjects</th>
        <th>Address</th>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($list_students as $list_student) {
        ?>
        <tr>
          <td><?php echo $list_student['name']; ?></td>
          <td><?php echo $list_student['email']; ?></td>
          <td><?php echo $list_student['class_name'] . ' - ' . $list_student['section']; ?></td>
          <td><?php echo $list_student['subjects']; ?></td>
          <td><?php echo $list_student['address']; ?></td>
        </tr>
        <?php
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#student-table thead tr').clone(true).appendTo( '#student-table thead' );
    $('#student-table thead tr:eq(1) th').each( function (i) {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
      $( 'input', this ).on( 'keyup change', function () {
        if ( table.column(i).search() !== this.value ) {
          table
            .column(i)
            .search( this.value )
            .draw();
        }
      });
    });
    var table = $('#student-table').DataTable({
      orderCellsTop: true,
      fixedHeader: true
    });
  });
</script>