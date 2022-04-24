<?php //include '../service/check_login_page.php'; ?>
<?php
session_start();
require_once("../service/condb.php");
// echo "<pre>";
// print_R($_POST);
// echo "</pre>";
// exit();
//! id คนที่ประเมิน
$member_id = $_SESSION["member_id"];
// $member_id = 2;
// echo $member_id;
// $header_name = $_POST["header_name"];
$member_receive_id = $_POST["member_receive_id"];
$k1 = $_POST["k1"];
$k2 = $_POST["k2"];
$k3 = $_POST["k3"];
$m1 = $_POST["m1"];
$m2 = $_POST["m2"];
$m3 = $_POST["m3"];
$u1 = $_POST["u1"];
$u2 = $_POST["u2"];
$u3 = $_POST["u3"];
$t1 = $_POST["t1"];
$t2 = $_POST["t2"];
$t3 = $_POST["t3"];
$n1 = $_POST["n1"];
$n2 = $_POST["n2"];
$n3 = $_POST["n3"];
$b1 = $_POST["b1"];
$b2 = $_POST["b2"];
$b3 = $_POST["b3"];
$detail = $_POST["detail"];

// K
$K = [];
array_push($K, $k1);
array_push($K, $k2);
array_push($K, $k3);
// M
$M = [];
array_push($M, $m1);
array_push($M, $m2);
array_push($M, $m3);
// U
$U = [];
array_push($U, $u1);
array_push($U, $u2);
array_push($U, $u3);
// T
$T = [];
array_push($T, $t1);
array_push($T, $t2);
array_push($T, $t3);
// N
$N = [];
array_push($N, $n1);
array_push($N, $n2);
array_push($N, $n3);
// B
$B = [];
array_push($B, $b1);
array_push($B, $b2);
array_push($B, $b3);
// print_r($K);
// print_r($M);
// print_r($U);
// print_r($T);
// print_r($N);
// print_r($B);
$K = implode(",",$K);
$M = implode(",",$M);
$U = implode(",",$U);
$T = implode(",",$T);
$N = implode(",",$N);
$B = implode(",",$B);
// echo $K . "<br>";
// echo $M . "<br>";
// echo $U . "<br>";
// echo $T . "<br>";
// echo $N . "<br>";
// echo $B . "<br>";
// exit();
$sql = "INSERT INTO estimate
            (
            K,
            M,
            U,
            T,
            N,
            B,
            detail
            ) 
            VALUES
            (
            '$K',
            '$M',
            '$U',
            '$T',
            '$N',
            '$B',
            '$detail'
            )";
$query = mysqli_query($condb,$sql);

$last_estimate_id = mysqli_insert_id($condb);
// echo $sql;
// echo $last_estimate_id;
// exit();

$sql2 = "INSERT INTO send_estimate
            (
            member_send_id,
            member_receive_id,
            estimate_id
            ) 
            VALUES
            (
            '$member_id',
            '$member_receive_id',
            '$last_estimate_id'
            )";
$query2 = mysqli_query($condb,$sql2);

if(mysqli_affected_rows($condb)) {
echo "Estimate Successfully";
}
mysqli_close($condb);
if ($query) {
    // exit();
    echo "<script type='text/javascript'>";
    echo "alert('Succesfuly');";
    echo "window.location = 'history_estimate.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "</script>";
}
?>
