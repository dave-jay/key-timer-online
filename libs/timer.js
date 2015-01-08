function txtSize(cls,size,el){
    $("."+cls).css("fontSize",size);
    $(el).parent().find("i").addClass("none");
    $(el).find("i").removeClass("none").show();
}




//function startAlphaTimer(){
//    alphaTimerCount = 0;
//    $(".alphaError,.alphaHelp").hide();
//    $("#alphaStop,.alphaStop").show();
//    $("#alphaStart").hide();
//    $(".txtareaAlpha").focus().val('');
//    $("body").css({
//        backgroundColor:"black"
//    });
//    $(".alphaControls").css({
//        opacity:0.1
//    });
//    alphaTimerInterval = setInterval(function(){
//        alphaTimerCount = alphaTimerCount + 1;
//        $(".alphaTimerSeconds").html(alphaTimerCount);
//    },1000);
//    
//}
var alphaTimerInterval;
    
alphaTimerCount = 0;
alphaTimerCount_2 = 0;
function startAlphaTimer(id){
    $("#check_startALPHAtimer").html('1');
    
    alphaTimerCount = 0;
    alphaTimerCount_2 = 0;
    $(".alphaError,.alphaHelp").hide();
    $("#alphaStop,.alphaStop").show();
    $("#alphaStart").hide();
    if(id > 0){
            
    } else {
        $(".txtareaAlpha").focus().val('');
    }
    $("body").css({
        //        backgroundColor:"black"
        });
    $(".alphaControls").css({
        opacity:0.1
    });
    var txtalpha_timer = 1;
    //$(".txtareaAlpha").keydown(function(e){   
    if(txtalpha_timer == 1)
    { 
        txtalpha_timer = 0;
        alphaTimerInterval = setInterval(function(){
            alphaTimerCount = alphaTimerCount + 1;
            alphaTimerCount_2 = alphaTimerCount_2 + 1;
                
            $(".alphaTimerSeconds").html(alphaTimerCount);
            var widthPer = ( 100 * alphaTimerCount ) / 60;
            var widthPer_2 = ( 100 * alphaTimerCount_2 ) / 60;
           
            if((alphaTimerCount_2) % 60 == 0){
                //stopWPMTimer();
                alphaTimerCount_2 = 0;
            
                var round_beep = alphaTimerCount/60;
                var dotCounter = 0;
                (function BeepStart() {
                    setTimeout(function() {
                        //if (dotCounter++ < round_beep) {
                        AlphaBeepSound(round_beep);
                    //BeepStart();
                    //}
                    }, 10);
                })();
            }
        },1000);
    }
//});
}
   
    
function AlphaBeepSound(round_beep){
    var beep_counter = 1;
    var time_interval = parseInt(500/round_beep) + parseInt(500);
    setInterval(function(){
        if(beep_counter <= round_beep){
            $("#alpha_beep_audio")[0].play();
            beep_counter++;
        }
    },time_interval);
}

function BeepSound(round_beep){
    var beep_counter = 1;
    setInterval(function(){
        if(beep_counter <= round_beep){
            $("#alpha_beep_audio")[0].play();
            beep_counter++;
        }
    },2000);
}
function getmessage()
{
    var currentVal = $("#txtcontent").val();
    var count=$("#wpmcount").html();
    var time=$("#Atime").html();
    var  newval = currentVal + "\n" + "\n" + "\n" + "\n"  + " Time Stopped:"  +count+"Character in"  +time+"Seconds";

    $("#txtcontent").val(newval);
}

