<?php session_start(); ?> 
<?php include("../include/head.php"); ?>
<?php include("../service/check_login_page.php"); ?>
<?php
require_once("../service/condb.php");

$count = 1;
// $result = "SELECT * FROM member 
//            inner join department
//            on department.department_id = member.department_id";
$result = "SELECT * FROM department";
$query = mysqli_query($condb, $result);
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

$count = 1;

?>

<head>

    <style>
        .contain {
            padding: 25px;
        }

        .card-title {
            font-size: 20px;
        }

        a,
        a:hover {
            color: white;
        }

        table {
            text-align: center;
        }

        .card-header {
            background: #004385;
            color: white;
        }

        .b_add {
            background: #05B2DC;
            color: white;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: 0.35s;
            z-index: 1;
            border-radius: 50px;
            box-shadow: 0 17px 26px -9px rgba();
            transition: all 0.3s ease;


        }

        .b_add:hover {
            background: #04DB97;
            color: white;
            background-color: rgba(0.2, 0.7);
            box-shadow: 0 13px 26px -9px rgba(0.2, 0.7);
            transform: translateY(3px);
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <?php include("nav.php"); ?>

        <?php include("../include/sidebar_admin.php"); ?>
        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="card">
                    <div class="card-header ">
                        <div>
                            <h3 class="card-title">จัดการตำแหน่งงาน</h3>
                        </div>
                        <div style="text-align: right;">
                        <a href="form_add_depart.php"><button type="button" class="btn b_add text-right "><span class="fas fa-plus-circle"></span> เพิ่มตำแหน่งงาน</button></a>

                            </a>
                        </div>
                    </div>
                    <!-- <div class="card-body  ">
                        <div class="card-tools">
                            <div class="input-group input-group">
                                <input type="text" class="form-control" placeholder="ค้นหาข้อมูล">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ตำแหน่งงาน</th>
                                    <th>สิทธิ์การเข้าถึง</th>
                                    <th>ส่งรายงาน</th>
                                    <th>ดูรายงาน</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($rows as $value) {
                                    $color = '';
                                    if($value['level']=='boss'){
                                        $color = 'danger';
                                    } elseif($value['level']=='staff'){
                                        $color = 'warning';
                                    } elseif($value['level']=='employee'){
                                        $color = 'success';
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $count++ ?></td>
                                        <td style="width:20%"><h5><span class="badge bg-<?php echo $color ?>"><?php echo $value['department_name'] ?></span><h5></td>
                                        <td><h5><span class="badge bg-<?php echo $color ?>"><?php echo $value['level'] ?></span><h5></td>
                                        <td><?php echo $value['flow_report'] ?></td>
                                        <td><?php echo $value['flow_estimate'] ?></td>
                                        <td> <a href="edit_depart.php?department_id=<?php echo $value['department_id'] ?>" class="btn btn-info"><i class="far fa-edit"></i></a></td>
                                        <td><a href="back_del_depart.php?department_id=<?php echo $value['department_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ตำแหน่งงาน</th>
                                    <th>สิทธิ์การเข้าถึง</th>
                                    <th>ส่งรายงาน</th>
                                    <th>ดูรายงาน</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <?php include("../include/footer.php"); ?>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false
            })
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