<?php
Helper\Helper::validateSession();
$student = new Model\School\Student();
$student->setStudentId($_SESSION['uid']);
$info = $student->fetchStudentInfoById();
?>
  <div class="row">
    <div class="col-md-12">
      <?php if (isset($_GET['msg']) && $_GET['msg']) {
      ?>
      <div class="alert alert-success">
        <?php echo $_GET['msg']; ?>
      </div>
      <?php
        }
      ?>
      <div class="card alert-warning">
        <div class="card-header">Profile</div>
      </div>
      &nbsp;
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>School</th>
          <th>Class</th>
          <th>Subjects</th>
          <th>Mobile</th>
          <th>Address</th>
          <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td><?php echo $info['name']; ?></td>
          <td><?php echo $info['email']; ?></td>
          <td><?php echo $info['school_name']; ?></td>
          <td><?php echo $info['class_name'] . ' - ' . $info['section']; ?></td>
          <td><?php echo $info['subjects']; ?></td>
          <td><?php echo $info['mobile']; ?></td>
          <td><?php echo $info['address']; ?></td>
          <td>
            <a href="student-update?edit=<?php echo $info['id'];
            ?>">Update</a>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      setTimeout(function() {
        window.history.pushState({}, document.title, window.location.pathname );
        $('.alert').hide()
      }, 5000);
    });
  </script>