function stopAlphaTimer(graceful){
    
    clearInterval(alphaTimerInterval);
    
    $("#alphaStop,.alphaStop").hide();
    $("#alphaStart,.alphaHelp").show();
    $("body").css({
        backgroundColor:"white"
    });
    $(".alphaControls").css({
        opacity:1.0
    });
    
    if(typeof graceful != "undefined"){
        return 
    }
    
    var content = $.trim($(".txtareaAlpha").val());
    
    if(content.length == 0){
        $(".alphaError").show();
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
    wpm = parseInt( (60 * wordCount)/alphaTimerCount  );
    //alert($("#txtcontent").val().length);
    //$(".alphaWPM").html(wpm);
    $(".alphaWPM").html($("#txtcontent").val().length);
    
    
    $.ajax({
        type: "POST", // HTTP method POST or GET
        url: "Review_log.php", 
        data: {
            fname: $('#txtfname').val(),
            lname: $('#txtlname').val(), 
            tabname: $('li.active a').html(),  
            content: $('#txtcontent').val(),
            time: $('#Atime').html(),
            wpm: $('#wpmcount').html()
        },
        success:function(response){
                   
        },
        error:function (xhr, ajaxOptions, thrownError){
                   
            alert(thrownError);
        }
    });
    
    getmessage();
    $("#check_startALPHAtimer").html('');
    $("#beep_sound").html('');
    
  
}
function focuspracticeArea()
{
    setTimeout(function(){
        $("#Practiceareatxt").focus();
    },600);
}
function focusalphatimer()
{
    setTimeout(function(){
        $("#txtcontent").focus();
    },600);
}
function focuswpm()
{
    setTimeout(function(){
        $("#txtwpm").focus();
    },600);
}
function getendmessage()
{
    var currentVal = $("#txtcontent").val();
    var count=$("#wpmcount").html();
    var time=$("#Atime").html();
    var  newval = currentVal + "\n" +count+"Character in"  +time+"Seconds";

    $("#txtcontent").val(newval);
}

$(document).ready(function(){
    
    $("#LoginBtn").click(function(){
        $("#fname_msg").hide();
        $("#lname_msg").hide();
        $("#email_msg").hide();
        var allow_next = 1;
        if($("#txtfname").val() == ''){
            allow_next = 0;
            $("#fname_msg").show();
        }
        if($("#txtlname").val() == ''){
            allow_next = 0;
            $("#lname_msg").show();
        }
        if($("#txtemail").val() == ''){
            allow_next = 0;
            $("#email_msg").show();
        }
        if(allow_next == 0){
            return false;
        } else {
            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: "set_login.php", 
                data: {
                    setLogin: 1,  
                    txtfname: $('#txtfname').val(),
                    txtlname: $('#txtlname').val(),  
                    txtemail: $('#txtemail').val()
                },
                success:function(response){
                    console.log(response);
                    if(response == "success"){
                        $("#modallogin").modal("hide");
                    }
                }
            });
        }
    });
    
    
    $('#Practiceareatxt').bind("contextmenu", function(event) {
        event.preventDefault();
    });
    $('#txtcontent').bind("contextmenu", function(event) {
        event.preventDefault();
    });
    $('#txtwpm').bind("contextmenu", function(event) {
        event.preventDefault();
    });
    
    $('#Practiceareatxt').bind('cut copy paste', function(event) {
        event.preventDefault();
    });
    
    $('#txtcontent').bind('cut copy paste', function(event) {
        event.preventDefault();
    });
    
    $('#txtwpm').bind('cut copy paste', function(event) {
        event.preventDefault();
    });
    
    //    setTimeout(function(){
    //        $(".modal-backdrop").addClass("show_focus");
    //    },500);
    $(".show_focus").click(function(){
        setTimeout(function(){
            $("#Practiceareatxt").focus();
        },600);
    })
    
    
    
    //$('#btnalphareview').click();
    //$('#btnpracticereview').click();
    //$('#btnalphareview').hide();
    //$('#btnpracticereview').hide();
    var alpha_start_timer = 1;
    
    
    $(".txtareaAlpha").keydown(function(e){
        if($("#check_startALPHAtimer").html() == '' && e.keyCode != 32){
            $("#alpha_beep_audio")[0].play();
        }
        if(e.keyCode == 32)
        {
            if(alpha_start_timer == 1){
                if($("#check_startALPHAtimer").html() == ''){
                    startAlphaTimer();
                }
                alpha_start_timer = 0;
            }
        }
        if((e.keyCode == 27 || e.keyCode == 9) && alphaTimerCount > 0 ){
            stopAlphaTimer();
        }
        if(e.keyCode == 35 && alphaTimerCount > 0 ){
            stopAlphaTimer();
        //getendmessage();
        }
        if(e.shiftKey && e.altKey && e.keyCode == 56)
        {
            if(e.keyCode == 8)
            {
                return true;
            }
           
        }
        if(e.ctrlKey)
        {
            return false;
        }
        if(e.keyCode == 8 || e.keyCode == 46)
        {
            return false;
        }
        if(e.keyCode == 197)
        {
            if(e.ctrlKey)
            {
                return true;
            }
            if(e.keyCode == 8 || e.keyCode == 46)
            {
                return true;
            }
        }
	
        //Not Allow Arrow Ket
        if(e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40){
            return false
        }
	
    });
    focuspracticeArea();
    diactivate();
//practicecontent();
});
//    $.ajax({
//        
//        type: "POST", // HTTP method POST or GET
//        url: "Review_display.php", 
//        data: { 
//            tabname:$('li.active a').attr('id')
//        },
//        success:function(response){
//         
//        },
//        error:function (xhr, ajaxOptions, thrownError){
//            alert(thrownError);
//        }
//    });
function changepracticetablog(tabName)
{
    $.ajax({
        type: "POST",
        url: "Review_display.php",
        data: { 
            tabname: tabName
        },
        success:function(response){
            $("#displaycontent").html(response);
        }
    });
}
function changealphatablog(tabname)
{

    $.ajax({
        type: "POST", // HTTP method POST or GET
        url: "Review_display.php", 
        data: {
            tabname: tabname
        },
        success:function(response){
            //console.log(response);  
            $("#displayalphacontent").html(response);
        },
        error:function (xhr, ajaxOptions, thrownError){                   
            alert(thrownError);
        }
    });
    
}

