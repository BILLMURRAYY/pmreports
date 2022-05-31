<?php
session_start();
require_once("../service/condb.php");
$member_id = $_SESSION["member_id"];
echo $member_id;
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
$query = mysqli_query($condb, $sql);
$last_report_id = mysqli_insert_id($condb);
$sql2 = "INSERT INTO send_feedback
            (
                member_send_id,
                member_receive_id,
                feedback_id
            ) 
            VALUES
            (
            '$member_id',
            '$member_send_id',
            '$last_report_id'
            )";
$query2 = mysqli_query($condb, $sql2);
if (mysqli_affected_rows($condb)) {
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
