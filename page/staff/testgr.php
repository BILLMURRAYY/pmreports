<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<?php  //$condb = mysqli_connect('localhost','root','','oprs_new1'); ?>
<?php
require_once("../service/condb.php");
echo "<pre>";
print_r($_POST);
echo "</pre>";
// $q= "SELECT DATE_FORMAT(send_report.date, '%c') as month , COUNT(MONTH(send_report.date)) as count 
// FROM send_report
// inner join report
// on send_report.report_id = report.report_id
// WHERE  send_report.member_send_id = 21 AND report.job_type='งานประจำ' AND YEAR(send_report.date)='2022' AND report.success=100
// GROUP BY YEAR(send_report.date), MONTH(send_report.date) 
// ORDER BY DATE_FORMAT(send_report.date,'%m') ASC";

$mysql ="SELECT DATE_FORMAT(send_report.date, '%c') as month , COUNT(MONTH(send_report.date)) as count 
FROM send_report
inner join report
on send_report.report_id = report.report_id
WHERE";
$mysql2 ="SELECT DATE_FORMAT(send_report.date, '%c') as month , COUNT(MONTH(send_report.date)) as count 
FROM send_report
inner join report
on send_report.report_id = report.report_id
WHERE";
$arr = ['งานประจำ','งานที่ตอบตัวชี้วัดคำรับรองการปฏิบัติงานของคณะ'];
if(!empty($_GET['year'])){//หากมีการเลือกปี ให้แสดงยอดขายของเดือนที่อยู่ในปีนั้นๆ
  $getYear=$_GET['year'];
$mysql.=" send_report.member_send_id = ".$_POST['member_id']." AND report.job_type='".$arr[$_POST['job_type']]."' AND YEAR(send_report.date)='".$getYear."'";
$mysql2.=" send_report.member_send_id = ".$_POST['member_id']." AND report.job_type='".$arr[$_POST['job_type']]."' AND report.success='100' AND YEAR(send_report.date)='".$getYear."'";
// ShipperID = 3 change success = 100 | YEAR (date)
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  เพิ่ม where | member_id = $_GET['member_id'] AND job_type = $arr[$_GET['job_type']];
}else{//หากไม่เลือกอะไร ให้แสดงยอดขายในปีปัจจุบัน
  $getYear=date('Y');
  $mysql.=" send_report.member_send_id = ".$_POST['member_id']." AND report.job_type='".$arr[$_POST['job_type']]."' AND YEAR(send_report.date)='".$getYear."'";
  $mysql2.=" send_report.member_send_id = ".$_POST['member_id']." AND report.job_type='".$arr[$_POST['job_type']]."' AND report.success='100' AND YEAR(send_report.date)='".$getYear."'";
}
$mysql.=" GROUP BY YEAR(send_report.date), MONTH(send_report.date) 
ORDER BY DATE_FORMAT(send_report.date,'%m') ASC";
$mysql2.=" GROUP BY YEAR(send_report.date), MONTH(send_report.date) 
ORDER BY DATE_FORMAT(send_report.date,'%m') ASC";
// $getYear=date('Y');
echo $mysql."<br>";
echo $mysql2."<br>";
// exit();
?>
<div align="center">
      <form id="form1" name="form1" method="get" action="">

        <label for="month"></label>
        เลือกปี 
        <select name="year" id="year">
        <?php for($year=1996;$year<=date('Y');$year++){?>
        <option value="<?=$year?>" <?=$getYear==$year?'selected':'' ?>><?=($year+543)?></option>
        <?php  }?>
        </select>
        <?php echo date('Y'); echo date('Y')+543;?>

        <input type="submit" name="btsearch" id="btsearch" value="ค้นหารายงาน" />
      </form>

    </div>
<!-- Chart -->
<div id="container" style="width: 75%;">
  <canvas id="canvas"></canvas>
