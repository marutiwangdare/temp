<?php

include_once 'config/core.php';
$require_login = true;
include_once "login_checker.php";

?>

<?php
if (isset($_GET['deleteid'])) {
	/*$sr_no = $_GET['deleteid'];
	require_once 'connect.php';
	$query = "delete from new_registration where sr_no='$sr_no'";
	$result = mysqli_query($conn, $query);
	if ($result) {
		echo '<script>alert("Registration Deleted Successfully");</script>';
		echo '<script>window.location.href="registration_dashboard.php";</script>';
	} else {
		echo '<script>alert("Error Occured");</script>';
	}*/
}
//print_r($_POST);

if (isset($_POST['progress'])) {
	require_once 'connect.php';
	$sr_no = $_POST['sr_no'];
	$data=json_encode($_POST);
	$query = "update new_registration set progress='$data' where sr_no='$sr_no'";
	$result = mysqli_query($conn, $query);
	if ($result) {
		echo '<script>alert("Progress Changed Successfully");</script>';
		echo '<script>window.location.href="registration_dashboard.php";</script>';
	} else {
		echo '<script>alert("Error Occured");</script>';
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title></title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet" />

	<!--  Light Bootstrap Table core CSS    -->
	<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />


	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#list").click(function() {

				var c_name = $("#c_name").val();
				window.location = "show_registration_list.php?c_name=" + c_name;
			});
		});
	</script>

	<style>
		.table>thead>tr>th {
			font-size: 16px;
			font-weight: bold;

		}

		.table>td {
			width: 30px;
			overflow: hidden;
			display: inline-block;
			white-space: nowrap;
		}
	</style>

</head>

