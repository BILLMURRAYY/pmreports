<?php session_start(); ?> 
<?php include("../include/head.php"); ?>
<?php include("../service/check_login_page.php"); ?>
<?php require_once("../service/condb.php"); ?>

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
                            <h3 class="card-title">ฟอร์มส่งfeedback</h3>
                        </div>
                        <!-- <div style="text-align: right;">
                            <button type="button" class="btn btn-success text-right "><a href="form_report.php"><span class="fas fa-plus-circle"></span> เพิ่มรายงาน</a></button>
                        </div> -->
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        $report_id = $_GET['report_id'];
                        $member_send_name = $_GET['member_send_name'];
                        $member_send_id = $_GET['member_send_id'];
                        $report_id = explode(",", $report_id);
                            // print_r($report_id);
                            // echo "<pre>";
                            // print_R($_GET);
                            // echo "</pre>";
                            // exit()
                        ;        ?>
                        <h2>ชื่อพนักงาน : <?php echo $member_send_name ?></h2>
                        <form action="back_send_feedback.php" method="post">
                            <br>
                            <label for="">เลือกหัวข้องาน</label>
                            <select class="select2 form-control" name="header_name" required>
                                <?php
                                require_once("../service/condb.php");

                                foreach ($report_id as $value) {
                                    // print_r($value);


                                    $sql = "SELECT * FROM report WHERE report_id = $value";
                                    $result = mysqli_query($condb, $sql);

                                ?>
                                    <?php foreach ($result as $row) {
                                        if ($row['header']) { ?>
                                            <option value="<?php echo $row["header"] ?>"><?php echo $row["header"] ?></option>

                                <?php }
                                    }
                                } ?>
                            </select>
                            <br>
                            <div class="form_group">
                                <label for="">รายละเอียดข้อความ</label>
                                <textarea class="form-control" name="detail" id="" cols="30" rows="10" required></textarea>
                                <input type="hidden" name="member_send_id" value="<?php echo $member_send_id ?>">
                                <br>
                                <div class="" style="text-align: center;">
                                    <button style="padding: 10px; text-alight:center;" type="submit" class="btn11 btn-danger btn-sm"><i class="fas fa-paper-plane"></i> ส่งfeedback</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
                $('.select2').select2()
            });
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
</body>