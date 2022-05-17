<?php session_start(); ?> 
<?php include("../service/check_login_page.php"); ?>
<?php require_once("../service/condb.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OPRS SYSTEM</title>
    <!-- Section Meta tag -->
    <?php include('../include/meta.php') ?>

    <?php include("../include/head.php"); ?>
    
    <style>
        .contain {
            padding: 25px;
        }

        .card-title {
            font-size: 20px;
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
        <?php include('../include/function_date.php');?>

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
                        <?php
                        // echo "<pre>";
                        // print_r($_SESSION);
                        // echo "</pre>";
                        ?>
                        <!-- <span class="badge bg-danger count" style="border-radius:10px;"></span> -->
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>ผู้รายงาน</th>
                                    <!-- <th>แผนก</th> -->
                                    <th>ตำแหน่งงาน</th>
                                    <th>หัวข้อ</th>
                                    <th>ประเภทงาน</th>
                                    <th>ควมสำเร็จ</th>
                                    <th>ดูรายงาน</th>
                                    <!-- <th>ลบ</th> -->
                                </tr>
                            </thead>

                            <!-- 
                                $color = '';
                                if($row['level']=='boss'){
                                    $color = 'danger';
                                } elseif($row['level']=='staff'){
                                    $color = 'warning';
                                } elseif($row['level']=='employee'){
                                    $color = 'success';
                                }

                            <td><h5><span class="badge bg-<?php echo $color ?>"><?php echo $value['department_name'] ?></span><h5></td>
                            
                            -->

                            <tbody>
                                <?php
                                
                                // $result = $conn->prepare("SELECT * FROM department");
                                // $result->execute(); //
                                // $row = $result->fetch(PDO::FETCH_BOTH);
                                // !!!!!!!!!!! กำหนดค่า session
                                $department = $_SESSION["department_name"];
                                // $_SESSION["member_id"] = 2;

                                // $department = 'รองคณบดีฝ่ายบริหาร';
                                // $_SESSION["member_id"] = 3;

                                //? Select FROM send_report  , member , department
                                $result = "SELECT * FROM send_report 
                                            inner JOIN report
                                            on send_report.report_id = report.report_id
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
                                    $color = '';
                                    if($value['level']=='boss'){
                                        $color = 'danger';
                                    } elseif($value['level']=='staff'){
                                        $color = 'warning';
                                    } elseif($value['level']=='employee'){
                                        $color = 'success';
                                    }
                                    $color_suc = '';
                                    if($value['success']=='0'){
                                        $color_suc = 'danger';
                                    } elseif($value['success']<'100'){
                                        $color_suc = 'warning';
                                    } elseif($value['success']=='100'){
                                        $color_suc = 'success';
                                    }
                                ?>
                                    <tr>
                                        <td style="width:5%"><?php echo $count++ ?></td>
                                        <?php
                                        
                                        $date = explode(" ",$value['date']);
                                        $dates = DateThai($date[0]);

                                        ?>
                                        <td ><?php echo $dates ?><br><?php echo $date[1] ?></td>
                                        <td><?php echo $value['name']?></td>
                                        <!-- style="white-space:normal;display:inline;" -->
                                        <td style="width:20%"><h5><span  class="badge bg-<?php echo $color ?>"><?php echo $value['department_name'] ?></span><h5></td>

                                        <?php
                                        // $report_id = $value['report_id'];
                                        // $report_id = explode(",", $report_id);
                                        // $header = [];
                                        // foreach ($report_id as $value2) {
                                        //     $result2 = "SELECT header FROM report WHERE report_id = $value2";
                                        //     // echo $result2;
                                        //     $query2 = mysqli_query($condb, $result2);
                                        //     $rows2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                        //     // echo "<pre>";
                                        //     // print_R($rows2);
                                        //     // echo "</pre>";
                                        //     foreach ($rows2 as $value3) {
                                        //         // echo $value2['header'];
                                        //         array_push($header, $value3['header']);
                                        //     }
                                        // }
                                        // // print_r($header); 
                                        // $header2 = implode(",", $header);
                                        // // echo $header2;            
                                        // // exit();
                                        ?>
                                        <td><?php echo $value['header']; ?></td>
                                        <td style="width:20%"><?php echo $value['job_type']; ?></td>
                                        <td style="width:10%"><h5><span class="badge bg-<?php echo $color_suc ?>"><?php echo $value['success']; ?>%</span><h5></td>

                                        <!-- <td style="width:10%" align="center"><a href="view_feedback.php?report_id=<?php echo $value['report_id'] ?>&member_send_name=<?php echo $value['name']?>&member_send_id=<?php echo $value['member_send_id'] ?>&send_report_id=<?php echo $value['send_report_id'] ?>"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a></td> -->

                                        <td style="width:10%" align="center"><a href="view_feedback.php?report_id=<?php echo $value['report_id'] ?>&member_send_name=<?php echo $value['name']?>&member_send_id=<?php echo $value['member_send_id'] ?>&send_report_id=<?php echo $value['send_report_id'] ?>"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a></td>

                                        <!-- <td><a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td> -->

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
                                    <th>ผู้รายงาน</th>
                                    <th>ตำแหน่งงาน</th>
                                    <th>หัวข้อ</th>
                                    <th>ประเภทงาน</th>
                                    <th>ควมสำเร็จ</th>
                                    <th>ดูรายงาน</th>
                                    <!-- <th>ลบ</th> -->
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
    <?php include("../include/notification.php"); ?>
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
    
    <!-- <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
    //  alert('gg');
  $.ajax({
   url:"../include/fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    // $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();

 $(document).on('click', '.clicks', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
})
</script> -->
    <script>
        // const Toast = Swal.mixin({
        // toast: true,
        // position: 'top-end',
        // showConfirmButton: false,
        // timer: 3000,
        // timerProgressBar: true,
        // didOpen: (toast) => {
        //     toast.addEventListener('mouseenter', Swal.stopTimer)
        //     toast.addEventListener('mouseleave', Swal.resumeTimer)
        // }
        // })

        // Toast.fire({
        // icon: 'success',
        // title: 'Signed in successfully'
        // })
    </script>
    <?php
    if($_SESSION['check_login']==1){
        $_SESSION['check_login'] =0;
        echo "<script>";
        echo "const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000,
         timerProgressBar: true,
         didOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
         }
         })
 
         Toast.fire({
         icon: 'success',
         title: 'Signed in successfully'
         })";
        echo"</script>";
    }

    ?>  
    

</body>