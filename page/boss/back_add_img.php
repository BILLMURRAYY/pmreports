<?php
require_once("../service/condb.php");
// $fileName = mktime(date('H'), date('i'), date('s'),date('m'), date('d'), date('Y')).'.jpg';
// // echo $fileName;

// date_default_timezone_set('Asia/Bangkok');
// $date = date("Ymd");	
// //ฟังก์ชั่นสุ่มตัวเลข
// $numrand = (mt_rand());

// $path="../../assets/img/";  

// //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
// $type = strrchr($_FILES['file']['name'],".");
    
// //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
// $newname = $date.$numrand.$type;
// $path_copy=$path.$newname;
// $path_link="m_Img/".$newname;

// echo $newname . "<br>";
// echo $path_copy . "<br>";
// echo $path_link . "<br>";
// echo $_FILES['file']['tmp_name'];
// move_uploaded_file($_FILES['file']['tmp_name'],$path_copy);  
echo "<pre>";
// print_r($_POST);
print_r($_FILES);
echo "</pre>";
exit();

$file = $_FILES['file'];

if(isset($file)) {
    $errors     = array();
    $maxsize    = 4194304;
    // $maxsize    = 2097152;
    // $maxsize    = 97152;
    $acceptable = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
        $errors[] = 'File too large. File must be less than 2 megabytes.';
        // echo "<script>";
        //     echo "history.back(); ";
        // echo "</script>";
    }

    if((!in_array($_FILES['file']['type'], $acceptable)) && (!empty($_FILES["file"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
            //ฟังก์ชั่นวันที่
            date_default_timezone_set('Asia/Bangkok');
            $date = date("Ymd");	
            //ฟังก์ชั่นสุ่มตัวเลข
            $numrand = (mt_rand());
        
            //โฟลเดอร์ที่จะ upload file เข้าไป 
            $path="../../assets/img/";  
        
            //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
            $type = strrchr($_FILES['file']['name'],".");
                
            //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
            $newname = $date.$numrand.$type;
            $path_copy=$path.$newname;
            $path_link="m_Img/".$newname;
        
            //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
            move_uploaded_file($_FILES['file']['tmp_name'],$path_copy);  	
        
        // move_uploaded_file($_FILES['gile']['tmpname'], '/store/to/location.file');
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }

        die(); //Ensure no more processing is done
    }
}
?>