</div>
<?php
$sql = "SELECT  DATE_FORMAT(OrderDate, '%c') as month , COUNT(MONTH(OrderDate)) as count   FROM Orders WHERE YEAR(OrderDate)=1997  GROUP BY YEAR(OrderDate), MONTH(OrderDate) ORDER BY DATE_FORMAT(OrderDate,'%m') ASC";
$query = mysqli_query($condb,$mysql);
// $result = mysqli_fetch_all($query);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
$totals = [];
// $totals1 = [];
$fails = [];
$successs = [];
while($show=mysqli_fetch_assoc($query)){
  $totals[$show['month']-1] = $show['count'];
  
}
echo "<pre>";
print_r($totals);
echo "</pre>";
echo "<br>";

$sql2 = "SELECT  DATE_FORMAT(OrderDate, '%c') as month , COUNT(MONTH(OrderDate)) as count   FROM Orders WHERE ShipperID = 3 AND YEAR(OrderDate)=1997  GROUP BY YEAR(OrderDate), MONTH(OrderDate) ORDER BY DATE_FORMAT(OrderDate,'%m') ASC";
$query2 = mysqli_query($condb,$mysql2);
while($show2=mysqli_fetch_assoc($query2)){
  $successs[$show2['month']-1] = $show2['count'];
  
}
// echo "<pre>";
// print_r($successs);
// echo "</pre>";
// echo "<br>";

// foreach($totals as $key => $values){
//   echo $key ." " .$values."<br>";
//   $totals1[$key] = $values;
// }
// print_r($totals1);
// echo "<br>";
// print_r(json_encode($totals));
  
// }
//  fail = total - success
// count จำนวนทั้งหมดที่รายงาน  
// select COUNT(report_id) from 
// from send_report
// inner join report
// on 
$months = ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
//! total
for($i = 0 ; $i < COUNT($months);$i++){
// echo $i;
  if(!isset($totals[$i])){
    // echo '0<br>';
    $totals[$i] =0;
  }else{
    // echo '1<br>';
  }
}
ksort($totals);
// echo "<pre>";
// print_r($totals);
// echo "</pre>";
echo "<br>";

//! 100%
for($i = 0 ; $i < COUNT($months);$i++){
  // echo $i;
    if(!isset($successs[$i])){
      // echo '0<br>';
      $successs[$i] =0;
    }else{
      // echo '1<br>';
    }
  }
  ksort($successs);
// echo "<pre>";
// print_r($successs);
// echo "</pre>";

//! 0%
for($i = 0 ; $i < COUNT($months);$i++){
  $fails[$i] = $totals[$i] - $successs[$i];
    
}
echo "<pre>";
print_r($fails);
echo "</pre>";

// $month=array(1=>'มกราคม',2=>'กุมภาพันธ์',3=>'มีนาคม',4=>'เมษายน',5=>'พฤษภาคม',6=>'มิถุนายน',
// 7=>'กรกฎาคม',8=>'สิงหาคม',9=>'กันยายน',10=>'ตุลาคม',11=>'พฤศจิกายน',12=>'ธันวาคม');
$month=array('มกราคม'=>1,'กุมภาพันธ์'=>2,'มีนาคม'=>3,'เมษายน'=>4,'พฤษภาคม'=>5,'มิถุนายน'=>6,
'กรกฎาคม'=>7,'สิงหาคม'=>8,'กันยายน'=>9,'ตุลาคม'=>10,'พฤศจิกายน'=>11,'ธันวาคม'=>12);

// foreach($month as $key_m => $val_m){
//   // echo $key_m."<br>";
//   // echo $val_m."<br>";
//   // if(!isset($totals[$key_m])){
//   //   $totals1[$val_m] = 0;
//   // }else{
//   //   $totals1[$val_m] = $totals[$key_m];
//   // }
//   $key_m-1;
//   if($totals[$key_m]=$key_m){
//     echo $key_m;
//     // $totals1[$key_m] = $totals[$key_m];
//     foreach($totals[$key_m] as $value){
//       echo $value;
//       array_push($totals1,$value);
//     }
    
