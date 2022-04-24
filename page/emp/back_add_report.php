<?php
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";


require_once("../service/condb.php"); 


// !!!! กำหนด session
$member_id = 3;
$department_id = 3;

// $header = ['header_0','header_1','header_2','header_3','header_4','header_5'];
// $detail = ['detail_0','detail_1','detail_2','detail_3','detail_4','detail_5'];
// $place = ['place_0','place_1','place_2','place_3','place_4','place_5'];
// $succ = ['50','60','70','80','90','100'];
// $s_range = ['2022-04-01','2022-04-01','2022-04-01','2022-04-01','2022-04-01','2022-04-01'];
// $e_range = ['2022-04-05','2022-04-05','2022-04-05','2022-04-05','2022-04-05','2022-04-05'];
// $file = ['file_0','file_1','file_2','file_3','file_4','file_5'];
// $problem = ['problem_0','problem_1','problem_2','problem_3','problem_4','problem_5'];

$header = $_POST['header'];
$detail = $_POST['detail'];
$workplace = $_POST['workplace'];
$success = $_POST['success'];
$start_range = $_POST['start_range'];
$end_range = $_POST['end_range'];
$file = $_FILES['file'];
$problem = $_POST['problem'];

// echo $_FILES['file'];

//!!! CHECK FILE
if(isset($file)) {
    $errors     = array();
    $value_file = 1;
    $maxsize    = 4194304;
    // $maxsize    = 2097152;
    // $maxsize    = 97152;
    // $maxsize    = 300;
    $acceptable = array(
        'application/pdf'
        // 'image/jpeg',
        // 'image/jpg',
        // 'image/gif',
        // 'image/png'
    );
// || ($_FILES["file"]["size"] == 0)
    if(($_FILES['file']['size'] >= $maxsize) ) {
        $errors[] = 'File too large. File must be less than 4 megabytes.';
        
        // echo "<script>";
        //     echo "history.back(); ";
        // echo "</script>";
    }
    if($_FILES["file"]["size"] == 0){
        $value_file = 0;
    }

    if((!in_array($_FILES['file']['type'], $acceptable)) && (!empty($_FILES["file"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF types are accepted.';
        // echo "<script>";
        //     // echo "alert(' มีผู้ใช้ username นี้แล้ว กรุณาสมัครใหม่อีกครั้ง !');";
        //     echo "window.location='form_report.php';";
        // echo "</script>";
        // die();
    }

    if(count($errors) === 0 && $value_file == 1) {
            //ฟังก์ชั่นวันที่
            date_default_timezone_set('Asia/Bangkok');
            $date = date("Ymd");	
            //ฟังก์ชั่นสุ่มตัวเลข
            $numrand = (mt_rand());
        
            //โฟลเดอร์ที่จะ upload file เข้าไป 
            $path="../../assets/images/";  
        
            //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
            $type = strrchr($_FILES['file']['name'],".");
                
            //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
            $newname = $date.$numrand.$type;
            $path_copy=$path.$newname;
            $path_link="m_Img/".$newname;
            $GLOBALS['newnames'] = $newname;
        
            //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
            move_uploaded_file($_FILES['file']['tmp_name'],$path_copy);  	
        
        // move_uploaded_file($_FILES['gile']['tmpname'], '/store/to/location.file');
    }elseif($value_file == 0){
        $GLOBALS['newnames'] = '';

    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
            echo "<script>";
            // echo "alert(' มีผู้ใช้ username นี้แล้ว กรุณาสมัครใหม่อีกครั้ง !');";
            echo "window.location='form_report.php';";
              echo "</script>";
        }

        die(); //Ensure no more processing is done
    }
}
//! END CHECK FILE
// echo $newnames;
// exit();

$report_id = [];
// $name_img = array('0');
for($x = 0; $x < count($header); $x++){

    

    // exit();

    $sql = "INSERT INTO report
    (
        header,
        detail,
        workplace,
        success,
        working_range_start,
        working_range_end,
        problem
    
    )
    VALUES
    (
        '$header[$x]',
        '$detail[$x]',
        '$workplace[$x]',
        '$success[$x]',
        '$start_range[$x]',
        '$end_range[$x]',
        '$problem[$x]'
    
    )
    ";
    // echo $sql . "<br>";
    // echo $name_img[$x] . "<br>";
    // !
    $query = mysqli_query($condb,$sql);
    $last_report_id = mysqli_insert_id($condb);
    array_push($report_id, $last_report_id);

//  echo $header[$x] . "<br>";
//  echo $detail[$x] . "<br>";
//  echo $place[$x] . "<br>";
//  echo $succ[$x] . "<br>";
//  echo $s_range[$x] . "<br>";
//  echo $e_range[$x] . "<br>";
//  echo $file[$x] . "<br>";
//  echo $problem[$x] . "<br>";
//  echo "-------------- <br>";
//  echo "<br>";
//  echo $sql;
}


// exit();

// !
$report_id = implode(",",$report_id);
$sql2 = "SELECT flow_report FROM department WHERE department_id = $department_id";
$query2 = mysqli_query($condb,$sql2);

foreach($query2 as $value){

    $values = $value['flow_report'];
    $sql3 = "INSERT INTO send_report
    (
        member_send_id,
        department_receive,
        file,
        report_id
    ) 
    VALUES
    (
    '$member_id',
    '$values',
    '$newname',
    '$report_id'
    )";
    $query3 = mysqli_query($condb,$sql3);

}

if ($query2) {
    echo "<script type='text/javascript'>";
    echo "alert('Upload File Succesfuly');";
    echo "window.location = 'report.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "</script>";
}