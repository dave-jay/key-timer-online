<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Timer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="libs/jquery.js"></script>
        <script src="libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="libs/timer.js"></script>
        <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="libs/counter_css.css" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function() {
<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] == '') {
    ?>
                    $('#btnlogin').click();
                    $('#btnlogin').hide();
<?php } ?>
            });
        </script>
    </head>
    <body>
        <div id="beep_sound"></div>
        <div id="modallogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!--            <div class="modal-header">
                            <button type="button" class="close show_focus" data-dismiss="modal" aria-hidden="true">X</button>
                        </div>-->
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Please Enter:</h4>
                    </div>
                    <div class="panel-body">
                        <label id="lblfname">First Name</label>
                        <input type="text" id="txtfname" name="txtfname" style="margin-bottom: 0px;"/> <span id="fname_msg" style="color:red;display: none;">Please Enter First Name</span>
                        <br/><br/>
                        <label id="lbllname">Last Name</label>
                        <input type="text" id="txtlname" name="txtlname" style="margin-bottom: 0px;"/> <span id="lname_msg" style="color:red;display: none;">Please Enter Last Name</span>
                        <br/><br/>
                        <label id="lbllname">Email</label>
                        <input type="text" id="txtemail" name="txtemail" style="margin-bottom: 0px;"/> <span id="email_msg" style="color:red;display: none;">Please Enter Email</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--            <button  class="btn" data-dismiss="modal" aria-hidden="true" onclick="practicecontent()">ok</button>-->
                <!--                <button  class="btn show_focus" data-dismiss="modal" aria-hidden="true" >ok</button>-->
                <button class="btn show_focus" id="LoginBtn">Ok</button>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" style="margin-bottom:0px">
                            <li class="active"><a onclick="stopTimers(), focuspracticeArea()" id="tabC1" href="#tab1" data-toggle="tab" style="background-color: #FFFF99;">Practice Area</a></li>
                            <li><a href="#tab2" onclick="stopTimers(), focusalphatimer()" id="tabC2" data-toggle="tab" style="background-color: #96CB7F;">Alpha Timer</a></li>
                            <li><a href="#tab3" onclick="stopTimers(), focuswpm()" id="tabC3" data-toggle="tab" style="background-color: #87CEFA;">Words Per Minute</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <?php include "practiceTab.php"; ?>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <?php include "alphaTab.php"; ?>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <?php include "wpmTab.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
