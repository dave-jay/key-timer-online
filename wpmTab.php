<div class="well tab3Content" > 

    <div class="span12">
        <form class="form-horizontal">
            <!--            <div class="alert alert-block WPMHelp ">
                            <strong>Welcome!</strong> Click on "Start Timer" to start counting WPM!!!
                        </div>-->
            <!--            <div class="alert alert-info WPMStop none">
                            <strong>Shoot!</strong> Start typing now!!!
                        </div>-->
            <!--            <div class="alert alert-info WPMStop none">
                            Tap <strong>(Esc or Tab)</strong> to stop timer!!!
                            Click on <strong>(Esc or Tab)</strong> to abort timer!!!
            
                        </div>-->

            <!--            <div class="alert alert-error WPMError none">
                            <strong>Oh!</strong> Nothing was typed. We are unable to count WPM for you.
                        </div>-->
            <textarea  spellcheck="false" id="txtwpm" rows="20" placeholder="" class="span12 txtareaWPM"></textarea>
        </form>
    </div>

    <div class="row-fluid">
        <div class="span5 WPMControls" >
            Font Size: <div class="btn-group">
                <button class="btn" onclick="txtSize('txtareaWPM','large',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Small</button>
                <button class="btn" onclick="txtSize('txtareaWPM','x-large',this)"><i class=" btIcon icon-ok" ></i>&nbsp;Medium</button>
                <button class="btn" onclick="txtSize('txtareaWPM','xx-large',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Large</button>
                <button class="btn" onclick="txtSize('txtareaWPM','40px',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Larger</button>
                <button class="btn" onclick="txtSize('txtareaWPM','100px',this)"><i class="none btIcon icon-ok" ></i>&nbsp;Largest</button>
                <!--            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Custom
                                <span class="caret"></span>
                            </a>-->
            </div>
        </div>

        <div class="span3" style="text-align: left">
            <div class="none" id="WPMStop">
                <button class="btn btn-danger" onclick="stopWPMTimer()"><i class="icon-pause icon-white" >&nbsp;</i>&nbsp;Stop Timer</button>
                <button class="btn" ><i class="none btIcon icon-ok" ></i>&nbsp;Seconds: <span id="wtime" class="badge badge-warning WPMTimerSeconds">0</span></button>

            </div>

            <div id="WPMStart">
                <button class="btn btn-success" onclick="startWPMTimer()"><i class="icon-forward icon-white" >&nbsp;</i>&nbsp;Start Timer</button>
                <button class="btn" ><i class="none btIcon icon-ok" ></i>&nbsp;Words Per Minute: <span id="wpmcount1" class="badge badge-important WPMWPM">0</span></button>
            </div>

        </div>
        <div class="span4 WPMControls" style="text-align: right">
            <a href="#modalAboutWPMTab" role="button" class="btn btn-info" data-toggle="modal" ><i class="icon-question-sign icon-white">&nbsp;</i> About</a>
            <a  href="#modalReviewWPMTab" onclick="GetdataWpm()" role="button" data-toggle="modal" class="btn btn-inverse"><i class="icon-print icon-white" >&nbsp;</i> Review Log</a>
        </div>
    </div>
    <div class="row-fluid WPMStop " style="margin-top:20px">
        <div class="span3"></div>
        <div class="span6">
            <div class="progress progress-striped active">
                <div class="bar" style="width: 0%;"></div>
            </div>
        </div>
        <div class="span3"></div>
    </div>
    <div class="row-fluid WPMStop " style="">
        <div class="span3"></div>
        <div class="span6">
            <div style="float:left"><i class="icon-time"></i>&nbsp;Start</div>
            <div style="float:right">Finish&nbsp;<i class="icon-flag"></i></div>
        </div>
        <div class="span3"></div>
    </div>

    <div id="modalAboutWPMTab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3 id="myModalLabel">About WPM Tab</h3>
        </div>
        <div class="modal-body">
            <p>
                Use this area to measure your WPM
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
    <div id="modalReviewWPMTab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3 id="myModalLabel">KEYTimer Log Viewer</h3>
        </div>
        <div class="modal-body" id="displaywpmcontent">

        </div>
        <div class="modal-footer">
            <!--            <button class="btn" data-dismiss="modal" aria-hidden="true">ok</button>-->

            <div class="dropdown">
                <!--                <button id="btnwpmreview" class="btn" aria-hidden="true" onclick="GetdataWpm()">Get Data</button>-->
                <select href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" onchange="changewpmtablog(this.value)" style="float:left;">
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <option value="0"><a tabindex="-1" href="#">All</a></option>
                        <option value="Practice Area"><a tabindex="-1" href="#">Practice Area</a></option>
                        <option value="Alpha Timer"><a tabindex="-1" href="#">Alpha Timer</a></option>
                        <option value="Words Per Minute" selected="true"><a tabindex="-1" href="#">WPM</a></option>
                    </ul>
                </select>
                <button class="btn" onclick="PrintData('displaywpmcontent')" style="float:left;margin-left: 10px;">Print</button> 
            </div>

        </div>
    </div>