<body>
	<?php

	include('connect.php');
	?>

	<div class="">


		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">

				<!--td-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Today's Reminders</h4>
					</div>
					<div class="modal-body">

						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="content table-responsive table-full-width">
											<table class="table table-hover table-striped">
												<thead>

													<th style="font-size:13px;" align="center" width="80px">SR.NO</th>
													<th style="font-size:13px;" align="center" width="150px"> NAME</th>
													<th style="font-size:13px;" align="center" width="150px">CONTACT NO.</th>
													<th style="font-size:13px; width:100px" align="center" width="80px">REMAINING AMOUNT</th>
													<th style="font-size:13px;" align="center" width="70px"><strong>EDIT</strong></th>
													<th style="font-size:13px;" align="center" width="70px"><strong>DELETE REMINDER</strong></th>
												</thead>
												<tbody>
													<?php
													require_once('connect.php');
													date_default_timezone_set('Asia/Kolkata');
													$today_date = date("Y-m-d");

													$sql1 = mysqli_query($conn, "select sr_no, student_name, contact_no,course_name,total_fees_remaining from new_registration WHERE reminder_date='" . $today_date . "' order by sr_no DESC");

													while ($row = mysqli_fetch_array($sql1)) {


														echo "<tr>
							 <td> $row[sr_no]</td>
								 <td>$row[student_name]</td>
								
								 <td> $row[contact_no]</td>
								 
								 <td> $row[total_fees_remaining]</td>
								 <td><a title='EDIT' style='font-size:25px;color:green' href='edit_registration.php?sr_no=$row[sr_no]' class='fa fa-cut'></a>
									 </a></td>
								<td> <a class='btn btn-danger' title='DELETE' href='delete_registration_reminder.php?sr_no=$row[sr_no]' onClick=\"javascript: return confirm('Are you sure you want to delete Enquiry details');\" ></a> </td>
                                      </tr>
								 
								 
								 
								 </tr>
								 
								 
								 ";
													}

													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>



		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<!--div class="form-group" style="float:right;">
				 <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal"style="margin-top:10px;">Check Reminders</button>
				 </div-->
					</div>
					<div class="col-md-1" style="padding-top:10px; padding-bottom:10px;">
						<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-bell" style="font-size: 40px;color:#87CB16;"></i>
							<span style="font-size: 30px;color:#87CB16;">&nbsp;&nbsp;&nbsp;
								<?php
								$sql2 = mysqli_query($conn, "select count(sr_no) from new_registration WHERE reminder_date='" . $today_date . "'");
								$row2 = mysqli_fetch_array($sql2);
								echo $row2[0];

								?>
							</span>
						</a>
					</div>

					<div class="col-md-4">

						<div class="form-group">
							<label>Course Name</label>
							<Select name="c_name" class="form-control" id="c_name">
								<option>---Select Course Name---</option>
								<option value="All">All</option>
								<?php
								require_once('connect.php');
								$sql = mysqli_query($conn, "select coursename from courses");
								while ($row = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $row["coursename"]; ?>"> <?php echo $row["coursename"]; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<br>
							<input type="submit" id="list" value="Export" class="btn  btn-fill btn-success" />
						</div>

					</div>
					<div class="col-md-12">

						<div class="card">
							<div class="header">

								<button onClick="window.location.href='home.php'" class="btn btn-success btn-fill" style="float:right;margin:10px">Home</button>
								<button onClick="window.location.href='registration.php'" class="btn btn-success btn-fill" style="float:right;margin:10px">Add New Student</button>
								<h4 class="title">STUDENT DETAILS
									<?php if (isset($_GET['status']) && $_GET['status'] == 'completed') {
										echo '<a onClick="window.location.href=\'registration_dashboard.php\';" class="btn btn-success btn-fill" style="margin:10px">Not Completed</a>';
									} else {
										echo '<a onClick="window.location.href=\'registration_dashboard.php?status=completed\';" class="btn btn-success btn-fill" style="margin:10px">Completed</a>';
									}
									?>
									<button onClick="window.location.href='not_placed.php'" class="btn btn-success btn-fill" style="margin:10px">Not Placed</button>
									<button onClick="window.location.href='gap_not_placed.php'" class="btn btn-success btn-fill" style="margin:10px">Gap/Not Placed</button>

								</h4>
							</div>
							<div class="content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="content table-responsive table-full-width">
													<table class="table table-hover table-striped">
														<thead>
															<th align="center">SR.NO</th>

															<th align="center"> NAME</th>

															<th align="center">CONTACT NO.</th>
															<th align="center">COURSE</th>
															<th align="center">Batch Type</th>
															<th align="center">Batch Time</th>
															<th align="center">Trainer Name</th>
															<th align="center">REMAINING AMOUNT</th>
															<th align="center">Payment Mode</th>
															<th align="center"><strong>EDIT</strong></th>
															<th align="center"><strong>VIEW</strong></th>
															<th align="center"><strong>PROGRESS</strong></th>
														</thead>
														<tbody>

															<?php
															require_once('connect.php');
															$limit = 500;
															$page = isset($_GET['page']) ? $_GET['page'] : 1;
															$start = ($page - 1) * $limit;
															$results1 = mysqli_query($conn, "select count(sr_no) from new_registration order by sr_no DESC");
															$count = mysqli_fetch_array($results1);
															$total = $count[0];

															$pages = ceil($total / $limit);
															?>

															<?php
															require_once('connect.php');
															$where = 'where total_fees_remaining > 0 or total_fees_remaining="-1"';
															if (isset($_GET['status']) && $_GET['status'] == 'completed') {
																$where = "where total_fees_remaining = 0";
															}
															$sql = mysqli_query($conn, "select sr_no, student_name, contact_no,course_name,total_fees_remaining,batch_type,batch_time,trainer_name,mode_of_payment,mode_of_payment2,mode_of_payment3,gap_no_gap,progress from new_registration $where order by sr_no DESC LIMIT $start , $limit");
															//$result = mysqli_fetch_array($sql);
															while ($row = mysqli_fetch_array($sql)) {

																if ($row['gap_no_gap'] == 'Gap') {

																	$style = "style=background-color:orange !important";
																} else {

																	$style = "style=background-color:white !important";
																}

																echo "<tr $style>
								 <td> $row[sr_no]</td>
								 <td>$row[student_name]</td>
								
								 <td> $row[contact_no]</td>
								 <td>$row[course_name]</td>
								 <td>$row[batch_type]</td>
								 <td>$row[batch_time]</td>
								 <td>$row[trainer_name]</td>
								 <td> $row[total_fees_remaining]</td>";
																if (!empty($row['mode_of_payment3'])) {
																	echo "	<td> $row[mode_of_payment3]</td>";
																} elseif (!empty($row['mode_of_payment2'])) {
																	echo "   <td> $row[mode_of_payment2]</td>";
																} elseif (!empty($row['mode_of_payment'])) {
																	echo "    <td> $row[mode_of_payment]</td>";
																} elseif (empty($row['mode_of_payment'] && $row['mode_of_payment2'] && $row['mode_of_payment3'])) {
																	echo "  <td> --::-- </td>";
																}
																echo "<td><a class='btn btn-success' href='edit_registration.php?sr_no=" . $row['sr_no'] . "'>Edit</a></td>
																<td><a class='btn btn-info' href='view_registration.php?sr_no=" . $row['sr_no'] . "'>View</a></td>
								 <!--td> <a title='DELETE' href='registration_dashboard.php?deleteid=$row[sr_no]' onClick=\"javascript: return confirm('Are you sure you want to delete Enquiry details');\" class='fa fa-trash' style='font-size:25px;color:red'></a> </!--td -->
                                      ";
															
															?>
															<td>
															<?php 
																$progress='';
																//print_r($row);
																if(isset($row['progress']))
																{	
																	$progress= json_decode($row['progress'],true);
															?>
															<form method="post">
																<input type="hidden" name="progress">
																<input type="hidden" name="sr_no" value='<?php echo $row['sr_no']?>'>
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='1' <?php if(isset($progress['1']) && $progress['1']=='on')echo "checked"?> data-toggle="tooltip" title="Step1">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='2' <?php if(isset($progress['2']) && $progress['2']=='on')echo "checked"?> data-toggle="tooltip" title="Step2">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='3' <?php if(isset($progress['3']) && $progress['3']=='on')echo "checked"?> data-toggle="tooltip" title="Step3">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='4' <?php if(isset($progress['4']) && $progress['4']=='on')echo "checked"?> data-toggle="tooltip" title="Step4">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='5' <?php if(isset($progress['5']) && $progress['5']=='on')echo "checked"?> data-toggle="tooltip" title="Step5">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='6' <?php if(isset($progress['6']) && $progress['6']=='on')echo "checked"?> data-toggle="tooltip" title="Step6">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='7' <?php if(isset($progress['7']) && $progress['7']=='on')echo "checked"?> data-toggle="tooltip" title="Step7">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='8' <?php if(isset($progress['8']) && $progress['8']=='on')echo "checked"?> data-toggle="tooltip" title="Step8">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='9' <?php if(isset($progress['9']) && $progress['9']=='on')echo "checked"?> data-toggle="tooltip" title="Step9">
																<input type="checkbox" id="check" onclick="$(this).closest('form').submit();" name='10' <?php if(isset($progress['10']) && $progress['10']=='on')echo "checked"?> data-toggle="tooltip" title="Step10">
															</form>
															</td>
															
														</tr>
															<?php 
															}
															}?>
														</tbody>
													</table>
													<ul class="pagination">
														<?php for ($i = 1; $i <= $pages; $i++) : ?>

															<li><a href="registration_dashboard.php?page=<?= $i; ?>"><?= $i; ?></a></li>
														<?php endfor; ?>
													</ul>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>