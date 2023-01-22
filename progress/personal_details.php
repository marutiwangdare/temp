<?php
require_once 'top_nav.php';
require_once 'side_nav.php';
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Personal Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Personal Details</li>
                    </ol>
                </div>
                <br><br>
                <div>
                    <a class="btn-lg btn-primary " href="add_details.php"> + Add Details</a>
                </div>
                <br>
        
                <style>
                    /* jQuery Demo */

                    .clearfix:after {
                        clear: both;
                        content: "";
                        display: block;
                        height: 0;
                    }

                    /* Responsive Arrow Progress Bar */

                    .arrow-steps .step {
                        font-size: 14px;
                        text-align: center;
                        color: #777;
                        cursor: default;
                        margin: 10px 1px 0 0;
                        padding: 10px 0px 10px 0px;
                        width: 15%;
                        float: left;
                        position: relative;
                        background-color: #ddd;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                    }

                    .arrow-steps .step a {
                        color: #777;
                        text-decoration: none;
                    }

                    .arrow-steps .step:after,
                    .arrow-steps .step:before {
                        content: "";
                        position: absolute;
                        top: 0;
                        right: -17px;
                        width: 0;
                        height: 0;
                        border-top: 19px solid transparent;
                        border-bottom: 23px solid transparent;
                        border-left: 17px solid #ddd;
                        z-index: 2;
                    }

                    .arrow-steps .step:before {
                        right: auto;
                        left: 0;
                        border-left: 17px solid #fff;
                        z-index: 0;
                    }

                    .arrow-steps .step:first-child:before {
                        border: none;
                    }

                    .arrow-steps .step:last-child:after {
                        /* border: none;*/
                    }

                    .arrow-steps .step:first-child {
                        border-top-left-radius: 4px;
                        border-bottom-left-radius: 4px;
                    }

                    .arrow-steps .step:last-child {
                        border-top-right-radius: 4px;
                        border-bottom-right-radius: 4px;
                    }

                    .arrow-steps .step span {
                        position: relative;
                    }

                    *.arrow-steps .step.done span:before {
                        opacity: 1;
                        content: "";
                        position: absolute;
                        top: -2px;
                        left: -10px;
                        font-size: 11px;
                        line-height: 21px;
                    }

                    .arrow-steps .step.current {
                        color: #fff;
                        background-color: #5599e5;
                    }

                    .arrow-steps .step.current a {
                        color: #fff;
                        text-decoration: none;
                    }

                    .arrow-steps .step.current:after {
                        border-left: 17px solid #5599e5;
                    }

                    .arrow-steps .step.done {
                        color: #173352;
                        background-color: #2f69aa;
                    }

                    .arrow-steps .step.done a {
                        color: #173352;
                        text-decoration: none;
                    }

                    .arrow-steps .step.done:after {
                        border-left: 17px solid #2f69aa;
                    }

                
                </style>
                <br>
                <br>
                <div class="container">	
                <div class="wrapper">
                    <?php 
                   // print_r(  $_SESSION["user_details"]);
                    require_once 'dbconfig.php';
                    $id=$_SESSION["user_details"]['id'];
                    $query = "select * from new_registration where stud_prtl_id='$id'";
                    $result = mysqli_query($conn, $query);
                    //print_r($result);
                    if($result->num_rows){
                        $row = mysqli_fetch_array($result);
                        $progress=json_decode($row['progress'],true);
                    }
                    //print_r($progress);
                    ?>
                    <div class="arrow-steps clearfix">
                        <div class="step <?php if(isset($progress['1']) && $progress['1']=='on')echo "current"?>"> <span> Step 1</span> </div>
                        <div class="step <?php if(isset($progress['2']) && $progress['2']=='on')echo "current"?>"> <span>Step 2 some words</span> </div>
                        <div class="step <?php if(isset($progress['3']) && $progress['3']=='on')echo "current"?>"> <span> Step 3</span> </div>
                        <div class="step <?php if(isset($progress['4']) && $progress['4']=='on')echo "current"?>"> <span>Step 4</span> </div>
                        <div class="step <?php if(isset($progress['5']) && $progress['5']=='on')echo "current"?>"> <span> Step 5</span> </div>
                    </div>
                    <div class="arrow-steps clearfix">
                        <div class="step <?php if(isset($progress['6']) && $progress['6']=='on')echo "current"?>"> <span>Step 6</span> </div>
                        <div class="step <?php if(isset($progress['7']) && $progress['7']=='on')echo "current"?>"> <span> Step 7</span> </div>
                        <div class="step <?php if(isset($progress['8']) && $progress['8']=='on')echo "current"?>"> <span>Step 8</span> </div>
                        <div class="step <?php if(isset($progress['9']) && $progress['9']=='on')echo "current"?>"> <span> Step 9</span> </div>
                        <div class="step <?php if(isset($progress['10']) && $progress['10']=='on')echo "current"?>"> <span>Step 10</span> </div>
                    </div>

                </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->






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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
    <script>
        $(function() {
            $("#example1").DataTable({
                aaSorting: []
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'dd-mm-yyyy'
        }).datepicker("setDate", "0");
    </script>