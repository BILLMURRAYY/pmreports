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

        <?php include("../include/sidebar_boss.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="card">
                    <div class="card-header ">
                        <div>
                            <h3 class="card-title">ข้อมูลการปฎิบัติงานของพนักงาน</h3>
                        </div>
                        <!-- <div style="text-align: right;">
                            <button type="button" class="btn btn-success text-right "><a href="form_report.php"><span class="fas fa-plus-circle"></span> เพิ่มรายงาน</a></button>
                        </div> -->
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>แผนก</th>
                                    <th>หัวข้อ</th>
                                    <th>ดู</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                
                                // $result = $conn->prepare("SELECT * FROM department");
                                // $result->execute(); //
                                // $row = $result->fetch(PDO::FETCH_BOTH);
                                // !!!!!!!!!!! กำหนดค่า session
                                $department = 'หัวหน้าคณบดี';
                                $_SESSION["member_id"] = 2;

                                // $department = 'รองคณบดีฝ่ายบริหาร';
                                // $_SESSION["member_id"] = 3;

                                //? Select FROM send_report  , member , department
                                $result = "SELECT * FROM send_report 
                                            inner JOIN member
                                            on member.member_id = send_report.member_send_id
                                            inner join department
                                            on department.department_id = member.department_id
                                            WHERE department_receive LIKE '%$department%'
                                            ORDER BY send_report_id DESC";
                                $query = mysqli_query($condb, $result);

                                $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                // echo "<pre>";
                                // print_R($rows);
                                // echo "</pre>";
                                // exit();

                                $count = 1;
                                foreach ($rows as $value) {

                                ?>
                                    <tr>
                                        <td><?php echo $count++ ?></td>
                                        <td><?php echo $value['date'] ?></td>
                                        <td><?php echo $value['first_name'] . " " . $value['last_name'] ?></td>
                                        <td><?php echo $value['department_name'] ?></td>
                                        <?php
                                        $report_id = $value['report_id'];
                                        $report_id = explode(",", $report_id);
                                        $header = [];
                                        foreach ($report_id as $value2) {
                                            $result2 = "SELECT header FROM report WHERE report_id = $value2";
                                            // echo $result2;
                                            $query2 = mysqli_query($condb, $result2);
                                            $rows2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                            // echo "<pre>";
                                            // print_R($rows2);
                                            // echo "</pre>";
                                            foreach ($rows2 as $value3) {
                                                // echo $value2['header'];
                                                array_push($header, $value3['header']);
                                            }
                                        }
                                        // print_r($header); 
                                        $header2 = implode(",", $header);
                                        // echo $header2;            
                                        // exit();
                                        ?>
                                        <td><?php echo $header2; ?></td>
                                        <td align="center"><a href="view_feedback.php?report_id=<?php echo $value['report_id'] ?>&member_send_name=<?php echo $value['first_name'] . " " . $value['last_name'] ?>&member_send_id=<?php echo $value['member_send_id'] ?>&send_report_id=<?php echo $value['send_report_id'] ?>"><button class="btn btn-warning"><i class="fas fa-eye"></i></button></a></td>

                                        <td><a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>

                                    </tr>
                                <?php } ?>
                                <!-- <tr>
                                    <td>30</td>
                                    <td>เจษฎา นันติ</td>
                                    <td>12/04/2565</td>
                                    <td>กลุ่มสาระการเรียนรู้เเเ</td>
                                    <td>รายงานเล่มที่เเเเ </td>
                                    <td><span class="badge bg-warning">ดำเนินการ</span></td>
                                    <td> <a href="form_feedback.php" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                                    <td><a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                </tr> -->
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>แผนก</th>
                                    <th>หัวข้อ</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
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
</body>