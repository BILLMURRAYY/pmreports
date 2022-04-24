<?php include("../include/head.php"); ?>
<style>
    .contain {
        padding: 25px;
    }

    input {
        margin-left: 20px;
    }

    input[type=checkbox] {
        width: 20px;
        margin-right: 15px;
    }

    .component {
        margin-top: 20px;
        margin-left: 40px;
    }

    .all-topic {
        border-radius: 15px;
        border: #E0E0E0 solid 2px;
    }

    table th,
    td {
        border: #E0E0E0 solid 2px;
    }

    .card-header {
        background: #004385;
        color: white;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <?php include("nav.php"); ?>
        <?php include("../include/sidebar_admin.php"); ?>

        <div class="content-wrapper" style="min-height: 608px;">
            <div class="contain">
                <!-- <h1>สร้างแบบประเมิน</h1> -->
                <div class="card card-default " id="dynamic-field-1">
                    <div class="card-header">
                        <div style="display: inline-flex; ">
                            <input type="checkbox" class="form-control" name="" id="">
                            <h4 class="">แบบประเมินชุดที่ 1</h4>
                        </div>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" style="color: white;" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         
                        </div>
                    </div>
                    <!-- card-boy -->
                    <div class="card-body" id="form_input">

                        <form action="" method="post">
                            
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ชื่อหัวข้อแบบประเมิน :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <table class="table table-border">
                                        <thead>
                                            <tr>
                                                <th>คะแนน/Rating</th>
                                                <th>คำอธิบาย</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" class="form-control col-11" id="" placeholder="text"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input type="text" class="form-control col-11" id="" placeholder="text"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input type="text" class="form-control col-11" id="" placeholder="text"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input type="text" class="form-control col-11" id="" placeholder="text"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><input type="text" class="form-control col-11" id="" placeholder="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <!-- //////แบบที่ 2 -->
                                <div class="all-topic">
                                    <div class="form-group">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="topic" class="col-sm-2 col-form-label">หัวข้อ/Topics</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" class="form-control" id="" placeholder="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">ส่วนย่อยหัวข้อ</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-append">
                                                            <button type="button" id="clone-add" class="btn btn-info btn-flat" data-duplicate-add="Ex">เพิ่ม</button>
                                                        </span>
                                                    </div>
                                                    <div class="clone">
                                                        <div class="input-group input-group-sm">
                                                            <!-- <input type="text" class="form-control"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                           
                        </form>

                    </div>
                    <!-- /card-boy -->

                </div>

                <div class="btn_add_topic" style="text-align: center;">
                    <button type="button" class="btn btn-outline-info"> เลือกแบบประเมิน</button>
                    <button type="button" id="add-button" class="btn btn-outline-info"><i class="fas fa-plus"></i> เพิ่มแบบประเมิน</button>
                    <button type="button" id="remove-button" class="btn btn-outline-danger"><i class="fas fa-remove"></i> ลบ</button>
                </div>


                <!-- test -->



                </script>
                <!--  -->
            </div>
            <!-- /.contain-->
        </div>
        <!-- /.wrapper -->
    </div>
    <!-- /.hold-transition -->


    <script>
        // add input photo
        $(document).ready(function() {
            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".clone"); //Fields wrapper
            var add_button = $("#clone-add"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="input-group input-group-sm"><input type="text" class="form-control"/><a href="#" class="remove_field"><i class="fas fa-times"></i></a></div>'); //add input box

                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });

        function display(s) {
            if (s.value == "file") {
                document.getElementById('show1').style.display = "block";
            } else {
                document.getElementById('show1').style.display = "none";
            }
            if (s.value == "photo") {
                document.getElementById('show2').style.display = "block";
            } else {
                document.getElementById('show2').style.display = "none";
            }

        }
    </script>

    <script>
        //form
        $(document).ready(function() {
            var buttonAdd = $("#add-button");
            var buttonRemove = $("#remove-button");
            var className = ".card-default";
            var count = 0;
            var field = "";
            var maxFields = 50;

            function totalFields() {
                return $(className).length;
            }

            function addNewField() {
                count = totalFields() + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.children("label").text("Field " + count);
                field.find("input").val("");
                $(className + ":last").after($(field));
            }

            function removeLastField() {
                if (totalFields() > 1) {
                    $(className + ":last").remove();
                }
            }

            function enableButtonRemove() {
                if (totalFields() === 2) {
                    buttonRemove.removeAttr("disabled");
                    buttonRemove.addClass("shadow-sm");
                }
            }

            function disableButtonRemove() {
                if (totalFields() === 1) {
                    buttonRemove.attr("disabled", "disabled");
                    buttonRemove.removeClass("shadow-sm");
                }
            }

            function disableButtonAdd() {
                if (totalFields() === maxFields) {
                    buttonAdd.attr("disabled", "disabled");
                    buttonAdd.removeClass("shadow-sm");
                }
            }

            function enableButtonAdd() {
                if (totalFields() === (maxFields - 1)) {
                    buttonAdd.removeAttr("disabled");
                    buttonAdd.addClass("shadow-sm");
                }
            }

            buttonAdd.click(function() {
                addNewField();
                enableButtonRemove();
                disableButtonAdd();
            });

            buttonRemove.click(function() {
                removeLastField();
                disableButtonRemove();
                enableButtonAdd();
            });
        });
    </script>
</body>