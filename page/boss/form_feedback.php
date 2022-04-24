<?php include("../include/head.php"); ?>

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
        <?php include("../include/header.php"); ?>
        <?php include("../include/sidebar_boss.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="content">
                    <div class="card">
                        <div class="card-header " style="background:#004385 ;color:white;">
                            <div>
                                <h3 class="card-title">ไทม์ไลน์การปฎิบัติงาน</h3>
                            </div>
                            <!-- <div style="text-align: right;">
                                <button type="button" class="btn btn-success text-right "><a href="form_report.php"><span class="fas fa-plus-circle"></span> เพิ่มรายงาน</a></button>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <!-- Timelime example  -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- The time line -->
                                    <div class="timeline">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-red">10 Feb.2014</span>
                                        </div>
                                        <!-- /.timeline-label -->


                                        <!-- timeline item -->
                                        <div style="height: auto;">
                                            <i class="fas fa-user bg-green"></i>
                                            <div class="timeline-item">
                                                <!-- <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span> -->
                                                <h1 class="timeline-header"> <label for="">หัวข้อ</label></h1>
                                                <div class="timeline-body">

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">รายละเอียดงาน :</label>
                                                        <div class="col-sm-10">
                                                            <!-- ดึง php ข้อมูลออกมาตรงนี้ -->
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">สถานที่ปฎิบัติงาน :</label>
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label">บ้าน</label>
                                                        </div>
                                                        <label class="col-sm-2 col-form-label">วันที่และเวลาทำงาน:</label>
                                                        <div class="col-sm-4">
                                                            <label class="col-form-label">04/03/2021-05/03/2021</label>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="row">
                                                        <div class="col-sm-6">
                                                         
                                                            <div class="form-group">
                                                                <label class="col-sm-2 col-form-label">สถานที่ปฎิบัติงาน :</label>
                                                                <div class="col-sm-3">
                                                                    <label class="col-form-label">บ้าน</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 col-form-label">วันที่และเวลาทำงาน:</label>
                                                                <div class="col-sm-4">
                                                                    <label class="col-form-label">04/03/2021-05/03/2021</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <div class="card card-danger">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">ความสำเร็จ</h3>

                                                                        <div class="card-tools">
                                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                                <i class="fas fa-minus"></i>
                                                                            </button>

                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">

                                                                        <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <div class="card card-danger">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">ปัญหาที่พบ</h3>
                                                                        <div class="card-tools">
                                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                                <i class="fas fa-minus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- สร้างเงื่อนไข ถ้าพบว่ามีไฟล์ให้แแสดงหน้า ifame ถ้าไม่เจอให้เเสดงหน้ารูป ถ้าเจอทั้งสองแบ่งเป็ฯ 2 ฝั่ง -->
                                                    <div class="">
                                                        <div class="form-group ">
                                                            <label>ไฟล์เเละรูปภาพ</label>
                                                            <div class="" style="text-align: center;">
                                                                <iframe src="" width="80%" height="650px">
                                                                </iframe>
                                                            </div>

                                                        </div>

                                                        <!-- <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card card-primary">
                                                                        <div class="card-header">
                                                                            <h4 class="card-title">รูปภาพ</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div>
                                                                                <div class="filter-container p-0 row">
                                                                                    <div class="filtr-item col-sm-2" data-category="1">
                                                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="ชื่อรูปที่ 1">
                                                                                            <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample" />
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="filtr-item col-sm-2" data-category="1">
                                                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6" data-toggle="lightbox" data-title="ชื่อรูปที่ 2">
                                                                                            <img src="https://via.placeholder.com/300/FFFFFF?text=6" class="img-fluid mb-2" alt="white sample" />
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="filtr-item col-sm-2" data-category="1">
                                                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=7" data-toggle="lightbox" data-title="ชื่อรูปที่ 3">
                                                                                            <img src="https://via.placeholder.com/300/FFFFFF?text=7" class="img-fluid mb-2" alt="white sample" />
                                                                                        </a>
                                                                                    </div>

                                                                                    <div class="filtr-item col-sm-2" data-category="1">
                                                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=10" data-toggle="lightbox" data-title="ชื่อรูปที่ 4">
                                                                                            <img src="https://via.placeholder.com/300/FFFFFF?text=10" class="img-fluid mb-2" alt="white sample" />
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="filtr-item col-sm-2" data-category="1">
                                                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=11" data-toggle="lightbox" data-title="ชื่อรูปที่ 5">
                                                                                            <img src="https://via.placeholder.com/300/FFFFFF?text=11" class="img-fluid mb-2" alt="white sample" />
                                                                                        </a>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                    </div>
                                                    <!-- /div photo -->
                                                    <!-- กรณีลงไว้ทั้งคู่ -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-footer" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <a class="btn11 btn-danger btn-sm"><i class="fas fa-paper-plane"></i> ส่งfeedback</a>
                                                    </div>
                                                </div>
                                                <!-- /.timeline-body -->

                                                <!-- popup -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">ส่งfeedbackให้กับพนักงาน</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="post">
                                                                    <div>
                                                                        <div class="card-body">
                                                                            <!-- <div class="form-group ">
                                                                            <label for="" class=" col-form-label">หัวข้อ :</label>
                                                                            <div class="col">
                                                                                <input type="text" class="form-control" id="" placeholder="">
                                                                            </div>
                                                                        </div> -->

                                                                            <div class="form-group ">
                                                                                <label for="" class=" col-form-label">รายละเอียด:</label>
                                                                                <div class="col">
                                                                                    <!-- note -->
                                                                                    <textarea id="summernote" style="display: none;"></textarea>
                                                                                </div>
                                                                                <!-- note -->
                                                                            </div>
                                                                        </div>

                                                                </form>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">ส่ง</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- //popup -->
                                            </div>
                                            <!-- END timeline item -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                        <!-- /.timeline -->

                    </div>
                </div>
            </div>
        </div>

        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: 'success  work',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
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