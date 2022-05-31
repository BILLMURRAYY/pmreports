<?php session_start(); ?>
<?php include("../service/check_login_page.php"); ?>
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
    <script src="../../assets/js/form_add.js"></script>
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
        var counter = 0;

        function inits() {
            document.getElementById('moreFields').onclick = moreFields;
            moreFields();

        }

        function moreFields() {
            counter++;
            var newFields = document.getElementById('report_form').cloneNode(true);
            newFields.id = '';
            newFields.style.display = 'block';
            var newField = newFields.childNodes;
            for (var i = 0; i < newField.length; i++) {
                var theName = newField[i].name
                if (theName)
                    newField[i].name = theName + counter;
            }
            var insertHere = document.getElementById('writeroot');
            insertHere.parentNode.insertBefore(newFields, insertHere);
        }
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("nav.php"); ?>
        <?php include("../include/sidebar_staff.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain ">
                <div class=" card-default">
                    <div class="card card-primary ">
                        <div class="card-header" style="background:#004385; color:white;">
                            <h3 class="card-title">แบบฟอร์มการปฎิบัติงาน </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form id="postForm" action="#" method="POST" enctype="multipart/form-data">
                            <div class="card-body" id="report_form" style="display: block;">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ชื่อหัวข้อรายงาน <span style="color: red;">*</span> :</label>
                                        <div class="col-sm-10">
                                            <input name="header" type="text" class="form-control" id="header" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">รายละเอียดการปฎิบัติงาน <span style="color: red;">*</span> :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="5" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">สถานที่ปฎิบัติงาน :</label>
                                        <div class="col-sm-4">
                                            <select name="workplace" id="workplace" class="select2 form-control" style="width: 100%;" required>
                                                <option value="สำนักงาน">สำนักงาน</option>
                                                <option value="บ้าน">นอกสถานที่</option>
                                            </select>
                                        </div>

                                        <label class="col-sm-2 col-form-label">ประเภทงาน :</label>
                                        <div class="col-sm-4">
                                            <select name="job_type" id="job_type" class="select2 form-control" style="width: 100%;" required>
                                                <option value="งานประจำ">งานประจำ</option>
                                                <option value="งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ">งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ</option>
                                            </select>
                                        </div>

                                    </div>

                                    <!-- แบบที่ 1 เลือกวันเเละเวลาทำงานได้ทีเดียว -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ความสำเร็จงาน :</label>
                                        <div class="col-sm-2">
                                            <select name="success" id="success" class="select2 form-control" style="width: 100%;" required>
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
                                        </div>
                                        <label class="col-sm-2 col-form-label">วันที่เริ่มทำงาน <span style="color: red;">*</span> :</label>
                                        <div class="input-group col-sm-6">
                                            <div class="input-group">
                                                <input type="date" name="start_range" id="issueinput4 start_range timepicker" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ถึง</i></span>
                                                </div>
                                                <input type="date" name="end_range" id="issueinput4 end_range" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ปัญหาที่พบ (<span style="color: red;">ถ้ามี</span>) :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="problem" id="problem" cols="30" rows="5" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">อัปโหลดไฟล์ (จำกัดขนาดไฟล์ไม่เกิน 4.MB) (<span style="color: red;">ถ้ามี</span>)</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="file" name="file" class="custom-file-label" id="myfile" > -->
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="file" accept="application/pdf , application/msword ,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <!-- /.cardbody -->

                            <span id="writeroot"></span>
                           
                            <div class="card-footer">

                                <button type="submit" id="submit" class="btn btn-primary"><i class="fas fa-save"></i> บันทึกรายงาน</button>
                            </div>
                        </form>
                        <div id="txtHint"></div>
                        <!-- </form> -->
                    </div>
                    <!-- /card primary -->
                </div>

            </div>
        </div>
    </div><?php include("../include/footer.php"); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="../../assets/js/dist/summernote.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <!-- Text Area -->
    <script>
        $('textarea').each(function() {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>

    <script type="">
        function postForm() {

$('textarea[name="content"]').html($('#summernote').code());
}

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
            format: 'L'
        });
        
    </script>
    <script>
        function process() {
            var header = document.getElementById("header").value;
            var detail = document.getElementById("exampleFormControlTextarea1").value;
            var workplace = document.getElementById("workplace").value;
            var job_type = document.getElementById("job_type").value;
            var success = document.getElementById("success").value;
            var file = document.getElementById("customFile").files[0]['name'];
            if (header) {
                alert('test1');
                event.preventDefault();
                // Setting the AJAX request handler
                var xmlhttp = new XMLHttpRequest();
                // Waiting for a response
                xmlhttp.onreadystatechange = function() {
                    // If the response is 200 aka "OK"
                    if (this.readyState == 4 && this.status == 200) {
                        // Show your success alert here
                        //   Swal.fire({
                        //     title: "Message Sent!",
                        //     text: "Thank you for contacting us.",
                        //     timer: 2000,
                        //     showConfirmButton: false,
                        //   });
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Swal.fire(
                                //     'Deleted!',
                                //     'Your file has been deleted.',
                                //     'success'
                                // )
                                document.getElementById("txtHint").innerHTML = this.responseText;
                            }
                        })

                        //   document.getElementById("envia").reset();
                        return;
                    }
                };
                // Setting the request type and data to be sent
                xmlhttp.open("POST", "back_add_report.php", true);
                // ?nome=" + name + "&email=" + email + "&assunto=" + subject + "&mensagem=" + message
                xmlhttp.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );
                xmlhttp.send(
                    "header=" +
                    header +
                    "&detail=" +
                    detail +
                    "&workplace=" +
                    workplace +
                    "&job_type=" +
                    job_type +
                    "&success=" +
                    success +
                    "&start_range=" +
                    start_range +
                    "&end_range=" +
                    end_range +
                    "&problem=" +
                    problem +
                    "&file=" +
                    file
                );
            } else {
                // Alert the user to fill the required fields
                console.log("please fill all required fields");
                return;
            }
        }
        document.querySelector("#submit").addEventListener(
            "click",
            function(event) {
                process();
                alert('email');
            },
            false
        );
    </script>
    <?php include("../include/notification.php"); ?>
</body>