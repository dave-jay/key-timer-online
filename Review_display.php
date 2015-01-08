<?php

session_start();
include_once 'libs/Db.class.php';
$db = Db::__d();



$tabname = mysql_real_escape_string($_POST['tabname']);

$tab_where = $tabname == "0" ? "  " : "  AND R_h_tabname='{$tabname}' ";

$sql = "select * from review_history where R_id='{$_SESSION['recordid'] }' {$tab_where}  ";
$res = $db->query($sql);

$resultArray = $db->format_data($res);

$sql1 = "select * from review_log where R_id='{$_SESSION['recordid']}'";
$res1 = $db->query($sql1);
$user_info = $db->format_data($res1);

if ($_SESSION['recordid'] != '') {

    $tab_label = $tabname == "0" ? " All " : $tabname;
    print "<div style='font-size: 16px;font-weight: bold;margin-bottom: 10px;'>" . $user_info[0]['R_fname'] . " " . $user_info[0]['R_lname'] . "'s {$tab_label} Log</div>";
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
        if ($each_result['R_h_tabname'] != 'Practice Area') {
            if ($each_result['R_h_tabname'] == 'Alpha Timer') {
                $R_wpm = 'Total Characters';
            }
            if ($each_result['R_h_tabname'] == 'Words Per Minute') {
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
