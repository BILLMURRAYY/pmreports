<!DOCTYPE html>
<html lang="en">
    <head>
         <!-- SweetAlert2 -->
    <script src="../assets/bootstrap/template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/template/plugins/sweetalert2/sweetalert2.min.css">
    </head>
    <body>
        
    
<?php
session_start();
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
//! ปิดแสดง Error   
error_reporting(0);

require_once("../page/service/condb.php");


// $email = $_POST['email'];
// $pass = $_POST['password'];

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$username = $_POST['username'];
$password = $_POST['password'];
// $password = md5($password);
$sql = "SELECT * FROM login 
    WHERE  username = '" . $username . "' AND password = '" . $password . "' ";
// echo $sql;
$result = mysqli_query($condb, $sql) or die("Error in query: $sql ");
$row = mysqli_fetch_array($result);

// exit();
echo "<script>";
echo "const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })";
echo "</script>";
if ($username == $row["username"] and $password == $row["password"]) {

    // $_SESSION["level"] = $row["level"];
    // $_SESSION["member_id"] = $row["member_id"];
    $_SESSION["member_name"] = 'admin';
    $_SESSION["check_login"] = 1;
    // $_SESSION["department_id"] = $row["department_id"];
    // $_SESSION["department_name"] = $row["department_name"];
    // $_SESSION["m_Img"] = $row["m_Img"];
    //! Check $_SESSION
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    // echo $_SESSION["Email"];
    // echo $_SESSION["Name"];
    // echo $_SESSION["Department"];
    // exit();

    // echo "<script>";
    // echo "window.location.href = '../page/admin/';";
    // echo "</script>";

    // echo "<script>";
    // echo "Toast.fire({
    //     icon: 'success',
    //     title: 'Signed in successfully'
    //     }).then((result)=>{
    //         if(result){
    //         window.location.href = '../page/admin/';
    //         }
    //     })";
    // echo "</script>";

    // if ($_SESSION["level"] == "admin") {
        header("Location: ../page/admin/");
    // } 
} else {
    // echo "hi";
    // exit();
    echo "<script>";
    echo "alert('username หรือ Password ไม่ถูกต้อง !!!');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    // header("Location: admin.php");
}
?>
</body>