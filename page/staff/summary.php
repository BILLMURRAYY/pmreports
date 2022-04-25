<?php session_start();
include("../service/check_login_page.php");
require_once("../service/condb.php");
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

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->


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

    <script charset="UTF-8">
        function showUser(str) {
            // alert(str);
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax1.php?q=" + str, true);
                xmlhttp.send();
            }
        }
        function showUser1(str) {
            // alert(str);
            if (str == "") {
                document.getElementById("txtHint1").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint1").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax2.php?q=" + str, true);
                xmlhttp.send();
            }
        }
        function showUser2(str,str1) {
            // alert(str);
            if (str == "") {
                document.getElementById("txtHint2").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint2").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax3.php?q=" + str+"&q1="+str1, true);
                xmlhttp.send();
            }
        }
        function showUser3(str,job_type,member_id) {
            // alert(str);
            if (str == "") {
                document.getElementById("txtHint3").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint3").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax4.php?year=" + str+"&job_type="+job_type+"&member_id="+member_id, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("nav.php"); ?>
        <?php include("../include/sidebar_staff.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain ">
                <div class=" card">
                    <div class="card-header ">
                        <div>
                            <h3 class="card-title">Summary</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <!-- <form> -->
                                <label class="col col-form-label">แผนก :</label>
                                <!-- <div class="col"> -->
                                    <select class="select2 form-control" name="depart" onchange="showUser(this.value)" style="width: 100%;">

                                        <option value="">เลือกรายการ :</option>

                                        <?php

                                        // !!!!!!!!!!! กำหนดค่า session
                                        // $department = 'หัวหน้าคณบดี';
                                        // $_SESSION["department_id"]
                                        $department_id  = $_SESSION["department_id"];

                                        $result = "SELECT * FROM department 
                                                -- inner JOIN member
                                                -- on member.member_id = send_report.member_send_id
                                                -- inner join department
                                                -- on department.department_id = member.department_id
                                        WHERE department_id = $department_id";
                                        $query = mysqli_query($condb, $result);

                                        $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                        // echo "<pre>";
                                        // print_R($rows);
                                        // echo "</pre>";
                                        // exit();

                                        foreach ($rows as $value) {
                                            $flow_estimate = $value['flow_estimate'];
                                            // echo $flow_estimate;
                                            $flow_estimate = explode(",", $flow_estimate);
                                            print_r($flow_estimate);
                                            foreach ($flow_estimate as $value2) {
                                        ?>

                                                <option value="<?php echo $value2 ?>"><?php echo $value2 ?></option>

                                        <?php
                                            }
                                        }
                                        ?>

                                        <!-- <option value="รองคณบดีฝ่ายบริหาร">รองคณบดีฝ่ายบริหาร</option>
                <option value="กลุ่มงานบริหารและพัฒนาบุคคลกร">กลุ่มงานบริหารและพัฒนาบุคคลกร</option>
                <option value="หน่วยบุคคล">หน่วยบุคคล</option> -->

                                    </select>
                                <!-- </div> -->
                            <!-- </form> -->

                            <!-- <br> -->
                            <div id="txtHint"><b>โปรดเลือกแผนกเพื่อดูผลสรุปของพนักงาน</b></div>

                            <!-- <label class="col-2 col-form-label">ชื่อพนักงาน :</label>
                            <div class="col-sm-4">
                                <select class="select2 form-control" style="width: 100%;">
                                    <option value="สำนักงาน">เจษฎา นันติ</option>
                                    <option value="บ้าน">นิธิภัทร กิจสำเร็จ</option>
                                </select>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bs-custom-file-input -->
    <script src="../../assets/bootstrap/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- dom -->
    <script>
        function popup() {

        }
        $().alert()

        $(function() {
            $('.select2').select2()
        });
    </script>
    <?php include("../include/footer.php"); ?>

</body>