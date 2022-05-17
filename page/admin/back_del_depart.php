<?php
require_once("../../condb.php");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

// exit();
$id_depart = $_GET["id_depart"];
$sql = "DELETE FROM department
WHERE department_id = $id_depart ";
$query = mysqli_query($condb,$sql);

if(mysqli_affected_rows($condb)) {
echo "Record delete successfully";
}
mysqli_close($condb);
if ($query) {
    echo "<script type='text/javascript'>";
    echo "alert('Delete Succesfuly');";
    echo "window.location = 'department.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "</script>";
}

?>
