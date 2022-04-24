<?php session_start(); ?> 
<?php include("../include/head.php"); ?>
<?php include("../service/check_login_page.php"); ?>
<?php
require_once("../service/condb.php");


// $member_id = $_GET['id_member'];
$member_id = $_SESSION['member_id'];

$sqli = "SELECT * FROM member 
         INNER JOIN department
         ON department.department_id = member.department_id
         WHERE member.member_id = $member_id";

$resulti = mysqli_query($condb, $sqli);

$sql = "SELECT * FROM department ORDER BY department_id asc";
$result = mysqli_query($condb, $sql);
$count = 1;
?>
?>

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


        .card-header {
            background: #004385;
            color: white;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <?php include("nav.php"); ?>
        <?php include("../include/sidebar_staff.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <div class="card card-primary">
                    <div class="card-header" style="background: #004385;color: white;">
                        <h3 class="card-title">แก้ไขข้อมูล</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php

                    foreach ($resulti as $valuei) {
                    ?>
                        <form action="back_update_member.php" id="" method="post" onSubmit="return chkpsw(this)" enctype="multipart/form-data">
                            <input type="hidden" name="member_id" value="<?php echo $member_id ?>">

                            <div class="card-body">

                                <div class="form-group">
                                    <label>แผนก</label>
                                    <select id="m_position" name="id_depart" class="select2 form-control" style="width: 100%;" disabled>
                                        <option value="<?php echo $valuei['department_id'] ?>"><?php echo $valuei['department_name'] ?></option>
                                        <?php
                                        foreach ($result as $row) {
                                            if ($row['department_name'] != "admin") { ?>
                                                <option value="<?php echo $row["department_id"] ?>"><?php echo $row["department_name"] ?></option>

                                        <?php }
                                        } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2" data-select2-id="83">
                                            <div class="form-group" data-select2-id="82">
                                                <label>คำนำหน้า</label>
                                                <select id="m_prefix" name="prefix" class="select2 form-control" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                    <option value="<?php echo $valuei['prefix'] ?>"><?php echo $valuei['prefix'] ?></option>
                                                    <option value="นาย">นาย</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                    <option value="นาง">นาง</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5" data-select2-id="56">
                                            <div class="form-group" data-select2-id="55">
                                                <label>ชื่อ</label>
                                                <input type="text" name="f_name" class="form-control" required placeholder="กรอกชื่อจริง" value="<?php echo $valuei['first_name'] ?>" minlength="2">
                                            </div>
                                        </div>

                                        <div class="col-md-5" data-select2-id="56">
                                            <div class="form-group" data-select2-id="55">
                                                <label>นามสกุล</label>
                                                <input type="text" name="l_name" class="form-control" required placeholder="กรอกนามสกุล" value="<?php echo $valuei['last_name'] ?>" minlength="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" name="phone" id="m_tell" value="<?php echo $valuei['tel'] ?>" pattern="[0-9]{10}" minlength="10" maxlength="10" placeholder="กรอกเบอร์โทรศัพท์" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">อีเมล</label>
                                    <input type="email" class="form-control" name="email" id="m_email" value="<?php echo $valuei['email'] ?>" placeholder="กรอกอีเมล" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">รหัสผ่าน</label>
                                    <input type="password" class="form-control" name="pass1" id="m_pass" placeholder="กรอกรหัสผ่าน" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">ยืนยันรหัสรหัสผ่านอีกครั้ง</label>
                                    <input type="password" class="form-control" name="pass2" id="m_pass2" placeholder="กรอกรหัสผ่านอีกครั้ง" required>
                                </div>

                                <label>ไฟล์รูปภาพ</label>
                                <div class="form-group">
                                <br>
                                    ภาพเก่า <br>
                                    <img src="../../assets/images/<?php echo $valuei['img']?>" width="300px">
                                    <br>
                                    <div class="input-group">
                                        <!-- <div class="custom-file"> -->
                                        <input type="file" name="img" class="form-control" id="m_Img" accept="image/*">
                                        <!-- <label class="" for="exampleInputFile">ใส่รูปภาพ (นามสกุลไฟล์รูปภาพ .jpg และ .png)</label> -->
                                        <!-- </div> -->
                                        <!-- <div class="input-group-append">
                                        <span class="input-group-text">อัปโหลด</span>
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> อัปเดตข้อมูล</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>

</body>