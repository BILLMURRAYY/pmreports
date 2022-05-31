<?php
require_once("../service/condb.php");
$member_id = $_POST['member_id'];
$prefix = $_POST['prefix']; //รับค่าไฟล์จากฟอร์ม	
$first_name = $_POST['f_name']; //รับค่าไฟล์จากฟอร์ม	
$last_name = $_POST['l_name']; //รับค่าไฟล์จากฟอร์ม	
$tel = $_POST['phone']; //รับค่าไฟล์จากฟอร์ม	
$fileupload = $_FILES['img']; //รับค่าไฟล์จากฟอร์ม	
$pass1 = $_POST['pass1']; //รับค่าไฟล์จากฟอร์ม
$pass2 = $_POST['pass2']; //รับค่าไฟล์จากฟอร์ม
$pass2 = md5($pass2);
if ($fileupload['size'] == 0) {
    $GLOBALS['sql'] = "UPDATE member SET
    prefix = '$prefix',
    first_name ='$first_name',
    last_name = '$last_name',
    tel = '$tel',
    password = '$pass2',
    img = '$newname'
    WHERE member_id = '$member_id'
    ";
} else {
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymd");
    //ฟังก์ชั่นสุ่มตัวเลข
    $numrand = (mt_rand());
    //โฟลเดอร์ที่จะ upload file เข้าไป 
    $path = "../../assets/images/";
    //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
    $type = strrchr($_FILES['img']['name'], ".");
    //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    $newname = $date . $numrand . $type;
    $path_copy = $path . $newname;
    $path_link = "m_Img/" . $newname;
    //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
    move_uploaded_file($_FILES['img']['tmp_name'], $path_copy);
    $GLOBALS['sql'] = "UPDATE member SET
    prefix = '$prefix',
    first_name ='$first_name',
    last_name = '$last_name',
    tel = '$tel',
    password = '$pass2',
    img = '$newname'
    WHERE member_id = '$member_id'
    ";
    $sql2 = "SELECT img FROM member WHERE member_id = $member_id";
    $result2 = mysqli_query($condb, $sql2) or die("Error in query: $sql2 ");
    $row = mysqli_fetch_array($result2);
    $rowname = $row['img']; //ฟิวที่ใว้เก็บชื่อรูปภาพในฐานข้อมูล			 
    $file = $path . $rowname;
    if (unlink($file)) {
        // echo ("deleted $file");
    } else {
        echo ("error");
    }
}
$result = mysqli_query($condb, $sql) or die("Error in query: $sql ");
mysqli_close($condb);
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
