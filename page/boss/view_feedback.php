<?php session_start(); ?> 
<?php include("../include/head.php"); ?>
<?php include("../service/check_login_page.php"); ?>
<?php require_once("../service/condb.php"); ?>


<head>

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../../assets/bootstrap/template/plugins/ekko-lightbox/ekko-lightbox.css">
    <style>
        .contain {
            padding: 25px;

        }

        .card-title {
            font-size: 20px;
        }

        .card-footer {
            text-align: center;
        }

        label {
            display: block;
            padding: 15px;

        }

        .timeline-footer {
            text-align: center;
        }

        .btn11 {
            padding: 15px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("nav.php"); ?>
        <?php include("../include/sidebar_boss.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="content">
                    <div class="card">
                        <div class="card-header " style="background:#004385 ;color:white;">
                            <div>
                                <h3 class="card-title">feedback</h3>
                            </div>
                            <!-- <div style="text-align: right;">
                                <button type="button" class="btn btn-success text-right "><a href="form_report.php"><span class="fas fa-plus-circle"></span> เพิ่มรายงาน</a></button>
                            </div> -->
                        </div>
                        <?php
                        $report_id = $_GET['report_id'];
                        $report_id_feedback = $_GET['report_id'];
                        $member_send_name = $_GET['member_send_name'];
                        $member_send_id = $_GET['member_send_id'];
                        // $file = $_GET['file'];
                        $send_report_id = $_GET['send_report_id'];
                        // echo "<br>";
                        // echo "report_id : " . $report_id;
                        // echo "<br>";
                        // // echo "member_send_name : " . $member_send_name;
                        // // echo "<br>";
                        // echo "department_receive : " . $department_receive;

                        ?>
                        <?php
                        $report_id = explode(",", $report_id);
                        // echo "<per>";
                        // print_r ($id_report);
                        // echo "</per>";
                        foreach ($report_id as $value) {
                            $result = "SELECT * FROM report WHERE report_id = $value";
                            $query = mysqli_query($condb, $result);
                            $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            // echo "<pre>";
                            // print_R($rows);
                            // echo "</pre>";

                            foreach ($rows as $values) {
                        ?>
                                <div class="card-body">
                                    <!-- Timelime example  -->

                                    <div class="row">

                                        <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">

                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-info"><?php echo $member_send_name ?></span>

                                                </div>
                                                <!-- /.timeline-label -->


                                                <!-- timeline item -->
                                                <div style="height: auto;">
                                                    <i class="fas fa-user bg-green"></i>

                                                    <div class="timeline-item">
                                                        <!-- <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span> -->
                                                        <h1 class="timeline-header"> <label for="">หัวข้อ : <?php echo $values['header']; ?></label> </h1>
                                                        <div class="timeline-body">

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">รายละเอียดงาน :</label>
                                                                <div class="col-10"><?php echo $values['detail']; ?></div>
                                                                <!-- <textarea class="col-10 form-control">
                                                                    
                                                                </textarea> -->
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">สถานที่ปฎิบัติงาน :</label>
                                                                <div class="col-sm-3">
                                                                    <label class="col-form-label"><?php echo $values['workplace']; ?></label>
                                                                </div>
                                                                <label class="col-sm-2 col-form-label">วันที่และเวลาทำงาน:</label>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label"><?php echo $values['working_range_start']; ?> | <span>End :<?php echo $values['working_range_end']; ?></span></label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">ปัญหาที่พบ :</label>
                                                                <div class="col-10 ">
                                                                    <?php echo $values['problem']; ?>
                                                                </div>
                                                            </div>


                                                            <!-- สร้างเงื่อนไข ถ้าพบว่ามีไฟล์ให้แแสดงหน้า ifame ถ้าไม่เจอให้เเสดงหน้ารูป ถ้าเจอทั้งสองแบ่งเป็ฯ 2 ฝั่ง -->
                                                            <div class="">
                                                                <div class="form-group row">

                                                                    <label class="col-sm-2 col-form-label">ไฟล์เอกสาร</label>

                                                                    <div class="col-10">

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!-- BAR CHART -->

                                                            <div class="card card-success">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">กราฟ</h3>

                                                                    <div class="card-tools">
                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>

                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="chart">
                                                                        <!-- <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                                                                        <canvas id="myChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>


                                                            <div class="timeline-footer" data-toggle="modal" data-target="#exampleModalCenter">

                                                                <form action="send_feedback.php" method="get">
                                                                    <input type="hidden" name="report_id" value="<?php echo $report_id_feedback ?>">
                                                                    <input type="hidden" name="member_send_name" value="<?php echo $member_send_name ?>">
                                                                    <input type="hidden" name="member_send_id" value="<?php echo $member_send_id ?>">

                                                                    <a><button type="submit" class="btn11 btn-danger btn-sm"><i class="fas fa-paper-plane"></i> ส่งfeedback</button></a>

                                                                </form>

                                                            </div>

                                                        </div>
                                                        <!-- /.timeline-body -->

                                                    </div>
                                                    <!-- END timeline item -->
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </div>

                                </div>
                                <!-- /.timeline -->
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            window.onload = function() {
                var myPDF = new PDFObject({
                    url: "pdf/<?php echo $file ?>",
                    id: "myPDF",
                    width: "650px",
                    height: "700px",
                    pdfOpenParams: {
                        navpanes: 1,
                        statusbar: 0,
                        view: "FitH",
                        pagemode: "thumbs"
                    }
                }).embed('pdfplace');
            };
        </script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                datasets: [{
                    label: 'start',
                    data: [0.5, 0.9],
                    backgroundColor: [

                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'

                    ],
                    borderColor: [

                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'

                    ],
                    borderWidth: 2
                }],
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });
        </script>
        <script>
            $(function() {
                // Summernote
                $('#summernote').summernote()

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            })

            $(function() {
                $('.select2').select2()
            });
        </script>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": true,
                    "searching": false,
                    "paging": false,
                    // "ordering": true,
                    // "info": true,
                    // "buttons": ["copy", "csv", "excel", "pdf", "print"]
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
            $(function() {
                $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                    event.preventDefault();
                    $(this).ekkoLightbox({
                        alwaysShowClose: true
                    });
                });

                $('.filter-container').filterizr({
                    gutterPixels: 3
                });
                $('.btn[data-filter]').on('click', function() {
                    $('.btn[data-filter]').removeClass('active');
                    $(this).addClass('active');
                });
            })
        </script>

        <!-- ChartJS -->
        <script src="../../assets/bootstrap/template/plugins/chart.js/Chart.min.js"></script>

        <!-- Ekko Lightbox -->
        <script src="../../assets/bootstrap/template/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
        <!-- Filterizr-->
        <script src="../../assets/bootstrap/template/plugins/filterizr/jquery.filterizr.min.js"></script>

</body>