function practicecontent()
{
    $.ajax({
        
        type: "POST", // HTTP method POST or GET
        url: "Review_log.php", 
        data: {
            fname: $('#txtfname').val(),
            lname: $('#txtlname').val(), 
            tabname: $('li.active a').html(),
            content: $('#Practiceareatxt').val()
        },
    
        success:function(response){
            console.log(response);
        }
    
    });
    Getdatapractice();
//    var practice_content = $("#Practiceareatxt").val();
//    $("#displaycontent").html(practice_content);
}
function Getdatapractice()
{
    $.ajax({
        
        type: "POST", // HTTP method POST or GET
        url: "Review_display.php", 
        data: {
            tabname: $('li.active a').html()
        },
        success:function(response){
            $('#displaycontent').html(response);
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}
function GetdataAlpha()
{
    $.ajax({
        
        type: "POST", // HTTP method POST or GET
        url: "Review_display.php", 
        data: {
            tabname: $('li.active a').html()
       
        },
        success:function(response){
            $('#displayalphacontent').html(response);
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}


function diactivate()
{   
    $(".txtareaPractice").keydown(function(e){
	
        //Not Allow Arrow Ket
        if(e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40){
            return false
        }
	
        if(e.keyCode == 8 || e.keyCode == 46)
        {
            return false;
        }
        if(e.ctrlKey)
        {
            return false;
        }
      
        if(e.keyCode == 197)
        {
                
            if(e.ctrlKey)
            {
                return true;
            }
            if(e.keyCode == 8 || e.keyCode == 46)
            {
                return true;
            }
        }
    });
   
}

function stopTimers(){
    var graceful = true
    stopWPMTimer(graceful);
    stopAlphaTimer(graceful);
}


function PrintData(div_id){
    printMe=window.open();
    printMe.document.write($("#"+div_id).html());
    printMe.print();
    printMe.close();
}
