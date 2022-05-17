<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

//1. เชื่อมต่อ database: 
require_once("../../condb.php");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$department = $_POST['department']; //รับค่าไฟล์จากฟอร์ม	
$level = $_POST['level']; //รับค่าไฟล์จากฟอร์ม	
$flow_report = $_POST['flow_report']; //รับค่าไฟล์จากฟอร์ม	
$flow_estimate = $_POST['flow_estimate']; //รับค่าไฟล์จากฟอร์ม	

$flow_report = implode(",",$flow_report);
$flow_estimate = implode(",",$flow_estimate);

// echo $flow_report;
// echo $flow_estimate;

// เพิ่มไฟล์เข้าไปในตาราง uploadfile

$sql = "INSERT INTO department
    (
    department_name,
    level,
    flow_report,
    flow_estimate
    ) 
    VALUES
    (
    
    '$department',
    '$level',
    '$flow_report',
    '$flow_estimate'
    )";

$result = mysqli_query($conndb, $sql) or die("Error in query: $sql ");

mysqli_close($condb);
// javascript แสดงการ upload file

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Upload File Succesfuly');";
    echo "window.location = 'department.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "</script>";
}
