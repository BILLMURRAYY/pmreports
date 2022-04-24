<?php session_start(); ?> 
<?php include("../include/head.php"); ?>
<?php include("../service/check_login_page.php"); ?>
<?php
require_once("../service/condb.php");
?>

<head>
    <style>
        .contain {
            padding: 25px;
        }

        .card-title {
            font-size: 25px;
        }

        a {
            color: white;
        }

        .card-header {
            background: #004385;
            color: white;
        }

        table {
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include("nav.php"); ?>

        <?php include("../include/sidebar_staff.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="card">
                    <div class="card-header ">
                        <div>
                            <h3 class="card-title">Feedback</h3>
                        </div>
                        <!-- <div style="text-align: right;">
                            <button type="button" class="btn btn-success text-right "><a href="form_report.php"><span class="fas fa-plus-circle"></span> เพิ่มรายงาน</a></button>
                        </div> -->
                    </div>

                    <!--  -->
                    <?php
                    $feedback_id = $_GET['feedback_id'];
                    $member_send_name = $_GET['member_send_name'];
                    // $member_receive_id = $_GET['member_receive_id'];
                    $member_send_id = $_GET['member_send_id'];
                    // echo "<pre>";
                    // print_R($_GET);
                    // echo "</pre>";
                    // exit();

                    ?>
                    <?php
                    // $report_id = explode(",", $report_id);
                    // echo "<per>";
                    // print_r ($id_report);
                    // echo "</per>";
                    // foreach ($report_id as $value) {
                    $result = "SELECT * FROM feedback WHERE feedback_id = $feedback_id";
                    $query = mysqli_query($condb, $result);
                    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    // echo "<pre>";
                    // print_R($rows);
                    // echo "</pre>";

                    foreach ($rows as $values) {
                    ?>
                        <div class="card-body">
                            <div class="callout callout-info">

                                <h5>ชื่อผู้ส่ง : <?php echo $member_send_name ?></h5>
                                <span class="">วันที่ส่ง : <?php echo $values['date']; ?></span>
                    </br></br>
                                <div class="post clearfix">
                                    <div class="col">
                                        <!-- <img class="img-circle img-bordered-sm" src="" alt="user image"> -->
                                       
                                    </div>
                                    
                                    <p><span>รายละเอียดข้อความ : <?php echo $values['detail']; ?></span></p>
                                    
                                        
                                  
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    <?php } ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        
    
    

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "paging": false,
                "ordering": true,
                "info": false,
                "buttons": ["copy", "excel", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
        <?php include("../include/footer.php"); ?>

</body>