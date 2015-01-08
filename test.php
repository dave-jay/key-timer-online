<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <script type="text/javascript">
            $(document).ready(function(){
                var currentVal = $("#txtcontent").val();
                newval = currentVal + " Time Elapsed: 93 words in 390 seconds :";
                $("#txtcontent").val(newval);
            });

        </script>

    </head>
    <body>
        <textarea  spellcheck="false" id="txtcontent" rows="20" placeholder="" class=" span12 txtareaAlpha"></textarea>

    </body>

</html>

