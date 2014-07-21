;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('pages/nr_materials_detail'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 

define(['basics/get_val', 'jquery', 'libs/jquery-ui'], function (getVal, $) {

$(function domReady() {
    function gridElementsResizeDetail(){
        
        var gridMax = getVal("gridDetailMaxWidth");
        var gridMin = getVal("gridDetailMinWidth");        
        var elMax = getVal("gridElementDetailMaxWidth");
        var elMin = getVal("gridElementDetailMinWidth");
        var imageMax = getVal("gridImageDetailMaxWidth");
        var imageMin = getVal("gridImageDetailMinWidth");
        var diff = getVal("gridElementShadowDetailDiff");
        var diffMax = getVal("gridTextMarginMaxDiff");
        var diffMin = getVal("gridTextMarginMinDiff");
        var gridCur = parseFloat($(".detail_text_photo_block").css("width"));
        
        var elCur = (gridCur * elMin) / gridMin;
        var diffCur = (gridCur * diffMin) / gridMin;
        var imageCur = (gridCur * imageMin) / gridMin;
        var bgSize = elCur - diff;
        var bgSizeMin = elMin - diff;
        var bgSizeMax = elMax - diff;
        bgSize = bgSizeMin >= bgSize ? bgSizeMin : bgSize; 
        bgSize = bgSizeMax <= bgSize ? bgSizeMax : bgSize; 
        marginLeft = elCur + diffCur;
        
        $(".grid_element").css({
            "width" : elCur
        });
        $(".grid_element_img").css({
            "background-size" : bgSize
        });
        $(".grid_element_img img").css({
            "width" : imageCur,
            "height" : imageCur
        });
        $(".grid_text").css({
            "marginLeft" : marginLeft
        });
        
        var fMin = getVal("featureImageSizeMin");
        var fMax = getVal("featureImageSizeMax");
        var mBegin = getVal("featureMarginBegin");
        var hcBegin = getVal("hasCharMinWidth");
        var flistCur = parseFloat($(".feature_list").css("width"));
        
        var fCur = (flistCur * fMin) / gridMin;       
        
        var mCur = mBegin + (fCur - fMin);
        var hcCur = hcBegin + (fCur - fMin) / 2;
        var flistNewWidth = (mCur * 2 + (fMax + 5)) * 4 ;
        
        
        $(".feature_inner").css({
            "width": flistNewWidth
        });
        $(".feature_item").css({
            "marginLeft": mCur,
            "marginRight": mCur
        });
        $(".feature_item_icon").css({
            "width" : fCur,
            "height" : fCur,
        });
        $(".feature_item_icon img").css({
            "width" : fCur,
            "height" : fCur,
        });
        $(".has_char").css({
            "width" : hcCur,
            "height" : hcCur,
        });
        
        
        var trackSize = getVal("darksideTrackSize");
        var trackCur = (gridCur * trackSize) / gridMin;
        var paddTrack = 55 + ((trackCur - trackSize) / 4);
        
        $(".dark_side").css({
            "paddingTop" : paddTrack,
            "paddingBottom" : paddTrack
        });
        $(".dark_side img").css({
            "width" : trackCur
        });
        
    }
    
    $(window).on("resize", null, null, gridElementsResizeDetail);
    setTimeout(gridElementsResizeDetail, 1); 

    setTimeout(function(){
        var $calculation = $("body").find(".calculation");
        
        var calculationLeftMargin = "-" + parseFloat($calculation.css("width")) / 2 + "px";
        $calculation.css({
            "marginLeft" :  calculationLeftMargin
        });
                
        $points = $calculation.find("li");
        var pointCounter = 0; 
        
        $.each($points, function(){
            pointCounter++;
            $(this).addClass("calculation_point_" + pointCounter);
        });
    }, 500);
    
   
    
    $has_char = $("body").find(".has_char");
    $.each($has_char, function(){
        $(this).tooltip({
            "content" : $(this).parent(".feature_item_icon").prev(".char_desc").html(),
            "position" : {
                "my" : "left top",
                "at" : "left-3px top-3px"
            },            
            "open": function(){
                $(".has_char_inner").css("z-index", "10000");
                $(".ui-tooltip").css("z-index", "9999");
                //$(".ui-tooltip .char_desc_norm").css("white-space", "nowrap");
                
                var id = $(this).attr("aria-describedby");                
                var arrid = id.split("-");
                var buttonZI = parseInt($(this).children().css("z-index")) + 100;
                var ttZI = parseInt($("#ui-id-" + arrid[2]).css("z-index")) + 100;
                
                $(this).children().css("z-index", buttonZI);
                $("#ui-id-" + arrid[2]).css("z-index", ttZI);
                
                var minHeight = parseInt($("#ui-id-" + arrid[2]).height());                
                if(minHeight <= 40){
                    curHeight = parseFloat($(this).children().height()) - 13 + "px";
                    $(".ui-tooltip").css({
                        "height" : curHeight,
                        "line-height" : curHeight
                    });
                }
                
                var uioffset = $(".ui-tooltip").offset();
                var roundoffset = $(this).children().offset();
                
                var leftDiff = roundoffset.left - uioffset.left;
                var topDiff = roundoffset.top - uioffset.top;
                if(leftDiff < 15 && topDiff < 15){
                    if(minHeight <= 40){
                        $(".ui-tooltip").css("paddingLeft", parseFloat($(this).children().width()) + 15 + "px");
                    }else{
                        $(".ui-tooltip").css("paddingTop", parseFloat($(this).children().height()) + 15 + "px");
                    }
                }else{
                    if(minHeight <= 40){
                        $(".ui-tooltip").css("paddingRight", (parseFloat($(this).children().width()) + 15)  + "px");
                        $(".ui-tooltip").css("marginLeft", "-" + parseFloat($(this).children().width()) + "px");
                    }
                }
                if(leftDiff > 15 && topDiff > 15){
                    $(".ui-tooltip").css("paddingBottom", (parseFloat($(this).children().width()) + 15)  + "px");
                    $(".ui-tooltip").css("marginTop", "-" + parseFloat($(this).children().width()) + "px");
                }
                
            }
        });
    });
        
    
    
}); // domReady
}); // define
})();