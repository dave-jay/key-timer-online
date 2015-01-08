<div class="well tab1Content" >

    <div class="span12">
        <form class="form-horizontal">
            <textarea  spellcheck="false"  id="Practiceareatxt" rows="20" placeholder="" class="span12 txtareaPractice"></textarea>
        </form>
    </div>
    
    <div class="row-fluid">
        <div class="span8">
            Font Size:     <div class="btn-group">
                <button class="btn" onclick="txtSize('txtareaPractice','large',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Small</button>
                <button class="btn" onclick="txtSize('txtareaPractice','x-large',this)"><i class=" btIcon icon-ok" ></i>&nbsp;Medium</button>
                <button class="btn" onclick="txtSize('txtareaPractice','xx-large',this),this"><i class="none btIcon icon-ok" ></i>&nbsp;Large</button>
                <button class="btn" onclick="txtSize('txtareaPractice','40px',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Larger</button>
                <button class="btn" onclick="txtSize('txtareaPractice','100px',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Largest</button>
                <!--            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Custom
                                <span class="caret"></span>
                            </a>-->
            </div>
        </div>
        <div class="span4" style="text-align: right">
            <?php if (!isset($_SESSION['email']) || $_SESSION['email'] == '') { ?>
                <a data-controls-modal="modallogin" data-backdrop="static" data-keyboard="false" id="btnlogin" href="#modallogin" role="button" class="btn btn-info" data-toggle="modal" ><i class="icon-question-sign icon-white">&nbsp;</i>Login</a>
            <?php } ?>   
            <a href="#modalAboutPracticeTab" role="button" class="btn btn-info" data-toggle="modal" ><i class="icon-question-sign icon-white">&nbsp;</i> About</a>
            <a href="#modalReviewPracticeTab" onclick="practicecontent()" role="button" data-toggle="modal" class="btn btn-inverse"><i class="icon-print icon-white" >&nbsp;</i> Review Log</a>
        </div>
    </div>



    <div id="modalAboutPracticeTab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3 id="myModalLabel">About Practice Tab</h3>
        </div>
        <div class="modal-body">
            <p>
                This is practice tab. Feel free to write things here as you want
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
    <div id="modalReviewPracticeTab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3 id="myModalLabel">KEYTimer Log Viewer</h3>
        </div>
        <div class="modal-body" id="displaycontent">
            Please wait..


        </div>
        <div class="modal-footer">
            <!--            <button  class="btn" data-dismiss="modal" aria-hidden="true">ok</button>-->


            <div class="dropdown">
                <!--                  <button id="btnpracticereview" class="btn" aria-hidden="true" onclick="Getdatapractice()">Get Data</button>-->
                <select href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" onchange="changepracticetablog(this.value)" style="float:left;">
                    <option value="0">All</option>
                    <option value="Practice Area" selected="true"><a tabindex="-1" href="#">Practice Area</a></option>
                    <option value="Alpha Timer">Alpha Timer</a></option>
                    <option value="Words Per Minute">WPM</option>
                </select>
                <!--                <button  class="btn" data-dismiss="modal" aria-hidden="true" style="float:left;margin-left: 10px;">Print</button>-->
                <button  class="btn" onclick="PrintData('displaycontent')" style="float:left;margin-left: 10px;">Print</button>
                
            </div>
        </div>
    </div>
</div>