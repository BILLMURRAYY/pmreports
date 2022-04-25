<?php require_once("../service/condb.php"); ?>
<?php
$q = $_GET['q'];
// echo $q;
// exit();

$result = "SELECT * FROM send_report 
inner JOIN report
on send_report.report_id = report.report_id 
WHERE member_send_id =".$q."";
$query = mysqli_query($condb, $result);

// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
// echo "<pre>";
// print_R($rows);
// echo "</pre>";
//exit();
// $arr= ["งานประจำ","งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ"];
// print_r($arr);
    echo "<label class='col col-form-label'>ประเภทงาน :</label>";
    // echo "<div class='col'>";
        echo "<select class='select2 form-control' name='depart' onchange='showUser2(this.value,".$q.")' style='width: 100%;'>";

            echo "<option value=''>เลือกรายการ :</option>";
    // while ($value = mysqli_fetch_array($query)) {
    // foreach ($arr as $value) {
        // $flow_estimate = $value['flow_estimate'];
        // echo $flow_estimate;
        // $flow_estimate = explode(",", $flow_estimate);
        // print_r($flow_estimate);
            // for($i=0;$i<count($arr);$i++){
            // echo "<option value=".$arr[$i]." >".$arr[$i]."</option>";
            // }

            echo "<option value='"."0"."'>งานประจำ</option>";
            echo "<option value='"."1"."'> งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ</option>";

            // $getyear=2022;
            // echo "<option value='".$getyear."' >".($getyear+543)."</option>";
            // $x = "select";
            // for($year=2022;$year<=date('Y');$year++){
            // for($year=0;$year<2;$year++){
            //     // echo $year;
            //     // $y= $getyear==$year?"select":" ";
            // echo "<option value=".$year." ".$y." >".($year+543)."</option>";
            // echo "<option value='".$arr[$year]."' >".($arr[$year])."</option>";
                
            // }

            // echo "<option value=" . $row['member_id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";

        // foreach ($flow_estimate as $value2) {
        // }
    // }
    echo "</select>";
    mysqli_close($condb);
    echo "<div id='txtHint2'><b>โปรดเลือกแผนกเพื่อดูผลสรุปของพนักงาน</b></div>";



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