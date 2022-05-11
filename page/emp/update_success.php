<?php session_start(); ?> 
<?php include("../service/check_login_page.php"); ?>
<?php require_once("../service/condb.php");?>
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

        .card-footer {
            text-align: center;
        }
    </style>  
    <script>
        function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Update!',
            // 'Your file has been deleted.',
            'success'
            ).then((result) => {
            form.submit();
            })
        }
        })
        }

       
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("nav.php"); ?>
        <?php include("../include/sidebar_emp.php"); ?>
        
        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain ">
                <div class=" card-default">
                <?php print_r($_GET);?>  
                    <div class="card card-primary ">
                        <div class="card-header" style="background:#004385; color:white;">
                            <h3 class="card-title">แบบฟอร์มupdateการปฎิบัติงาน </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form id="postForm" action="back_update_success.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                            <?php
                                $sql = "SELECT * FROM report WHERE report_id = ".$_GET['report_id']."";
                                $query = mysqli_query($condb,$sql);
                                $rows = mysqli_fetch_array($query, MYSQLI_ASSOC);

                            ?>
                            <input type="hidden" name="send_report_id" value="<?php echo $_GET['send_report_id']?>">
                            <input type="hidden" name="report_id" value="<?php echo $rows['report_id']?>">
                            <div class="card-body" id="report_form" style="display: block;">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ชื่อหัวข้อรายงาน :</label>
                                        <div class="col-sm-10">
                            
                                            <input name="header" type="text" class="form-control" id="" placeholder="" value="<?php echo $rows['header']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">รายละเอียดการปฎิบัติงาน :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="5" ><?php echo $rows['detail']?></textarea>

                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">สถานที่ปฎิบัติงาน :</label>
                                        <div class="col-sm-4">
                                            <select name="workplace" class="select2 form-control" style="width: 100%;" required>
                                                <option value="<?php echo $rows['workplace']?>"><?php echo $rows['workplace']?></option>
                                                <option value="สำนักงาน">สำนักงาน</option>
                                                <option value="บ้าน">นอกสถานที่</option>
                                            </select>
                                        </div>

                                        <label class="col-sm-2 col-form-label">ประเภทงาน :</label>
                                        <div class="col-sm-4">
                                            <select name="job_type" class="select2 form-control" style="width: 100%;" required>
                                                <option value="<?php echo $rows['job_type']?>"><?php echo $rows['job_type']?></option>
                                                <option value="งานประจำ">งานประจำ</option>
                                                <option value="งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ">งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ</option>
                                            </select>
                                        </div>

                                        
                                    </div>

                                    <!-- แบบที่ 1 เลือกวันเเละเวลาทำงานได้ทีเดียว -->
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ความสำเร็จงาน :</label>
                                        <div class="col-sm-2" style="">
                                            <select name="success" class="select2 form-control" style="width: 100%;" required>
                                                <option value="<?php echo $rows['success']?>"><?php echo $rows['success']?> %</option>
                                                <option value="0">0 %</option>
                                                <option value="10">10 %</option>
                                                <option value="20">20 %</option>
                                                <option value="30">30 %</option>
                                                <option value="40">40 %</option>
                                                <option value="50">50 %</option>
                                                <option value="60">60 %</option>
                                                <option value="70">70 %</option>
                                                <option value="80">80 %</option>
                                                <option value="90">90 %</option>
                                                <option value="100">100 %</option>
                                            </select>
                                            <?php
                                            $his_success =[];
                                            if(!is_null($rows['his_success'])){
                                                if(!empty($rows['his_date'])){
                                            $his_success = explode(",",$rows['his_success']);
                                            }}
                                            array_push($his_success,$rows['success']);
                                            $his_success = implode(",",$his_success)
                                            ?>
                                            <input type="hidden" name="his_success" value="<?php echo $his_success ?>">
                                        </div>
                                        <label class="col-sm-2 col-form-label">วันที่เริ่มทำงาน :</label>
                                        <div class="input-group col-sm-6">
                                            <div class="input-group">
                                                <input type="date" name="start_range" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="" value="<?php echo $rows['working_range_start']?>" disabled>
                                                <input type="hidden" name="start_range" value="<?php echo $rows['working_range_start']?>">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ถึง</i></span>
                                                </div>
                                                <input type="date" name="end_range" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="" value="<?php echo $rows['working_range_end']?>" >
                                                <?php
                                                $his_date= [];
                                                if(!is_null($rows['his_date'])){
                                                if(!empty($rows['his_date'])){
                                                $his_date = explode(",",$rows['his_date']);
                                                }}
                                                array_push($his_date,$rows['working_range_end']);
                                                $his_date = implode(",",$his_date)
                                                ?>
                                                <input type="hidden" name="his_date" value="<?php echo $his_date ?>">
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ปัญหาที่พบ :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="problem" id="" cols="30" rows="10" placeholder=""  ><?php echo $rows['problem']?></textarea>
                                        </div>
                                    </div>
                                  <?php
                                    if ($rows['file'] != "") {
                                        $file = $rows['file'];

                                        echo " <div id='pdfplace'>";
                                        echo " <center>";
                                        echo "<a href='../../assets/images/$file'><input class='btn btn-danger ' type='button' value='คลิกที่นี้เพื่อดาวน์โหลดไฟล์'></a>";
                                        echo " </center>";
                                        echo "<br>";
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">อัปโหลดไฟล์ (จำกัดขนาดไฟล์ไม่เกิน 4.MB)</label>
                                        <div class="col-sm-10">
                                        <!-- <input type="file" name="file" class="form-control" id="myfile" value=""> -->
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="file" accept="application/pdf , application/msword ,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                        <label class="custom-file-label" for="customFile"><?php echo $rows['file']?></label>
                                        </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- <input type="button" class="btn btn-danger" id="btndel" value="Remove review" onclick="this.parentNode.parentNode.removeChild(this.parentNode);"><br /> <i class="fas fa-trash"></i>ลบรายงาน<br /> -->
                                <!-- <div class="btn btn-danger " id="remove-button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" >
                                    <i class="fas fa-trash"></i>
                                    ลบรายงาน
                                </div> -->


                                <hr>
                            </div>
                            <!-- /.cardbody -->

                            <!-- <span id="writeroot"></span> -->
                            <!-- <form id="postForm" action="back_add_report.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()"> -->
                            <div class="card-footer">
                            
                                <button type="submit" class="btn btn-primary" onclick="archiveFunction()"><i class="fas fa-save"></i> บันทึกรายงาน</button>

                                <!-- <div class="btn btn-info " id="moreFields" onclick="inits()">
                                    <i class="fas fa-plus-circle"></i>
                                    เพิ่มรายงาน
                                </div> -->
                            </div>
                        </form>
                        <!-- </form> -->
                    </div>
                    <!-- /card primary -->
                </div>

            </div>
        </div>
    </div>
    <?php include("../include/footer.php"); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="../../assets/js/dist/summernote.min.js"></script>

    <script>
    $(function () {
    bsCustomFileInput.init();
    });
    </script>

    <script type="">
        function postForm() {

$('textarea[name="content"]').html($('#summernote').code());
}
        // $(document).ready(function() {
        //     $('#summernote').summernote({
        //         height: "250px",
        //         styleWithSpan: false
        //     });
        // });

        $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
        $(function() {


            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })

        $(function() {
            $('.select2').select2()
        });



        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        });
    </script>



</body>