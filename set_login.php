<?php 
session_start();
include_once 'libs/Db.class.php';
$db = Db::__d();

if(isset($_REQUEST['setLogin']) && $_REQUEST['setLogin'] != ''){
    if($_REQUEST['txtfname'] != '' && $_REQUEST['txtlname'] != '' && $_REQUEST['txtemail'] != ''){
       $_SESSION['fname'] = trim($_REQUEST['txtfname']);
       $_SESSION['lname'] = trim($_REQUEST['txtlname']);
       $_SESSION['email'] = trim($_REQUEST['txtemail']);
       echo "success";
       die;
    }
}

?>