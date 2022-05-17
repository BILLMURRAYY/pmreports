<?php
session_start();
require_once("../service/condb.php");
echo "<pre>";
print_R($_POST);
echo "</pre>";

$member_id = $_SESSION["member_id"];
echo $member_id;
$send_report_id = $_POST["send_report_id"];
$member_send_id = $_POST["member_send_id"];
$header_name = $_POST["header_name"];
$detail = $_POST["detail"];
$sql = "INSERT INTO feedback
            (
            header,
            detail
            ) 
            VALUES
            (
            '$header_name',
            '$detail'
            )";
$query = mysqli_query($condb,$sql);

$last_report_id = mysqli_insert_id($condb);

// exit();

$sql2 = "INSERT INTO send_feedback
            (
                member_send_id,
                member_receive_id,
                sf_sent_report_id,
                feedback_id
            ) 
            VALUES
            (
            '$member_id',
            '$member_send_id',
            '$send_report_id',
            '$last_report_id'
            )";
$query2 = mysqli_query($condb,$sql2);

if(mysqli_affected_rows($condb)) {
echo "Record delete successfully";
}
mysqli_close($condb);
if ($query) {
    echo "<script type='text/javascript'>";
    echo "alert('Delete Succesfuly');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "</script>";
}