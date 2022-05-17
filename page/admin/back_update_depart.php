<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
//1. เชื่อมต่อ database: 
require_once("../service/condb.php");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$department_id = $_POST['department_id'];
$department_name = $_POST['department_name']; //รับค่าไฟล์จากฟอร์ม	
$level = $_POST['level']; //รับค่าไฟล์จากฟอร์ม	
$flow_report = $_POST['flow_report'];
$flow_estimate = $_POST['flow_estimate'];
if(!isset($flow_report)){
    $flow_report='';
}else{
    $flow_report = implode(",",$flow_report);
}
if(!isset($flow_estimate)){
    $flow_estimate='';
}else{
    $flow_estimate = implode(",",$flow_estimate);
}

$sql = "UPDATE department SET
    department_name ='$department_name',
    level = '$level',
    flow_report = '$flow_report',
    flow_estimate = '$flow_estimate'
    WHERE department_id = $department_id
    ";

$check = "select * from department  where department_name = '$department_name' ";
$result1 = mysqli_query($condb,$check) or die("Error in query: $check ");
$result_depart = mysqli_fetch_array($result1);
$num = mysqli_num_rows($result1); 

if($num == 0){
$result = mysqli_query($condb, $sql) or die("Error in query: $sql ");
}elseif($result_depart['department_name'] == $department_name && $result_depart['department_id'] == $department_id){
    $result = mysqli_query($condb, $sql) or die("Error in query: $sql ");
}
elseif($num > 0)   		
        {
//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
        echo "<script>";
        echo "alert(' มีผู้ใช้ department นี้แล้ว กรุณากรอกใหม่อีกครั้ง !');";
        echo "window.location='edit_depart.php?department_id=".$department_id."'";
        echo "</script>";
 
}
// else{


// $result = mysqli_query($conn, $sql) or die("Error in query: $sql ");
// }
mysqli_close($condb);
// javascript แสดงการ upload file

if ($result) {
    // exit();
    echo "<script type='text/javascript'>";
    echo "alert('Update Succesfuly');";
    echo "window.location = 'department.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to update again');";
    echo "</script>";
}
