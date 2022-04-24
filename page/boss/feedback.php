<?php session_start(); ?>

<?php include("../include/head.php"); ?>
<?php require_once("../service/condb.php"); ?>

<head>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../assets/bootstrap/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- link search www -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <style>
        .contain {
            padding: 25px;
        }

        .card-title {
            font-size: 30px;
        }

        a {
            color: black;
        }

        table {
            text-align: center;
        }

        .card-header {
            background: #004385;
            color: white;
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
                            <h3 class="card-title">feedback </h3>
                        </div>
                        <!-- <div style="text-align: right;">
                            <button type="button" class="btn btn-success text-right "><a href="form_report.php"><span class="fas fa-plus-circle"></span> เพิ่มรายงาน</a></button>
                        </div> -->
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body  ">
                        <div class="card-tools">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" id="myInput" placeholder="ค้นหาข้อมูล">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <!-- <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button></th> -->
                                    <th>ลำดับ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>ชื่อผู้ส่ง</th>
                                    <th>แผนก</th>
                                    <th>หัวข้อ</th>
                                    <th>ดู</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                // $result = $conn->prepare("SELECT * FROM department");
                                // $result->execute(); //
                                // $row = $result->fetch(PDO::FETCH_BOTH);
                                // !!!!!!!!!!! กำหนดค่า session
                                // $department = 'หัวหน้าคณบดี';
                                // $_SESSION["member_id"] = 1;

                                $department = 'รองคณบดีฝ่ายบริหาร';
                                $department_id = 3;
                                $_SESSION["member_id"] = 3;

                                //? Select FROM send_feedback  , member , departmen 
                                $result = "SELECT * FROM `send_feedback`
                                        -- inner JOIN member
                                        -- on member.member_id = send_feedback.member_receive_id
                                        -- INNER JOIN department
                                        -- ON member.department_id = department.department_id
                                        inner JOIN feedback
                                        ON send_feedback.feedback_id = feedback.feedback_id
                                        WHERE member_receive_id = $department_id
                                        ORDER BY send_feedback_id DESC";

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
                                            <td><?php echo $value['header'] ?></td>
                                            
                                            <td align="center"><button class="btn btn-warning"><a href="read_feedback.php?feedback_id=<?php echo $value['feedback_id'] ?>&member_send_name=<?php echo $value2['first_name'] . " " . $value2['last_name'] ?>&member_send_id=<?php echo $value['member_send_id'] ?>"><i class="fas fa-eye"></i></a></button></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <!-- <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button></th> -->
                                <th>ลำดับ</th>
                                <th>วันที่ส่ง</th>
                                <th>ชื่อผู้ส่ง</th>
                                <th>แผนก</th>
                                <th>หัวข้อ</th>
                                <th>ดู</th>
                            </tfoot>
                        </table>

                    </div>



                    <!-- </div> -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    </div>

    <!-- jQuery -->
    <script src="../../assets/bootstrap/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../assets/bootstrap/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../../assets/bootstrap/template/dist/js/demo.js"></script>

    <!-- table -->
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

    <!-- mail -->
    <script>
        $(function() {
            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function() {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })

            //Handle starring for font awesome
            $('.mailbox-star').click(function(e) {
                e.preventDefault()
                //detect type
                var $this = $(this).find('a > i')
                var fa = $this.hasClass('fa')

                //Switch states
                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        })

        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>