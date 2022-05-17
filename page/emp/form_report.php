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
    <!-- include summernote css/js-->
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> -->
    <!-- <link href="../../assets/js/dist/summernote.css" rel="stylesheet"> -->
    

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

            // var newFields1 = document.getElementById('remove-button').cloneNode(true);
            // newFields1.style.display = 'block';
            
            var insertHere = document.getElementById('writeroot');
            insertHere.parentNode.insertBefore(newFields, insertHere);
            // insertHere.parentNode.insertBefore(newFields1, insertHere);
        }
    </script>
    <script>
        // !!!!!!!!!!!!!
        // function archiveFunction() {
        // event.preventDefault(); // prevent form submit
        // var form = event.target.form; // storing the form
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        // if (result.isConfirmed) {
        //     Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //     ).then((result) => {
        //     form.submit();
        //     })
        // }
        // })
        // }

        // $('#postForm').on('submit',function() {  
        //     // event.preventDefault(); // prevent form submit
        // // var form = event.target.form; // storing the form
        // // let form = $(this).closest('form');
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        //     Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //     ).then((result) => {
        //     this.submit();
        //     })
        // if (result.isConfirmed) {
        // }
        // })
        // });

        // $(document).ready(function(){
        // $('#postForm').on('submit',function() {  //Don't foget to change the id form
        // $.ajax({
        //     url:'back_add_report.php', //===PHP file name====
        //     data:$(this).serialize(),
        //     type:'POST',
        //     success:function(data){
        //     console.log(data);
        //     //Success Message == 'Title', 'Message body', Last one leave as it is
        //     swal("¡Success!", "Message sent!", "success");
        //     },
        //     error:function(data){
        //     //Error Message == 'Title', 'Message body', Last one leave as it is
        //     swal("Oops...", "Something went wrong :(", "error");
        //     }
        // });
        // // e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
        // });
        // });
</script>

       
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("nav.php"); ?>
        <?php include("../include/sidebar_emp.php"); ?>


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
                        <!-- /.card-header -->
                        <!-- action="back_add_report.php" -->
                        <!-- onsubmit="return postForm()" -->
                        <form id="postForm" action="back_add_report.php"  method="POST" enctype="multipart/form-data" >

                            <div class="card-body" id="report_form" style="display: block;">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ชื่อหัวข้อรายงาน :</label>
                                        <div class="col-sm-10">
                                            <input name="header[]" type="text" class="form-control" id="" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">รายละเอียดการปฎิบัติงาน :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="detail[]" id="exampleFormControlTextarea1" rows="5" required></textarea>

                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">สถานที่ปฎิบัติงาน :</label>
                                        <div class="col-sm-4">
                                            <select name="workplace[]" class="select2 form-control" style="width: 100%;" required>
                                                <option value="สำนักงาน">สำนักงาน</option>
                                                <option value="บ้าน">นอกสถานที่</option>
                                            </select>
                                        </div>

                                        <label class="col-sm-2 col-form-label">ประเภทงาน :</label>
                                        <div class="col-sm-4">
                                            <select name="job_type[]" class="select2 form-control" style="width: 100%;" required>
                                                <option value="งานประจำ">งานประจำ</option>
                                                <option value="งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ">งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ</option>
                                            </select>
                                        </div>

                                        
                                    </div>

                                    <!-- แบบที่ 1 เลือกวันเเละเวลาทำงานได้ทีเดียว -->
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ความสำเร็จงาน :</label>
                                        <div class="col-sm-2" style="">
                                            <select name="success[]" class="select2 form-control" style="width: 100%;" required>
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
                                        <label class="col-sm-2 col-form-label">วันที่เริ่มทำงาน :</label>
                                        <div class="input-group col-sm-6">
                                            <div class="input-group">
                                                <input type="date" name="start_range[]" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ถึง</i></span>
                                                </div>
                                                <input type="date" name="end_range[]" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="" required>
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ปัญหาที่พบ :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="problem[]" id="" cols="30" rows="5" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">อัปโหลดไฟล์ (จำกัดขนาดไฟล์ไม่เกิน 4.MB)</label>
                                        <div class="col-sm-10">
                                        <!-- <input type="file" name="file[]" class="custom-file-label" id="myfile" > -->
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="file[]" accept="application/pdf , application/msword ,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <!-- <div class="form-group"> -->

<!-- <div class="custom-file">
<input type="file" class="custom-file-input" id="customFile">
<label class="custom-file-label" for="customFile">Choose file</label>
</div>
</div> -->

                                        <!-- <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-input" type="file" for="customFile" name="file[]">Choose file</label> -->

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

                            <span id="writeroot"></span>
                            <!-- <form id="postForm" action="back_add_report.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()"> -->
                            <div class="card-footer">
                            
                                <button type="submit" class="btn btn-primary" onclick="archiveFunction()"><i class="fas fa-save"></i> บันทึกรายงาน</button>
                                <!-- onclick="archiveFunction()" -->

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
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="../../assets/js/dist/summernote.min.js"></script>
    
<!-- <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> -->

    <script>
    $(function () {
    bsCustomFileInput.init();
    });
    </script>
    
    <!-- Text Area -->
    <script>
    $('textarea').each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
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

<?php include("../include/footer.php"); ?>
<?php include("../include/notification.php"); ?>

</body>