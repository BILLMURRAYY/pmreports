<?php require_once("../service/condb.php"); ?>
<?php
$job_type = $_GET['q'];
// echo "ประเภทงาน : ".$job_type."<br>";
// echo gettype($job_type) . "<br>";
$member_id = $_GET['q1'];
// echo "member_id พนักงาน : ".$member_id."<br>";
// echo gettype($member_id) . "<br>";
// exit();
echo "<form action='graph.php' method='post'>";
    echo "<input type='hidden' name='member_id' value='".$member_id."'>";
    echo "<input type='hidden' name='job_type' value='".$job_type."'><br>";
    // echo "<div class='d-grid gap-2'>";
    echo "<button  type='submit' class='btn btn-success btn-lg btn-block'>ค้นหา</button>";
    // echo "</div>";
echo "</form>";

// $result = "SELECT * FROM send_report 
// inner JOIN report
// on send_report.report_id = report.report_id 
// WHERE job_type = '".$job_type."' AND member_send_id =".$member_id."";
// $query = mysqli_query($condb, $result);

// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
// echo "<pre>";
// print_R($rows);
// echo "</pre>";
// exit();
// $x= "<option value='".$year."' ".$getyear==$year?"select":" ".">".$year."</option>";

// echo "<div class='col'>";
// $getyear=2022;
// for($year=2021;$year<=date('Y');$year++){
    //     echo $year;
    //     echo $getyear==$year?'select':'';
    // }
    
    // echo "<option value=''>เลือกรายการ :</option>";
    // while ($value = mysqli_fetch_array($query)) {
        // foreach ($rows as $value) {
            // $flow_estimate = $value['flow_estimate'];
            // echo $flow_estimate;
            // $flow_estimate = explode(",", $flow_estimate);
            // print_r($flow_estimate);
            // --------------------------------------------------------
            // $arr= ["งานประจำ","งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ"];
            // echo $arr[$job_type]."<br>";
            //     echo "<label class='col col-form-label'>เลือกปี :</label>";
            //  echo "<select class='select2 form-control' name='depart' onchange='showUser3(this.value,".$job_type.",".$member_id.")' style='width: 100%;'>";
            // // $getyear=2022;
            // $getyear=date('Y');
            // // echo "<option value='".$getyear."' >".($getyear+543)."</option>";
            // // $x = "select";
            // for($year=2020;$year<=date('Y');$year++){
            //     // echo $year;
            //     $y= $getyear==$year?"select":" ";
            // echo "<option value=".$year." ".$y." >".($year+543)."</option>";
                
            // }
            // echo "</select>";
            // --------------------------------------------------------
            // echo "<option value='งานประจำ'>งานประจำ</option>";
            // echo "<option value='งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ'> งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ</option>";

            // echo "<option value=" . $row['member_id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";

        // foreach ($flow_estimate as $value2) {
        // }
    // }
    // mysqli_close($condb);
    // --------------------------------------------------------
    // echo "<div id='txtHint3'><b>โปรดเลือกแผนกเพื่อดูผลสรุปของพนักงาน</b></div>";
    // --------------------------------------------------------



// exit();
// $GLOBALS['count']=0;
// $GLOBALS['count_all']=0;

// foreach($rows as $value){
//     $report_id = $value['report_id'];
//     $report_id = explode(",",$report_id);
//     // print_r($report_id);
    
//     for($i = 0 ; $i < count($report_id) ; $i++){
//         // echo $report_id[$i];
//         $result2 = "SELECT * FROM report WHERE report_id = $report_id[$i]";
//         $query2 = mysqli_query($condb, $result2);
//         $GLOBALS['rows2'] = mysqli_fetch_all($query2, MYSQLI_ASSOC);
//         // echo "<pre>";
//         // print_R($rows2);
//         // echo "</pre>";
//         foreach($rows2 as $value2){
//             if($value2['success']==100){
//                 $GLOBALS['count'] +=1;
//             }
//             $GLOBALS['count_all'] +=1;
//         }
//         // exit();
//     }
// }
// echo "จำนวนที่รายงานทั้งหมด : ".count($rows);
// echo "<br>";
// echo "จำนวนรายงานที่เสร็จ 100% : ".$count;
// echo "<br>";
// echo "จำนวนรายงานที่ไม่เสร็จ 100% : ".$count_all-$count;
// echo "<br>";
// echo "จำนวนหัวข้อทั้งหมดที่รายงาน : ".$count_all;
?>