//   }else{
//     // $totals1[$key_m] = 0;
//   }
  
  // $chart.=",['".$val_m."',".($report_arr[$key_m]*1)."]";
// }
// print_r($totals1);
// for($i = 0 ; $i < COUNT($month);$i++){
    // $total[$i] = 
// }
// $a = 0;
// foreach($month as $value => $key){
  // echo $key." ".$value."<br>";
  // echo $key = $a;
  // $a++;
// }
// print_r(array_keys($month));
// echo "<br>";
// // print_r($month);
// echo "<br>";
// print_r($months);
// echo "<br>";
// // echo $month[1];
// echo "<br>";
// echo $months[1];

$total = [20,30,20,17,15,20,20,30,20,17,15,20];
// print_r($total);
// $fail = [10, 16, 5, 6,6, 10,10, 16, 5, 6,6, 10];
$fail = [0, 0, 0, 0,0, 0,0, 0, 0, 0,0, 0];
$success = [10, 14, 15, 11, 9,10,10, 14, 15, 11, 9,10];
?>

<script>
    // const month = <?php //echo json_encode(array_keys($month)); ?>;
    const month = <?php echo json_encode($months); ?>;
    const total = <?php echo json_encode($totals); ?>;
    const fail = <?php echo json_encode($fails); ?>;
    const success = <?php echo json_encode($successs); ?>;
    var barChartData = {
  labels:month
  // [
  //   "มกราคม",
  //   "กุมภาพันธ์",
  //   "มีนาคม",
  //   "เมษายน",
  //   "พฤษภาคม",
  //   "มิถุนายน",
  //   "กรกฎาคม",
  //   "สิงหาคม",
  //   "กันยายน",
  //   "ตุลาคม",
  //   "พฤศจิกายน",
  //   "ธันวาคม"
  // ]
  ,
  datasets: [
    {
      label: "total",
      yAxisID: 'bar-stack',
      backgroundColor: "rgb(9, 154, 131)",
    //   borderColor: "rgb(9, 154, 131)",
      borderWidth: 1,
      stack: 'now1',
      // data: [20,30,20,17,15,20,20,30,20,17,15,20]
      data: total
    },
    {
      label: "100%",
      yAxisID: 'bar-stack',
      backgroundColor: "rgb(255, 70, 62)",
    //   borderColor: "rgb(255, 70, 62)",
      borderWidth: 1,
      stack: 'bef',
      // data: [10, 16, 5, 6,6, 10,10, 16, 5, 6,6, 10]
      data: fail
    },
    {
      label: "0%",
      yAxisID: 'bar-stack',
      backgroundColor: "rgb(9, 154, 188)",
    //   borderColor: "rgb(9, 154, 188)",
      borderWidth: 1,
      stack: 'bef',
      // data: [10, 14, 15, 11, 7,10,10, 14, 15, 11, 7,10]
      data: success
    }
    
    // ,
    // {
    //   label: "Visa",
    //   yAxisID: "bar-stack",
    //   backgroundColor: "yellow",
    //   borderColor: "orange",
    //   borderWidth: 1,
    //   stack: 'now',
    //   data: [60,90,70,30,100,70]
    // }
  ]
};

var chartOptions = {
  responsive: true,
  scales: {
    yAxes: [
    {
      id: "bar-stack",
      position: "left",
      stacked: true,
      ticks: {
        beginAtZero: true
      }
    },
    
    {
      id: "line",
      position: "right",
      stacked: false,
      ticks: {
        beginAtZero: true
      },
      gridLines: {
        drawOnChartArea: false, 
      },
    }]
  }
}

window.onload = function() {
  var ctx = document.getElementById("canvas").getContext("2d");
  window.myBar = new Chart(ctx, {
    type: "bar",
    data: barChartData,
    options: chartOptions
  });
};

</script>
</body>
</html>