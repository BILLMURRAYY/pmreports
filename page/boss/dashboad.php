<?php include("../include/head.php"); ?>

<head>

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

        table {
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("../include/header.php"); ?>
        <?php include("../include/sidebar_boss.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div>
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg col">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>150</h3>

                                            <p>รายงานพนักงานเข้าใหม่</p>
                                        </div>
                                        <div class="icon">
                                            <i class="far fa-folder-open"></i>
                                        </div>
                                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg col">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                                            <p>จำนวนงานที่สำเร็จ</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg col">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>44</h3>
                                            <p>รายงานผลทั้งหมด</p>
                                        </div>
                                        <div class="icon">
                                            <i class="far fa-file-alt"></i>
                                        </div>
                                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->

                        <!-- peolpe success -->
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">ข้อมูลการปฎิบัติงานของพนัก</h3>
                                <div class="card-tools">
                                    <!-- <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a> -->
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>วันที่ส่ง</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>แผนก</th>
                                            <th>หัวข้อ</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>12/04/2565</td>
                                            <td>เจษฎา นันติ</td>
                                            <td>กลุ่มสาระการเรียนรู้</td>
                                            <td><a href="form_feedback.php">รายงานเล่มที่ 1</a></td>
                                            <td><span class="badge bg-success">สำเร็จ</span></td>

                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>06/02/65</td>
                                            <td>คน มนุษย์</td>
                                            <td>กลุ่มสาระการเรียนรู้</td>
                                            <td><a href="form_feedback.php">หัวข้อที่2</a> </td>
                                            <td><span class="badge bg-warning">ดำเนินการ</span></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.people -->


                        <!-- graph -->
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">อัตราความสำเร็จ</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">820</span>
                                        <span>Visitors Over Time</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success">
                                            <i class="fas fa-arrow-up"></i> 12.5%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="visitors-chart" height="275" width="532" style="display: block; height: 200px; width: 387px;" class="chartjs-render-monitor"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> This Week
                                    </span>

                                    <span>
                                        <i class="fas fa-square text-gray"></i> Last Week
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- ./graph -->
                    </section>
                </div>
            </div>
        </div>
    </div>



    <!-- OPTIONAL SCRIPTS -->
    <script src="../../assets/bootstrap/template/plugins/chart.js/Chart.min.js"></script>
   
</body>