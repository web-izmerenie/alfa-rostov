define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    function aboutResize(){       
        var marginMin = getVal("twoColsRightColMinMarginLeft");
        var marginMax = getVal("twoColsRightColMaxMarginLeft");
        var gridMin = getVal("gridDetailMinWidth");
        var gridMax = getVal("gridDetailMaxWidth");
        
        var gridCur = parseFloat($(".section_standart").width());
        var marginCur = ((gridCur - gridMin) / 2.54) + marginMin;
        
        $(".two_cols .section_standart main").css({
            "marginLeft" : marginCur + "px"
        });
    }
    $(window).on("resize", null, null, aboutResize);
    setTimeout(aboutResize, 1); 
   
    
}); // domReady
}); // define