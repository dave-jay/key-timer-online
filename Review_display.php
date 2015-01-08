<?php

session_start();
include_once 'libs/Db.class.php';
$db = Db::__d();

$tabname = mysql_real_escape_string($_POST['tabname']);

$sql = "select * from review_history where R_id='{$_SESSION['recordid'] }' AND R_h_tabname='{$tabname}'";
$res = $db->query($sql);

$resultArray = $db->format_data($res);

$sql1 = "select * from review_log where R_id='{$_SESSION['recordid']}'";
$res1 = $db->query($sql1);
$user_info = $db->format_data($res1);

if ($_SESSION['recordid'] != '') {


    print "<div style='font-size: 16px;font-weight: bold;margin-bottom: 10px;'>" . $user_info[0]['R_fname'] . " " . $user_info[0]['R_lname'] . "'s {$tabname} Log</div>";
    print "<ul>";
    foreach ($resultArray as $each_result) {
//    print "<li>";
//    print $each_result['R_fname'];
//    print "</li>";
//    print "<li>";
//    print $each_result['R_tabname'];
//    print "</li>";
        print "<li>";
        print date('m/d/Y H:i:s', strtotime($each_result['R_h_date']));
        print "</li>";
        print "<li>";
        print $each_result['R_h_content'];
        print "</li>";
        if ($tabname != 'Practice Area') {
            if ($tabname == 'Alpha Timer') {
                $R_wpm = 'Total Characters';
            }
            if ($tabname == 'Words Per Minute') {
                $R_wpm = 'Words Per Minute';
            }

            print "<li>";
            print $each_result['R_h_time'] . ' seconds';
            print "</li>";
            print "<li>";
            print $each_result['R_h_wpm'] . ' ' . $R_wpm;
            print "</li>";
            print "<br>";
        }
    }
    print "</ul>";
}
die;
?>
