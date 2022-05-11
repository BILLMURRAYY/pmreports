<?php require_once("../service/condb.php"); ?>
<?php

$q = $_GET['q'];
// echo $q;
// echo gettype($q) . "<br>";
// exit();
?>
<script>
        // function showUser(str) {
        //     // alert(str);
        //     if (str == "") {
        //         document.getElementById("txtHint1").innerHTML = "";
        //         return;
        //     } else {
        //         var xmlhttp = new XMLHttpRequest();
        //         xmlhttp.onreadystatechange = function() {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 document.getElementById("txtHint").innerHTML = this.responseText;
        //             }
        //         };
        //         xmlhttp.open("GET", "ajax.php?=q" + str, true);
        //         xmlhttp.send();
        //     }
        // }
    </script>
<!-- <form> -->
<!-- <form action="" method="post"> -->

        

                <?php

                // !!!!!!!!!!! กำหนดค่า session
                // $department = 'หัวหน้าคณบดี';
                // $_SESSION["department_id"]
                // $department_id  = $_SESSION["department_id"];

                $result = "SELECT * FROM department 
                inner JOIN member
                on member.department_id = department.department_id WHERE department_name ='".$q."'";
                $query = mysqli_query($condb, $result);

                // $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                // echo "<pre>";
                // print_R($rows);
                // echo "</pre>";
                // exit();


                echo "<label class='col col-form-label'>ชื่อ-สกุล :</label>";
                // echo "<div class='col'>";
                    echo "<select class='select2 form-control' name='member_id' onchange='showUser1(this.value)' style='width: 100%;'>";
        
                        echo "<option value=''>เลือกรายการ :</option>";
                while ($value = mysqli_fetch_array($query)) {
                // foreach ($rows as $value) {
                    // $flow_estimate = $value['flow_estimate'];
                    // echo $flow_estimate;
                    // $flow_estimate = explode(",", $flow_estimate);
                    // print_r($flow_estimate);

                        echo "<option value=".$value["member_id"].">" .$value['name'] ."</option>";

                        // echo "<option value=" . $row['member_id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";

                    // foreach ($flow_estimate as $value2) {
                    // }
                }
                echo "</select>";
                mysqli_close($condb);
                echo "<div id='txtHint1'><b>โปรดเลือกชื่อ-สกุลเพื่อดูผลสรุปของพนักงาน</b></div>";
                ?>

                <!-- <option value="รองคณบดีฝ่ายบริหาร">รองคณบดีฝ่ายบริหาร</option>
<option value="กลุ่มงานบริหารและพัฒนาบุคคลกร">กลุ่มงานบริหารและพัฒนาบุคคลกร</option>
<option value="หน่วยบุคคล">หน่วยบุคคล</option> -->

            
            
        </div>
    <!-- </form> -->