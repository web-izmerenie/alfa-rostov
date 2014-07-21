;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('pages/nr_materials_detail_moreicons'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 
define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {
    function gridElementsResizeDetailMoreIcons(){        
        var gridMin = getVal("gridDetailMinWidth"); 
        var fMin = getVal("featureImageSizeMin");
        var fMax = getVal("featureImageSizeMax");
        var mBegin = getVal("featureMarginBeginMoreIcons");
        var flistCur = parseFloat($(".feature_list").css("width"));
        
        var fCur = (flistCur * fMin) / gridMin;       
        
        var mCur = mBegin + (fCur - fMin);
        var flistNewWidth = (mCur * 2 + (fMax + 3)) * 5 ;
        
        
        $("html.nr_materials_detail_moreicons .feature_inner").css({
            "width": flistNewWidth
        });
        
        $("html.nr_materials_detail_moreicons .feature_item").css({
            "marginLeft": mCur - 10,
            "marginRight": mCur - 10
        });
        
    }
    $(window).on("resize", null, null, gridElementsResizeDetailMoreIcons);
    setTimeout(gridElementsResizeDetailMoreIcons, 1); 
   
    
}); // domReady
}); // define
})();