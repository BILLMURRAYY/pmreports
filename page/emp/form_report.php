<?php include("../include/head.php"); ?>

<head>
    <!-- add -->

    <script src="../../assets/js/form_add.js"></script>
    <!-- include summernote css/js-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="../../assets/js/dist/summernote.css" rel="stylesheet">

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

        function init() {
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
                        <form id="postForm" action="back_add_report.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">

                            <div class="card-body" id="report_form" style="display: none;">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ชื่อหัวข้อรายงาน :</label>
                                        <div class="col-sm-10">
                                            <input name="header[]" type="text" class="form-control" id="" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">รายละเอียดการปฎิบัติงาน:</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="detail[]" id="exampleFormControlTextarea1" rows="5"></textarea>

                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">สถานที่ปฎิบัติงาน :</label>
                                        <div class="col-sm-4">
                                            <select name="workplace[]" class="select2 form-control" style="width: 100%;">
                                                <option value="สำนักงาน">สำนักงาน</option>
                                                <option value="บ้าน">นอกสถานที่</option>
                                            </select>
                                        </div>

                                        <label class="col-sm-2 col-form-label">ความสำเร็จงาน :</label>
                                        <div class="col-sm-4" style="">
                                            <select name="success[]" class="select2 form-control" style="width: 100%;">
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
                                    </div>

                                    <!-- แบบที่ 1 เลือกวันเเละเวลาทำงานได้ทีเดียว -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">วันที่เริ่มทำงาน :</label>
                                        <div class="input-group col-sm-10">
                                            <div class="input-group">
                                                <input type="date" name="start_range[]" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ถึง</i></span>
                                                </div>
                                                <input type="date" name="end_range[]" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">ปัญหาที่พบ :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="problem[]" id="" cols="30" rows="10" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- <input type="button" class="btn btn-danger" id="btndel" value="Remove review" onclick="this.parentNode.parentNode.removeChild(this.parentNode);"><br /> <i class="fas fa-trash"></i>ลบรายงาน<br /> -->
                                <div class="btn btn-danger " id="remove-button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">
                                    <i class="fas fa-trash"></i>
                                    ลบรายงาน
                                </div>


                                <hr>
                            </div>
                            <!-- /.cardbody -->

                            <span id="writeroot"></span>
                            <!-- <form id="postForm" action="back_add_report.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()"> -->
                            <div class="card-footer">
                            <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">อัปโหลดไฟล์ (จำกัดขนาดไฟล์ไม่เกิน 4.MB)</label>
                                        <div class="col-sm-10">
                                        <input type="file" name="file" class="form-control" id="myfile" multiple>

                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> บันทึกรายงาน</button>

                                <div class="btn btn-info " id="moreFields">
                                    <i class="fas fa-plus-circle"></i>
                                    เพิ่มรายงาน
                                </div>
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