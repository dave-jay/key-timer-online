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


    foreach ($resultArray as $each_result) {
        if ($each_result['R_h_content'] != '') {
            print "<table style='width:100%' cellspacing='0'>";
            print "<tr style=''>";
            print "<td style='border : 1px solid #BABABA;padding:3px;'>";
            print date('m/d/Y H:i:s', strtotime($each_result['R_h_date']));
            print"</td>";
            print "<td style='border : 1px solid #BABABA;padding:3px;text-align:right;'>" . $tabname . "</td>";
            print "</tr>";
            print "<tr style='width:100%'>";
            print "<td colspan='2' style='border : 1px solid #BABABA;padding:3px;'>" . nl2br($each_result['R_h_content']) . "</td>";
            print "</tr>";
            if ($each_result['R_h_tabname'] != 'Practice Area') {
                if ($each_result['R_h_tabname'] == 'Alpha Timer') {
                    $R_wpm = 'Total Characters';
                }
                if ($each_result['R_h_tabname'] == 'Words Per Minute') {
                    $R_wpm = 'Words Per Minute';
                }
                print "<tr style='width:100%'>";
                print "<td style=' border : 1px solid #BABABA;padding:3px;'>";
                print $each_result['R_h_time'] . ' seconds';
                print "</td>";
                print "<td style='border : 1px solid #BABABA;padding:3px;text-align:right;'>";
                print $each_result['R_h_wpm'] . ' ' . $R_wpm;
                print "</td>";
                print "</tr>";
            }
            print"</table>";
            print "<br>";
        }
    }
}

/*
  if ($_SESSION['recordid'] != '') {

  $tab_label = $tabname == "0" ? " All " : $tabname;
  print "<div style='font-size: 16px;font-weight: bold;margin-bottom: 10px;'>" . $user_info[0]['R_fname'] . " " . $user_info[0]['R_lname'] . "'s {$tab_label} Log</div>";
  print "<ul>";
  print "<table style='border : 1px solid black '>";
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

  print "<th>".date('m/d/Y H:i:s', strtotime($each_result['R_h_date']))."<th>"
  . "<th>hi<th>";
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
  print"<table>";
  }
  print "</ul>";
  }
 */
die;
?>
