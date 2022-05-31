<?php require_once("../service/condb.php"); ?>
<?php
// print_r($_GET);
$year = $_GET['year'];
echo "ปี : " . $year . "<br>";
$job_type = $_GET['job_type'];
echo "ประเภทงาน : " . $job_type . "<br>";
// echo gettype($job_type) . "<br>";
$member_id = $_GET['member_id'];
echo "member_id พนักงาน : " . $member_id . "<br>";
exit();
$result = "SELECT * FROM send_report 
inner JOIN report
on send_report.report_id = report.report_id 
WHERE job_type = '" . $job_type . "' AND member_send_id =" . $member_id . "";
$query = mysqli_query($condb, $result);

$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
echo "<pre>";
print_R($rows);
echo "</pre>";
// exit();

echo "<label class='col col-form-label'>เลือกปี :</label>";
// $x= "<option value='".$year."' ".$getyear==$year?"select":" ".">".$year."</option>";

// echo "<div class='col'>";
// $getyear=2022;
// for($year=2021;$year<=date('Y');$year++){
//     echo $year;
//     echo $getyear==$year?'select':'';
// }
echo "<select class='select2 form-control' name='depart' onchange='showUser3(this.value,'$job_type','$member_id')' style='width: 100%;'>";

// echo "<option value=''>เลือกรายการ :</option>";
// while ($value = mysqli_fetch_array($query)) {
// foreach ($rows as $value) {
// $flow_estimate = $value['flow_estimate'];
// echo $flow_estimate;
// $flow_estimate = explode(",", $flow_estimate);
// print_r($flow_estimate);
$getyear = 2022;
// $x = "select";
for ($year = 2022; $year <= date('Y'); $year++) {
    // echo $year;
    $y = $getyear == $year ? "select" : " ";
    echo "<option value='" . $year . "' " . $y . " >" . ($year + 543) . "</option>";
}
// echo "<option value=" . $row['member_id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";

// foreach ($flow_estimate as $value2) {
// }
// }
echo "</select>";
mysqli_close($condb);
echo "<div id='txtHint3'><b>โปรดเลือกแผนกเพื่อดูผลสรุปของพนักงาน</b></div>";
exit();
$GLOBALS['count'] = 0;
$GLOBALS['count_all'] = 0;
foreach ($rows as $value) {
    $report_id = $value['report_id'];
    $report_id = explode(",", $report_id);
    // print_r($report_id);

    for ($i = 0; $i < count($report_id); $i++) {
        // echo $report_id[$i];
        $result2 = "SELECT * FROM report WHERE report_id = $report_id[$i]";
        $query2 = mysqli_query($condb, $result2);
        $GLOBALS['rows2'] = mysqli_fetch_all($query2, MYSQLI_ASSOC);
        // echo "<pre>";
        // print_R($rows2);
        // echo "</pre>";
        foreach ($rows2 as $value2) {
            if ($value2['success'] == 100) {
                $GLOBALS['count'] += 1;
            }
            $GLOBALS['count_all'] += 1;
        }
        // exit();
    }
}
echo "จำนวนที่รายงานทั้งหมด : " . count($rows);
echo "<br>";
echo "จำนวนรายงานที่เสร็จ 100% : " . $count;
echo "<br>";
echo "จำนวนรายงานที่ไม่เสร็จ 100% : " . $count_all - $count;
echo "<br>";
echo "จำนวนหัวข้อทั้งหมดที่รายงาน : " . $count_all;
?>