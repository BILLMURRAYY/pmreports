<?php
session_start();

//fetch.php;
// echo "GG";
// $_POST["view"] = $_GET["view"];
if(isset($_POST["view"]))
{
require_once("../service/condb.php");
//  include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE send_feedback SET status=1 WHERE status=0 AND member_receive_id = ".$_SESSION['member_id']."";
  mysqli_query($condb, $update_query);
 }
//  $query = "SELECT * FROM send_feedback ORDER BY send_feedback_id DESC LIMIT 5";
//  $result = mysqli_query($connect, $query);
//  $output = '';
 
//  if(mysqli_num_rows($result) > 0)
//  {
//   while($row = mysqli_fetch_array($result))
//   {
//    $output .= '
//    <li>
//     <a href="#">
//      <strong>'.$row["comment_subject"].'</strong><br />
//      <small><em>'.$row["comment_text"].'</em></small>
//     </a>
//    </li>
//    <li class="divider"></li>
//    ';
//   }
//  }
//  else
//  {
//   $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
//  }
 
 $query_1 = "SELECT * FROM send_feedback WHERE status=0 AND member_receive_id = ".$_SESSION['member_id']."";
 $result_1 = mysqli_query($condb, $query_1);
 $count = mysqli_num_rows($result_1);
//  print_r($count);
 $data = array(
//   'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>