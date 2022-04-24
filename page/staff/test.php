<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>View Detail Estimate</h1>

<?php include 'nav.php'; ?>
<hr>
<section>
    <?php
    $estimate_id = $_GET['feedback_id'];
    $member_send_name = $_GET['member_send_name'];
    $member_receive_id = $_GET['member_receive_id'];
    // $member_send_id = $_GET['member_send_id'];
    echo "<pre>";
    print_R($_GET);
    echo "</pre>";
    // exit();

    ?>
    <h1><?php echo $member_send_name ?></h1>

    <?php
    // $report_id = explode(",", $report_id);
    // echo "<per>";
    // print_r ($id_report);
    // echo "</per>";
    // foreach ($report_id as $value) {
        $result = "SELECT * FROM estimate WHERE estimate_id = $estimate_id";
        $query = mysqli_query($conn, $result);
        $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
        // echo "<pre>";
        // print_R($rows);
        // echo "</pre>";

        foreach ($rows as $values) {
    ?>

        <div style="border: solid 1px; padding:10px; margin:3px;">
        <h3>K : <?php echo $values['K']; ?></h3>
        <h3>M : <?php echo $values['M']; ?></h3>
        <h3>U : <?php echo $values['U']; ?></h3>
        <h3>T : <?php echo $values['T']; ?></h3>
        <h3>N : <?php echo $values['N']; ?></h3>
        <h3>B : <?php echo $values['B']; ?></h3>
        <p>Detail : <?php echo $values['detail']; ?></p>
        <!-- <p>Date :<?php //echo $values['date']; ?></p> -->

        </div>



    <?php }
//} 
?>

</section>
</body>

</html>