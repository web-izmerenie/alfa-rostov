define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    function error404Resize(){
            var gridMin = getVal("gridDetailMinWidth");  
            var paddMin = 108;
            var gridCur = parseFloat($(".error_404 main").width());
            
            var paddCur = paddMin + ((gridCur - gridMin) / 5); // / 1.834            
            $(".error_404 main").css({
                "paddingTop" : paddCur,
                "paddingBottom" : paddCur
            });
    }
    $(window).on("resize", null, null, error404Resize);
    setTimeout(error404Resize, 1); 
   
    
}); // domReady
}); // define