</div>
<div id="check_startWPMTimer" style="display:none;"></div>
<audio id="wpm_beep_audio_old" src="beep-8.wav" controls preload style="display: none;"></audio>
<audio id="wpm_beep_audio" src="beep-3.wav" controls preload style="display: none;"></audio>
<script type="text/javascript">
    


    var WPMTimerInterval;
    var WPMTimerCount = 0;
    var WPMTimerCount_2 = 0;
     
    function startWPMTimer(id){
        $("#check_startWPMTimer").html('1');
        WPMTimerCount = 0;
        WPMTimerCount_2 = 0;
        $(".WPMError,.WPMHelp").hide();
        $("#WPMStop,.WPMStop").show();
        $("#WPMStart").hide();
        if(id > 0){
            
        } else {
            $(".txtareaWPM").focus().val('');
        }
        $("body").css({
            //            backgroundColor:"black"
        });
        $(".WPMControls").css({
            opacity:0.1
        });
       
        var txtwpm_timer = 1;
        //$(".txtareaWPM").keydown(function(e){          
        if(txtwpm_timer == 1)
        {
            txtwpm_timer = 0;
            WPMTimerInterval = setInterval(function(){
                WPMTimerCount = WPMTimerCount + 1;
                WPMTimerCount_2 = WPMTimerCount_2 + 1;
                $(".WPMTimerSeconds").html(WPMTimerCount);
                var widthPer = ( 100 * WPMTimerCount ) / 60;
                var widthPer_2 = ( 100 * WPMTimerCount_2 ) / 60;
                $(".bar").css({width:widthPer_2+"%"})
                    
                if((WPMTimerCount_2) % 60 == 0){
                    //stopWPMTimer();
                    WPMTimerCount_2 = 0;
                    $(".bar").css({width:"0%"})
                    //startWPMTimer(1);
                    var round_beep = (WPMTimerCount/60);
                    var dotCounter = 0;
                    (function BeepStart() {
                        setTimeout(function() {
                            //if (dotCounter++ < round_beep) {
                            WpmBeepSound(round_beep);
                            //BeepStart();
                            //}
                        }, 10);
                    })();
                }
            },1000);
        }
        //});
         
     
                
    }
    
    function WpmBeepSound(round_beep){
        var beep_counter = 1;
        var time_interval = parseInt(500/round_beep) + parseInt(500);
        setInterval(function(){
            if(beep_counter <= round_beep){
                $("#wpm_beep_audio")[0].play();
                beep_counter++;
            }
        },time_interval);
    }
     
    function BeepSound(round_beep){
        var beep_counter = 1;
        setInterval(function(){
            if(beep_counter <= round_beep){
                $("#wpm_beep_audio")[0].play();
                beep_counter++;
            }
        },1000);
    }
    function getwmessage()
    {
        var currentVal = $("#txtwpm").val();
        var count=$("#wpmcount1").html();
        var time=$("#wtime").html();
        if(time>60)
        {
            var wpm_display_format = '';
            var wpm_minute = parseInt(time/60);
            var wpm_seconds = (time%60);
            if(wpm_minute > 0){
                wpm_display_format+=" Minute :"+wpm_minute;
            } 
                
            wpm_display_format+=" Seconds :"+wpm_seconds;
            
            var  newval = currentVal + "\n" + "\n" + "\n" + "\n" + "Timer Stopped After"+wpm_display_format; 
        }
        else{
            var  newval = currentVal + "\n" + "\n" + "\n" + "\n" + "Timer Stopped Before 1 Minute  (" +time+ "  Seconds)";
        }
       

        $("#txtwpm").val(newval);
    }
    function getwendmessage()
    {
        var currentVal = $("#txtwpm").val();
        var count=$("#wpmcount1").html();
        var time=$("#wtime").html();

            
        var  newval = currentVal + "\n" + "\n" + "\n" + "\n" + "You typed "+count+"Words Per Minute In" +time+ "Seconds"; 
            
        

        $("#txtwpm").val(newval);
    }


    function stopWPMTimer(graceful){
        clearInterval(WPMTimerInterval);
    
        $("#WPMStop,.WPMStop").hide();
        $("#WPMStart,.WPMHelp").show();
        $("body").css({
            backgroundColor:"white"
        });
        $(".WPMControls").css({
            opacity:1.0
        });
    
        if(typeof graceful != "undefined"){
            return 
        }
    
        var content = $.trim($(".txtareaWPM").val());
    
        if(content.length == 0){
            $(".WPMError").show();
        }
    

        var contentArray = content.split(" ");
        var wordCount = 0;
        for(i in contentArray){
            if($.trim(contentArray[i]) == ''){
                continue;
            }
            if(contentArray[i].length > 2){
                wordCount++;
            }
        }
    
        var wpm=0;
        wpm = parseInt( (60 * wordCount)/WPMTimerCount  ); 
        
        
        var wpm_1;
        var total_min = 0;
        if((WPMTimerCount%60) > 0){
            total_min = (parseInt(WPMTimerCount/60) + parseInt(1));
        } else {
            total_min =  parseInt(WPMTimerCount/60);
        }
        wpm_1 = parseInt( wordCount/total_min  ); 
        $(".WPMWPM").html(wpm_1);
        
        $.ajax({
        
            type: "POST", // HTTP method POST or GET
            url: "Review_log.php", 
            data: {
                fname: $('#txtfname').val(),
                lname: $('#txtlname').val(), 
                tabname: $('li.active a').html(),
                content: $('#txtwpm').val(),
                time: $('#wtime').html(),
                wpm: $('#wpmcount1').html()
                
          
            },
            success:function(response){
  
                   
            },
            error:function (xhr, ajaxOptions, thrownError){
                   
                alert(thrownError);
            }
        });
      
        getwmessage();
        $("#check_startWPMTimer").html('');
        $("#beep_sound").html('');
    }
    function getdate()
    {
        var now = new Date();
        dateFormat(now, "dddd, mmmm dS, yyyy, h:MM:ss TT");
      
        $('#date').append(now)=$date;
    }
    function GetdataWpm()
    {
        $.ajax({
    
            type: "POST", // HTTP method POST or GET
            url: "Review_display.php", 
            data: {
                tabname: $('li.active a').html()
            },
            success:function(response){
                $('#displaywpmcontent').html(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
    function changewpmtablog(tabname)
    {
        $.ajax({
            type: "POST",
            url: "Review_display.php",
            data: {
                tabname: tabname     
            },
            success:function(response){
                $("#displaywpmcontent").html(response);
            }
        });
    }

    $(document).ready(function(){
        // $('#btnwpmreview').hide();
        // $('#btnwpmreview').click();
        var txtwpm_start_timer = 1;
        $(".txtareaWPM").keydown(function(e){
            if($("#check_startWPMTimer").html() == '' && e.keyCode != 32){
                $("#wpm_beep_audio")[0].play();
            }
            if(e.keyCode == 32)
            {
                if(txtwpm_start_timer == 1){ 
                    if($("#check_startWPMTimer").html() == ''){
                        startWPMTimer();
                    }
                    txtwpm_start_timer = 0;
                }
            }
            if((e.keyCode == 27 || e.keyCode == 9) && WPMTimerCount > 0 ){
                console.log(e.keyCode);
                stopWPMTimer();
            }
            if(e.keyCode == 35 && WPMTimerCount > 0 ){
                stopWPMTimer();
                getwendmessage()
            }
            if(e.shiftKey && e.altKey && e.keyCode == 66)
            {
                return true;
                console.log(e.shiftKey && e.altKey && e.keyCode == 66);
                if(e.keyCode == 8)
                {
                    return true;
                }
            }
            if(e.keyCode == 8 || e.keyCode == 46)
            {
                return false;
            }
            if(e.ctrlKey)
            {
                return false;
            }
            //Not Allow Arrow Ket
            if(e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40){
                return false
            }
        }); 
    }) ;   
    
    
</script>