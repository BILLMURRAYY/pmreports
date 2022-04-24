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

        <?php include("../include/sidebar_emp.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="card">
                    <div class="card-header ">
                        <div>
                            <h3 class="card-title">ผลประเมิน</h3>
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
                                    <th>ผู้ประเมินเรา</th>
                                    <th>แผนก</th>
                                    <!-- <th>หัวข้อ</th> -->
                                    <th>ดู</th>
                                    <!-- <th>ลบ</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                               
                                // $result = $conn->prepare("SELECT * FROM department");
                                // $result->execute(); //
                                // $row = $result->fetch(PDO::FETCH_BOTH);
                                // !!!!!!!!!!! กำหนดค่า session
                                // $department = 'admin';
                                // $department_id = '1';
                                // $_SESSION["member_id"] = 1;

                                // $department = 'หัวหน้าคณบดี';
                                $member_id = $_SESSION["member_id"];
                                // $_SESSION["member_id"] = 2;

                                // $department = 'รองคณบดีฝ่ายบริหาร';
                                // $department_id = '3';
                                // $_SESSION["member_id"] = 3;

                                //? Select FROM send_feedback  , member , departmen 
                                $result = "SELECT * FROM `send_estimate`
                                            inner JOIN member
                                            on member.member_id = send_estimate.member_receive_id
                                            INNER JOIN department
                                            ON member.department_id = department.department_id
                                            inner JOIN estimate
                                            ON send_estimate.estimate_id = estimate.estimate_id
                                            WHERE member_receive_id = $member_id
                                            ORDER BY send_estimate_id DESC";

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

                                        <?php
                                        $member_send_id = $value['member_send_id'];
                                        $result2 = "SELECT * FROM member 
                                                    INNER JOIN department
                                                    ON department.department_id = member.member_id
                                                    WHERE member_id = $member_send_id";

                                        $query2 = mysqli_query($condb, $result2);
                                        $rows2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                        foreach ($rows2 as $value2) {
                                        ?>
                                            <td><?php echo $value2['first_name'] . " " . $value2['last_name'] ?></td>
                                            <td><?php echo $value2['department_name'] ?></td>
                                        <?php
                                        }
                                        ?>
                                        

                                        <!-- <td align="center"><a href="chart.php?estimate_id=<?php echo $value['estimate_id'] ?>&member_send_name=<?php echo $value2['first_name'] . " " . $value2['last_name'] ?>"><button class="btn btn-warning"><i class="fas fa-eye"></i></button></a></td> -->

                                        <td align="center"><a href="chart.php?estimate_id=<?php echo $value['estimate_id'] ?>&member_send_name=<?php echo $value2['first_name'] . " " . $value2['last_name'] ?>&member_send_id=<?php echo $value['member_send_id'] ?>"><button class="btn btn-warning"><i class="fas fa-eye"></i></button></a></td>
                                        <!-- <td align="center"><button><a href="#">Detail</a></button></td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>ผู้ประเมินเรา</th>
                                    <th>แผนก</th>
                                    <!-- <th>หัวข้อ</th> -->
                                    <th>ดู</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <?php include("../include/footer.php"); ?>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "paging": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
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