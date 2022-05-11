<?php

//1. เชื่อมต่อ database: 
require_once("../service/condb.php");
//ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
// $member_id = $_POST['member_id'];
echo "<pre>";
print_r($_POST);
echo "</pre>";
// exit();
$member_id = $_POST['member_id'];
$department_id = $_POST['department_id']; //รับค่าไฟล์จากฟอร์ม	
// $prefix = $_POST['prefix']; //รับค่าไฟล์จากฟอร์ม	
$name = $_POST['name']; //รับค่าไฟล์จากฟอร์ม	
// $last_name = $_POST['l_name']; //รับค่าไฟล์จากฟอร์ม	
$tel = $_POST['tel']; //รับค่าไฟล์จากฟอร์ม	
$username = $_POST['username']; //รับค่าไฟล์จากฟอร์ม	
$status = $_POST['status']; //รับค่าไฟล์จากฟอร์ม	
// $pass2 = $_POST['pass2']; //รับค่าไฟล์จากฟอร์ม
// $fileupload = $_FILES['img']; //รับค่าไฟล์จากฟอร์ม	
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

// if($fileupload['size'] == 0){
    // echo "don't add img";

    $GLOBALS['sql'] = "UPDATE member SET
    name ='$name',
    tel = '$tel',
    username = '$username',
    status = '$status',
    department_id = '$department_id'
    WHERE member_id = '$member_id'
    ";
// }else{
//     // echo 'add img';

//     date_default_timezone_set('Asia/Bangkok');
//     $date = date("Ymd");	
//     //ฟังก์ชั่นสุ่มตัวเลข
//     $numrand = (mt_rand());

//     //โฟลเดอร์ที่จะ upload file เข้าไป 
//     $path="../../assets/images/";  

//     //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
//     $type = strrchr($_FILES['img']['name'],".");
        
//     //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
//     $newname = $date.$numrand.$type;
//     $path_copy=$path.$newname;
//     $path_link="m_Img/".$newname;
    

//     //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
//     move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);  

//     $GLOBALS['sql'] = "UPDATE member SET
//     prefix = '$prefix',
//     first_name ='$first_name',
//     last_name = '$last_name',
//     tel = '$tel',
//     email = '$email',
//     img = '$newname',
//     department_id = '$department_id'
//     WHERE member_id = '$member_id'
//     ";
//     // echo $newname;

//     $sql2 = "SELECT img FROM member WHERE member_id = $member_id";

//     $result2 = mysqli_query($condb, $sql2) or die ("Error in query: $sql2 ");
//     $row = mysqli_fetch_array($result2);
//     $rowname =$row['img']; //ฟิวที่ใว้เก็บชื่อรูปภาพในฐานข้อมูล			 
//     $file=$path.$rowname;
//     if (unlink($file)){  
//     // echo ("deleted $file");
//     }else{
//     echo ("error");
//     }
// }
// exit();

// $sql = "UPDATE member SET
//     prefix = '$prefix',
//     first_name ='$first_name',
//     last_name = '$last_name',
//     tel = '$tel',
//     email = '$email',
//     department_id = '$department_id'
//     WHERE member_id = '$member_id'
//     ";
$check = "select * from member  where username = '$username' ";
$result1 = mysqli_query($condb,$check) or die("Error in query: $sql ");
$result_username = mysqli_fetch_array($result1);
$num = mysqli_num_rows($result1); 

if($num == 0){
$result = mysqli_query($condb, $sql) or die("Error in query: $sql ");
}elseif($result_username['username'] == $username && $result_username['member_id'] == $member_id){
    $result = mysqli_query($condb, $sql) or die("Error in query: $sql ");
}
elseif($num > 0)   		
        {
//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
// exit();
             echo "<script>";
			 echo "alert(' มีผู้ใช้ username นี้แล้ว กรุณาสมัครใหม่อีกครั้ง !');";
			 echo "window.location='edit_member.php?member_id=".$member_id."';";
          	 echo "</script>";
 
}
// else{

// }
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
