<?php

require_once 'dbconfig.php';
require_once 'top_nav.php';
require_once 'side_nav.php';
?>

<?php


if (isset($_POST['submit'])) {


  $date = date("Y-m-d", strtotime($_POST['date']));

  $student_name = $_POST['student_name'];

  $contact_no = $_POST['contact_no'];

  $alternate_contact = $_POST['alternate_contact'];

  $email = $_POST['email'];

  $course = $_POST['course'];


  $current_working_status = $_POST['current_working_status'];
  $degree_passout_year = $_POST['degree_passout_year'];
  $degree_name = $_POST['degree_name'];
  $pg_degree_passout_year = $_POST['pg_degree_passout_year'];
  $pg_degree_name = $_POST['pg_degree_name'];
  $total_fees_remaining=-1;
  $id=$_SESSION["user_details"]['id'];  
  

  $query = "INSERT INTO new_registration (`date`,student_name,contact_no, altr_contact_no, email_id, course_name, current_working_status, degree_passout_year, degree_name, pg_degree_passout_year, pg_degree_name, total_fees_remaining,stud_prtl_id) VALUES ('$date', '$student_name', '$contact_no', '$alternate_contact', '$email', '$course', '$current_working_status', '$degree_passout_year', '$degree_name', '$pg_degree_passout_year', '$pg_degree_name','$total_fees_remaining','$id' )";
  //echo $query;die();
  $result = mysqli_query($conn, $query);

//print_r($result);die();

  if ($result) {
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Referal Created');
        </script>");
  } else {
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Unable to create Referal.');
        </script>");
  }
}
?>
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3><b>Add Details</b></h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Details</li>
          </ol>
        </div>
        <!-- <br><br>
        <a class="btn-lg btn-primary " href="referal_dashboard.php">Referral Dashboard</a>
        <br> -->
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Please provide the details
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Name<span id="redStarMark">*</span></label>
                      <input type="text" required class="form-control" name="student_name">

                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date<span id="redStarMark">*</span></label>
                      <input type="text" required class="date date_no_default form-control" name="date">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Contact No<span id="redStarMark">*</span></label>
                      <input type="text" required class="form-control" name="contact_no">

                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Alternate Contact No<span id="redStarMark">*</span></label>
                      <input type="text" required class="form-control" name="alternate_contact">

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label> Email Id <span id="redStarMark">*</span></label>
                      <input type="email" required class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Course:</label>
                      <input type="text" required class="form-control" name="course">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Current Working Status(Working/Not Working):</label>
                      <input type="text" required class="form-control" name="current_working_status">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label> Degree Passout Year: <span id="redStarMark">*</span></label>
                      <input type="text" required class="form-control" name="degree_passout_year">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for=""> Degree Name:</label>
                      <input type="text" required class="form-control" name="degree_name">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">PG Degree Passout Year:</label>
                      <input type="text" required class="form-control" name="pg_degree_passout_year">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">PG Degree Name :</label>
                      <input type="text" required class="form-control" name="pg_degree_name">
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-sm-12">
                    <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
                  </div>
                </div>
            </form>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</section>




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
<script>

</script>
<script>

</script>
<script>
  $(function() {
    $(".date").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      orientation: 'auto'
    }).datepicker("setDate", "0");

    $(".date_no_default").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      orientation: 'auto'
    });

  });
</script>
<?php

//require_once'footer.php';
?>