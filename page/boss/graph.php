<?php session_start();
require_once("../service/condb.php");
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


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

        .head_es {
            text-align: center;
            font-size: 20px;
        }

        .table td,
        .table {
            padding: 10px;
            border: 1px solid #CDC9C9;
        }

        .head1 td {
            background: #17a2b8;
            color: white;
            border: none;

        }

        .card-header {
            background: #004385;
        }

        h3 {
            color: white;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("nav.php"); ?>
        <?php include("../include/sidebar_boss.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain ">
                <div class=" card">
                    <div class="card-header ">
                        <div>
                            <h3 class="card-title">Graph</h3>

                        </div>
                    </div>
                    <?php
                    // echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    // echo "member_id : " . $_POST['member_id'] . "<br>";
                    // echo "job_type : " . $_POST['job_type'] . "<br>";
                    ?>
                    <!-- Start card-body -->
                    <div class="card-body">
                        <div class="form-group">

                            <div class="col">
                                <?php
                                $job_type = $_POST['job_type'];
                                $member_id = $_POST['member_id'];
                                // echo "<pre>";
                                // print_r($_POST);
                                // echo "</pre>";
                                // $q= "SELECT DATE_FORMAT(send_report.date, '%c') as month , COUNT(MONTH(send_report.date)) as count 
                                // FROM send_report
                                // inner join report
                                // on send_report.report_id = report.report_id
                                // WHERE  send_report.member_send_id = 21 AND report.job_type='งานประจำ' AND YEAR(send_report.date)='2022' AND report.success=100
                                // GROUP BY YEAR(send_report.date), MONTH(send_report.date) 
                                // ORDER BY DATE_FORMAT(send_report.date,'%m') ASC";

                                $mysql = "SELECT DATE_FORMAT(send_report.date, '%c') as month , COUNT(MONTH(send_report.date)) as count 
                                FROM send_report
                                inner join report
                                on send_report.report_id = report.report_id
                                WHERE";
                                $mysql2 = "SELECT DATE_FORMAT(send_report.date, '%c') as month , COUNT(MONTH(send_report.date)) as count 
                                FROM send_report
                                inner join report
                                on send_report.report_id = report.report_id
                                WHERE";
                                $arr = ['งานประจำ', 'งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ'];
                                if (!empty($_GET['year'])) { //หากมีการเลือกปี ให้แสดงยอดขายของเดือนที่อยู่ในปีนั้นๆ
                                    $getYear = $_GET['year'];
                                    $mysql .= " send_report.member_send_id = " . $_POST['member_id'] . " AND report.job_type='" . $arr[$_POST['job_type']] . "' AND YEAR(send_report.date)='" . $getYear . "'";
                                    $mysql2 .= " send_report.member_send_id = " . $_POST['member_id'] . " AND report.job_type='" . $arr[$_POST['job_type']] . "' AND report.success='100' AND YEAR(send_report.date)='" . $getYear . "'";
                                    // ShipperID = 3 change success = 100 | YEAR (date)
                                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

                                    //  เพิ่ม where | member_id = $_GET['member_id'] AND job_type = $arr[$_GET['job_type']];
                                } else { //หากไม่เลือกอะไร ให้แสดงยอดขายในปีปัจจุบัน
                                    $getYear = date('Y');
                                    $mysql .= " send_report.member_send_id = " . $_POST['member_id'] . " AND report.job_type='" . $arr[$_POST['job_type']] . "' AND YEAR(send_report.date)='" . $getYear . "'";
                                    $mysql2 .= " send_report.member_send_id = " . $_POST['member_id'] . " AND report.job_type='" . $arr[$_POST['job_type']] . "' AND report.success='100' AND YEAR(send_report.date)='" . $getYear . "'";
                                }
                                $mysql .= " GROUP BY YEAR(send_report.date), MONTH(send_report.date) 
                                ORDER BY DATE_FORMAT(send_report.date,'%m') ASC";
                                $mysql2 .= " GROUP BY YEAR(send_report.date), MONTH(send_report.date) 
                                ORDER BY DATE_FORMAT(send_report.date,'%m') ASC";
                                // $getYear=date('Y');
                                // echo $mysql . "<br>";
                                // echo $mysql2 . "<br>";
                                // exit();
                                ?>

                                <div align="center">
                                    <form id="form1" name="form1" method="post" action="">
                                        <input type="hidden" name="job_type" value="<?php echo $job_type ?>">
                                        <input type="hidden" name="member_id" value="<?php echo $member_id ?>">
                                        <label for="month"></label>
                                        เลือกปี
                                        <select name="year" id="year">
                                            <?php for ($year = 2022; $year <= date('Y'); $year++) { ?>
                                                <option value="<?= $year ?>" <?= $getYear == $year ? 'selected' : '' ?>><?= ($year + 543) ?></option>
                                            <?php  } ?>
                                        </select>
                                        <?php //echo date('Y');
                                        //echo date('Y') + 543; ?>

                                        <input type="submit" class="btn btn-success text-right " name="btsearch" id="btsearch" value="ค้นหารายงาน" />
                                    </form>
                                    <br>
                                
                                <!-- Chart -->
                                <div id="container" style="width:90%;">
                                    <canvas id="canvas"></canvas>
                                </div>

                                

                                <?php
                                $sql = "SELECT  DATE_FORMAT(OrderDate, '%c') as month , COUNT(MONTH(OrderDate)) as count   FROM Orders WHERE YEAR(OrderDate)=1997  GROUP BY YEAR(OrderDate), MONTH(OrderDate) ORDER BY DATE_FORMAT(OrderDate,'%m') ASC";
                                $query = mysqli_query($condb, $mysql);
                                // $result = mysqli_fetch_all($query);
                                // echo "<pre>";
                                // print_r($result);
                                // echo "</pre>";
                                $totals = [];
                                // $totals1 = [];
                                $fails = [];
                                $successs = [];
                                while ($show = mysqli_fetch_assoc($query)) {
                                    $totals[$show['month'] - 1] = $show['count'];
                                }
                                // echo "<pre>";
                                // print_r($totals);
                                // echo "</pre>";
                                // echo "<br>";

                                $sql2 = "SELECT  DATE_FORMAT(OrderDate, '%c') as month , COUNT(MONTH(OrderDate)) as count   FROM Orders WHERE ShipperID = 3 AND YEAR(OrderDate)=1997  GROUP BY YEAR(OrderDate), MONTH(OrderDate) ORDER BY DATE_FORMAT(OrderDate,'%m') ASC";
                                $query2 = mysqli_query($condb, $mysql2);
                                while ($show2 = mysqli_fetch_assoc($query2)) {
                                    $successs[$show2['month'] - 1] = $show2['count'];
                                }
                                // echo "<pre>";
                                // print_r($successs);
                                // echo "</pre>";
                                // echo "<br>";

                                // foreach($totals as $key => $values){
                                //   echo $key ." " .$values."<br>";
                                //   $totals1[$key] = $values;
                                // }
                                // print_r($totals1);
                                // echo "<br>";
                                // print_r(json_encode($totals));

                                // }
                                //  fail = total - success
                                // count จำนวนทั้งหมดที่รายงาน  
                                // select COUNT(report_id) from 
                                // from send_report
                                // inner join report
                                // on 
                                $months = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
                                //! total
                                for ($i = 0; $i < COUNT($months); $i++) {
                                    // echo $i;
                                    if (!isset($totals[$i])) {
                                        // echo '0<br>';
                                        $totals[$i] = 0;
                                    } else {
                                        // echo '1<br>';
                                    }
                                }
                                ksort($totals);
                                // echo "<pre>";
                                // print_r($totals);
                                // echo "</pre>";
                                // echo "<br>";

                                //! 100%
                                for ($i = 0; $i < COUNT($months); $i++) {
                                    // echo $i;
                                    if (!isset($successs[$i])) {
                                        // echo '0<br>';
                                        $successs[$i] = 0;
                                    } else {
                                        // echo '1<br>';
                                    }
                                }
                                ksort($successs);
                                // echo "<pre>";
                                // print_r($successs);
                                // echo "</pre>";

                                //! 0%
                                for ($i = 0; $i < COUNT($months); $i++) {
                                    $fails[$i] = $totals[$i] - $successs[$i];
                                }
                                // echo "<pre>";
                                // print_r($fails);
                                // echo "</pre>";
                                ?>
                                <br>
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>เดือน</td>
                                        <td>รวม</td>
                                        <td>100%</td>
                                        <td>0%</td>
                                    </tr>
                                    </thead>
                                    <?php
                                        $total_report = 0;
                                        $total_report_suc = 0;
                                        $total_report_fail = 0;
                                        $month=array(0=>'มกราคม',1=>'กุมภาพันธ์',2=>'มีนาคม',3=>'เมษายน',4=>'พฤษภาคม',5=>'มิถุนายน',6=>'กรกฎาคม',7=>'สิงหาคม',8=>'กันยายน',9=>'ตุลาคม',10=>'พฤศจิกายน',11=>'ธันวาคม');
                                        foreach($month as $key_m => $val_m){
                                            $total_report+=$totals[$key_m];
                                            $total_report_suc+=$successs[$key_m];
                                            $total_report_fail+=$fails[$key_m];
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?=$val_m?></td>
                                        <td><?=$totals[$key_m]?></td>
                                        <td><?=$successs[$key_m]?></td>
                                        <td><?=$fails[$key_m]?></td>
                                    </tr>
                                    </tbody>
                                    <?php  } ?>
                                    <tbody>
                                    <tr>
                                        <td>รายงานรวมทั้งหมด : </td>
                                        <td align="right"><?=$total_report?></td>
                                        <td align="right"><?=$total_report_suc?></td>
                                        <td align="right"><?=$total_report_fail?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- End col -->



                            <br>

                        </div>

                    </div>
                    <!-- End card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- bs-custom-file-input -->
    <script src="../../assets/bootstrap/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- dom -->
    <script>
        // const month = <?php //echo json_encode(array_keys($month)); 
                            ?>;
        const month = <?php echo json_encode($months); ?>;
        const total = <?php echo json_encode($totals); ?>;
        const fail = <?php echo json_encode($fails); ?>;
        const success = <?php echo json_encode($successs); ?>;
        var barChartData = {
            labels: month
                // [
                //   "มกราคม",
                //   "กุมภาพันธ์",
                //   "มีนาคม",
                //   "เมษายน",
                //   "พฤษภาคม",
                //   "มิถุนายน",
                //   "กรกฎาคม",
                //   "สิงหาคม",
                //   "กันยายน",
                //   "ตุลาคม",
                //   "พฤศจิกายน",
                //   "ธันวาคม"
                // ]
                ,
            datasets: [{
                    label: "total",
                    yAxisID: 'bar-stack',
                    backgroundColor: "rgb(9, 154, 131)",
                    //   borderColor: "rgb(9, 154, 131)",
                    borderWidth: 1,
                    stack: 'now1',
                    // data: [20,30,20,17,15,20,20,30,20,17,15,20]
                    data: total
                },
                {
                    label: "100%",
                    yAxisID: 'bar-stack',
                    backgroundColor: "rgb(9, 154, 188)",
                    //   borderColor: "rgb(9, 154, 188)",
                    borderWidth: 1,
                    stack: 'bef',
                    // data: [10, 14, 15, 11, 7,10,10, 14, 15, 11, 7,10]
                    data: success
                },
                {
                    label: "0%",
                    yAxisID: 'bar-stack',
                    backgroundColor: "rgb(255, 70, 62)",
                    //   borderColor: "rgb(255, 70, 62)",
                    borderWidth: 1,
                    stack: 'bef',
                    // data: [10, 16, 5, 6,6, 10,10, 16, 5, 6,6, 10]
                    data: fail
                }
                

                // ,
                // {
                //   label: "Visa",
                //   yAxisID: "bar-stack",
                //   backgroundColor: "yellow",
                //   borderColor: "orange",
                //   borderWidth: 1,
                //   stack: 'now',
                //   data: [60,90,70,30,100,70]
                // }
            ]
        };

        var chartOptions = {
            responsive: true,
            scales: {
                yAxes: [{
                        id: "bar-stack",
                        position: "left",
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        },
                        scaleLabel: {
                        display: true,
                        labelString: 'จำนวนรายงาน'
                        }
                    }
                    // ,

                    // {
                    //     id: "line",
                    //     position: "right",
                    //     stacked: false,
                    //     ticks: {
                    //         beginAtZero: true
                    //     },
                    //     gridLines: {
                    //         drawOnChartArea: false,
                    //     },
                    // }
                ]
            }
        }

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: "bar",
                data: barChartData,
                options: chartOptions
            });
        };
    </script>
    <?php include("../include/footer.php"); ?>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false,
                "autoWidth": false
                
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