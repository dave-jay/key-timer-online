<div class="well tab2Content" > 

    <div class="span12">
        <form class="form-horizontal">
            <!--            <div class="alert alert-block alphaHelp ">
                             Click on "Start Timer" or <strong>space bar </strong> to start counting WPM!!!
                        </div>-->
            <!--            <div class="alert alert-info alphaStop none">
                            Tap <strong>(Esc or Tab)</strong> to stop timer!!!
                            Click on <strong>(Esc or Tab)</strong> to abort timer!!!
            
                        </div>-->
            <!--            <div class="alert alert-error alphaError none">
                            <strong>Oh!</strong> Nothing was typed.
                        </div>-->
            <textarea  spellcheck="false" id="txtcontent" rows="20" placeholder="" class=" span12 txtareaAlpha"></textarea>
        </form>
    </div>

    <div class="row-fluid">
        <div class="span5 alphaControls" >
            Font Size: <div class="btn-group">
                <button class="btn" onclick="txtSize('txtareaAlpha','large',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Small</button>
                <button class="btn" onclick="txtSize('txtareaAlpha','x-large',this)"><i class=" btIcon icon-ok" ></i>&nbsp;Medium</button>
                <button class="btn" onclick="txtSize('txtareaAlpha','xx-large',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Large</button>
                <button class="btn" onclick="txtSize('txtareaAlpha','40px',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Larger</button>
                <button class="btn" onclick="txtSize('txtareaAlpha','100px',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Largest</button>
                <!--            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Custom
                                <span class="caret"></span>
                            </a>-->
            </div>
        </div>

        <div class="span3" style="text-align: left">
            <div class="none" id="alphaStop">
                <button class="btn btn-danger" onclick="stopAlphaTimer()"><i class="icon-pause icon-white" >&nbsp;</i>&nbsp;Stop Timer</button>
                <button class="btn" ><i class="none btIcon icon-ok" ></i>&nbsp;Seconds: <span id="Atime" class="badge badge-warning alphaTimerSeconds">0</span></button>
            </div>

            <div id="alphaStart" style="width: 320px;">
                <button class="btn btn-success" onclick="startAlphaTimer()"><i class="icon-forward icon-white" >&nbsp;</i>&nbsp;Start Timer</button>
                <button class="btn" ><i class="none btIcon icon-ok" ></i>&nbsp;Total Characters: <span id="wpmcount" class="badge badge-important alphaWPM">0</span></button>
            </div>

        </div>
        <div class="span4 alphaControls" style="text-align: right">
            <a href="#modalAboutAlphaTab" role="button" class="btn btn-info" data-toggle="modal" ><i class="icon-question-sign icon-white">&nbsp;</i> About</a>
            <a href="#modalReviewAlphaTab" onclick="GetdataAlpha()" role="button" data-toggle="modal" class="btn btn-inverse"><i class="icon-print icon-white" >&nbsp;</i> Review Log</a>
        </div>
    </div>

    <div id="modalAboutAlphaTab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3 id="myModalLabel">About Alpha Timer</h3>
        </div>
        <div class="modal-body" >
            <p>
                The Alpha Timer measures elapsed time like in a stop watch
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
    <div id="modalReviewAlphaTab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3 id="myModalLabel">KEYTimer Log Viewer</h3>
        </div>
        <div class="modal-body" id="displayalphacontent">



        </div>
        <div class="modal-footer">
            <!--            <button class="btn" data-dismiss="modal" aria-hidden="true">ok</button>-->

            <div class="dropdown">
                <!--                <button  id="btnalphareview" class="btn" aria-hidden="true" onclick="GetdataAlpha()">Get Data</button>-->
                <select href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" onchange="changealphatablog(this.value)" style="float:left;">
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <option value="0"><a tabindex="-1" href="#">All</a></option>
                        <option value="Practice Area"><a tabindex="-1" href="#">Practice Area</a></option>
                        <option value="Alpha Timer" selected="true"><a tabindex="-1" href="#">Alpha Timer</a></option>
                        <option value="Words Per Minute"><a tabindex="-1" href="#">WPM</a></option>
                    </ul>
                </select>
                <button class="btn" onclick="PrintData('displayalphacontent')" style="float:left;margin-left: 10px;">Print</button>  
            </div>

        </div>
    </div>


</div>
<div id="check_startALPHAtimer" style="display:none;"></div>
<audio id="alpha_beep_audio_old" src="beep-8.wav" controls preload style="display: none;"></audio>
<audio id="alpha_beep_audio_old1" src="beep-07.wav" controls preload style="display: none;"></audio>
<audio id="alpha_beep_audio" src="beep-3.wav" controls preload style="display: none;"></audio>

