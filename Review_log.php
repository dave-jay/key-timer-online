<?php

session_start();
include_once 'libs/Db.class.php';
$db = Db::__d();

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$current_date = date("Y-m-d H:i:s");

$tabname = mysql_real_escape_string($_POST['tabname']);
$content = mysql_real_escape_string($_POST['content']);
if (isset($_REQUEST['time']) && $_REQUEST['time'] != '') {
    $time = mysql_real_escape_string($_POST['time']);
} else {
    $time = '';
}

if (isset($_REQUEST['wpm']) && $_REQUEST['wpm'] != '') {
    $wpm = mysql_real_escape_string($_POST['wpm']);
} else {
    $wpm = '';
}

$R_id = 0;

//$check_record = "SELECT R_id FROM `review_log` WHERE R_email = '" . $email . "' AND R_tabname = '" . $tabname . "'";
$check_record = "SELECT R_id FROM `review_log` WHERE R_email = '" . $email . "'";
$res = $db->query($check_record);
$check_res = $db->format_data($res);
$R_id = 0;
if (!empty($check_res)) {
    $R_id = $check_res[0]['R_id'];
}


if ($R_id > 0 && $_SESSION['recordid'] != '') {

//$sql = "UPDATE review_log SET R_content = '" . $content . "',R_time = '" . $time . "',R_wpm = '" . $wpm . "' WHERE R_email = '" . $email . "' AND R_tabname = '" . $tabname . "'";
    $sql = "INSERT INTO `review_history` (`R_h_id`,R_id, `R_h_tabname`, `R_h_content`, `R_h_time`,`R_h_wpm`,`R_h_date`) VALUES (NULL, '{$_SESSION['recordid']}','{$tabname}', '{$content}', '{$time}', '{$wpm}','{$current_date}')";
    $res = $db->query($sql);
} else {
    // $sql = "INSERT INTO `review_log` (`R_id`, `R_fname`, `R_lname`, `R_email`, `R_tabname`, `R_content`, `R_time`, `R_wpm`) VALUES (NULL, '{$fname}', '{$lname}','{$email}', '{$tabname}', '{$content}', '{$time}', '{$wpm}');";
    $sql = "INSERT INTO `review_log` (`R_id`, `R_fname`, `R_lname`, `R_email`) VALUES (NULL, '{$fname}', '{$lname}','{$email}')";
    $res = $db->query($sql);
    $recordid = mysql_insert_id();
    $_SESSION['recordid'] = $recordid;
    echo $recordid;
    $sql = "INSERT INTO `review_history` (`R_h_id`,R_id, `R_h_tabname`, `R_h_content`, `R_h_time`,`R_h_wpm`,,`R_h_date`) VALUES (NULL, '{$_SESSION['recordid']}','{$tabname}', '{$content}', '{$time}', '{$wpm}','{$current_date}')";
    $res = $db->query($sql);
}
die;
?>