<?php

//1. เชื่อมต่อ database: 
require_once("../service/condb.php");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$member_id = $_POST['member_id'];
// $depart = $_POST['id_depart']; //รับค่าไฟล์จากฟอร์ม	
// $prefix = $_POST['prefix']; //รับค่าไฟล์จากฟอร์ม	
// $f_name = $_POST['f_name']; //รับค่าไฟล์จากฟอร์ม	
// $l_name = $_POST['l_name']; //รับค่าไฟล์จากฟอร์ม	
// $phone = $_POST['phone']; //รับค่าไฟล์จากฟอร์ม	
// $email = $_POST['email']; //รับค่าไฟล์จากฟอร์ม	
$pass1 = $_POST['pass1']; //รับค่าไฟล์จากฟอร์ม	
$pass2 = $_POST['pass2']; //รับค่าไฟล์จากฟอร์ม
$pass2 =md5($pass2);
// $fileupload = $_FILES['m_Img']; //รับค่าไฟล์จากฟอร์ม	
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$sql = "UPDATE member SET
    password = '$pass2'
    WHERE member_id = '$member_id'
    ";

$result = mysqli_query($condb, $sql) or die("Error in query: $sql ");

mysqli_close($condb);
// javascript แสดงการ upload file

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Upload File Succesfuly');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "</script>";
}
